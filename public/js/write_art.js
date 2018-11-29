$.ajaxSetup( {
    url: "" , // 默认URL
    aysnc: false , // 默认同步加载
    type: "POST" , // 默认使用POST方式
    headers: { // 默认添加请求头
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    } ,
    error: function(jqXHR, textStatus, errorMsg){ // 出错时默认的处理函数
        // jqXHR 是经过jQuery封装的XMLHttpRequest对象
        // textStatus 可能为： null、"timeout"、"error"、"abort"或"parsererror"
        // errorMsg 可能为： "Not Found"、"Internal Server Error"等

        // 提示形如：发送AJAX请求到"/index.html"时出错[404]：Not Found
        console.log( '发送AJAX请求到"' + this.url + '"时出错[' + jqXHR.status + ']：' + errorMsg );
    }
} );
var ue = UE.getEditor('editor',{
    toolbars : [
        ['fullscreen', 'source', 'undo', 'redo','insertcode','simpleupload','insertimage','link','map','wordimage'],
        ['bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc']
    ],
});

$("#sub_art").on('click',function(){
    var html = '';
    ue.ready(function() {
        html = ue.getContent();
    });
    if(!html){
        my_notice("没写内容哦",1);
    }
    var title = $('#my_title').val()
    var detail = $('#my_detail').val()
    var content = html
    var files = $('#doc-form-file').prop('files');
    var file = files[0];
    var formData = new FormData();
    formData.append('pic', file);
    formData.append('title', title);
    formData.append('detail', detail);
    formData.append('content', content);
    var url = $(this).attr("data-url")

    $.ajax({
        url:url,
        data:formData,
        type:'post',
        processData:false,
        success:function(d){

        },
    })
    console.log(formData)
    my_notice(html,1);
})

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
});

