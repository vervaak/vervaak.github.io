<?php $__env->startSection('pageTitle', '- Blog'); ?>

<?php $__env->startSection('body'); ?>
    <style>
        article h1 a{
            color: #323336;
            text-decoration: none;
        }

    </style>
    <div >
        <?php foreach($paginatedBlogPosts as $post): ?>

            <article>
                    <h1><a href="<?php echo str_replace(['///', '//'], '/', $base_url.'/'.trim($post->path, '/').'/');  ?>"><?php echo e($post->title); ?></a></h1>   
                    <p><?php echo e(str_limit($post->brief, 130)); ?></p>
                    <a href="<?php echo str_replace(['///', '//'], '/', $base_url.'/'.trim($post->path, '/').'/');  ?>">read more</a>
                    <br/>
            </article>

        <?php endforeach; ?>

        <?php echo $__env->make('_includes.blog_paginator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('_includes.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>