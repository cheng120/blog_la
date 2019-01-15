
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

$("#sub_log").on('click',function(o){
    var username = $("#user-name").val()
    var pwd = $("#user-pass").val()
    var url = $(this).attr('sub-url')
    if(!username){
        my_notice("用户名不能为空",1,"提示")
    }
    if(!pwd){
        my_notice("密码不能为空",1,"提示")
    }
    if(!url){
        url = "{{url('admin/dologin')}}"
    }
    $.post(
        url,
        {username:username,password:pwd},
        function (d){
            if(d.code == 1000){
                my_notice(d.jump_url,1)
                location.href = d.jump_url
            }else{
                my_notice(d.msg,1)
                return false;
            }

        },
        'json'
    )
})