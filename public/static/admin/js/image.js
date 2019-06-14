$(function() {
    $("#file_upload").uploadify({
        swf:swf,
        uploader:image_upload_url,
        buttonText:'上传图片',
        fileTypeDesc: 'Image files',
        fileObjName: 'file',
        fileTypeExts: '*.gif;*.jpeg;*.png',
        onUploadSuccess:function (file,data,response) {
            if(response){
                var obj=JSON.parse(data);
                $('#upload_org_code_img').attr('src',obj.data);
                $('#file_upload_image').attr('value',obj.data);
                $('#upload_org_code_img').show();
            }
        }
    });
});