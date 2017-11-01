{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}菜单及权限管理 / URL管理 <a class="btn btn-xs btn-primary" href="javascript:void(0)" id="add-url">新建URI</a>{%/block%}
{%block name="css"%}
<style type="text/css">
    .add-role-fix,.edit-role-fix{
        width: 100%;
        height: 100%;
        overflow-y: scroll;
        position: fixed;
        top: 0;
        left: 0;
        background-color: rgba(0,0,0,.3);
        z-index: 9999;
        display: none;
    }
    .inner-box{
        background-color: white;
        width: 500px;
        /*height: 200px;*/
        border: 1px solid #999;
        border-radius: 3px;
        margin: 10% auto 0;
        box-shadow: 0 0 15px rgba(0,0,0,0.5);
        padding: 15px 15px 25px 15px;
    }
    .url-a{
        color: #65CEA7;
        display: inline-block;
    }
</style>
{%/block%}
{%block name="content"%}

<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped table-bordered" style="color: #7a7676;">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>URL</th>
                    <th>备注信息</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                {%foreach from=$list item=row key=index%}
                <tr data-seria="{%$row|serialize%}">
                    <td><script type="text/javascript">document.write({%$index%}+1)</script></td>
                    <td>{%$row._id%}</td>
                    <td><a class="url-a" href="javascript:void(0)">{%$row.url%}</a></td>
                    <td>{%$row.remark%}</td>
                    <td>
                       <!--  <a data-pid="{%$row._id%}" data-pname="{%$row.name%}" class="add-s-cate cate-add btn btn-xs btn-success" href="/meau/assgin?rid={%$row._id%}"><span class='fa fa-user'></span> 分配权限</a>&nbsp;
                        <a data-id="{%$row._id%}" data-name="{%$row.name%}" data-desc="{%$row.desc%}" class="btn btn-xs btn-primary edit-role" href="javascript:void(0)"><span class='fa fa-edit'></span> 编辑</a>&nbsp; -->
                    </td>
                </tr>
                {%/foreach%}
            </tbody>
        </table>
    </div>
</div>

<!-- 新增Url -->
<div class="add-role-fix">
    <div class="inner-box">
        <h4>新增URI</h4>
        <hr>
        <form name="add-uri" class="form">
            <div class="form-group">
                <label>URI</label>
                <input type="text" class="form-control" name="url" placeholder="/url/index">
            </div>
            <div class="form-group">
                <label>备注</label>
                <input type="text" class="form-control" name="remark" placeholder="起个名字 方便辨识">
            </div>
            <a class="btn btn-primary sub-r" href="javascript:void(0)">提&emsp;交</a>
            <a class="btn btn-danger can-r" href="javascript:void(0)">取&emsp;消</a>
        </form>
    </div>
</div>

{%/block%}

{%block name="js"%}
<script>
$(function(){
    var addUri = {
        init: function(){
            this.getDom();
            this.showBox();
            this.hideBox();
            this.postData();
        },
        getDom: function(){
            this.fixBox = $('.add-role-fix');
            this.showBtn = $('#add-url');
            this.hideBtn = $('.can-r');
            this.subBtn = $('.sub-r');
            this.form = $('form[name=add-uri]');
            this.dialogDom = {};
        },
        showBox: function(){
            var me = this;
            me.showBtn.bind('click', function(){
                me.fixBox.fadeIn(200);
            });
        },
        hideBox: function(){
            var me = this;
            me.hideBtn.bind('click', function(){
                me.fixBox.fadeOut(200);
                me.form[0].reset();
            });
        },
        postData: function(){
            var me = this;
            me.subBtn.bind('click', function(){
                var data = me.form.serialize();
                $.post('/meau/adduri', data, function(res){
                    if(res.errCode == 0){
                        window.location.reload();
                    }
                    else{
                        me.alertMsg(res.errMessage, 'fail');
                    }
                })
            })
        },
        alertMsg: function(text, name){
            var me = this,
                buttons = {
                    '确定' : function(){
                        me.dialogDom.name.destroy();
                    },
                };

            me.dialogDom.name = jqueryAlert({
                'title'   : '',
                'content' : text,
                'modal'   : true,
                'buttons' : buttons
            });

            return false;
        },
    }

    addUri.init();
})
</script>
{%/block%}