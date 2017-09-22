{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}菜单及权限管理 / 菜单管理{%/block%}
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
                    <th>ID</th>
                    <th>排序</th>
                    <th>菜单名称</th>
                    <th>URL</th>
                    <th>图标样式</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                {%foreach from=$list item=row%}
                <tr data-seria="{%$row|serialize%}">
                    <td>{%$row._id%}</td>
                    <td>{%$row.sort%}</td>
                    <td>{%$row.new_name%}</td>
                    <td style="color: #65CEA7;">{%$row.url%}</td>
                    <td style="color: #65CEA7;font-size: 20px;font-weight: 700;"><i class="{%$row.icon_style%}"></i></td>
                    <td>
                        {%if $row.pid eq ''%}
                           <a data-pid="{%$row._id%}" class="cate-add btn btn-xs btn-success" href="javascript:void(0)"><span class='fa fa-plus'></span> 子类</a>&nbsp;
                        {%/if%}
                        <a data-id="{%$row._id%}" data-name="{%$row.name%}" data-sort="{%$row.sort%}" class="cate-edit btn btn-xs btn-primary" href="javascript:void(0)"><span class='fa fa-edit'></span> 编辑</a>&nbsp;
                    </td>
                </tr>
                {%/foreach%}
            </tbody>
        </table>
    </div>
</div>

{%/block%}

{%block name="js"%}

{%/block%}