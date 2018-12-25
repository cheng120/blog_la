<div class="am-u-md-3 am-u-sm-4 blog-sidebar-widget" >
    <div class="am-btn-group-stacked am-u-md-12">
        <button  type="button" class="my-button-jump am-btn am-btn-secondary left-sidebar am-nav @if(Request::getRequestUri() == '/blog/user_center') am-active @endif" data-url="{{url('blog/user_center')}}" >个人信息</button>
        <hr>
        <button type="button" class="my-button-jump am-btn am-btn-secondary left-sidebar am-nav @if(Request::getRequestUri() == '/blog/re_password') am-active @endif" data-url="{{url('blog/re_password')}}">密码变更</button>
        <hr>
        <button type="button" class="my-button-jump am-btn am-btn-secondary left-sidebar am-nav">待定</button>
        <hr>
        <button type="button" class="my-button-jump am-btn am-btn-secondary left-sidebar am-nav">待定</button>
        <hr>
        <button type="button" class="my-button-jump am-btn am-btn-secondary left-sidebar am-nav">待定</button>
        <hr>
        <button type="button" class="my-button-jump am-btn am-btn-secondary left-sidebar am-nav">待定</button>
    </div>

    <hr>
</div>