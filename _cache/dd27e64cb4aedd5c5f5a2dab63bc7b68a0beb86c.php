<?php $__env->startSection('pageTitle', '- Works'); ?>

<?php $__env->startSection('body'); ?>
	<style>
		.light-box{
			display: none;
		}

		.thumb{
			max-height: 150px;
		}

		.thumb-wrap{
			display: inline-block;
			padding: 12px;
		}

		@media  only screen and (max-width: 700px) {


		    .light-box{
		    	max-width: 375px;
		    }

			.thumb{
				max-width: 200px;
			}

		}		
	</style>
<?php

	$folder = '/Users/sijung/github/vervaak.github.io/content/assets/images/works';

    $dir = new RecursiveDirectoryIterator($folder);
    $ite = new RecursiveIteratorIterator($dir);
    $files = new RegexIterator($ite, '/^.+\.jpg$/i', RegexIterator::GET_MATCH);
    $fileList = array();
    foreach($files as $file) {
        $fileList = array_merge($fileList, $file);
    }

?>	
	<?php foreach($fileList as $image): ?>
		<?php 
			$originalFilePath = $image;
			$path  = str_replace("/Users/sijung/github/vervaak.github.io/content/","/", $originalFilePath); 
			$extension_pos = strrpos($path, '.'); 
			$thumbPath = substr($path, 0, $extension_pos) . '_mobile' . substr($path, $extension_pos);
			
			$originalFileName  = str_replace("/Users/sijung/github/vervaak.github.io/content/assets/images/works","", $originalFilePath); 

			$tagData = uniqid();
		?>
		<a href="<?php echo e($path); ?>" data-lightbox="<?php echo e($tagData); ?>" data-title="<?php echo e($originalFileName); ?>"><img class="thumb" src="<?php echo e($thumbPath); ?>" /></a>

	<?php endforeach; ?>		
<script src="/assets/vendor/lightbox-master/js/lightbox.js"></script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_includes.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>