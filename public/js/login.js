
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

$('#my_sub_login').on('click',function (e) {
    var url = $(this).attr("data-sub-url")
    var username = $("#usr").val()
    var password = $("#pwd").val()
    var ver_code = $("#vercode").val()
    $(this).button("loading");
    var data = {username:username,password:password,vcode:ver_code}
    $.post(url,data,function (d) {
        my_notice(d.msg,1)
        if(d.code == 1000){
            setTimeout(function () {
                location.href  = d.data.url;
            },2000)
        }

    },'json')
    $(this).button('reset');
    return false;
})

$('#my_sub').on('click',function () {

})

$(".jump-btn").on("click",function (e) {
    location.href  = $(this).attr('data-jump-url');
})

$('#my_sub_reg').on('click',function (e) {
    var url = $(this).attr("data-sub-url")
    var username = $("#my-username").val()
    var password = $("#my-password").val()
    var nickname = $("#my-nickname").val()
    var repwd = $("#repwd").val();
    $(this).button("loading");
    var data = {username:username,password:password,nickname:nickname,re_password:repwd}
    $.post(url,data,function (d) {
        my_notice(d.msg,1)
        return false;
        location.href  = d.data.url;
    },'json')
    $(this).button('reset');
    return false;
})