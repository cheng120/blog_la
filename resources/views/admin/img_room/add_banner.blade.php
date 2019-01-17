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
                            <div class="widget-title am-fl">{{$data['title']}}</div>
                            <div class="widget-function am-fr">
                                <a href="javascript:;" class="am-icon-cog"></a>
                            </div>
                        </div>
                        <div class="widget-body am-fr">

                            <form class="am-form tpl-form-border-form">
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">标题 <span class="tpl-form-line-small-title">Title</span></label>
                                    <div class="am-u-sm-12">
                                        <input type="text" class="tpl-form-input am-margin-top-xs" id="title" placeholder="请输入标题文字" value="{{isset($data['data']['title'])?$data['data']['title']:""}}">
                                        <small>请填写标题文字10-20字左右。</small>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-email" class="am-u-sm-12 am-form-label am-text-left">开始展示时间 <span class="tpl-form-line-small-title">Time</span></label>
                                    <div class="am-u-sm-12">
                                        <input type="text" id="starttime" class="am-form-field tpl-form-no-bg am-margin-top-xs" placeholder="发布时间" data-am-datepicker="" readonly="">
                                        <small>发布时间为非必填</small>
                                    </div>
                                </div>

                                {{--<div class="am-form-group">--}}
                                    {{--<label for="user-phone" class="am-u-sm-12 am-form-label am-text-left">作者 <span class="tpl-form-line-small-title">Author</span></label>--}}
                                    {{--<div class="am-u-sm-12  am-margin-top-xs">--}}
                                        {{--<select data-am-selected="{searchBox: 1}" style="display: none;">--}}
                                            {{--<option value="a">-The.CC</option>--}}
                                            {{--<option value="b">夕风色</option>--}}
                                            {{--<option value="o">Orange</option>--}}
                                        {{--</select>--}}

                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="am-form-group">--}}
                                    {{--<label class="am-u-sm-12 am-form-label  am-text-left">SEO关键字 <span class="tpl-form-line-small-title">SEO</span></label>--}}
                                    {{--<div class="am-u-sm-12">--}}
                                        {{--<input type="text" class="am-margin-top-xs" placeholder="输入SEO关键字">--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                <div class="am-form-group">
                                    <label for="user-weibo" class="am-u-sm-12 am-form-label  am-text-left">封面图 <span class="tpl-form-line-small-title">Images</span></label>
                                    <div class="am-u-sm-12 am-margin-top-xs">
                                        <div class="tpl-form-file-img" id="file-list">
                                            <img src="http://cheng1991-img.test.upcdn.net/image/%E5%A5%B3%E4%B8%BB%E8%A7%92X%E6%84%9A%E4%BA%BA%E8%8A%82.png" id="banner_img" alt="">
                                        </div>
                                        <div class="am-form-group am-form-file">

                                            <button type="button" class="am-btn am-btn-danger am-btn-sm ">
                                                <i class="am-icon-cloud-upload"></i> 添加封面图片</button>
                                            <input id="doc-form-file" type="file" simple >
                                        </div>

                                    </div>
                                </div>

                                {{--<div class="am-form-group">--}}
                                    {{--<label for="user-weibo" class="am-u-sm-12 am-form-label  am-text-left">添加分类 <span class="tpl-form-line-small-title">Type</span></label>--}}
                                    {{--<div class="am-u-sm-12">--}}
                                        {{--<input type="text" id="user-weibo" class="am-margin-top-xs" placeholder="请添加分类用点号隔开">--}}
                                        {{--<div>--}}

                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                <div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-12 am-form-label  am-text-left">隐藏banner</label>
                                    <div class="am-u-sm-12">
                                        <div class="tpl-switch">
                                            <input type="checkbox" id="banner-check" class="ios-switch bigswitch tpl-switch-btn am-margin-top-xs" value="0">
                                            <div class="tpl-switch-btn-view">
                                                <div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">排序 <span class="tpl-form-line-small-title">sort</span></label>
                                    <div class="am-u-sm-12">
                                        <input type="number" class="tpl-form-input am-margin-top-xs" id="sort" placeholder="请输入位置" value="">
                                        <small>请填写顺序位置</small>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-12 am-form-label  am-text-left">图片描述</label>
                                    <div class="am-u-sm-12 am-margin-top-xs">
                                        <textarea class="" rows="10" id="user-intro" placeholder="图片描述"></textarea>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <div class="am-u-sm-12 am-u-sm-push-12">
                                        <button type="button" class="am-btn am-btn-primary tpl-btn-bg-color-success " id="sub-btn">提交</button>
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
        $(function() {
            $('#doc-form-file').on('change', function() {
                var fileNames = '';
                // $.each(this.files, function() {
                //     fileNames += '<span class="am-badge">' + this.name + '</span> ';
                // });
                $('#file-list').html(fileNames);
                var files = document.getElementById('doc-form-file').files;
                if(files.length == 0){
                    return;
                }
                var file = files[0];
                //把上传的图片显示出来
                var reader = new FileReader();
                // 将文件以Data URL形式进行读入页面
                reader.readAsBinaryString(file);
                reader.onload = function(f){
                    var result = document.getElementById("file-list");
                    var src = "data:" + file.type + ";base64," + window.btoa(this.result);
                    // alert('<img src ="'+src+'"/>');
                    // result.innerHTML = '<img src ="'+src+'"/>';
                    $('#file-list').html('<img style="width:100%;height: 500px" src ="'+src+'"/>');
                }
            });
            $('#banner-check').on("change",function (d) {
                if($(this).attr("checked") == "checked"){
                    $(this).val('0')
                    $(this).removeAttr("checked")
                }else{
                    $(this).val('1')
                    $(this).attr("checked","checked")
                }
            })
            $('#sub-btn').on('click',function () {
                var type = '{{$data['type']}}'
                var url = '{{url('admin/editBanner')}}'
                var title = $('#title').val()
                var starttime = $("#starttime").val()
                var banner_img = $("#banner_img").attr('src')
                var banner_check = $('#banner-check').val()
                var des = $('#user-intro').val()
                var sort = $('#sort').val()
                var files = document.getElementById("doc-form-file").files;
                var file = files[0];
                var formData = new FormData();

                formData.append('file', file);
                formData.append('type', type);
                formData.append('title', title);
                formData.append('starttime', starttime);
                formData.append('banner_check', banner_check);
                formData.append('des', des);
                formData.append('sort', sort);
                if(type != 'add'){
                    var banner_id = '{{$data['banner_id']}}'
                    formData.append('banner_id', banner_id);
                    if(!banner_img){
                        my_notice("没有上传图片",1)
                    }
                }
                if(!title){
                    my_notice("没有填写标题",1)
                }



                $.ajax({
                    url:url,
                    data:formData,
                    type:'post',
                    processData:false,
                    contentType: false,
                    success:function(d){
                        if(d.code == 10000){
                            my_notice(d.msg,1)
                            location.href = '{{url('admin/showBannerList')}}'
                        }else{
                            my_notice(d.msg,1)
                        }
                    },
                })


            })
        });
    </script>
@endsection