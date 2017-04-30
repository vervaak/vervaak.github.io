<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('pageDescription', $siteDescription)">

    <title>{{$siteName}} @yield('pageTitle')</title>

    <link href='https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <link rel="stylesheet" href="@url('assets/css/all.css')">
    <link rel="stylesheet" href="@url('assets/css/skeleton_css/skeleton.css')">

    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans" rel="stylesheet">

    <link href="/assets/vendor/lightbox-master/css/lightbox.css" rel="stylesheet">

    <script src="//code.jquery.com/jquery-latest.js"></script>

</head>

<body>
<style>

</style>
<div class="container">

    <nav class="two columns">
        @include('_includes.navigation')
    </nav>
    <content class="ten columns">
        @yield('body')
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

