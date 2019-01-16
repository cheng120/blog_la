@extends('admin.layout_admin.admin_index')


@section('content')
    <!-- 内容区域 -->
    <!-- 内容区域 -->
    <div class="tpl-content-wrapper">

        {{--<div class="container-fluid am-cf">--}}
            {{--<div class="row">--}}
                {{--<div class="am-u-sm-12 am-u-md-12 am-u-lg-9">--}}
                    {{--<div class="page-header-heading"><span class="am-icon-home page-header-heading-icon"></span> 表单 <small>Amaze UI</small></div>--}}
                    {{--<p class="page-header-description">Amaze UI 有许多不同的表格可用。</p>--}}
                {{--</div>--}}
                {{--<div class="am-u-lg-3 tpl-index-settings-button">--}}
                    {{--<button type="button" class="page-header-button"><span class="am-icon-paint-brush"></span> 设置</button>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}

        <div class="row-content am-cf">
            <div class="row">

                <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                    <div class="widget am-cf">
                        <div class="widget-head am-cf">
                            <div class="widget-title am-fl">添加管理员</div>
                            <div class="widget-function am-fr">
                                <a href="javascript:;" class="am-icon-cog"></a>
                            </div>
                        </div>
                        <div class="widget-body am-fr">

                            <form class="am-form tpl-form-border-form">
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">登录名 <span class="tpl-form-line-small-title">最少4位</span></label>
                                    <div class="am-u-sm-12">
                                        <input type="text" class="tpl-form-input am-margin-top-xs" id="user-name" placeholder="管理员登录名">
                                        <small>管理员登录名</small>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">登录密码 <span class="tpl-form-line-small-title">最少6位</span></label>
                                    <div class="am-u-sm-12">
                                        <input type="password" class="tpl-form-input am-margin-top-xs" id="user-password" placeholder="登录密码">
                                        <small>登录密码</small>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">确认密码 <span class="tpl-form-line-small-title">最少6位</span></label>
                                    <div class="am-u-sm-12">
                                        <input type="password" class="tpl-form-input am-margin-top-xs" id="user-re-password" placeholder="确认密码">
                                        <small>确认密码</small>
                                    </div>
                                </div>


                                <div class="am-form-group">
                                    <div class="am-u-sm-12 am-u-sm-push-12">
                                        <button type="button" id="sub-form" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <script>
        $(function () {
            $("#sub-form").on('click',function(){
                var username = $("#user-name").val();
                var password = $('#user-password').val();
                var repwd = $('#user-re-password').val();
                var url = '{{url('admin/addAdminUser')}}';
                if(username.length < 4){
                    my_notice("登录名称长度要超过4个");
                    return false;
                }
                if(password.length < 6){
                    my_notice("登录名称长度要超过6个");
                    return false;
                }
                if(password != repwd){
                    my_notice("两次密码不一致");
                    return false;
                }
                $.post(
                    url,
                    {logname:username,password:password},
                    function (d) {
                        if(d.code == 10000){
                            my_notice(d.msg,1)
                            location.href = '{{url()->previous()}}'
                        }else{
                            my_notice(d.msg,1)
                        }
                    },
                    'json'
                )
                return false;
            })
        })
    </script>
@endsection