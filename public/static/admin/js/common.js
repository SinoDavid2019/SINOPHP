function singwaapp_save(form) {
    var data=$(form).serialize();
    var url=$(form).attr('url');
    $.post(url,data,function (result) {
        if(result.code==0){
            layer.msg(result.msg,{icon:5,time:3000});
        }else if(result.code==1){
            self.location=result.data.jump_url;

        }
    },'JSON');

}