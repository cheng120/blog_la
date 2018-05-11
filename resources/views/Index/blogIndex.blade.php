<html>
@include('layout.layui')
    <head>
        <link rel="stylesheet" href="{{asset('css/header.css')}}" media="all">
        <link rel="stylesheet" href="{{asset('css/index.css')}}" media="all">

    </head>
    <body>
    <!--导航start-->
        <div class="header">
            <div class="layui-main">
                <div class="layui-col-md8">
                    <a class="logo" href="/">
                        <img src="https://img.fgowiki.com/fgo/head/208.jpg" alt="fgo">
                    </a>
                </div>
                <div class="layui-col-md4">
                    <ul class="layui-nav">
                        <li class="layui-nav-item layui-this">
                            <a href="#">博客<!--  --></a>
                        </li>
                        <li class="layui-nav-item ">
                            <a href="#">图库<!-- <span class="layui-badge-dot"></span> --></a>
                        </li>

                        <li class="layui-nav-item layui-hide-xs">
                            <a href="#" target="_blank">日记</a>
                        </li>


                        <li class="layui-nav-item">
                            <!--<span class="layui-badge-dot" style="margin: -4px 3px 0;"></span>-->
                            <a href="javascript:;">周边<span class="layui-nav-more"></span></a>
                            <dl class="layui-nav-child layui-anim layui-anim-upbit">
                                <dd class="layui-hide-sm layui-show-xs"><a href="http://fly.layui.com/" target="_blank">社区交流</a><hr></dd>
                                <dd><a href="http://layim.layui.com/" target="_blank">即时聊天</a></dd>
                                <dd><a href="/template/fly/" target="_blank">社区模板<span class="layui-badge-dot"></span></a></dd>
                                <hr>
                                <dd><a href="/alone.html" target="_blank">独立组件</a></dd>
                                <dd><a href="http://fly.layui.com/jie/24209/" target="_blank">Axure组件<span class="layui-badge-dot"></span></a></dd>
                            </dl>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    {{--main start--}}
    <div class="main layui-container">
        {{--left nav start--}}
        <div class="layui-col-md3 cheng-left">
            <div class="cheng-userinfo">
               <h3 class="card-header">个人资料</h3>
                <div class="layui-card-body">
                    <img src="https://img.fgowiki.com/fgo/head/208.jpg" alt="" class="cheng-icon"> 用户名
                </div>
                <div class="layui-card-body">
                    <li class="layui-col-xs4">
                        1
                    </li>
                    <li class="layui-col-xs4">
                        2
                    </li>
                    <li class="layui-col-xs4">
                        3
                    </li>
                    <li class="layui-col-xs4">
                        4
                    </li>
                </div>
            </div>
        </div>
        <div class="layui-col-md9 cheng-right">
            right
        </div>
        {{--left nav end--}}
    </div>
    {{--main end--}}

    </body>
</html>