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

$('#sub_comment').on('click',function(){
    var content = $('#comment_content').val();
    var art_id = $("#art_id").val();
    var author_id = $("#author_id").val();
    var url = $(this).attr('data-sub-url')
    var data = {content:content,art_id:art_id,author_id:author_id}
    if(content == ""){
        my_notice("没输入内容",1)
        return false;
    }
    $.post(
        url,
        data,
        function (d) {
            if(d.code == 10000){
                my_notice(d.msg)
                window.location.reload();
            }else{
                my_notice(d.msg)
            }
        },
        'json'
    )
    return false;

})