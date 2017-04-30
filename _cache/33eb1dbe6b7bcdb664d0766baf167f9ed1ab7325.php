<?php $__env->startSection('body'); ?>
    <div class="ten columns">
        <a href="<?php echo str_replace(['///', '//'], '/', $base_url.'/'.trim('/works', '/').'/');  ?>"><img src="assets/images/index_image.jpg" width="100%"></a>
    </div>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_includes.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>