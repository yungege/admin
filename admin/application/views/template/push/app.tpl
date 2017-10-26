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
        background-repeat: no-repeat;
    }
    .s-ul{
        list-style: none;
    }
    .s-ul li{
        float: left;
        border: 1px solid #d9edf7;
        padding: 5px 10px;
        border-radius: 4px;
        margin-top: 10px;
        margin-right: 10px;
    }
    .s-ul li:hover{
        background: #d9edf7;
    }
    .glyphicon-remove{
        cursor: pointer;
        color: red;
        vertical-align: middle;
        margin-left: 5px;
        padding: 2px;
        margin-top: -4px;
    }
</style>
{%/block%}
{%block name="content"%}
<div class="row">
    <div class="col-md-8" style="overflow: hidden;">
        <form class="form-horizontal" name="news" style="border: 1px solid #ddd;padding: 15px;border-radius: 5px;">
            <div class="form-group">
                <label for="platform" class="col-sm-2 control-label">类型</label>
                <div class="col-sm-10">
                    <select id="platform" class="form-control" name="type">
                        <option value="">选择类型</option>
                        <option value="1">学校通知</option>
                        <option value="2">平台消息</option>
                    </select>
                </div>
            </div>
            <div class="row form-group sarea" style="display: none;">
                <label class="col-sm-2 control-label">请选择学校</label>
                <div class="col-sm-10">
                    <div class="col-sm-4" style="padding: 0">
                        <input type="text" class="form-control" id="school" placeholder="请输入学校名称" value="">
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-primary gets" href="javascript:void(0)">
                            添 加
                        </a>
                    </div>
                    <ul class="s-ul col-sm-12" style="padding:0;">
                    </ul>
                </div>
            </div>
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
            <div class="form-group img-div" style="display: none;">
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
                <label class="col-sm-2 control-label">消息内容</label>
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
<script type="text/javascript" src="/static/bootstrap/js/bootstrap-typeahead.js"></script>
<script>
$(function(){
    var domain = 'https://oi7ro6pyq.qnssl.com/';
    var schoolIds = [];

    var publish = {
        init: function(){
            this.getDom();
            this.initUe();
            this.uploadPic();
            this.sendXhr();
            this.chooseType();
            this.getSchool();
            this.removeSchool();
        },

        getDom: function(){
            this.form = $('form[name=news]');
            this.picshow = $('#pic-show');
            this.picUrl = $('input[name=cover_img]');
            this.subBtn = $('#sub');
            this.img = $('.img-div');
            this.selectBtn = $('select[name=type]');
            this.schoolBtn = $('#school');
            this.sUl = $('.s-ul');
            this.getBtn = $('.gets');
            this.schoolArea = $('.sarea');
            this.removeBtn = $('.remove-school');
            this.dialogDom = {};
        },

        getSchool: function(){
            var me  =this;
            me.schoolBtn.typeahead({
                source: function (query, process) {
                    return $.ajax({
                        url: '/school/search?name=' + query,
                        type: 'get',
                        success: function (result) {
                            if(!result.data.list || result.data.list.length == 0){
                                return;
                            }
                            return process(result.data.list);
                        },
                    });
                }
            });

            me.getBtn.bind('click', function(){
                var inputVal = $.trim(me.schoolBtn.val());
                var searchVal = $('.dropdown-menu > .active').data();
                if(!inputVal || !searchVal || (searchVal.value.name != inputVal) || !searchVal.value._id){
                    me.alertMsg('请选择学校', 'd1');
                    return false;
                }
                if($.inArray(searchVal.value._id, schoolIds) != -1){
                    me.schoolBtn.val('');
                    return false;
                }
                var liHtml = '<li data-id="'+searchVal.value._id+'"><span>'+searchVal.value.name+'</span><span class="glyphicon glyphicon-remove remove-school"></span></li>';
                me.sUl.append(liHtml);
                me.schoolBtn.val('');
                schoolIds.push(searchVal.value._id);
            })
        },

        removeSchool: function(){
            var me = this;
            
            $(document).on('click', '.remove-school', function(e){
                var sid = $(this).parent().data('id');
                for(var i=0; i<schoolIds.length; i++) {
                    if(schoolIds[i] == sid) {
                        schoolIds.splice(i, 1);
                        break;
                    }
                }
                $(this).parent().remove();
                return false;
            })
        },

        chooseType: function(){
            var me = this;
            me.selectBtn.bind('change', function(){
                var type = $(this).val();
                if(type == 1){
                    me.img.hide();
                    me.picshow.attr('style', '');
                    me.picUrl.val('');
                    me.schoolArea.show();
                }
                else{
                    me.schoolArea.hide();
                    me.img.show();
                }
            })
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
                            me.picshow.css({'background':'url('+url+') no-repeat center center','background-size':'auto 46px','border-color':'#ccc'});
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
                var atype = me.selectBtn.val();
                $('.append-int').remove();
                if(!atype){
                    me.alertMsg('请选择推送类型','d2');
                    return false;
                }
                else if(atype == 1){
                    if(schoolIds.length == 0){
                        me.alertMsg('请选择学校','d2');
                        return false;
                    }
                    for (var i in schoolIds) {
                        var intHtml = "<input class='append-int' type='hidden' name='schools[]' value='"+schoolIds[i]+"'>";
                        me.form.append(intHtml);
                    }
                }
                var data = me.form.serialize();
                xhr = $.ajax({
                    url: '/push/appnotice', 
                    data: data, 
                    type: 'POST',
                    dataType: 'json',
                    success: function(json){
                        if(json.errCode == 0){
                            me.alertMsg('推送成功','d3');
                        }
                        else{
                            me.alertMsg(json.errMessage,'d4');
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

        alertMsg: function(text, name){
            var me = this,
                configs = {
                    'title'   : '',
                    'content' : text,
                    'modal'   : true,
                    'buttons' : {
                        '明白了' : function(){
                            me.dialogDom.name.close();
                        },
                    }
                };

            if(name == 'd3'){
                configs.buttons = {
                    '确 定' : function(){
                        me.dialogDom.name.close();
                        window.location.reload();
                    },
                };
            }

            me.dialogDom.name = jqueryAlert(configs);

            return false;
        },
    }

    publish.init();

})
</script>
{%/block%}