{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}菜单及权限管理 / 菜单管理 <a class="btn btn-xs btn-primary" href="javascript:void(0)" id="add-f-cate">新建菜单</a>{%/block%}
{%block name="css"%}
<style type="text/css">
    .table>tbody>tr>td,.table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
        vertical-align: middle;
        height: 45px;
    }
    .add-f-cate-fix,.add-s-cate-fix,.edit-cate-fix{
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
                    <td>{%$row.new_sort%}</td>
                    <td>{%$row.new_name%}</td>
                    <td style="color: #65CEA7;">{%$row.url%}</td>
                    <td style="color: #65CEA7;font-size: 20px;font-weight: 700;"><i class="{%$row.icon_style%}"></i></td>
                    <td>
                        {%if $row.pid eq ''%}
                           <a data-pid="{%$row._id%}" data-pname="{%$row.name%}" class="add-s-cate cate-add btn btn-xs btn-success" href="javascript:void(0)"><span class='fa fa-plus'></span> 子菜单</a>&nbsp;
                        {%/if%}
                        <a data-id="{%$row._id%}" data-name="{%$row.name%}" data-ssort="{%$row.sort%}" data-icon="{%$row.icon_style%}" data-url="{%$row.url%}" class="cate-edit btn btn-xs btn-primary" href="javascript:void(0)"><span class='fa fa-edit'></span> 编辑</a>&nbsp;
                    </td>
                </tr>
                {%/foreach%}
            </tbody>
        </table>
    </div>
</div>

<!-- 一级菜单 -->
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
            <a class="btn btn-primary subf" href="javascript:void(0)">提&emsp;交</a>
            <a class="btn btn-danger canf" href="javascript:void(0)">取&emsp;消</a>
        </form>
    </div>
</div>
<!-- 二级菜单 -->
<div class="add-s-cate-fix">
    <div class="inner-box">
        <h4>新增二级菜单&emsp;&emsp;<small id="first-cate-name" style="color: #65CEA7;"></small></h4>
        <hr>
        <form name="add-s-cate" class="form">
            <div class="form-group">
                <label>菜单名</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>排序</label>
                <input type="text" class="form-control" name="sort">
            </div>
            <div class="form-group">
                <label>URL <small>[ /meau/list ]</small></label>
                <input type="text" class="form-control" name="url">
            </div>
            <input type="hidden" name="pid" class="pid-s">
            <a class="btn btn-primary subs" href="javascript:void(0)">提&emsp;交</a>
            <a class="btn btn-danger cans" href="javascript:void(0)">取&emsp;消</a>
        </form>
    </div>
</div>

<!-- 编辑菜单 -->
<div class="edit-cate-fix">
    <div class="inner-box">
        <h4>编辑菜单&emsp;&emsp;<small id="old-cate-name" style="color: #65CEA7;"></small></h4>
        <hr>
        <form name="edit-cate" class="form">
            <div class="form-group">
                <label>菜单名</label>
                <input type="text" class="form-control name-e" name="name">
            </div>
            <div class="form-group">
                <label>排序</label>
                <input type="text" class="form-control sort-e" name="sort">
            </div>
            <div class="form-group">
                <label>图标样式</label>
                <input type="text" class="form-control icon-e" name="icon_style">
            </div>
            <div class="form-group">
                <label>URL <small>[ /meau/list ]</small></label>
                <input type="text" class="form-control url-e" name="url">
            </div>
            <input type="hidden" name="id" class="pid-e">
            <a class="btn btn-primary sube" href="javascript:void(0)">提&emsp;交</a>
            <a class="btn btn-danger cane" href="javascript:void(0)">取&emsp;消</a>
        </form>
    </div>
</div>

{%/block%}

{%block name="js"%}
<script>
$(function(){
    var meauFirst = {
        init: function(){
            this.getDom();
            this.postMeau();
            this.cancer();
            this.showBox();
        },
        getDom: function(){
            this.form = $('form[name=add-f-cate]');
            this.subBtn = $('.subf');
            this.canBtn = $('.canf');
            this.fixBox = $('.add-f-cate-fix');
            this.showBtn = $('#add-f-cate');
        },
        postMeau: function(){
            var me = this;
            me.subBtn.unbind().bind('click', function(){
                var data = me.form.serialize();
                $.post('/meau/addfirst', data, function(json){
                    if(json.errCode == 0){
                        window.location.reload();
                    }
                    else{
                        alert(json.errMessage);
                    }
                });
            });
        },
        cancer: function(){
            var me = this;
            me.canBtn.unbind().bind('click', function(){
                me.fixBox.fadeOut(200);
                me.form[0].reset();
            })
        },
        showBox: function(){
            var me = this;
            me.showBtn.unbind().bind('click', function(){
                me.fixBox.fadeIn(200);
            })
        },
    };

    // 二级菜单
    var meauSecond = {
        init: function(){
            this.getDom();
            this.postMeau();
            this.cancer();
            this.showBox();
        },
        getDom: function(){
            this.form = $('form[name=add-s-cate]');
            this.subBtn = $('.subs');
            this.canBtn = $('.cans');
            this.fixBox = $('.add-s-cate-fix');
            this.showBtn = $('.add-s-cate');
            this.pname = $('#first-cate-name');
            this.pid = $('.pid-s');
        },
        postMeau: function(){
            var me = this;
            me.subBtn.unbind().bind('click', function(){
                var data = me.form.serialize();
                $.post('/meau/addfirst?type=2', data, function(json){
                    if(json.errCode == 0){
                        window.location.reload();
                    }
                    else{
                        alert(json.errMessage);
                    }
                });
            });
        },
        cancer: function(){
            var me = this;
            me.canBtn.unbind().bind('click', function(){
                me.fixBox.fadeOut(200);
                me.form[0].reset();
            })
        },
        showBox: function(){
            var me = this;
            me.showBtn.unbind().bind('click', function(){
                var pid = $(this).data('pid'),
                    pname = $(this).data('pname');
                me.pname.text('父级菜单：'+pname);
                me.pid.val(pid);
                me.fixBox.fadeIn(200);
            })
        },
    };

    // 编辑
    var meauEdit = {
        init: function(){
            this.getDom();
            this.postMeau();
            this.cancer();
            this.showBox();
        },
        getDom: function(){
            this.form = $('form[name=edit-cate]');
            this.subBtn = $('.sube');
            this.canBtn = $('.cane');
            this.fixBox = $('.edit-cate-fix');
            this.showBtn = $('.cate-edit');
            this.cname = $('#old-cate-name');
            this.cid = $('.pid-e');
            this.csort = $('.sort-e');
            this.cicon = $('.icon-e');
            this.curl = $('.url-e');
            this.new_cname = $('.name-e');
        },
        postMeau: function(){
            var me = this;
            me.subBtn.unbind().bind('click', function(){
                var data = me.form.serialize();
                $.post('/meau/addfirst?type=3', data, function(json){
                    if(json.errCode == 0){
                        window.location.reload();
                    }
                    else{
                        alert(json.errMessage);
                    }
                });
            });
        },
        cancer: function(){
            var me = this;
            me.canBtn.unbind().bind('click', function(){
                me.fixBox.fadeOut(200);
                me.form[0].reset();
                me.cicon.attr('disabled', false);
                me.curl.attr('disabled', false);
            })
        },
        showBox: function(){
            var me = this;
            me.showBtn.unbind().bind('click', function(){
                var id = $(this).data('id'),
                    name = $(this).data('name'),
                    sort = $(this).data('ssort'),
                    icon = $(this).data('icon'),
                    url = $(this).data('url');
                me.cname.text(name);
                me.cid.val(id);
                me.new_cname.val(name);
                me.csort.val(sort);
                me.curl.val(url);
                me.cicon.val(icon);
                if(icon.length == 0){
                    me.cicon.attr('disabled', true);
                }
                if(url == '#'){
                    me.curl.attr('disabled', true);
                }
                me.fixBox.fadeIn(200);
            })
        },
    };

    meauFirst.init();
    meauSecond.init();
    meauEdit.init();
})
</script>
{%/block%}