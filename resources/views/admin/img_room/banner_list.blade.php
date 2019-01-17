@extends('admin.layout_admin.admin_index')


@section('content')
    <!-- 内容区域 -->
    <div class="tpl-content-wrapper">
        <div class="row-content am-cf">
            <div class="row">
                <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                    <div class="widget am-cf">
                        <div class="widget-head am-cf">
                            <div class="widget-title  am-cf">banner列表</div>


                        </div>
                        <div class="widget-body  am-fr">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                                <div class="am-form-group">
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <a href="{{url("admin/showEditBannerList")}}" type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</a>
                                            {{--<button type="button" class="am-btn am-btn-default am-btn-secondary"><span class="am-icon-save"></span> 保存</button>--}}
                                            {{--<button type="button" class="am-btn am-btn-default am-btn-warning"><span class="am-icon-archive"></span> 审核</button>--}}
                                            {{--<button type="button" class="am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span> 删除</button>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="am-u-sm-12 am-u-md-6 am-u-lg-6">--}}
                            {{--<div class="am-form-group">--}}
                            {{--<div class="am-btn-toolbar">--}}
                            {{--<div class="am-btn-group am-btn-group-xs">--}}
                            {{--<a href="{{url("admin/showAddAdminUser")}}" type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</a>--}}
                            {{--<button type="button" class="am-btn am-btn-default am-btn-secondary"><span class="am-icon-save"></span> 保存</button>--}}
                            {{--<button type="button" class="am-btn am-btn-default am-btn-warning"><span class="am-icon-archive"></span> 审核</button>--}}
                            {{--<button type="button" class="am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span> 删除</button>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
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
                                <table width="100%" class="am-table am-table-striped tpl-table-black am-table-centered">
                                    <thead>
                                    <tr>
                                        <th>bannerID</th>
                                        <th>banner图</th>
                                        <th>标题</th>
                                        <th>权重值</th>
                                        <th>创建时间</th>
                                        <th>更新时间</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data_list as $key => $item)
                                        <tr class="@if($key%2 == 0)even @endif gradeX">
                                            <td class="am-text-middle">{{$item->id}}</td>
                                            <td>
                                                <figure data-am-widget="figure" class="am-figure "   data-am-figure="{  pureview: 'true' }">
                                                <img src="{{$item->src}}" class="tpl-table-line-img" alt="">
                                                </figure>
                                            </td>
                                            <td class="am-text-middle">{{$item->title}}</td>
                                            <td class="am-text-middle">{{$item->sort}}</td>
                                            <td class="am-text-middle">{{$item->create_time?date('Y-m-d H:i:s',$item->create_time):"--"}}</td>
                                            <td class="am-text-middle">{{$item->update_time?date('Y-m-d H:i:s',$item->update_time):"--"}}</td>
                                            <td class="am-text-middle">
                                                <div class="tpl-table-black-operation">
                                                    <a href="{{url("admin/showEditBannerList?id=".$item->id)}}">
                                                        <i class="am-icon-pencil"></i> 编辑
                                                    </a>
                                                    {{--<a href="javascript:;" class="tpl-table-black-operation-del">--}}
                                                    {{--<i class="am-icon-trash"></i> 删除--}}
                                                    {{--</a>--}}
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
                                    {{$data_list->links('admin.layout_admin.pageint')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection