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
                <h2 class="blog-text-center blog-title"><span>个人信息</span></h2>
                <span>头像：</span>
                <div class="up-img-cover"  id="up-img-touch" style="width: 110px;margin: auto">
                    <img class="am-circle" style="width: 100px;height: 100px"  alt="点击图片上传" src="{{$user_data->icon?$user_data->icon:urldecode(config('app.default_avatar'))}}" data-am-popover="{content: '点击上传', trigger: 'hover focus'}" >
                </div>
                <br>
                <form class="am-form am-form-horizontal">
                    <div class="am-form-group">
                        <label for="nickname" class="am-u-sm-2 am-form-label">用户昵称</label>
                        <div class="am-u-sm-10">
                            <input type="text" id="nickname" value="{{$user_data->nickname}}" placeholder="输入你的电子邮件">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="description" class="am-u-sm-2 am-form-label">个人简介</label>
                        <div class="am-u-sm-10">
                            <textarea class="" rows="5" id="description">{{$user_data->description?$user_data->description:"这个人很懒"}}</textarea>
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
            {{--用户信息--}}
            <input type="hidden" id="user_info" value="{{json_encode($user_data)}}">

        </div>
    </div>
    <!-- content end -->
@endsection
@section('script')
    <script src="{{asset('js/user_center.js')}}?v={{time()}}"></script>
    <script src="{{asset('assets/js/cropper.min.js')}}?v=1"></script>
    <script src="{{asset('assets/js/custom_up_img.js')}}?"></script>
    <!--图片上传框-->
    <div class="am-modal am-modal-no-btn up-frame-bj " tabindex="-1" id="doc-modal-1">
        <div class="am-modal-dialog up-frame-parent up-frame-radius">
            <div class="am-modal-hd up-frame-header">
                <label>修改头像</label>
                <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
            </div>
            <div class="am-modal-bd  up-frame-body">
                <div class="am-g am-fl">
                    <div class="am-form-group am-form-file">
                        <div class="am-fl">
                            <button type="button" class="am-btn am-btn-default am-btn-sm">
                                <i class="am-icon-cloud-upload"></i> 选择要上传的文件</button>
                        </div>
                        <input type="file" id="inputImage">
                    </div>
                </div>
                <div class="am-g am-fl" >
                    <div class="up-pre-before up-frame-radius">
                        <img alt="" src="" id="image" >
                    </div>
                    <div class="up-pre-after up-frame-radius">
                    </div>
                </div>
                <div class="am-g am-fl">
                    <div class="up-control-btns">
                        <span class="am-icon-rotate-left"  onclick="rotateimgleft()"></span>
                        <span class="am-icon-rotate-right" onclick="rotateimgright()"></span>
                        <span class="am-icon-check" id="up-btn-ok" url="{{url('blog/up_avatar')}}"></span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--加载框-->
    <div class="am-modal am-modal-loading am-modal-no-btn" tabindex="-1" id="my-modal-loading">
        <div class="am-modal-dialog">
            <div class="am-modal-hd">正在上传...</div>
            <div class="am-modal-bd">
                <span class="am-icon-spinner am-icon-spin"></span>
            </div>
        </div>
    </div>
@endsection