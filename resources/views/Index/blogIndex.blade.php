@extends('layout.index_layout')
@section('blog')
<body id="blog">
<link rel="stylesheet" href="{{asset('css/index.css')}}?v=1">

<hr>

<!-- banner start -->
<div class="am-g am-g-fixed blog-fixed am-u-sm-centered blog-article-margin">
    <div data-am-widget="slider" class="am-slider am-slider-b1" data-am-slider='{&quot;controlNav&quot;:false}' >
        <ul class="am-slides">
            @foreach($banner_list as $item)
            <li>
                <img src="{{$item->src}}">
            </li>
            @endforeach

        </ul>
    </div>
</div>
<!-- banner end -->

<!-- content srart -->
<div class="am-g am-g-fixed blog-fixed">
    <div class="am-u-md-8 am-u-sm-12">
        @foreach($artData as $index => $artInfo)
            @if($index == 0 )
                <article class="am-g blog-entry-article" >
                    <div class="am-u-lg-12 am-u-md-12 am-u-sm-12 am-u-sm-centered blog-entry-img">
                        <img src="{{$artInfo->pic}}" alt="" class="am-u-sm-12  am-img-responsive">
                    </div>
                    <div class="am-u-lg-12 am-u-md-12 am-u-sm-12 blog-entry-text blog-text-center">
                        <span> {{$artInfo->author_info['nickname']?$artInfo->author_info['nickname']:$artInfo->author_info['username']}} &nbsp;</span>
                        <span>{{date("Y-m-d H:i:s",$artInfo->create_time)}}</span>
                        <h1><a href="{{route('blog_art',['artid'=>$artInfo->id])}}">{{$artInfo->title}}</a></h1>
                        <p>{{htmlspecialchars_decode($artInfo->content)}}
                        </p>
                    </div>
                </article>
                @else
                <article class="am-g blog-entry-article" id="userInfo">
                    <div class="am-u-lg-12 am-u-md-12 am-u-sm-12 am-u-sm-centered blog-entry-img">
                        <img src="{{$artInfo->pic}}" alt="" class="am-u-sm-12">
                    </div>
                    <div class="am-u-lg-12 am-u-md-12 am-u-sm-12 blog-entry-text blog-text-center">
                        <span> {{$artInfo->author_info['nickname']?$artInfo->author_info['nickname']:$artInfo->author_info['username']}}</span>
                        <span>{{date("Y-m-d H:i:s",$artInfo->create_time)}}</span>
                        <h1><a href="{{route('blog_art',['artid'=>$artInfo->id])}}">{{$artInfo->title}}</a></h1>
                        <p>{{htmlspecialchars_decode($artInfo->content)}}
                        </p>
                    </div>
                </article>
            @endif

        @endforeach




        {{--<ul class="am-pagination">--}}
            {{--<li class="am-pagination-prev"><a href="">&laquo; Prev</a></li>--}}
            {{--<li class="am-pagination-next"><a href="">Next &raquo;</a></li>--}}
        {{--</ul>--}}
    </div>

    <div class="am-u-md-4 am-u-sm-12 blog-sidebar">
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-text-center blog-title"><span>关于</span></h2>
            <img src="assets/i/f14.jpg" alt="about me" class="blog-entry-img" >
            <p>菜鸡</p>
            <p>
                垃圾程序员。。
            </p><p>我不想成为一个玩家。。</p>
        </div>
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-text-center blog-title"><span>Contact ME</span></h2>
            <p>
                <a href=""><span class="am-icon-qq am-icon-fw am-primary blog-icon"></span></a>
                <a href=""><span class="am-icon-github am-icon-fw blog-icon"></span></a>
                <a href=""><span class="am-icon-weibo am-icon-fw blog-icon"></span></a>
                {{--<a href=""><span class="am-icon-reddit am-icon-fw blog-icon"></span></a>--}}
                <a href=""><span class="am-icon-weixin am-icon-fw blog-icon"></span></a>
            </p>
        </div>
        <div class="blog-clear-margin blog-sidebar-widget blog-bor am-g ">
            <h2 class="blog-title"><span>标签</span></h2>
            <div class="am-u-sm-12 blog-clear-padding">
                <a href="" class="blog-tag">日志</a>
                <a href="" class="blog-tag">日志</a>
                <a href="" class="blog-tag">日志</a>
                <a href="" class="blog-tag">日志</a>
                <a href="" class="blog-tag">日志</a>
                <a href="" class="blog-tag">日志</a>
            </div>
        </div>
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-title"><span>个人解说</span></h2>
            <ul class="am-list">
                <li><a href="#">懒</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- content end -->



@endsection
