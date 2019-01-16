

<!-- 侧边导航栏 -->
<div class="left-sidebar">
    <!-- 用户信息 -->
    <div class="tpl-sidebar-user-panel">
        <div class="tpl-user-panel-slide-toggleable">
            <div class="tpl-user-panel-profile-picture">
                <img src="{{urldecode(config('app.default_avatar'))}}" alt="">
            </div>
            <span class="user-panel-logged-in-text">
              <i class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i>
                {{$admin_userInfo->logname}}
          </span>
            <a href="javascript:;" class="tpl-user-panel-action-link"> <span class="am-icon-pencil"></span> 账号设置</a>
        </div>
    </div>
        @php
            $url = getCurrentAction();
        @endphp

    <!-- 菜单 -->
    <ul class="sidebar-nav">
        <li class="sidebar-nav-heading">菜单 <span class="sidebar-nav-heading-info"> 后台</span></li>

        @foreach( config('admin_conf.left_nav') as $item)
            @if(isset($item['children']))
                <li class="sidebar-nav-link">
                    <a href="javascript:;" class="sidebar-nav-sub-title {{strtolower($url['controller'])==strtolower($item['control_name'])?'active':""}}">
                        <i class="{{$item['icon']}}  sidebar-nav-link-logo"></i> {{$item['title']}}
                        <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                    </a>
                    <ul class="sidebar-nav sidebar-nav-sub" style="{{strtolower($url['controller'])==strtolower($item['control_name'])?"display: block":""}}">
                        @foreach($item['children'] as $value )
                        <li class="sidebar-nav-link ">
                            <a href="{{$value['href']}}" class="{{strtolower($url['method'])==strtolower($value['method_name'])?'sub-active':""}}">
                                <span class=" {{$value['icon']}} sidebar-nav-link-logo {{$item['icon']}} "></span> {{$value['title']}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @else
                <li class="sidebar-nav-link">
                    <a href="{{$item['href']}}">
                        <i class="am-icon-table {{$item['icon']}} sidebar-nav-link-logo"></i> {{$item['title']}}
                    </a>
                </li>
            @endif
        @endforeach

    </ul>
</div>