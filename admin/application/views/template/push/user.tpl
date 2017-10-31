{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}推送管理 / 个人推送{%/block%}

{%block name="content"%}
<div class="row">
    <div class="col-lg-12">
        <form name="push">

            <div class="form-group">
                <label for="platform" >类型</label>
                <div >
                    <select id="platform" class="form-control" name="type">
                        <option value="">选择类型</option>
                        <option value="1">学校通知</option>
                        <option value="3">锻炼提醒</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="vname">用户ID &nbsp; (&nbsp; 提示：多个UserId通过 &nbsp;&nbsp;| &nbsp;&nbsp; 隔开 &nbsp;)</label>
                <input type="text" class="form-control" id="userIds" placeholder="用户ID" name="userIds">
            </div>

            <div class="form-group">
                <label for="vno">标题</label>
                <input type="text" class="form-control" id="theme" placeholder="标题" name="theme">
            </div>

            <div class="form-group">
                <label for="description">内容摘要</label>
                <textarea id="description" class="form-control"  placeholder="摘要" rows="3" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="editor">详细内容</label>
                <div id="editor" name="content"></div>
            </div>

            <button id="sub" type="button" class="btn btn-primary" data-0="{%$ios%}" data-1="{%$android%}">确认推送</button>
        </form>
    </div>
</div>

{%/block%}

{%block name="js"%}
<script src="/static/widget/ueditor/ueditor.config.js"></script>
<script src="/static/widget/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript">
    !(function(){
        var publish = {
            init: function(){
                this.getDom();
                this.postData();
                this.initUe();
            },
            getDom: function(){
                this.subBtn = $('#sub');
                this.userIds = $('#userIds');
                this.theme = $('#theme');
                this.desc = $('#description');
                this.form = $('form[name=push]');
                this.platform = $('#platform');
            },

            initUe: function(){
                this.ue = UE.getEditor('editor');
            },

            checkParams: function(){
                var me = this;

                var platform = $.trim(me.platform.val());
                if(!platform){
                    alert('请选择类型');
                    return false;
                }

                var userIds = $.trim(me.userIds.val());
                if(!userIds){
                    alert('请输入用户ID.');
                    return false;
                }

                var theme = $.trim(me.theme.val());
                if(!theme){
                    alert('请输入推送主题.');
                    return false;
                }

                var desc = $.trim(me.desc.val());
                if(!desc){
                    alert('请输入推送主体内容.');
                    return false;
                }

            },
            postData: function(){
                var me = this;

                me.subBtn.unbind().bind('click', function(){
                    var res = me.checkParams();
                    if(res === false){
                        return false;
                    }

                    var formdata = me.form.serialize();

                    $.post('/push/puser', formdata, function(json){

                        if(json.errCode == 0){
                            alert('推送成功.');
                            window.location = '/push/user';
                        }
                        else{
                            alert('托送失败.');
                            return false;
                        }
                    });
                })
            }

        };

        publish.init();
    })()
</script>
{%/block%}