<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>BLOG  | Amaze UI Examples</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="{{asset('assets/i/favicon.png')}}">
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="{{asset('assets/i/app-icon72x72@2x.png')}}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="cheng"/>
    <link rel="apple-touch-icon-precomposed" href="{{asset('assets/i/app-icon72x72@2x.png')}}">
    <meta name="msapplication-TileImage" content="{{asset('assets/i/app-icon72x72@2x.png')}}">
    <meta name="msapplication-TileColor" content="#0e90d2">
    <link rel="stylesheet" href="{{asset('assets/css/amazeui.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}?v=1">
</head>

@section('blog')

@show
<footer class="blog-footer">
    <div class="am-g am-g-fixed blog-fixed am-u-sm-centered blog-footer-padding">
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
            <h3>网站简介</h3>
            <p class="am-text-sm">个人爱好。<br> 博客 <br> 游戏的东西<br>嗯嗯嗯，不知道说啥了。<br><br>
        </div>
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
            <h3>社交账号</h3>
            <p>
                <a href="javascript:void(0);" data-am-popover="{content: '1010460162'}" ><span class="am-icon-qq am-icon-fw am-primary blog-icon blog-icon"></span></a>
                <a href="https://github.com/cheng120"><span class="am-icon-github am-icon-fw blog-icon blog-icon"></span></a>
                <a href="https://weibo.com/3490040821"><span class="am-icon-weibo am-icon-fw blog-icon blog-icon"></span></a>
                <a href="javascript:void(0);" data-am-popover="{content: '打扰了，没有'}"><span class="am-icon-weixin am-icon-fw blog-icon blog-icon"></span></a>
            </p>
        </div>
        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4">
            <h1>感谢</h1>
            <h3>。。。。</h3>
            <p>
            <ul>
                <li>没有</li>
                <li>没有</li>
                <li>没有</li>
                <li>没有</li>
                <li>没有</li>
            </ul>
            </p>
        </div>
    </div>
    <div class="blog-text-center">&copy;  京ICP备16030806号-1</div>
</footer>
<!--[if (gte IE 9)|!(IE)]><!-->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="{{asset('assets/js/amazeui.ie8polyfill.min.js')}}"></script>
<![endif]-->
<script src="{{asset('assets/js/amazeui.min.js')}}"></script>
<!-- <script src="assets/js/app.js"></script> -->
</body>
</html>