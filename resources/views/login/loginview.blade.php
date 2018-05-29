<link rel="stylesheet" href="{{asset('css/login.css')}}" media="all">
<link rel="stylesheet" href="{{asset('css/admin.css')}}" media="all">
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('layout.layui')
<html>
<meta charset="utf-8">
    {{--导航start--}}
    {{--导航end--}}
    <div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" style="display: none;">
        <div class="layadmin-user-login-main">
            <div class="layui-tab">
                <div class="layadmin-user-login-box layadmin-user-login-header">
                    <ul class="layui-tab-title">
                        <li class="layui-this">登陆</li>
                        <li>注册</li>
                    </ul>
                </div>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <form class="layui-form " id="login_form" >
                            <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
                                <div class="layui-form-item">
                                    <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-username"></label>
                                    <input type="text" name="username" id="LAY-user-login-username" lay-verify="required" placeholder="用户名" class="layui-input">
                                </div>
                                <div class="layui-form-item">
                                    <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
                                    <input type="password" name="password" id="LAY-user-login-password" lay-verify="required" placeholder="密码" class="layui-input">
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-row">
                                        <div class="layui-col-xs7">
                                            <label class="layadmin-user-login-icon layui-icon layui-icon-vercode" for="LAY-user-login-vercode"></label>
                                            <input type="text" name="vercode" id="LAY-user-login-vercode" lay-verify="required" placeholder="图形验证码" class="layui-input">
                                        </div>
                                        <div class="layui-col-xs5">
                                            <div style="margin-left: 10px;">
                                                <img src="{{ captcha_src('default') }}" class="layadmin-user-login-codeimg" id="LAY-user-get-vercode" onclick="this.src='/captcha/default?'+Math.random()" title="点击图片重新获取验证码">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="layui-form-item" style="margin-bottom: 20px;">
                                    <input type="checkbox" name="remember" lay-skin="primary" title="记住密码"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span>记住密码</span><i class="layui-icon"></i></div>
                                    <a href="javascript:;" onclick="layer.msg('暂未开放')" class="layadmin-user-jump-change layadmin-link" style="margin-top: 7px;">忘记密码？</a>
                                </div>
                                <div class="layui-form-item">
                                    <button class="layui-btn layui-btn-fluid" lay-submit  lay-filter="form_login">登 入</button>
                                </div>
                                <!--<div class="layui-trans layui-form-item layadmin-user-login-other">
                                    <label>社交账号登入</label>
                                    <a href="javascript:;"><i class="layui-icon layui-icon-login-qq"></i></a>
                                    <a href="javascript:;"><i class="layui-icon layui-icon-login-wechat"></i></a>
                                    <a href="javascript:;"><i class="layui-icon layui-icon-login-weibo"></i></a>

                                    <a href="reg.html" class="layadmin-user-jump-change layadmin-link">注册帐号</a>
                                </div>
                                -->
                            </div>
                        </form>
                    </div>

                    <!--注册start-->
                    <div class="layui-tab-item">
                        <div class="layui-form " id="reg_form"  >
                            <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
                                <div class="layui-form-item">
                                    <label class="layadmin-user-login-icon layui-icon layui-icon-cellphone" for="LAY-user-reg-email"></label>
                                    <input type="text" name="username" id="LAY-user-reg-email" lay-verify="username" placeholder="邮箱" class="layui-input">
                                </div>
                                {{--<div class="layui-form-item">--}}
                                    {{--<div class="layui-row">--}}
                                        {{--<div class="layui-col-xs7">--}}
                                            {{--<label class="layadmin-user-login-icon layui-icon layui-icon-vercode" for="LAY-user-reg-vercode"></label>--}}
                                            {{--<input type="text" name="vercode" id="LAY-user-reg-vercode" lay-verify="required" placeholder="验证码" class="layui-input">--}}
                                        {{--</div>--}}
                                        {{--<div class="layui-col-xs5">--}}
                                            {{--<div style="margin-left: 10px;">--}}
                                                {{--<button type="button" class="layui-btn layui-btn-primary layui-btn-fluid" id="LAY-user-getsmscode">获取验证码</button>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="layui-form-item">
                                    <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-reg-password"></label>
                                    <input type="password" name="password" id="LAY-user-reg-password" lay-verify="pass" placeholder="密码" class="layui-input">
                                </div>
                                <div class="layui-form-item">
                                    <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-reg-repass"></label>
                                    <input type="password" name="repass" id="LAY-user-reg-repass" lay-verify="required" placeholder="确认密码" class="layui-input">
                                </div>
                                <div class="layui-form-item">
                                    <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-nickname"></label>
                                    <input type="text" name="nickname" id="LAY-user-login-nickname" lay-verify="nickname" placeholder="昵称" class="layui-input">
                                </div>
                                <div class="layui-form-item">
                                    <input type="checkbox" name="agreement" lay-skin="primary" title="同意用户协议" checked=""><div class="layui-unselect layui-form-checkbox layui-form-checked" lay-skin="primary"><span>同意用户协议</span><i class="layui-icon"></i></div>
                                </div>
                                <div class="layui-form-item">
                                    <button class="layui-btn layui-btn-fluid" lay-submit   lay-filter="go">注 册</button>
                                </div>
                                {{--<div class="layui-trans layui-form-item layadmin-user-login-other">--}}
                                    {{--<label>社交账号注册</label>--}}
                                    {{--<a href="javascript:;"><i class="layui-icon layui-icon-login-qq"></i></a>--}}
                                    {{--<a href="javascript:;"><i class="layui-icon layui-icon-login-wechat"></i></a>--}}
                                    {{--<a href="javascript:;"><i class="layui-icon layui-icon-login-weibo"></i></a>--}}

                                    {{--<a href="login.html" class="layadmin-user-jump-change layadmin-link layui-hide-xs">用已有帐号登入</a>--}}
                                    {{--<a href="login.html" class="layadmin-user-jump-change layadmin-link layui-hide-sm layui-show-xs-inline-block">登入</a>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});


        layui.use('form', function(){
            var form = layui.form;
            //监听提交

            var log_url = "{{route('logUser')}}";
//            layui.use("layer",function(){
                //dialog.tip("test",2);
//            })

            //提交
            form.on('submit(form_login)', function(obj){

                //请求接口
                var field = obj.field;
                $.post(log_url,field,function(d){
                    console.log(d.msg);
                    dialog.tip(d.msg,3);
                    if(d.code == 1000){
                        location.href = "/";
                    }
                },'json')
                return false;
            });




        });

        layui.use("form",function(){
            var form = layui.form;
            //监听提交

            var reg_url = "{{route('saveUser')}}";

            form.on('submit(go)', function(obj){
                var field = obj.field;

                if(!field.username){
                    layer.msg('用户名不能为空');
                    return false;
                }

                //确认密码
                if(field.password !== field.repass){
                    layer.msg('两次密码输入不一致');
                    return false;
                }

                if(field.password.length < 6 ){
                    layer.msg('密码不能少于6位');
                    return false;
                }
                if(!field.nickname){
                    layer.msg('昵称不能为空');
                    return false;
                }

                //是否同意用户协议
                if(!field.agreement){
                    layer.msg('你必须同意用户协议才能注册');
                    return false;
                }
                //请求接口
                $.post(reg_url,field,function(d){
                    console.log(d.msg);
                    dialog.tip(d.msg,3);
                    if(d.code == 1000){
                        location.href = "login";
                    }
                },'json')
//                admin.req({
//                    url: reg_url //实际使用请改成服务端真实接口
//                    ,data: field
//                    ,done: function(res){
//                        layer.msg('注册成功', {
//                            offset: '15px'
//                            ,icon: 1
//                            ,time: 1000
//                        }, function(){
//                            location.hash = '/user/login'; //跳转到登入页
//                        });
//                    }
//                });

                return false;
            });

        })

    </script>
</html>