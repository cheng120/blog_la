<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>@cheng</title>

    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">

    <!-- No Baidu Siteapp-->
    <meta http-equiv="Cache-Control" content="no-siteapp"/>

    <link rel="icon" type="image/png" href="{{asset('assets/i/favicon.png')}}">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="{{asset('assets/i/app-icon72x72@2x.png')}}">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="cheng1991"/>
    <link rel="apple-touch-icon-precomposed" href="{{asset('assets/i/app-icon72x72@2x.png')}}">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="{{asset('assets/i/app-icon72x72@2x.png')}}">
    <meta name="msapplication-TileColor" content="#0e90d2">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->
    <link rel="stylesheet" href="{{asset('assets/css/amazeui.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">


</head>
<!--[if (gte IE 9)|!(IE)]><!-->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/amazeui.ie8polyfill.min.js')}}"></script>
<![endif]-->
<script src="{{asset('assets/js/amazeui.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
{{--<script src="https://cdn.staticfile.org/vue/2.2.2/vue.min.js"></script>--}}
<meta name="csrf-token" content="{{ csrf_token() }}">

@component('layout/alert')

@endcomponent
<body>
@section('log_header')

@show

<div class="log">
    @section('log_div')

    @show
    <footer class="log-footer">
        &copy;  京ICP备16030806号-1
    </footer>
</div>
<script src="{{asset('js/login.js?v=1111')}}"></script>
<script>


</script>


</body>
</html>
