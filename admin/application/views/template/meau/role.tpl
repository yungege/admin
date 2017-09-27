{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}菜单及权限管理 / 角色管理 <a class="btn btn-xs btn-primary" href="javascript:void(0)" id="add-role">新建角色</a>{%/block%}
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
                    <th>角色名称</th>
                    <th>描述</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                {%foreach from=$list item=row%}
                <tr data-seria="{%$row|serialize%}">
                    <td>{%$row._id%}</td>
                    <td>{%$row.name%}</td>
                    <td>{%$row.desc%}</td>
                    <td>
                        <a data-pid="{%$row._id%}" data-pname="{%$row.name%}" class="add-s-cate cate-add btn btn-xs btn-success" href="javascript:void(0)"><span class='fa fa-user'></span> 分配权限</a>&nbsp;
                        <a id="edit-role" data-id="{%$row._id%}" data-name="{%$row.name%}" data-desc="{%$row.desc%}" class="btn btn-xs btn-primary" href="javascript:void(0)"><span class='fa fa-edit'></span> 编辑</a>&nbsp;
                    </td>
                </tr>
                {%/foreach%}
            </tbody>
        </table>
    </div>
</div>

<!-- 新增角色 -->
<div class="add-role-fix">
    <div class="inner-box">
        <h4>新增角色</h4>
        <hr>
        <form name="add-role" class="form">
            <div class="form-group">
                <label>角色名称</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>描述</label>
                <textarea class="form-control" name="desc" style="max-width: 100%;"></textarea>
            </div>
            <a class="btn btn-primary sub-r" href="javascript:void(0)">提&emsp;交</a>
            <a class="btn btn-danger can-r" href="javascript:void(0)">取&emsp;消</a>
        </form>
    </div>
</div>

<!-- 编辑 -->
<div class="edit-role-fix">
    <div class="inner-box">
        <h4>编辑角色</h4>
        <hr>
        <form name="edit-role" class="form">
            <div class="form-group">
                <label>角色名称</label>
                <input type="text" class="form-control" name="name" id="uname">
            </div>
            <div class="form-group">
                <label>描述</label>
                <textarea class="form-control" id="udesc" name="desc" style="max-width: 100%;"></textarea>
            </div>
            <input type="hidden" name="_id" id="rid">
            <a class="btn btn-primary sub-e" href="javascript:void(0)">提&emsp;交</a>
            <a class="btn btn-danger can-e" href="javascript:void(0)">取&emsp;消</a>
        </form>
    </div>
</div>

{%/block%}

{%block name="js"%}
<script>
$(function(){
    var role = {
        init: function(){
            this.getDom();
            this.showRoleAddBox();
            this.hideRoleAddBox();
            this.postRole();
        },
        getDom: function(){
            // 新增
            this.addFixBox = $('.add-role-fix');
            this.addForm = $('form[name=add-role]');
            this.showAddBtn = $('#add-role');
            this.hideAddBtn = $('.can-r');
            this.subAddBtn = $('.sub-r');

            // 编辑
            this.editFixBox = $('.edit-role-fix');
            this.editForm = $('form[name=edit-role]');
            this.showEditBtn = $('#edit-role');
            this.hideEditBtn = $('.can-e');
            this.subEditBtn = $('.sub-e');
            this.idInt = $('#rid');
            this.nameInt = $('#uname');
            this.descInt = $('#udesc');
        },
        showRoleAddBox: function(){
            var me = this;
            me.showAddBtn.unbind().bind('click', function(){
                me.addFixBox.fadeIn(200);
            });

            me.showEditBtn.unbind().bind('click', function(){
                var data = $(this).data();
                me.idInt.val(data.id);
                me.nameInt.val(data.name);
                me.descInt.val(data.desc);
                me.editFixBox.fadeIn(200);
            });
        },
        hideRoleAddBox: function(){
            var me = this;
            me.hideAddBtn.unbind().bind('click', function(){
                me.addFixBox.fadeOut(200);
                me.addForm[0].reset();
            });

            me.hideEditBtn.unbind().bind('click', function(){
                me.editFixBox.fadeOut(200);
                me.editForm[0].reset();
            });
        },
        postRole: function(){
            var me = this;
            me.subAddBtn.unbind().bind('click', function(){
                var data = me.addForm.serialize();
                $.post('/meau/addrole', data, function(json){
                    if(json.errCode == 0){
                        window.location.reload();
                    }
                    else{
                        alert(json.errMessage);
                        return false;
                    }
                });
            });

            me.subEditBtn.unbind().bind('click', function(){
                var data = me.editForm.serialize();
                $.post('/meau/addrole?type=2', data, function(json){
                    if(json.errCode == 0){
                        window.location.reload();
                    }
                    else{
                        alert(json.errMessage);
                        return false;
                    }
                });
            });
        },
    }
    role.init();
})
</script>
{%/block%}