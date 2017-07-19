{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}客户端管理 / 发布新版本{%/block%}
{%block name="content"%}

<div class="row">
    <div class="col-lg-12">
        <form name="version">
            <div class="form-group">
                <label for="platform">发布平台</label>
                <select id="platform" class="form-control" name="type">
                    <option value="-1">选择发布平台</option>
                    <option value="0" >iOS【当前最新版本 {%$ios%}】</option>
                    <option value="1">Android【当前最新版本 {%$android%}】</option>
                </select>
            </div>

            <div class="form-group">
                <label for="vname">版本名称</label>
                <input type="text" class="form-control" id="vname" placeholder="Version Name" name="version">
            </div>

            <div class="form-group">
                <label for="vno">版本号</label>
                <input type="text" class="form-control" id="vno" placeholder="Version No" name="versionno">
            </div>

            <div class="form-group">
                <label for="description">更新说明</label>
                <textarea id="description" class="form-control" rows="3" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="downloadurl">下载URL</label>
                <input type="text" class="form-control" id="downloadurl" placeholder="Download URL" name="downloadurl">
            </div>
              
            <button id="sub" type="button" class="btn btn-primary" data-0="{%$ios%}" data-1="{%$android%}">确认发布</button>
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
                this.pt = $('#platform');
                this.vname = $('#vname');
                this.no = $('#vno');
                this.desc = $('#description');
                this.url = $('#downloadurl');
                this.form = $('form[name=version]');
            },
            checkParams: function(){
                var me = this;

                var pt = me.pt.val();

                if(pt != 0 && pt != 1){
                    alert('请选择发布平台.');
                    return false;
                }

                var name = $.trim(me.vname.val());
                if(!name){
                    alert('请输入版本名.');
                    return false;
                }

                var no = parseInt($.trim(me.no.val()));
                if(!no || typeof(no) == 'undefiend'){
                    alert('请输入正确的版本号.');
                    return false;
                }

                var desc = $.trim(me.desc.val());
                if(!name){
                    alert('请输入版本更新说明.');
                    return false;
                }

                var url = $.trim(me.url.val());
                if(!url || !url.match(/(((^https?:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)$/g)){
                    alert('请输入合法的URL.');
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

                    var curentNo = $(this).attr('data-'+me.pt.val());
                    if(curentNo >= $.trim(me.no.val())){
                        alert('请检查您输入的版本号是否低于当前版本号.');
                        return false;
                    }

                    var formdata = me.form.serialize();
                    $.post('/version/publish', formdata, function(json){
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