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

//时钟
$(function () {
    setInterval(function () {
        os_timestamp = $('#clock_timestamp').val()
        os_timestamp = parseInt(os_timestamp)+1
        console.log(os_timestamp)
        date_str = goClock(os_timestamp)
        $("#clock").val(date_str)
        $("#clock_timestamp").val(os_timestamp)
    },1000)

})

function goClock(os_timestamp) {
    t_time =  new Date(os_timestamp*1000);
    date_str = t_time.toLocaleDateString().replace(/\//g, "-") + " " +t_time.toTimeString().substr(0, 8);
    console.log(date_str)
    return date_str;
}