<div style="margin: 15px;">
    <form class="layui-form">
        <div class="layui-form-item">
            <label class="layui-form-label">登录名</label>
            <div class="layui-input-block">
                <input type="text" name="logname" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">登录密码</label>
            <div class="layui-input-inline">
                <input type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
            </div>
            <!--<div class="layui-form-mid layui-word-aux">辅助文字</div>-->
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">确认密码</label>
            <div class="layui-input-inline">
                <input type="password" name="re_password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
            </div>
            <!--<div class="layui-form-mid layui-word-aux">辅助文字</div>-->
        </div>
        <!--<div class="layui-form-item">-->
        <!--<label class="layui-form-label">选择框</label>-->
        <!--<div class="layui-input-block">-->
        <!--<select name="city" lay-verify="required">-->
        <!--<option value=""></option>-->
        <!--<option value="0">北京</option>-->
        <!--<option value="1">上海</option>-->
        <!--<option value="2">广州</option>-->
        <!--<option value="3">深圳</option>-->
        <!--<option value="4">杭州</option>-->
        <!--</select>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="layui-form-item">-->
        <!--<label class="layui-form-label">复选框</label>-->
        <!--<div class="layui-input-block">-->
        <!--<input type="checkbox" name="like[write]" title="写作">-->
        <!--<input type="checkbox" name="like[read]" title="阅读" checked>-->
        <!--<input type="checkbox" name="like[dai]" title="发呆">-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="layui-form-item">-->
        <!--<label class="layui-form-label">开关</label>-->
        <!--<div class="layui-input-block">-->
        <!--<input type="checkbox" name="switch" lay-skin="switch">-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="layui-form-item">-->
        <!--<label class="layui-form-label">单选框</label>-->
        <!--<div class="layui-input-block">-->
        <!--<input type="radio" name="sex" value="男" title="男">-->
        <!--<input type="radio" name="sex" value="女" title="女" checked>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="layui-form-item layui-form-text">-->
        <!--<label class="layui-form-label">文本域</label>-->
        <!--<div class="layui-input-block">-->
        <!--<textarea name="desc" placeholder="请输入内容" class="layui-textarea"></textarea>-->
        <!--</div>-->
        <!--</div>-->
        <button lay-filter="edit" lay-submit style="display: none;"></button>
    </form>
</div>