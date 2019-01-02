<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Paging</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" href="plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="css/global.css" media="all">
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
</head>

<body>
<div style="margin: 15px;">
    <blockquote class="layui-elem-quote">
        <h1>管理员列表</h1></blockquote>
    <fieldset class="layui-elem-field">
        <legend>数据</legend>
        <div class="layui-field-box">
            <div>
                {{--<form>--}}
                    {{--<input type="text" name="name" />--}}
                    {{--<button type="button" id="search">搜索</button>--}}
                {{--</form>--}}
                <table class="site-table table-hover">
                    <thead>
                    <tr>
                        <th><input type="checkbox" id="selected-all"></th>
                        <th>管理员ID</th>
                        <th>管理员用户名</th>
                        {{--<th>创建时间</th>--}}
                        <th>操作</th>
                    </tr>
                    </thead>
                    <!--内容容器-->

                    <tbody id="con">
                    @foreach($user_list as $item => $value)
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>{{$value->id}}</td>
                            <td>{{$value->logname}}</td>
                            <td>
                                {{--<a href="/detail-1" target="_blank" class="layui-btn layui-btn-normal layui-btn-mini">预览</a>--}}
                                {{--<a href="/manage/article_edit_1" class="layui-btn layui-btn-mini">编辑</a>--}}
                                <a href="javascript:;" data-id="1" data-opt="del" class="layui-btn layui-btn-danger layui-btn-mini">删除</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!--分页容器-->
                <div id="paged">

                </div>
            </div>
        </div>
    </fieldset>
</div>
</body>

</html>