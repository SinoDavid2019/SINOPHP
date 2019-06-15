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

function selecttime(flag){
    if(flag==1){
        var endTime = $("#countTimeend").val();
        if(endTime != ""){
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',maxDate:endTime})}else{
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})}
    }else{
        var startTime = $("#countTimestart").val();
        if(startTime != ""){
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:startTime})}else{
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})}
    }
}