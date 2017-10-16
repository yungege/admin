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
{%/block%}
{%block name="content"%}

<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped table-bordered" style="color: #7a7676;">
            <thead>
                <tr>
                    <th></th>
                    <th>菜单名称</th>
                    <th>URL</th>
                    <th>图标样式</th>
                </tr>
            </thead>
            <tbody>
                <form name="urls">
                {%foreach from=$list item=row%}
                <tr">
                    <td>{%$row.checkbox%}</td>
                    <td>{%$row.new_name%}</td>
                    <td><a href="{%$row.url%}" style="color: #65CEA7;">{%$row.url%}</a></td>
                    <td style="color: #65CEA7;font-size: 20px;font-weight: 700;"><i class="{%$row.icon_style%}"></i></td>
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
<script>

</script>
{%/block%}