{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}推送管理 / 个人推送{%/block%}
{%block name="content"%}

<div class="row">
    <div class="col-lg-12">
        <form name="push">

            <div class="form-group">
                <label for="vname">用户ID &nbsp; (&nbsp; 提示：多个UserId通过 &nbsp;&nbsp;| &nbsp;&nbsp; 隔开 &nbsp;)</label>
                <input type="text" class="form-control" id="userIds" placeholder="User Id" name="userIds">
            </div>

            <div class="form-group">
                <label for="vno">推送主题</label>
                <input type="text" class="form-control" id="theme" placeholder="Push Theme" name="theme">
            </div>

            <div class="form-group">
                <label for="description">推送内容</label>
                <textarea id="description" class="form-control" rows="3" name="description"></textarea>
            </div>
              
            <button id="sub" type="button" class="btn btn-primary" data-0="{%$ios%}" data-1="{%$android%}">确认推送</button>
        </form>
    </div>
</div>

{%/block%}

{%block name="js"%}
<script type="text/javascript">
    !(function(){
        var publish = {
            init: function(){
                this.getDom();
                this.postData();
            },
            getDom: function(){
                this.subBtn = $('#sub');
                this.userIds = $('#userIds');
                this.theme = $('#theme');
                this.desc = $('#description');
                this.form = $('form[name=push]');
            },
            checkParams: function(){
                var me = this;

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

                    $.post('/push/puserpush', formdata, function(json){

                        if(json.code != -1){
                            window.location = '/version/index';
                        }
                        else{
                            alert('发布失败.');
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