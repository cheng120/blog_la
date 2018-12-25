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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('header')
    @show
</head>
<nav class="am-g am-g-fixed blog-fixed blog-nav data-am-sticky">
    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only blog-button" data-am-collapse="{target: '#blog-collapse'}" ><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="blog-collapse">
        <ul class="am-nav am-nav-pills am-topbar-nav">
            <li class="am-active"><a href="{{url('blog/index')}}">首页</a></li>
            {{--<li class="am-dropdown" data-am-dropdown>--}}
                {{--<a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">--}}
                    {{--ceshi <span class="am-icon-caret-down"></span>--}}
                {{--</a>--}}
                {{--<ul class="am-dropdown-content">--}}
                    {{--<li><a href="#">1. blog-index-standard</a></li>--}}
                    {{--<li><a href="#">2. blog-index-nosidebar</a></li>--}}
                    {{--<li><a href="#">3. blog-index-layout</a></li>--}}
                    {{--<li><a href="#">4. blog-index-noslider</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            <li><a href="{{url('blog/art')}}" >标准文章</a></li>
            <li><a href="{{url('blog/write_art')}}" >写文章</a></li>
            <li><a href="javascript:void(0);">图片库</a></li>
            <li><a href="javascript:void(0);">全宽页面</a></li>
            <li><a href="javascript:void(0);">时间线</a></li>
        </ul>
        @if(empty($userData))
            <div class="am-topbar-right">
                <a class="am-btn am-btn-warning am-round am-topbar-btn am-btn-sm" href="{{url('user/reg')}}">注册</a>
            </div>
            <div class="am-topbar-right">
                <a class="am-btn am-btn-primary am-round am-topbar-btn am-btn-sm" href="{{url('user/login')}}">登录</a>
            </div>
        @else
            <div class="am-topbar-right">
                <div class="am-dropdown" data-am-dropdown="{boundary: '.am-topbar'}">
                    <button class="am-btn am-btn-secondary am-topbar-btn am-btn-sm am-dropdown-toggle" data-am-dropdown-toggle>{{$userData['nickname']?$userData['nickname']:$userData['username']}} <span class="am-icon-caret-down"></span></button>
                    <ul class="am-dropdown-content">
                        <li><a href="{{url('blog/user_center')}}">个人中心</a></li>
                        <li><a href="{{url('user/logout')}}">退出登录</a></li>
                    </ul>
                </div>
            </div>
        @endif
    </div>

</nav>
<hr>
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
                <li>暂时没有</li>
            </ul>
            </p>
        </div>
    </div>
    <div class="blog-text-center">&copy;  京ICP备16030806号-1</div>
</footer>
@component('layout/alert')

@endcomponent
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
@section('script')
@show
</html>