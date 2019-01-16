@extends('admin.layout_admin.admin_index')


@section('content')
    <!-- 内容区域 -->
    <div class="tpl-content-wrapper">
        <div class="row-content am-cf">
            <div class="row">
                <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                    <div class="widget am-cf">
                        <div class="widget-head am-cf">
                            <div class="widget-title  am-cf">管理员列表</div>


                        </div>
                        <div class="widget-body  am-fr">

                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                                <div class="am-form-group">
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <a href="{{url("admin/showAddAdminUser")}}" type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</a>
                                            <button type="button" class="am-btn am-btn-default am-btn-secondary"><span class="am-icon-save"></span> 保存</button>
                                            <button type="button" class="am-btn am-btn-default am-btn-warning"><span class="am-icon-archive"></span> 审核</button>
                                            <button type="button" class="am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span> 删除</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="am-u-sm-12 am-u-md-6 am-u-lg-3">--}}
                                {{--<div class="am-form-group tpl-table-list-select">--}}
                                    {{--<select data-am-selected="{btnSize: 'sm'}">--}}
                                        {{--<option value="option1">所有类别</option>--}}
                                        {{--<option value="option2">IT业界</option>--}}
                                        {{--<option value="option3">数码产品</option>--}}
                                        {{--<option value="option3">笔记本电脑</option>--}}
                                        {{--<option value="option3">平板电脑</option>--}}
                                        {{--<option value="option3">只能手机</option>--}}
                                        {{--<option value="option3">超极本</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="am-u-sm-12 am-u-md-12 am-u-lg-3">--}}
                                {{--<div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">--}}
                                    {{--<input type="text" class="am-form-field ">--}}
                                    {{--<span class="am-input-group-btn">--}}
            {{--<button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" type="button"></button>--}}
          {{--</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="am-u-sm-12">
                                <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">
                                    <thead>
                                    <tr>
                                        <th>管理员ID</th>
                                        <th>管理员登录名</th>
                                        <th>创建时间</th>
                                        <th>最后登录时间</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admin_user_list as $item)
                                    <tr class="gradeX">
                                        <td class="am-text-middle">{{$item->id}}</td>
                                        <td class="am-text-middle">{{$item->logname}}</td>
                                        <td class="am-text-middle">{{$item->create_time?date('Y-m-d H:i:s',$item->create_time):"--"}}</td>
                                        <td class="am-text-middle">{{$item->lastlog_time?date('Y-m-d H:i:s',$item->lastlog_time):"--"}}</td>
                                        <td class="am-text-middle">
                                            <div class="tpl-table-black-operation">
                                                <a href="javascript:;">
                                                    <i class="am-icon-pencil"></i> 编辑
                                                </a>
                                                <a href="javascript:;" class="tpl-table-black-operation-del">
                                                    <i class="am-icon-trash"></i> 删除
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                    <!-- more data -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="am-u-lg-12 am-cf">

                                <div class="am-center">
                                    {{$admin_user_list->links('admin.layout_admin.pageint')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection