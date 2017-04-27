<?php $__env->startSection('pageDescription'); ?><?php echo $__env->yieldContent('post::brief'); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

    <div class="ten columns">
            
            <a href="<?php echo str_replace(['///', '//'], '/', $base_url.'/'.trim('blog', '/').'/');  ?>">上一頁／Back</a>

            <h1><?php echo $__env->yieldContent('post::title'); ?></h1>

            <small><?php echo $__env->yieldContent('post::date'); ?></small>

            <?php echo $__env->yieldContent('post_body'); ?>

            <a href="<?php echo str_replace(['///', '//'], '/', $base_url.'/'.trim('blog', '/').'/');  ?>">上一頁／Back</a>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('_includes.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>