<?php $__env->startSection('body'); ?>
		<style>
			#index-img{
				width: 80%;
				min-width: 720px;
			}

			@media  only screen and (max-width: 550px) {
			    #index-img{
			        width: 100%;
			        min-width: 100%;
			    }
			}			
		</style>
        <a href="<?php echo str_replace(['///', '//'], '/', $base_url.'/'.trim('/works', '/').'/');  ?>"><img id="index-img" src="assets/images/index_image.jpg" ></a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_includes.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>