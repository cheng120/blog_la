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
        <div class="am-u-md-3 am-u-sm-4 blog-sidebar-widget" >
            <div class="am-btn-group-stacked am-u-md-12">
                <button type="button" class="am-btn am-btn-secondary left-sidebar am-nav" >个人信息</button>
                <hr>
                <button type="button" class="am-btn am-btn-secondary left-sidebar am-nav">密码变更</button>
                <hr>
                <button type="button" class="am-btn am-btn-secondary left-sidebar am-nav">待定</button>
                <hr>
                <button type="button" class="am-btn am-btn-secondary left-sidebar am-nav">待定</button>
                <hr>
                <button type="button" class="am-btn am-btn-secondary left-sidebar am-nav">待定</button>
                <hr>
                <button type="button" class="am-btn am-btn-secondary left-sidebar am-nav">待定</button>
            </div>

            <hr>
        </div>

        <div class="am-u-md-9 am-u-sm-12 blog-sidebar">
            <div class="blog-sidebar-widget blog-bor">
                <h2 class="blog-text-center blog-title"><span>个人信息</span></h2>
                <span>头像：</span>
                <div class="up-img-cover"  id="up-img-touch" >
                    <img class="am-circle" style="width: 100px;height: 100px"  alt="点击图片上传" src="{{urldecode(config('app.default_avatar'))}}" data-am-popover="{content: '点击上传', trigger: 'hover focus'}" >
                </div>
                <p>妹纸</p>
                <p>
                    我是妹子UI，中国首个开源 HTML5 跨屏前端框架
                </p><p>我不想成为一个庸俗的人。十年百年后，当我们死去，质疑我们的人同样死去，后人看到的是裹足不前、原地打转的你，还是一直奔跑、走到远方的我？</p>
            </div>
        </div>
    </div>
    <!-- content end -->
@endsection
@section('script')
    <script src="{{asset('assets/js/cropper.min.js')}}?v=1"></script>
    <script src="{{asset('assets/js/custom_up_img.js')}}?v={{time()}}"></script>
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