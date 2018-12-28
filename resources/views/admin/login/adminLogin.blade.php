<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>登录</title>
    <link rel="stylesheet" href="{{asset('admin/plugins/layui/css/layui.css')}}" media="all" />
    <link rel="stylesheet" href="{{asset('admin/css/login.css')}}" />
</head>

<body class="beg-login-bg">
<div class="beg-login-box">
    <header>
        <h1>后台登录</h1>
    </header>
    <div class="beg-login-main">
        <form action="/manage/login" class="layui-form" method="post"><input name="__RequestVerificationToken" type="hidden" value="fkfh8D89BFqTdrE2iiSdG_L781RSRtdWOH411poVUWhxzA5MzI8es07g6KPYQh9Log-xf84pIR2RIAEkOokZL3Ee3UKmX0Jc8bW8jOdhqo81" />
            <div class="layui-form-item">
                <label class="beg-login-icon">
                    <i class="layui-icon">&#xe612;</i>
                </label>
                <input type="text" name="userName" lay-verify="userName" autocomplete="off" placeholder="这里输入登录名" class="layui-input">
            </div>
            <div class="layui-form-item">
                <label class="beg-login-icon">
                    <i class="layui-icon">&#xe642;</i>
                </label>
                <input type="password" name="password" lay-verify="password" autocomplete="off" placeholder="这里输入密码" class="layui-input">
            </div>
            <div class="layui-form-item">
                <div class="beg-pull-left beg-login-remember">
                    <label>记住帐号？</label>
                    <input type="checkbox" name="rememberMe" value="true" lay-skin="switch" checked title="记住帐号">
                </div>
                <div class="beg-pull-right">
                    <button class="layui-btn layui-btn-primary" lay-submit lay-filter="login">
                        <i class="layui-icon">&#xe650;</i> 登录
                    </button>
                </div>
                <div class="beg-clear"></div>
            </div>
            @csrf
        </form>
    </div>
    <footer>
        <p>个人无聊</p>
    </footer>
</div>
<script type="text/javascript" src="{{asset('admin/plugins/layui/layui.js')}}"></script>
<script>
    $(function(){
        $.ajaxSetup( {
            url: "" , // 默认URL
            aysnc: false , // 默认同步加载
            type: "POST" , // 默认使用POST方式
            headers: { // 默认添加请求头
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            } ,
            error: function(jqXHR, textStatus, errorMsg){ // 出错时默认的处理函数
                // jqXHR 是经过jQuery封装的XMLHttpRequest对象
                // textStatus 可能为： null、"timeout"、"error"、"abort"或"parsererror"
                // errorMsg 可能为： "Not Found"、"Internal Server Error"等

                // 提示形如：发送AJAX请求到"/index.html"时出错[404]：Not Found
                console.log( '发送AJAX请求到"' + this.url + '"时出错[' + jqXHR.status + ']：' + errorMsg );
            }
        } );
    })
    layui.use(['layer', 'form'], function() {
        var layer = layui.layer,
                $ = layui.jquery,
                form = layui.form();

        form.on('submit(login)',function(data){
            var url = "{{route("adminlog")}}";
            var field = data.field;
            field.csrf_token = $('meta[name="csrf-token"]').attr('content');
            $.post(url,field,function(){
                console.log(d.msg);
                dialog.tip(d.msg,3);
                if(d.code == 1000){
                    location.href = d.jump_url;
                }
                return false;
            },"json")
            return false;
        });
    });
</script>
</body>

</html>