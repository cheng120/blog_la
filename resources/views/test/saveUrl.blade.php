@include('layout.layui')
<html>
{{--导航start--}}

{{--导航end--}}
<div class="layui-row layui-col-space10">
    <div class="layui-col-md4 left-box"></div>
    <div class="layui-tab layui-main layui-col-md4">

        <div class="layui-tab-item layui-show">
            <label class="layui-form-label layui-col-md-offset6">收集网址</label>

            <form method="post" class="layui-form " action="{{route('saveUri')}}" id="login_form" lay-filter="login_form">
                <div class="layui-form-item">
                    <label class="layui-form-label">url</label>
                    <div class="layui-input-block">
                        <input type="text" name="url" required  lay-verify="required" placeholder="请输入链接" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="formReg">立即提交</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="layui-col-md4 right-box"></div>
<script>
    layui.use('form', function(){
        var form = layui.form;
        //监听提交
        form.on('submit(formLogin)', function(data){
            layer.msg("提交");

            layer.msg(JSON.stringify(data.field));
            return false;
        });

    });
</script>
</html>