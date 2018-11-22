@extends('layout.layui')
@section('log_header')
    <header>

        <div class="log-re">
            <button type="button" class="am-btn am-btn-default am-radius log-button jump-btn" id="reg_btn" data-jump-url="{{url("user/reg")}}" >注册</button>
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
                <input type="text" id="usr" class="am-radius" minlength="4" data-validation-message="用户名至少4位" placeholder="用户名" required/>
                <span class="am-input-group-label log-icon am-radius"><i class="am-icon-user am-icon-sm am-icon-fw"></i></span>
            </div>
            <br>
            <div class="am-input-group am-animation-slide-left log-animation-delay">
                <input type="password" class="am-form-field am-radius log-input" placeholder="密码" data-validation-message="至少6位密码" minlength="6" required id="pwd">
                <span class="am-input-group-label log-icon am-radius"><i class="am-icon-lock am-icon-sm am-icon-fw"></i></span>
            </div>
            <br>
            <div class="am-input-group am-animation-slide-left log-animation-delay">
                <input type="text" id="vercode" class="am-form-field am-radius log-input" placeholder="图形验证码" data-validation-message="请输入验证码" minlength="0" required id="pwd">
                <span class="am-input-group-label log-icon am-radius"><i class="am-icon-lock am-icon-sm am-icon-fw"></i></span>
            </div>
            <br>
            <div class="am-input-group am-animation-slide-left log-animation-delay" style="width: 251px" >
                <img src="{{ captcha_src('default') }}" class="am-radius my-vrcode"  onclick="this.src='/captcha/default?'+Math.random()" title="点击图片重新获取验证码">
            </div>
            <br>
        </form>
        <button type="button" class="am-btn am-btn-primary am-btn-block am-btn-lg am-radius am-animation-slide-bottom log-animation-delay" id="my_sub_login" data-sub-url="{{route("logUser")}}">登 录</button>
        <!--暂未开通
        <p class="am-animation-slide-bottom log-animation-delay"><a href="#">忘记密码?</a></p>
        <div class="am-btn-group  am-animation-slide-bottom log-animation-delay-b">
            <p>使用第三方登录</p>
            <a href="#" class="am-btn am-btn-secondary am-btn-sm"><i class="am-icon-github am-icon-sm"></i> Github</a>
            <a href="#" class="am-btn am-btn-success am-btn-sm"><i class="am-icon-google-plus-square am-icon-sm"></i> Google+</a>
            <a href="#" class="am-btn am-btn-primary am-btn-sm"><i class="am-icon-stack-overflow am-icon-sm"></i> stackOverflow</a>
        </div>
        -->
    </div>
</div>

@endsection