$(function() {
    $("#file_upload").uploadify({
        swf     :swf,
        uploader:image_upload_url,
        buttonText:'上传图片'
    });
});