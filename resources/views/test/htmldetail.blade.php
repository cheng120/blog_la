
<style>
    .grid-demo{padding: 10px;line-height: 50px;text-align: center;background-color: #79C48C;color: #fff;}
    .grid-demo-bg1{background-color: #63BA79;}
    .grid-demo-bg2{background-color: #49A761;}
    .grid-demo-bg3{background-color: #38814A;}

</style>
@include('layout.layui')
<div class="layadmin-user-login-main">
    <div class="layui-container">
        <label class="layui-form-label layui-col-md-offset5">收集网址</label>

        <div class="layui-row">
            <div class="layui-col-xs3">
                <div class="grid-demo grid-demo-bg1">游戏名</div>
            </div>
            <div class="layui-col-xs9">
                <div class="grid-demo">{{$title}}</div>
            </div>
        </div>
        <div class="layui-row">
            <div class="layui-col-xs3">
                <div class="grid-demo grid-demo-bg1">开发商</div>
            </div>
            <div class="layui-col-xs9">
                <div class="grid-demo">{{$username}}</div>
            </div>
        </div>
        <div class="layui-row">
            <div class="layui-col-xs3">
                <div class="grid-demo grid-demo-bg1">大小</div>
            </div>
            <div class="layui-col-xs9">
                <div class="grid-demo">{{$size}}</div>
            </div>
        </div>
    </div>
</div>
