function singwaapp_save(form) {
    var data = $(form).serialize();
    var url = $(form).attr('url');
    $.post(url, data, function (result) {
        if (result.code == 0) {
            layer.msg(result.msg, {icon: 5, time: 3000});
        } else if (result.code == 1) {
            self.location = result.data.jump_url;
        }
    }, 'JSON');

}

function selecttime(flag) {
    if (flag == 1) {
        var endTime = $("#countTimeend").val();
        if (endTime != "") {
            WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm', maxDate: endTime})
        } else {
            WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm'})
        }
    } else {
        var startTime = $("#countTimestart").val();
        if (startTime != "") {
            WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm', minDate: startTime})
        } else {
            WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm'})
        }
    }
}

/**
 * 通用化的删除操作
 * @param obj
 */
function article_del(obj) {
    url = $(obj).attr('del_url');
    layer.confirm('确认要删除吗？', function (index) {
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            success: function (data) {
                if (data.code == 1) {
                    self.location = data.data.jump_url;
                } else if (data.code == 0) {
                    layer.msg(data.msg, {icon: 2, time: 2000});
                }
            },
            error: function (data) {
                console.log(data.msg);
            },
        });
    });
}

/**
 * 通用化的修改状态操作
 * @param obj
 */
function change_status(obj) {
    url = $(obj).attr('status_url');
    layer.confirm('确认要修改状态吗？', function (index) {
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            success: function (data) {
                if (data.code == 1) {
                    self.location = data.data.jump_url;
                } else if (data.code == 0) {
                    layer.msg(data.msg, {icon: 2, time: 2000});
                }
            },
            error: function (data) {
                console.log(data.msg);
            },
        });
    });
}


/**
 * 添加资讯
 * @param title
 * @param url
 * @param w
 * @param h
 */
function article_edit(obj, title, url, w, h) {
    console.log(obj);

    urls = $(obj).attr('edit_url');
    $.ajax({
        type: 'POST',
        url: urls,
        dataType: 'json',
        success: function (data) {
            layer.open({
                type: 2,//Page层类型,
                area: ['1000px', '800px'],
                title: title,
                shade: 0.6, //遮罩透明度
                maxmin: true, //允许全屏最小化
                anim: 1, //0-6的动画形式，-1不开启
                content: url
            });

        },
        error: function (data) {
            console.log(data.msg);
        },
    });

}



