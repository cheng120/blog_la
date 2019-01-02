<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>后台管理模板</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" href="{{asset('admin/plugins/layui/css/layui.css')}}" media="all" />
    <link rel="stylesheet" href="{{asset('admin/css/global.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('admin/plugins/font-awesome/css/font-awesome.min.css')}}">

</head>

<body>
<div class="layui-layout layui-layout-admin" style="border-bottom: solid 5px #1aa094;">
    @include("admin.layout_admin.admin_header")

    <div class="layui-side layui-bg-black" id="admin-side">
        <div class="layui-side-scroll" id="admin-navbar-side" lay-filter="side"></div>
    </div>
    <div class="layui-body" style="bottom: 0;border-left: solid 2px #1AA094;" id="admin-body">
        <div class="layui-tab admin-nav-card layui-tab-brief" lay-filter="admin-tab">
            <ul class="layui-tab-title">
                <li class="layui-this">
                    <i class="fa fa-dashboard" aria-hidden="true"></i>
                    <cite>控制面板</cite>
                </li>
            </ul>
            <div class="layui-tab-content" style="min-height: 150px; padding: 5px 0 0 0;">
                <div class="layui-tab-item layui-show">
                    <iframe src="{{route('adminMain')}}"></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="layui-footer footer footer-demo" id="admin-footer">
        <div class="layui-main">
            <p>2016 &copy;
                <a href="http://m.zhengjinfan.cn/">m.zhengjinfan.cn/</a> LGPL license
            </p>
        </div>
    </div>
    <div class="site-tree-mobile layui-hide">
        <i class="layui-icon">&#xe602;</i>
    </div>
    <div class="site-mobile-shade"></div>

    <!--锁屏模板 start-->
    <script type="text/template" id="lock-temp">
        <div class="admin-header-lock" id="lock-box">
            <div class="admin-header-lock-img">
                <img src="images/0.jpg"/>
            </div>
            <div class="admin-header-lock-name" id="lockUserName">beginner</div>
            <input type="text" class="admin-header-lock-input" value="输入密码解锁.." name="lockPwd" id="lockPwd" />
            <button class="layui-btn layui-btn-small" id="unlock">解锁</button>
        </div>
    </script>
    <!--锁屏模板 end -->

    <script type="text/javascript" src="{{asset('admin/plugins/layui/layui.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/datas/nav.js')}}"></script>
    <script src="{{asset('admin/js/index.js')}}"></script>
    <script>
        layui.use('layer', function() {
            var $ = layui.jquery,
                layer = layui.layer;

            $('#video1').on('click', function() {
                layer.open({
                    title: 'YouTube',
                    maxmin: true,
                    type: 2,
                    content: 'video.html',
                    area: ['800px', '500px']
                });
            });
            $('#pay').on('click', function () {
                layer.open({
                    title: false,
                    type: 1,
                    content: '<img src="images/xx.png" />',
                    area: ['500px', '250px'],
                    shadeClose: true
                });
            });


        });
    </script>
</div>
</body>

</html>