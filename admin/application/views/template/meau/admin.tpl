{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}菜单及权限管理 / 管理员{%/block%}
{%block name="css"%}
<style type="text/css">
    
</style>
{%/block%}
{%block name="content"%}

<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped table-bordered" style="color: #7a7676;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>管理员</th>
                    <th>手机</th>
                    <th>所属角色</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                {%foreach from=$list item=row%}
                <tr>
                    <td>{%$row._id%}</td>
                    <td>{%$row.nickname%}</td>
                    <td>{%$row.mobile%}</td>
                    <td>{%$row.role_info.role_name%}</td>
                    <td>
                        <a class="add-s-cate cate-add btn btn-xs btn-success" href="/meau/allotrole?_id={%$row._id%}"><span class='fa fa-user'></span> 授权</a>
                    </td>
                </tr>
                {%/foreach%}
            </tbody>
        </table>
    </div>
</div>

{%/block%}

{%block name="js"%}
<script>
$(function(){
    
})
</script>
{%/block%}