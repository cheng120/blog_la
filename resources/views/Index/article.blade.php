@extends('layout.index_layout')
@section('blog')
    <!-- content srart -->
    <div class="am-g am-g-fixed blog-fixed blog-content">
        <div class="am-u-sm-12">
            <article class="am-article blog-article-p">
                <div class="am-article-hd">
                    <h1 class="am-article-title blog-text-center">{{$artData->title}}</h1>
                    <p class="am-article-meta blog-text-center">
                        <span><a href="#" class="blog-color">{{$artData->detail}} &nbsp;</a></span>-
                        <span><a href="#">{{$userData['nickname']}} &nbsp;</a></span>-
                        <span><a href="#">{{date('Y-m-d H:i:s',$artData->create_time)}}</a></span>
                    </p>
                </div>
                <div class="am-article-bd">
                    <img src="{{$artData->pic}}" alt="" class="blog-entry-img blog-article-margin">
                    {!! $artData->content !!}
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

            <hr>
            <div class="am-g blog-author blog-article-margin">
                <div class="am-u-sm-3 am-u-md-3 am-u-lg-2">
                    <img src="assets/i/f15.jpg" alt="" class="blog-author-img am-circle">
                </div>
                <div class="am-u-sm-9 am-u-md-9 am-u-lg-10">
                    <h3><span>作者 &nbsp;: &nbsp;</span><span class="blog-color">{{$userData['nickname']}}</span></h3>
                    <p>很懒</p>
                </div>
            </div>
            <hr>
            <div>
                <h3 class="blog-comment">评论列表</h3>
                <ul class="am-comments-list am-comments-list-flip">

                </ul>
            </div>
            {{--<ul class="am-pagination blog-article-margin">--}}
                {{--<li class="am-pagination-prev"><a href="#" class="">&laquo; 一切的回顾</a></li>--}}
                {{--<li class="am-pagination-next"><a href="">不远的未来 &raquo;</a></li>--}}
            {{--</ul>--}}

            <hr>

            <form class="am-form am-g">
                <h3 class="blog-comment">评论</h3>
                <fieldset>
                    <div class="am-form-group">
                        <textarea class="" rows="5" placeholder="一字千金" id="comment_content"></textarea>
                    </div>
                    <input type="hidden" id="artid" value="{{$art_info->id}}">
                    <p><button type="submit" class="am-btn am-btn-default" id="sub_comment">发表评论</button></p>
                </fieldset>
            </form>

            <hr>
        </div>
    </div>
<!-- content end -->

@endsection
@section('script')
    <script src="{{asset('js/comment.js')}}?v=111"></script>
@endsection