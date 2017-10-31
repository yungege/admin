{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}菜单及权限管理 / 权限分配{%/block%}
{%block name="css"%}
<style type="text/css">
    .table>tbody>tr>td,.table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
        vertical-align: middle;
        height: 45px;
    }
    .all-checked-label{
        cursor: pointer;
        line-height: 1;
    }
    #cy-all-checked{
        vertical-align: top;
    }
</style>
<link href="/static/widget/icheck/square/green.css" rel="stylesheet">
{%/block%}
{%block name="content"%}

<div class="row">
    <div class="col-lg-12">
        <form name="url">
            <table class="table table-striped table-bordered" style="color: #7a7676;">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 100px;">
                            <label for="cy-all-checked" class="all-checked-label">全选</label>
                            <input id="cy-all-checked" type="checkbox"/>
                        </th>
                        <th>URL</th>
                        <th>备注信息</th>
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=row%}
                    <tr>
                        <td class="text-center"><input class="cy-icheck" type="checkbox" name="urls[]" value="{%$row.url%}" {%if $row.url|in_array:$myList.url%}checked{%/if%}/></td>
                        <td><a href="javascript:viod(0)" style="color: #65CEA7;">{%$row.url%}</a></td>
                        <td>{%$row.remark%}</td>
                    </tr>
                    {%/foreach%}
                </tbody>
            </table>
            <input type="hidden" name="rid" value="{%$smarty.get.rid%}">
        </form>
        <a id="sub" class="btn btn-md btn-primary" href="javascript:void(0)">保 存</a>
    </div>
</div>

{%/block%}

{%block name="js"%}
<script src="/static/widget/icheck/icheck.min.js"></script>
<script>
$(function(){
    $('.cy-icheck').iCheck({
        checkboxClass: 'icheckbox_square-green',
        increaseArea: '20%' // optional
    });

    var assgin = {
        init: function(){
            this.getDom();
            this.checkAll();
            this.checkAllStatus();
            this.postData();
        },

        getDom: function(){
            this.checkBtn = $('#cy-all-checked');
            this.urlChecks = $('.cy-icheck');
            this.subBtn = $('#sub');
            this.form = $('form[name=url]');
            this.dialogDom = {};
        },

        checkAll: function(){
            var me = this;
            me.checkBtn.change(function(){
                var checkStatus = $(this).prop('checked');
                var newStatus = checkStatus == true ? 'check' : 'uncheck';
                me.urlChecks.iCheck(newStatus);
            });
        },

        checkAllStatus: function(){
            var me = this;
            me.urlChecks.bind('ifChanged', function(){
                var sta = $(this).prop('checked');
                if(sta === false){
                    me.checkBtn.prop('checked', false);
                }
            })
        },

        postData: function(){
            var me = this;
            me.subBtn.bind('click', function(){
                var data = me.form.serialize();
                $.post('/meau/assginurl', data, function(res){
                    if(res.errCode == 0){
                        me.alertMsg('保存成功', 'succ');
                    }
                    else{
                        me.alertMsg(res.errMessage, 'fail');
                        return false;
                    }
                })
            })
        },

        alertMsg: function(text, name){
            var me = this;

            if(name == 'fail'){
                var buttons = {
                    '确定' : function(){
                        me.dialogDom.name.destroy();
                    },
                };
            }
            else{
                var buttons = {
                    '确定' : function(){
                        window.location.reload();
                    },
                };
            }

            me.dialogDom.name = jqueryAlert({
                'title'   : '',
                'content' : text,
                'modal'   : true,
                'buttons' : buttons
            });

            return false;
        },
    };

    assgin.init()
})
</script>
{%/block%}