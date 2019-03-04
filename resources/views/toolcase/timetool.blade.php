@extends('layout.index_layout')
@section('header')
    <link rel="stylesheet" href="{{asset('assets/css/amazeui.cropper.css')}}?v=1">
    <link rel="stylesheet" href="{{asset('assets/css/custom_up_img.css')}}?v=1">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.4.6.0.css')}}?v=1">
@endsection
@section('blog')
    <link rel="stylesheet" href="{{asset('css/user_center.css')}}?v=1">
    <!-- content srart -->
    <div class="am-g am-g-fixed blog-fixed blog-content " >
        @include("layout.user_sidebar")

        <div class="am-u-md-9 am-u-sm-12 blog-sidebar">
            <div class="blog-sidebar-widget blog-bor">
                <h2 class="blog-text-center blog-title"><span>时间转换器（北京时间）</span></h2>
                <form class="am-form am-form-horizontal">
                    <div class="am-form-group">
                        <label for="nickname" class="am-u-sm-2 am-form-label">当前时间：</label>
                        <div class="am-u-sm-10">
                            <input type="text" id="clock" value="{{date("Y-m-d H:i:s")}}" readonly="readonly">-<input type="text" id="clock_timestamp" value="{{time()}}" readonly="readonly">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="description" class="am-u-sm-2 am-form-label">时间转换</label>
                        <div class="am-u-sm-10">
                            <input type="text" id="ipt_timestamp" >
                            <br>
                            <input type="text" id="ipt_answer">
                        </div>
                    </div>

                    {{--<div class="am-form-group">--}}
                    {{--<div class="am-u-sm-offset-2 am-u-sm-10">--}}
                    {{--<div class="checkbox">--}}
                    {{--<label>--}}
                    {{--<input type="radio" name="sex" value="1" > 男--}}
                    {{--<input type="radio" name="sex" value="2"> 女--}}
                    {{--</label>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    <div class="am-form-group">
                        <div class="">
                            <button type="submit" class="am-btn-xl am-btn am-btn-success am-round" id="save_user" data-sub-url="{{url('blog/up_user')}}">保存修改</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- content end -->
@endsection
@section('script')
    <script src="{{asset('js/toolcase.js')}}?v={{time()}}"></script>

@endsection