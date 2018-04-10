<link rel="stylesheet" href="{{asset('css/login.css')}}" media="all">
<link rel="stylesheet" href="{{asset('css/admin.css')}}" media="all">
@include('layout.layui')
<html>
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
                        <form class="layui-form " action="login" id="login_form" lay-filter="login_form">
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
                                    <a href="forget.html" class="layadmin-user-jump-change layadmin-link" style="margin-top: 7px;">忘记密码？</a>
                                </div>
                                <div class="layui-form-item">
                                    <button class="layui-btn layui-btn-fluid" lay-submit="form_login" lay-filter="form_login">登 入</button>
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
                    <div class="layui-tab-item">
                        <form class="layui-form " action="reg" id="reg_form" lay-filter="reg_form" method="post">
                            <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
                                <div class="layui-form-item">
                                    <label class="layadmin-user-login-icon layui-icon layui-icon-cellphone" for="LAY-user-reg-email"></label>
                                    <input type="text" name="cellphone" id="LAY-user-reg-email" lay-verify="email" placeholder="邮箱" class="layui-input">
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
                                    <button class="layui-btn layui-btn-fluid" lay-submit="reg_form" lay-filter="reg_form">注 册</button>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>




        layui.use('form', function(){
            var form = layui.form;
            //监听提交


            //提交
            form.on('submit(form_login)', function(obj){
                alert(1)
                return false;
                //请求登入接口
                admin.req({
                    url: layui.setter.base + 'json/user/login.js' //实际使用请改成服务端真实接口
                    ,data: obj.field
                    ,done: function(res){

                        //请求成功后，写入 access_token
                        layui.data(setter.tableName, {
                            key: setter.request.tokenName
                            ,value: res.data.access_token
                        });

                        //登入成功的提示与跳转
                        layer.msg('登入成功', {
                            offset: '15px'
                            ,icon: 1
                            ,time: 1000
                        }, function(){
                            location.href = '../'; //后台主页
                        });
                    }
                });

            });


            //实际使用时记得删除该代码
            layer.msg('初始化,提示', {
                offset: '15px'
                ,icon: 1
            });


            form.on('submit(reg_form)', function(obj){
                var field = obj.field;

                //确认密码
                if(field.password !== field.repass){
                    return layer.msg('两次密码输入不一致');
                }
                dialog.tip(field.password,2000)
                //是否同意用户协议
                if(!field.agreement){
                    return layer.msg('你必须同意用户协议才能注册');
                }
                return false;
                //请求接口
                admin.req({
                    url: layui.setter.base + 'json/user/reg.js' //实际使用请改成服务端真实接口
                    ,data: field
                    ,done: function(res){
                        layer.msg('注册成功', {
                            offset: '15px'
                            ,icon: 1
                            ,time: 1000
                        }, function(){
                            location.hash = '/user/login'; //跳转到登入页
                        });
                    }
                });

                return false;
            });

        });



    </script>
</html>