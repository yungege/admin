{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}菜单及权限管理 / 权限分配{%/block%}
{%block name="css"%}
<style type="text/css">
    .table>tbody>tr>td,.table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
        vertical-align: middle;
        height: 45px;
    }
    
</style>
<link href="/static/widget/icheck/square/green.css" rel="stylesheet">
{%/block%}
{%block name="content"%}

<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped table-bordered" style="color: #7a7676;">
            <thead>
                <tr>
                    <th></th>
                    <th>URL</th>
                    <th>备注信息</th>
                </tr>
            </thead>
            <tbody>
                <form name="urls">
                {%foreach from=$list item=row%}
                <tr">
                    <td class="text-center"><input class="cy-icheck" type="checkbox" name="urls[]" value="{%$row.url%}"/></td>
                    <td><a href="javascript:viod(0)" style="color: #65CEA7;">{%$row.url%}</a></td>
                    <td>{%$row.remark%}</td>
                </tr>
                {%/foreach%}
                </form>
            </tbody>
        </table>

        <a class="btn btn-md btn-primary" href="javascript:void(0)">保 存</a>
    </div>
</div>

{%/block%}

{%block name="js"%}
<script src="/static/widget/icheck/icheck.min.js"></script>
<script>
$(function(){
    $('.cy-icheck').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
        increaseArea: '20%' // optional
    });
})
</script>
{%/block%}