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


</head>

<body>

<div class="container">
    <nav class="two columns">
        @include('_includes.navigation')
    </nav>
    <content class="ten columns">
        @yield('body')
    </content>
</div>

</body>
</html>
