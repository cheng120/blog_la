@extends('layout.index_layout')
@section('blog')
    {{--引入编辑器 start--}}
    <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.all.min.js')}}"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/lang/zh-cn/zh-cn.js')}}"></script>
    {{--引入编辑器 end--}}
    <!-- nav start -->

    <!-- nav end -->
    <hr>
    <!-- content srart -->
    <div class="am-g am-g-fixed blog-fixed blog-content">
        <div class="am-u-sm-12">
            <article class="am-article blog-article-p">
                <div class="am-article-hd">
                    <h1 class="am-article-title blog-text-center">写点东西</h1>
                    <p class="am-article-meta blog-text-center">
                        <span><a href="#">{{$userData['nickname']}}</a></span>-
                        <span><a href="#">{{date('Y-m-d')}}</a></span>
                    </p>
                </div>
                <form class="am-form am-g">
                    <fieldset>
                        <div class="am-form-group am-u-sm-8 ">
                            <span>标题:</span><input type="text" class="" placeholder="标题" id="my_title">
                        </div>
                        <br>
                        <div class="am-form-group am-u-sm-8 ">
                            <span>描述:</span>
                            <input type="text" class="" placeholder="描述" id="my_detail">
                        </div>
                        <div class="am-form-group am-form-file am-u-sm-8 " >
                            <span>封面:</span>
                            <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                <i class="am-icon-cloud-upload"></i> 选择要上传的文件</button>
                            <input id="doc-form-file" type="file" simple >
                        </div>
                        <div id="file-list" class="am-form-group am-u-sm-12" id="result">
                            <img src="" alt="">
                        </div>
                    </fieldset>
                </form>
                <div><script id="editor" type="text/plain" style="width:1024px;height:500px;"></script></div>

                <div class="am-article-bd">


                </div>
            </article>

            {{--<div class="am-g blog-article-widget blog-article-margin">--}}
                {{--<div class="am-u-lg-4 am-u-md-5 am-u-sm-7 am-u-sm-centered blog-text-center">--}}
                    {{--<span class="am-icon-tags"> &nbsp;</span><a href="#">标签</a> , <a href="#">TAG</a> , <a href="#">啦啦</a>--}}
                    {{--<hr>--}}
                    {{--<a href=""><span class="am-icon-qq am-icon-fw am-primary blog-icon"></span></a>--}}
                    {{--<a href=""><span class="am-icon-wechat am-icon-fw blog-icon"></span></a>--}}
                    {{--<a href=""><span class="am-icon-weibo am-icon-fw blog-icon"></span></a>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<hr>--}}
            <div class="am-g blog-author blog-article-margin">
                <div class="am-u-sm-3 am-u-md-3 am-u-lg-2">
                    <img src="assets/i/f15.jpg" alt="" class="blog-author-img am-circle">
                </div>
                <div class="am-u-sm-9 am-u-md-9 am-u-lg-10">
                    <h3><span>作者 &nbsp;: &nbsp;</span><span class="blog-color">{{$userData['nickname']}}</span></h3>
                    <p>简介什么的木有</p>
                </div>
            </div>
            <hr>
            <div class="am-g blog-author blog-article-margin">
                <button type="submit" class="am-btn am-btn-secondary am-round " style="width:100%" id="sub_art" data-url="{{route('art_api')}}">发表</button>
            </div>

            {{--<ul class="am-pagination blog-article-margin">--}}
                {{--<li class="am-pagination-prev"><a href="#" class="">&laquo; 一切的回顾</a></li>--}}
                {{--<li class="am-pagination-next"><a href="">不远的未来 &raquo;</a></li>--}}
            {{--</ul>--}}

            {{--<hr>--}}

            {{--<form class="am-form am-g">--}}
                {{--<h3 class="blog-comment">评论</h3>--}}
                {{--<fieldset>--}}
                    {{--<div class="am-form-group am-u-sm-4 blog-clear-left">--}}
                        {{--<input type="text" class="" placeholder="名字">--}}
                    {{--</div>--}}
                    {{--<div class="am-form-group am-u-sm-4">--}}
                        {{--<input type="email" class="" placeholder="邮箱">--}}
                    {{--</div>--}}

                    {{--<div class="am-form-group am-u-sm-4 blog-clear-right">--}}
                        {{--<input type="password" class="" placeholder="网站">--}}
                    {{--</div>--}}

                    {{--<div class="am-form-group">--}}
                        {{--<textarea class="" rows="5" placeholder="一字千金"></textarea>--}}
                    {{--</div>--}}

                    {{--<p><button type="submit" class="am-btn am-btn-default">发表评论</button></p>--}}
                {{--</fieldset>--}}
            {{--</form>--}}
            {{--<hr>--}}
        </div>
    </div>
@endsection
@section('script')
<script src="{{asset('js/write_art.js')}}?v=1"></script>
@endsection