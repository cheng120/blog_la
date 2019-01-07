<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Table</title>
    <link rel="stylesheet" href="plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="css/global.css" media="all">
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/table.css" />
</head>

<body>
<div class="admin-main">

    <blockquote class="layui-elem-quote">
<!--        <a href="javascript:;" class="layui-btn layui-btn-small" id="add">-->
<!--            <i class="layui-icon">&#xe608;</i> 添加信息-->
<!--        </a>-->
<!--        <a href="#" class="layui-btn layui-btn-small" id="import">-->
<!--            <i class="layui-icon">&#xe608;</i> 导入信息-->
<!--        </a>-->
<!--        <a href="#" class="layui-btn layui-btn-small">-->
<!--            <i class="fa fa-shopping-cart" aria-hidden="true"></i> 导出信息-->
<!--        </a>-->
<!--        <a href="#" class="layui-btn layui-btn-small" id="getSelected">-->
<!--            <i class="fa fa-shopping-cart" aria-hidden="true"></i> 获取全选信息-->
<!--        </a>-->
<!--        <a href="javascript:;" class="layui-btn layui-btn-small" id="search">-->
<!--            <i class="layui-icon">&#xe615;</i> 搜索-->
<!--        </a>-->
    </blockquote>
    <fieldset class="layui-elem-field">
        <legend>实际用户</legend>
        <div class="layui-field-box layui-form">
            <table class="layui-table admin-table">
                <thead>
                <tr>
                    <th style="width: 30px;"><input type="checkbox" lay-filter="allselector" lay-skin="primary"></th>
                    <th>用户id</th>
                    <th>用户登录名称</th>
                    <th>用户昵称</th>
                    <th>用户注册时间</th>
                    <th>用户最后登录时间</th>
                    <th>用户头像</th>
                    <th>用户签名</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody id="content">
                </tbody>
            </table>
        </div>
    </fieldset>
    <div class="admin-table-page">
        <div id="paged" class="page">
        </div>
    </div>
</div>
<!--模板-->
<script type="text/html" id="tpl">
    {{# layui.each(d.list, function(index, item){ }}
    <tr>
        <td><input type="checkbox" lay-skin="primary"></td>
        <td>{{ item.id }}</td>
        <td>{{ item.name }}</td>
        <td>{{ item.nickname }}</td>
        <td>{{ item.createtime }}</td>
        <td>{{ item.lastlogtime }}</td>
        <td><img src="{{ item.icon }}" alt="头像" style="display: inline-block; width: 200px; height: 200px;"></td>
        <td>{{ item.description }}</td>
        <td>
<!--            <a href="/detail-1" target="_blank" class="layui-btn layui-btn-normal layui-btn-mini">预览</a>-->
<!--            <a href="javascript:;" data-name="{{ item.id }}" data-opt="edit" class="layui-btn layui-btn-mini">编辑</a>-->
            <a href="javascript:;" data-id="{{ item.id }}" data-opt="del" class="layui-btn layui-btn-danger layui-btn-mini" onclick="layer.tips('不让封',this)" >封禁</a>
        </td>
    </tr>
    {{# }); }}
</script>
<script type="text/javascript" src="plugins/layui/layui.js"></script>
<script>
    layui.config({
        base: 'js/'
    });

    layui.use(['paging', 'form'], function() {
        var $ = layui.jquery,
            paging = layui.paging(),
            layerTips = parent.layer === undefined ? layui.layer : parent.layer, //获取父窗口的layer对象
            layer = layui.layer, //获取当前窗口的layer对象
            form = layui.form();
        var data_url = '<?php echo url('admin/getUsersList') ?>'
        paging.init({
            openWait: true,
            url: data_url, //地址
            elem: '#content', //内容容器
            params: { //发送到服务端的参数
            },
            even: true,
            type: 'POST',
            tempElem: '#tpl', //模块容器
            pageConfig: { //分页参数配置
                elem: '#paged', //分页容器
                pageSize: 1 //分页大小
            },
            success: function() { //渲染成功的回调
                //alert('渲染成功');
            },
            fail: function(msg) { //获取数据失败的回调
                //alert('获取数据失败')
            },
            complate: function() { //完成的回调
                //alert('处理完成');
                //重新渲染复选框
                form.render('checkbox');
                form.on('checkbox(allselector)', function(data) {
                    var elem = data.elem;

                    $('#content').children('tr').each(function() {
                        var $that = $(this);
                        //全选或反选
                        $that.children('td').eq(0).children('input[type=checkbox]')[0].checked = elem.checked;
                        form.render('checkbox');
                    });
                });

                //绑定所有编辑按钮事件
                $('#content').children('tr').each(function() {
                    var $that = $(this);
                    $that.children('td:last-child').children('a[data-opt=edit]').on('click', function() {
                        layer.msg($(this).data('name'));
                    });

                });

            },
        });
        //获取所有选择的列
        $('#getSelected').on('click', function() {
            var names = '';
            $('#content').children('tr').each(function() {
                var $that = $(this);
                var $cbx = $that.children('td').eq(0).children('input[type=checkbox]')[0].checked;
                if($cbx) {
                    var n = $that.children('td:last-child').children('a[data-opt=edit]').data('name');
                    names += n + ',';
                }
            });
            layer.msg('你选择的名称有：' + names);
        });

        $('#search').on('click', function() {
            parent.layer.alert('你点击了搜索按钮')
        });

        var addBoxIndex = -1;
        var addView = '<?php echo url('admin/form_layer') ?>'
        $('#add').on('click', function() {
            if(addBoxIndex !== -1)
                return;
            //本表单通过ajax加载 --以模板的形式，当然你也可以直接写在页面上读取
            $.get(addView, {view_name:'add_admin_user'}, function(form) {
                addBoxIndex = layer.open({
                    type: 1,
                    title: '添加表单',
                    content: form,
                    btn: ['保存', '取消'],
                    shade: false,
                    skin: 'layui-layer-molv',
                    offset: ['100px', '30%'],
                    area: ['600px', '400px'],
                    zIndex: 100,
                    maxmin: true,
                    yes: function(index) {
                        //触发表单的提交事件
                        $('form.layui-form').find('button[lay-filter=edit]').click();
                    },
                    full: function(elem) {
                        var win = window.top === window.self ? window : parent.window;
                        $(win).on('resize', function() {
                            var $this = $(this);
                            elem.width($this.width()).height($this.height()).css({
                                top: 0,
                                left: 0
                            });
                            elem.children('div.layui-layer-content').height($this.height() - 95);
                        });
                    },
                    success: function(layero, index) {
                        console.log(layerTips);
                        //弹出窗口成功后渲染表单
                        var form = layui.form();
                        form.render();
                        form.on('submit(edit)', function(data) {
                            if(data.field.password != data.field.re_password){
                                layerTips.msg('两次密码不一致')
                                return false;
                            }
                            console.log(data.field) //当前容器的全部表单字段，名值对形式：{name: value}
                            var add_admin_user_url = "<?php echo url("admin/addAdminUser"); ?>";
                            $.post(add_admin_user_url,data.field,
                                function(d){
                                    if(d.code == 10000){
                                        //调用父窗口的layer对象

                                        layerTips.open({
                                            title: '提示',
                                            skin: 'layui-layer-lan',
                                            type: 1,
                                            anim: 4,
                                            content: d.msg,
                                            btn: ['关闭并刷新'],
                                            yes: function(index, layero) {
                                                location.reload(); //刷新
                                            }
                                        });
                                    }else{
                                        layerTips.msg(d.msg)
                                    }
                                }   
                            ,'json')

                            //这里可以写ajax方法提交表单
                            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
                        });
                        //console.log(layero, index);
                    },
                    end: function() {
                        addBoxIndex = -1;
                    }
                });
            });
        });

        $('#import').on('click', function() {
            var that = this;
            var index = layer.tips('只想提示地精准些', that, { tips: [1, 'white'] });
            $('#layui-layer' + index).children('div.layui-layer-content').css('color', '#000000');
        });
    });
</script>
</body>

</html>