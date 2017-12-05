{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}菜单及权限管理 / 管理员<a class="btn btn-xs btn-primary" href="javascript:void(0)" id="add-admin">新建管理员</a>{%/block%}
{%block name="css"%}
<style type="text/css">
    .add-admin-fix {
        width: 100%;
        height: 100%;
        overflow-y: scroll;
        position: fixed;
        top: 0;
        left: 0;
        background-color:rgba(0,0,0,.3);
        z-index: 9999;
        display: none;
    }
    .inner-box{
        background-color: white;
        width: 500px;
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
                        <a class="add-s-cate admin-del btn btn-xs btn-danger" data-userid="{%$row._id%}"><span class='fa fa-user'></span> 删除</a>
                    </td>
                </tr>
                {%/foreach%}
            </tbody>
        </table>
    </div>
</div>

<!-- 新增管理员 -->
<div class="add-admin-fix">
    <div class="inner-box">
        <h4>新建管理员</h4>
        <br>
        <form name="add-admin" class="form">
            <div class="form-group">
                <label>管理员 ID</label>
                <input type="text" class="form-control" name="userid" id="userid" placehold="User Id">
            </div>
            <div class="form-group">
                <label>手机账号</label>
                <input type="text" class="form-control" name="mobileno" id="mobileno" placehold="phone">
            </div>
            <div class="form-group">
                <label>角色选择</label>
                <br>
                <select class="form-control" id="role-select" name="role">
                    
                </select>
            </div>
             <div class="form-group">
                <label>设置用户密码</label>
                <input type="password" class="form-control" name="passwd" id="passwd" placehold="password">
            </div>
             <div class="form-group">
                <label>确认用户密码</label>
                <input type="password" class="form-control" name="cpasswd" id="cpasswd" placehold="confirm">
            </div>

            <a class="btn btn-primary sub-i" href="javascript:void(0)">提&emsp;交</a>
            <a class="btn btn-danger can-i" href="javascript:void(0)">取&emsp;消</a>
        </form>

    </div>
</div>

{%/block%}

{%block name="js"%}
<script>
$(function(){
    
    var admin = {

        init: function(){
            this.getDom();
            this.showAdminAddBox();
            this.hideAdminAddBox();
            this.postAdmin();
            this.delAdmin();
        },

        getDom: function(){
            this.addFixBox = $('.add-admin-fix');
            this.showAddBtn = $('#add-admin');
            this.hideAddBtn = $('.can-i');
            this.adminAddBtn = $('.sub-i');
            this.roleSelect = $('#role-select');
            this.userid = $('#userid');
            this.mobileno = $('#mobileno');
            this.passwd = $('#passwd');
            this.cpasswd = $('#cpasswd');
            this.form = $('.form');
            this.adminDel = $('.admin-del');
        },

        showAdminAddBox: function(){
            var me = this;

            me.showAddBtn.unbind().bind('click',function(){
                var role = '<option value="-1" selected=selected>请选择角色</option>';
                me.roleSelect[0].innerHTML = "";

                $.get('/meau/showrole',null,function(json){
                    $.each(json.data.list,function(index,value){
                        role = role + '<option value="' + value._id + '">' + value.name +'( ' + value.desc +' )' + '</option>';
                    });
                    me.roleSelect[0].innerHTML = role;
                });

                me.addFixBox.fadeIn(200);
            });
        },

        delAdmin: function(){
            var me = this;
            me.adminDel.unbind().bind('click',function(){
                var userid = $(this).attr('data-userid');
                var data = 'userid=' + userid;
                $.post('/meau/deladmin',data,function(json){

                    if(json.errCode != 0){
                        alert("删除失败");
                    }

                    if(json.errCode == 0){
                        alert("删除成功");
                        window.location.href = "/meau/admin";
                    }
                });
            });
        },

        hideAdminAddBox: function(){
            var me = this;
            me.hideAddBtn.unbind().bind('click',function(){
                me.addFixBox.fadeOut(200);
            });
        },

        checkParams: function(){
            var me = this;
            var mobileReg = /^1[0-9]{10}$/;

            if(me.userid.val() == ""){
                alert('请输入用户ID');
                return false;
            }
            
            if(me.mobileno.val() == "" || !mobileReg.test(me.mobileno.val())){
                alert('请输手机号');
                return false;
            }

            if(me.roleSelect.val() == -1){
                alert('请选择用户角色');
                return false;
            }

            if(me.passwd.val() == ""){
                alert('请设置密码');
                return false;
            }

            if(me.cpasswd.val() == "" || me.passwd.val() != me.cpasswd.val()){
                alert('请确认密码是否输入正确');
                return false;
            }
        },

        postAdmin: function(){
            var me = this;

            me.adminAddBtn.unbind().bind('click',function(){
                if(me.checkParams() == false){
                    return false;
                }
                var data = me.form.serialize(); 
                me.checkParams();
                $.post('/meau/addadmin',data,function(json){

                    if(json.errCode == 0){
                        alert('添加成功');
                        window.location.href = "/meau/admin";
                    }else{
                        alert('添加失败');
                    }
                });
            });
        },
    }

    admin.init();
})
</script>
{%/block%}