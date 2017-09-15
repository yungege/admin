{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}推送管理 / 平台消息推送{%/block%}
{%block name="css"%}
<link href="/static/widget/ueditor/themes/default/css/ueditor.css" type="text/css" rel="stylesheet">
<style type="text/css">
    .edui-editor{
        width: 100%!important;
    }
    .edui-editor-iframeholder{
        width: 100%!important;
        min-height: 300px;
    }
    #pic-show{
        border: 1px solid #fff;
        display: inline-block;
        height: 46px;
        vertical-align: top;
        width: 100px;
        border-radius: 5px;
        overflow: hidden;
    }
</style>
{%/block%}
{%block name="content"%}
<div class="row">
    <div class="col-md-8" style="overflow: hidden;">
        <form class="form-horizontal" name="news" style="border: 1px solid #ddd;padding: 15px;border-radius: 5px;">
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">标题</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" placeholder="title" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="desc" class="col-sm-2 control-label">摘要</label>
                <div class="col-sm-10">
                    <textarea id="desc" name="desc" class="form-control" rows="3" placeholder="摘要"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="cover" class="col-sm-2 control-label">封面图片</label>
                <div class="col-sm-10">
                    <a class="btn btn-default btn-lg" id="pickfiles" href="#" style="position: relative; z-index: 1;">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>选择文件</span>
                    </a>
                    <p id="pic-show"></p>
                    <!-- <input style="padding-left: 0;" type="file" id="cover" name="cover" class="col-sm-6" value="">-->
                    <input type="hidden" name="cover_img" id="cover_img" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">新闻内容</label>
                <div class="col-sm-10">
                    <div id="editor" name="content"></div>
                </div>
            </div>

            <button id="sub" style="margin-left: 17%;" type="button" class="btn btn-md btn-primary">确认发布</button>
            
        </form>
    </div>
</div>
<input type="hidden" name="uptoken" id="uptoken" value="{%$uptoken%}">
{%/block%}

{%block name="js"%}
<script src="/static/widget/ueditor/ueditor.config.js"></script>
<script src="/static/widget/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/static/qiniu/moxie.min.js"></script>
<script type="text/javascript" src="/static/qiniu/plupload.full.min.js"></script>
<script type="text/javascript" src="/static/qiniu/zh_CN.js"></script>
<script type="text/javascript" src="/static/qiniu/qiniu.min.js"></script>
<script>
$(function(){
    var domain = 'https://oi7ro6pyq.qnssl.com/';

    var publish = {
        init: function(){
            this.getDom();
            this.initUe();
            this.uploadPic();
            this.sendXhr();
        },

        getDom: function(){
            this.form = $('form[name=news]');
            this.picshow = $('#pic-show');
            this.picUrl = $('input[name=cover_img]');
            this.subBtn = $('#sub');
        },

        initUe: function(){
            this.ue = UE.getEditor('editor');
        },

        uploadPic: function(){
            var me = this;
            // 七牛文件上传 基于Puploader
            var uploader = Qiniu.uploader({
                runtimes: 'html5,flash,html4',
                browse_button: 'pickfiles',
                max_file_size: '1mb',
                flash_swf_url: '/static/qiniu/Moxie.swf',
                dragdrop: false,
                uptoken: $('#uptoken').val(),
                domain: domain,
                get_new_uptoken: false,
                unique_names: true,
                max_retries: 3,
                auto_start: true,
                multi_selection: false,
                filters: {
                    mime_types : [ //只允许上传图片
                        { title : "Image files", extensions : "jpg,png,jpeg" }
                    ]
                },

                init: {
                    'UploadProgress': function(up, file) {
                        // todo
                    },
                    'FileUploaded': function(up, file, info) {
                        if(info.status == 200){
                            var url = domain + eval('('+info.response+')')['key'];
                            me.picshow.css({'background':'url('+url+') center center','background-size':'auto 46px','border-color':'#ccc'});
                            me.picUrl.val(url);
                        }
                    },
                    'Error': function(up, err, errTip) {
                        me.picshow.css({'background':'','background-size':'','border-color':'#fff'});
                        me.picUrl.val('');
                        alert(errTip);
                        return false;
                    }
                }
            });
        },

        sendXhr: function(){
            var me = this,
                xhr = null;
            me.subBtn.unbind().bind('click',function(){
                var data = me.form.serialize();
                xhr = $.ajax({
                    url:'/push/appnotice', 
                    data:data, 
                    type: 'POST',
                    dataType: 'json',
                    success: function(json){
                        if(json.errCode == 0){
                            alert('推送成功');
                            window.location.reload();
                        }
                        else{
                            alert(json.errMessage);
                            return false;
                        }
                        
                    },
                    beforeSend: function () {
                        if(xhr != null) {
                            xhr.abort();
                        }
                    },
                });
            })
        },
    }

    publish.init();

})
</script>
{%/block%}