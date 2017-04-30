<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $__env->yieldContent('pageDescription', $siteDescription); ?>">

    <title><?php echo e($siteName); ?> <?php echo $__env->yieldContent('pageTitle'); ?></title>

    <link href='https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo str_replace(['///', '//'], '/', $base_url.'/'.trim('assets/css/all.css', '/').'');  ?>">
    <link rel="stylesheet" href="<?php echo str_replace(['///', '//'], '/', $base_url.'/'.trim('assets/css/skeleton_css/skeleton.css', '/').'');  ?>">

    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans" rel="stylesheet">

    <link href="/assets/vendor/lightbox-master/css/lightbox.css" rel="stylesheet">

    <script src="//code.jquery.com/jquery-latest.js"></script>

</head>

<body>
<style>

</style>
<div class="container">

    <nav class="two columns">
        <?php echo $__env->make('_includes.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </nav>
    <content class="ten columns">
        <?php echo $__env->yieldContent('body'); ?>
    </content>
    <footer class="ten offset-by-two columns">
        <div class="ten columns">
        Copyright © 2017 Lai Chi-Man  <br/>
        Site created by vervaak <br/>
        Twitter: @vervaak<br/>
        </div>
    </footer>
</div>

</body>
</html>

