{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}菜单及权限管理 / 角色分配{%/block%}
{%block name="css"%}
<link rel="stylesheet" type="text/css" href="/static/widget/switch/bootstrap-switch.min.css">
<style type="text/css">
    
</style>
{%/block%}
{%block name="content"%}

<div class="row">
    <div class="col-lg-12">
        <h5>管理员 ：{%$nickname%}</h5>
        <table class="table table-striped table-bordered" style="color: #7a7676;">
            <thead>
                <tr>
                    <th></th>
                    <th>角色名称</th>
                    <th>描述</th>
                </tr>
            </thead>
            <tbody>
                {%foreach from=$list item=row%}
                <tr>
                    <td class="text-center" style="width: 200px;">
                        <input type="radio" data-on-color="success" name="role" class="switch" value="{%$row._id%}" {%if $row._id eq $myRole%} checked="true" {%/if%}>
                    </td>
                    <td>{%$row.name%}</td>
                    <td>{%$row.desc%}</td>
                </tr>
                {%/foreach%}
            </tbody>
        </table>
        <a href="javascript:void(0)" id="sub-b" class="btn btn-primary" data-uid="{%$smarty.get._id%}">保 存</a>
        <a href="" class="btn btn-danger">取 消</a>
    </div>
</div>

{%/block%}

{%block name="js"%}
<script src="/static/widget/switch/bootstrap-switch.min.js"></script>
<script>
$(function(){
    $('.switch').bootstrapSwitch({
        size:"small",  
    });

    $('#sub-b').unbind().bind('click', function(){
        var data = {
            'rid' : $('.switch:checked').val(),
            'uid' : $(this).data('uid'),
        };

        $.post('/meau/allotrole', data, function(json){
            window.location.href = '/meau/admin';
        });
    })
    
})
</script>
{%/block%}