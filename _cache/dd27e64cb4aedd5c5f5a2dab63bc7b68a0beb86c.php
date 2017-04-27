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
				max-width: 375px;
			}

		}		
	</style>
	<link href="//cdn.rawgit.com/noelboss/featherlight/1.7.2/release/featherlight.min.css" type="text/css" rel="stylesheet" />
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
			$path  = str_replace("/Users/sijung/github/vervaak.github.io/content/","/", $image); 
		 	$tagData  = mt_rand(); 
		?>
		<a href="<?php echo e($path); ?>" data-lightbox="<?php echo e($tagData); ?>" data-title="My caption"><img class="thumb" src="<?php echo e($path); ?>" /></a>

	<?php endforeach; ?>		

<script src="//code.jquery.com/jquery-latest.js"></script>
<script src="//cdn.rawgit.com/noelboss/featherlight/1.7.2/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_includes.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>