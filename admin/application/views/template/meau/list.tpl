{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}菜单及权限管理 / 菜单管理 <a class="btn btn-xs btn-primary" href="javascript:void(0)" id="add-f-cate">新建菜单</a>{%/block%}
{%block name="css"%}
<style type="text/css">
    .table>tbody>tr>td,.table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
        vertical-align: middle;
        height: 45px;
    }
    .add-f-cate-fix{
        width: 100%;
        height: 100%;
        overflow-y: scroll;
        position: fixed;
        top: 0;
        left: 0;
        background-color: rgba(0,0,0,.3);
        z-index: 9999;
    }
    .inner-box{
        background-color: white;
        width: 500px;
        /*height: 200px;*/
        border: 1px solid #999;
        border-radius: 3px;
        margin: 10% auto 0;
        box-shadow: 0 0 15px rgba(0,0,0,0.5);
        padding: 15px;
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
                           <a data-pid="{%$row._id%}" class="cate-add btn btn-xs btn-success" href="javascript:void(0)"><span class='fa fa-plus'></span> 子菜单</a>&nbsp;
                        {%/if%}
                        <a data-id="{%$row._id%}" data-name="{%$row.name%}" data-sort="{%$row.sort%}" class="cate-edit btn btn-xs btn-primary" href="javascript:void(0)"><span class='fa fa-edit'></span> 编辑</a>&nbsp;
                    </td>
                </tr>
                {%/foreach%}
            </tbody>
        </table>
    </div>
</div>

<div class="add-f-cate-fix">
    <div class="inner-box">
        <h4>新增一级菜单</h4>
        <hr>
        <form name="add-f-cate" class="form">
            <div class="form-group">
                <label>菜单名</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>排序</label>
                <input type="text" class="form-control" name="sort">
            </div>
            <div class="form-group">
                <label>图标样式</label>
                <input type="text" class="form-control" name="icon_style">
            </div>
            <a class="btn btn-primary" href="javascript:void(0)">提&emsp;交</a>
            <a class="btn btn-danger" href="javascript:void(0)">取&emsp;消</a>
        </form>
    </div>
</div>

{%/block%}

{%block name="js"%}

{%/block%}