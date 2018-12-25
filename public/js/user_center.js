var user_info = eval("("+$("#user_info").val()+")");
function checkEdit() {
    //check nick
    var nickname = $("#nickname").val()
    var description = $("#description").val()
    if(user_info.nickname != nickname || (description.trim() != "这个人很懒" && user_info.description != description )){
        $("#save_user").removeClass("am-disabled")
    }else{
        $("#save_user").addClass("am-disabled")
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
            }else{
                my_notice(d.msg,1,'提示')
            }
        },'json')
        return false;

    })

    $(".my-button-jump").on('click',function(){
        if($(this).hasClass('am-active')){
            return false;
        }else{
            var url = $(this).attr("data-url")
            if(url == "" || url == undefined){
                my_notice("暂未开通",1);
                return false;
            }
            location.href = url
        }
    })
})