@extends('layout.layui')

@section('log_header')
    <header>

        <div class="log-re">
            <button type="button" class="am-btn am-btn-default am-radius log-button jump-btn" id="reg_btn" data-jump-url="{{url("user/login")}}" >登录</button>
        </div>
    </header>
@endsection
@section('log_div')

<div class="am-g">
    <div class="am-u-lg-3 am-u-md-6 am-u-sm-8 am-u-sm-centered log-content">
        <h1 class="log-title am-animation-slide-top">cheng1991</h1>
        <br>
        <form class="am-form" id="log-form">
            <div class="am-input-group am-radius am-animation-slide-left">
                <input type="text" id="my-username" class="am-radius" data-validation-message="请输入登录名" placeholder="登录" required/>
                <span class="am-input-group-label log-icon am-radius"><i class="am-icon-user am-icon-sm am-icon-fw"></i></span>
            </div>
            <br>
            <div class="am-input-group am-radius am-animation-slide-left">
                <input type="text" id="my-nickname" class="am-radius" data-validation-message="请输入网站昵称" placeholder="昵称" required/>
                <span class="am-input-group-label log-icon am-radius"><i class="am-icon-gamepad am-icon-sm am-icon-fw"></i></span>
            </div>
            <br>
            <div class="am-input-group am-animation-slide-left log-animation-delay">
                <input type="password" id="my-password" class="am-form-field am-radius log-input" placeholder="密码" minlength="6" required>
                <span class="am-input-group-label log-icon am-radius"><i class="am-icon-lock am-icon-sm am-icon-fw"></i></span>
            </div>
            <br>
            <div class="am-input-group am-animation-slide-left log-animation-delay-a">
                <input type="password" id="repwd" data-equal-to="#my-password" class="am-form-field am-radius log-input" placeholder="确认密码" data-validation-message="请确认密码一致" required>
                <span class="am-input-group-label log-icon am-radius"><i class="am-icon-lock am-icon-sm am-icon-fw"></i></span>
            </div>
        </form>
        <br>
        <button type="button" class="am-btn am-btn-primary am-btn-block am-btn-lg am-radius am-animation-slide-bottom log-animation-delay-b" id="my_sub_reg" data-sub-url="{{route("regUser")}}">注 册</button>
        <br>
        <div class="am-btn-group am-animation-slide-bottom log-animation-delay-b">
            <p>支持第三方注册</p>
            <a href="#" class="am-btn am-btn-secondary am-btn-sm"><i class="am-icon-github am-icon-sm"></i> Github</a>
            <a href="#" class="am-btn am-btn-success am-btn-sm"><i class="am-icon-google-plus-square am-icon-sm"></i> Google+</a>
            <a href="#" class="am-btn am-btn-primary am-btn-sm"><i class="am-icon-stack-overflow am-icon-sm"></i> stackOverflow</a>
        </div>
    </div>
</div>
@endsection