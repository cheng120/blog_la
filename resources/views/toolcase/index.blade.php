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
        @include("layout.tool_sidebar")

        <div class="am-u-md-9 am-u-sm-12 blog-sidebar">
            <div class="blog-sidebar-widget blog-bor">
                <h1>工具箱</h1>
            </div>
            <div>
                <span>常用工具</span>
            </div>
        </div>
    </div>
    <!-- content end -->
@endsection
@section('script')
    <script src="{{asset('js/toolcase.js')}}?v={{time()}}"></script>

@endsection