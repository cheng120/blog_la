var user_info = eval("("+$("#user_info").val()+")");
function checkEdit() {
    //check nick
    var nickname = $("#nickname").val()
    var description = $("#description").val()
    if(user_info.nickname != nickname || (description.trim() != "这个人很懒" && user_info.description != description )){
        $("#save_user").removeClass("am-disabled")
        return true;
    }else{
        $("#save_user").addClass("am-disabled")
        return false;
    }
}
$(function(){
    checkEdit()
    $("#nickname").on("keyup",function () {
        checkEdit();
    })
    $("#description").on("keyup",function () {
        checkEdit();
    })
    $("#save_user").on("click",function (o) {
        var sub_url = $(this).attr("data-sub-url");
        var nickname = $("#nickname").val()
        var description = $("#description").val()
        $.post(sub_url,{nickname:nickname,description:description},function(d){
            if(d.code == 10000){
                $("#user_info").val(d.user_data)
                user_info = eval("("+$("#user_info").val()+")");
                checkEdit()
                my_notice(d.msg,1,'提示')
            }
        })
        return false;

    })

})
