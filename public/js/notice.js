function my_notice(msg,type,title){
    var tag_key = "";
    switch (type){
        case 1:
            tag_key = '#my-alert';
            break;
        case 2:
            tag_key = '#my-confirm';

            break;
    }
    if(!title){
        title = "提示";
    }
    var tag_key_msg = tag_key+"-msg";
    var tag_key_title =  tag_key+"-title";
    $(tag_key_msg).html(msg);
    $(tag_key_title).html(title);
    //1 alert 2 confirm
    if(type == 2){
        $(tag_key).modal({
            elatedTarget: this,
            onConfirm: function(options) {
                return true;
            },
            onCancel: function() {
                return false;
            }
        })
    }else if(type == 1){
        $(tag_key).modal({
            elatedTarget: this,

        })
    }

}
