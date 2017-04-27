<?php

namespace Katana;

use Symfony\Component\Finder\SplFileInfo;
use Katana\FileHandlers\BlogPostHandler;
use Illuminate\Filesystem\Filesystem;
use Katana\FileHandlers\BaseHandler;
use Illuminate\View\Factory;
use Illuminate\Support\Str;
use claviska\SimpleImage;

class SiteBuilder
{
    private $filesystem;
    private $viewFactory;
    private $blogPostHandler;
    private $fileHandler;

    /**
     * The application environment.
     *
     * @var string
     */
    private $environment;

    /**
     * The site configurations.
     *
     * @var array
     */
    private $configs;

    /**
     * The data included in every view file of a post.
     *
     * @var array
     */
    private $postsData;

    /**
     * The data to pass to every view.
     *
     * @var array
     */
    private $viewsData;

    /**
     * The directory that contains blade sub views.
     *
     * @var array
     */
    protected $includesDirectory = '_includes';

    /**
     * The directory that contains blog posts.
     *
     * @var array
     */
    protected $blogDirectory = '_blog';

    /**
     * Clear the cache before building.
     *
     * @var array
     */
    protected $forceBuild = false;

    /**
     * SiteBuilder constructor.
     *
     * @param Filesystem $filesystem
     * @param Factory $viewFactory
     * @param string $environment
     */
    public function __construct(Filesystem $filesystem, Factory $viewFactory, $environment, $forceBuild = false)
    {
        $this->filesystem = $filesystem;

        $this->viewFactory = $viewFactory;

        $this->environment = $environment;

        $this->fileHandler = new BaseHandler($filesystem, $viewFactory);

        $this->blogPostHandler = new BlogPostHandler($filesystem, $viewFactory);

        $this->forceBuild = $forceBuild;
    }

    /**
     * Build the site from blade views.
     *
     * @return void
     */
    public function build()
    {
        $files = $this->getSiteFiles();

        $blogPostsFiles = array_filter($files, function ($file) {
            return str_contains($file->getRelativePath(), '_blog');
        });

        $otherFiles = array_filter($files, function ($file) {
            return ! str_contains($file->getRelativePath(), '_blog');
        });

        $this->readConfigs();

        if (@$this->configs['enableBlog']) {
            $this->readBlogPostsData($blogPostsFiles);
        }

        $this->buildViewsData();

        $this->filesystem->cleanDirectory(KATANA_PUBLIC_DIR);

        if ($this->forceBuild) {
            $this->filesystem->cleanDirectory(KATANA_CACHE_DIR);
        }

        $this->handleSiteFiles($otherFiles);

        if (@$this->configs['enableBlog']) {
            $this->handleBlogPostsFiles($blogPostsFiles);
            $this->buildBlogPagination();
        }

        $this->handlePublicImages();
       
    }


    private function handlePublicImages()
    {
        $files = $this->getAllPublicImages();

        foreach ($files as $file) {
            $this->adjustImageQualityAndSize($file);
        }
    }

    private function adjustImageQualityAndSize($file)
    {
            
        $newFileName = $file->getFilename();
        $newFilePath = $file->getPath() . '/' . $newFileName;

        $image = new SimpleImage();
        $image
            ->fromFile($file->__toString())
            ->bestFit(1080, 1080)
            ->toFile($newFilePath, 'image/jpeg', 80);
    }


    /**
     * Get all images from Public dir
     *
     * @return SplFileInfo[]
     */
    private function getAllPublicImages()
    {
        $files = array_filter($this->filesystem->allFiles(KATANA_PUBLIC_DIR), function (SplFileInfo $file) {
            return Str::endsWith($file->getRelativePathName(),  ['gif', 'GIF', '.jpg', '.JPG', 'jpeg', 'JPEG', 'png', "PNG"]);
        });

        return $files;
    }


    /**
     * Set a configuration value.
     *
     * @param string $key
     * @param string $value
     *
     * @return void
     */
    public function setConfig($key, $value)
    {
        $this->configs[$key] = $value;
    }

    /**
     * Read site configurations based on the current environment.
     *
     * It loads the default config file, then the environment specific
     * config file, if found, and finally merges any other configs.
     *
     * @return void
     */
    private function readConfigs()
    {
        $configs = include getcwd().'/config.php';

        if (
            $this->environment != 'default' &&
            $this->filesystem->exists(getcwd().'/'.$fileName = "config-{$this->environment}.php")
        ) {
            $configs = array_merge($configs, include getcwd().'/'.$fileName);
        }

        $this->configs = array_merge($configs, (array) $this->configs);
    }

    /**
     * Handle non-blog site files.
     *
     * @param array $files
     *
     * @return void
     */
    private function handleSiteFiles($files)
    {
        foreach ($files as $file) {
            $this->fileHandler->handle($file);
        }
    }

    /**
     * Handle blog posts files.
     *
     * @param array $files
     *
     * @return void
     */
    private function handleBlogPostsFiles($files)
    {
        foreach ($files as $file) {
            $this->blogPostHandler->handle($file);
        }
    }

    /**
     * Get the site files that will be converted into pages.
     *
     * @return SplFileInfo[]
     */
    private function getSiteFiles()
    {
        $files = array_filter($this->filesystem->allFiles(KATANA_CONTENT_DIR), function (SplFileInfo $file) {
            return ! Str::startsWith($file->getRelativePathName(), $this->includesDirectory);
        });

        if ($this->filesystem->exists(KATANA_CONTENT_DIR.'/.htaccess')) {
            $files[] = new SplFileInfo(KATANA_CONTENT_DIR.'/.htaccess', '', '.htaccess');
        }

        return $files;
    }

    /**
     * Read the data of every blog post.
     *
     * @param array $files
     *
     * @return void
     */
    private function readBlogPostsData($files)
    {
        foreach ($files as $file) {
            $this->postsData[] = $this->blogPostHandler->getPostData($file);
        }
    }

    /**
     * Build array of data to be passed to every view.
     *
     * @return void
     */
    private function buildViewsData()
    {
        $this->viewsData = $this->configs + ['blogPosts' => array_reverse((array) $this->postsData)];

        $this->fileHandler->viewsData = $this->viewsData;

        $this->blogPostHandler->viewsData = $this->viewsData;
    }

    /**
     * Build the blog pagination files.
     *
     * @return void
     */
    private function buildBlogPagination()
    {
        $builder = new BlogPaginationBuilder(
            $this->filesystem,
            $this->viewFactory,
            $this->viewsData
        );

        $builder->build();
    }
}
