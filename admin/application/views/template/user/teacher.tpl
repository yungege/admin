{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="css"%}
<link href="/static/bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<style type="text/css">
    .datetimepicker{
        margin-top: 50px;
    }
    .add-ugc-fix,.add-mobile-fix,.add-class-fix{
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        background-color: rgba(0,0,0,0.4);
        z-index: 9999;
        display: none;
    }
    .add-ugc-inner{
        width: 500px;
        height: auto;
        border: 1px solid white;
        background-color: white;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -15%;
        margin-left: -250px;
        border-radius: 4px;
        padding: 15px;
    }
    .add-mobile-inner{
        height: 200px;
        margin-top: -170px;
    }
    .add-class-inner{
        height: 200px;
        margin-top: -170px;
    }
    /*.add-ugc-inner > h4{
        border-bottom: 1px solid #ccc;
        padding-bottom: 5px;
    }*/
    .glyphicon-remove{
        position: absolute;
        top: 10px;
        right: 20px;
        cursor: pointer;
        padding: 10px;
    }
    .glyphicon-remove:hover{
        color: red;
    }
    .run-type,.normal,.punch-type{
        display: none;
    }
    .homework-inner{
        border: 1px solid #31b0d5;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 15px;
    }
    .checkbox-inline+.checkbox-inline, .radio-inline+.radio-inline,.radio-inline{
        margin-left: 0;
        margin-right: 10px;
    }
</style>
{%/block%}
{%block name="bread"%}用户管理 / 老师管理<a href="/teacher/add" class="btn btn-primary btn-sm" style="margin-left: 10px;">添加老师</a>{%/block%}
{%block name="content"%}
<div class="row">
    <div class="col-lg-12">
        <form method="get" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="form-horizontal row">

                        <div class="col-md-4">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">班级ID：</label>
                                <div class="col-md-8">
                                    <input type="text" name="cid" class="input-sm form-control" value="{%$smarty.get.cid%}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">所在学校ID：</label>
                                <div class="col-md-8">
                                   <input type="text" name="sid" class="input-sm form-control" value="{%$smarty.get.sid%}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="row">
                                <label class="col-md-6 paddZero control-label">老师姓名/昵称：</label>
                                <div class="col-md-6">
                                    <input type="text" name="username" class="input-sm form-control" value="{%$smarty.get.username%}">
                                </div>
                            </div>
                        </div>
                    </div><br/>
                    <div class="form-horizontal row">
                        <div class="col-md-4">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">老师ID：</label>
                                <div class="col-md-8">
                                    <input type="text" name="uid" class="input-sm form-control" value="{%$smarty.get.uid%}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">学校名：</label>
                                <div class="col-md-8">
                                    <input type="text" name="sname" class="input-sm form-control" value="{%$smarty.get.sname%}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <label class="col-md-6 paddZero control-label">老师手机：</label>
                                <div class="col-md-6">
                                    <input type="text" name="mobile" class="input-sm form-control" value="{%$smarty.get.mobile%}">
                                </div>
                            </div>
                        </div>
                    </div><br/>
                    <div class="form-horizontal row">
                        <div class="col-md-4 col-md-offset-1">
                            <button class="btn btn-info btn-sm" type="submit">查&emsp;询</button>
                            <button class="btn btn-warning btn-sm reset-btn" type="button">清除条件</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <!-- <th class="text-center">ID</th> -->
                        <th>头像</th>
                        <th>姓名/昵称</th>
                        <th>用户ID</th>
                        <th>学校</th>
                        <th>班级</th>
                        <th>平台（版本号）</th>
                        <th>绑定手机</th>
                        <!-- <th>生日</th> -->
                        <th>性别</th>
                        <th>注册日期</th>
                        <th>上次登录</th>
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=row%}
                    <tr data-uid="{%$row._id%}">
                        <td><img src="{%$row.iconurl%}?imageView2/2/w/100/h/60/q/100" width="50" height="50" style="border-radius: 25px;"></td>
                        <td>姓名：{%$row.username%}<br/>昵称：{%$row.nickname%}</td>
                        <td>{%$row._id%}</td>
                        <td><a href="/user/school?schoolid={%$row.schoolinfo.schoolid%}">{%$row.schoolinfo.schoolname%}</a></td>
                        <td>
                            {%foreach from=$row.manageclassinfo item=teacher%}
                            <a href="/user/class?classid={%$teacher.classid%}">{%$teacher.classname%}</a><br/>
                            {%/foreach%}
                            <a data-id="{%$row._id%}" class="btn btn-xs btn-primary add-class" href="javascript:void(0)">添加班级？</a>
                        </td>
                        <td>{%$row.clientsource%}<br/>{%$row.versions%}</td>
                        <td>
                            {%$row.mobileno%}<br/>
                            <a data-id="{%$row._id%}" class="btn btn-xs btn-primary add-mobile" href="javascript:void(0)">添加手机？</a>
                        </td>
                        <!-- <td>{%$row.birthday|date_format:"%Y-%m-%d"%}</td> -->
                        <td>{%if $row.sex eq 1%}女{%else%}男{%/if%}</td>
                        <td>{%$row.createtime|date_format:"%Y-%m-%d"%}</td>
                        <td>{%$row.lastlogin%}</td>
                    </tr>
                    {%/foreach%}
                </tbody>
            </table>
        </div>
        
        <div class="text-center tt-page">
            {%$page%}
        </div>
        
    </div>
</div>

<div class="add-mobile-fix">
    <div class="add-ugc-inner add-mobile-inner">
        <h4>新增绑定关系</h4>
        <i class="glyphicon glyphicon-remove"></i>
        <form name="relation">
            <div class="form-group">
                <label for="re-mobile">手机号码</label>
                <input type="text" class="form-control" id="re-mobile" name="re-mobile">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="user-type" name="user-type" value="2">
            </div>
            <div class="form-group">
              <!--   <label for="re-name">绑定人</label> -->
                <input type="hidden" class="form-control" id="re-name" name="re-name" value="自己">
            </div>
            <div class="form-group">
                <!-- <label for="re-name">绑定关系</label> -->
                <input type="hidden" class="form-control" id="re-sel" name="re-sel" value="7">
            </div>
            <input type="hidden" name="uid" id="hide-uid">
            <button id="re-sub" type="button" class="btn btn-primary pull-right">Submit</button>
        </form>
    </div>
</div>

<div class="add-class-fix">
    <div class="add-ugc-inner add-class-inner">
        <h4>添加班级</h4>
        <i class="glyphicon glyphicon-remove"></i>
        <form name="class">
            <div class="form-group">
                <label for="classid">班级ID</label>
                <input type="text" class="form-control" id="classid" name="classid">
            </div>
            <input type="hidden" name="uid" id="hide-uid-class">
            <input type="hidden" name="type" id="type-class" value="1">
            <button id="re-sub-class" type="button" class="btn btn-primary pull-right">Submit</button>
        </form>
    </div>
</div>


{%/block%}

{%block name="js"%}
<script src="/static/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">

!(function(){
    var student = {

        init: function (){
            this.getDom();
            this.clickCloseFix();
            this.initDate();
            this.resetForm();
            this.addRelation();
            this.postRelationData();
            this.addClass();
            this.postClassData();
        },

        initDate: function(){
            var me = this;
            me.dateBtn.datetimepicker({
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                minView: 2,
                endDate: new Date(),
            })
        },

        getDom: function(){
            this.ugcBtn = $('.addUgc');
            this.form = $('form[name=ugc]');
            this.fixBox = $('.add-ugc-fix');
            this.closeFixBoxBtn = $('.glyphicon-remove');
            this.subBtn = $('#sub');
            this.resetBtn = $('.reset-btn');
            this.dateBtn = $('.wtime');
            this.uname = $('#uname');
            this.htype = $('.htype');
            this.runTypeDiv = $('.run-type');
            this.punchTypeDiv = $('.punch-type');
            this.normalDiv = $('.normal');
            this.workarea = $('.homework-inner');

            this.reBtn = $('.add-mobile');
            this.reFixBox = $('.add-mobile-fix');
            this.reBtnClass = $('.add-class');
            this.reFixBoxClass = $('.add-class-fix');
            this.reSubBtn = $('#re-sub');
            this.reSubBtnClass = $('#re-sub-class');
            this.hideUid = $('#hide-uid');
            this.hideUidClass = $('#hide-uid-class');
            this.reMobile = $('#re-mobile');
            this.reName = $('#re-name');
            this.reSel = $('#re-sel');
            this.reForm = $('form[name=relation]');
            this.reFormClass = $('form[name=class]');
        },

        // 清楚查询条件
        resetForm: function(){
            var me = this;
            me.resetBtn.unbind().bind('click', function(){
                me.form.submit();
            });
        },

        hideDialog: function(){

            var me = this;
            me.fixBox.fadeOut(200);
            me.subBtn.attr('data-uid', '');
            me.subBtn.attr('data-cid', '');
            me.uname.text('');
            me.reFixBox.fadeOut(200);
            me.reFixBoxClass.fadeOut(200);
            me.hideUid.val('');
            me.reForm[0].reset();
        },

        clickCloseFix: function(){
            var me = this;
            me.closeFixBoxBtn.click(function(){
                me.hideDialog();
            });
        },

        addClass: function(){
            var me = this;
            me.reBtnClass.unbind().bind('click', function(){
                var uid = $.trim($(this).data('id'));
                me.hideUidClass.val(uid);
                me.reFixBoxClass.fadeIn(200);
            });
        },

        postClassData: function(){
            var me = this;
            me.reSubBtnClass.unbind().bind('click',function(){

                var data = me.reFormClass.serialize();

                 $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '/user/addclass', data,
                    success: function(json){

                        if(json.errCode == 0){
                            window.location.reload();
                        }
                        else{
                            alert(json.errMessage);
                            return false;
                        }
                    },
                });
            });
        },

        addRelation: function(){
            var me = this;
            me.reBtn.unbind().bind('click', function(){
                var uid = $.trim($(this).data('id'));
                me.hideUid.val(uid);
                me.reFixBox.fadeIn(200);
            });
        },

        postRelationData: function(){
            var me = this,
                aj = null;
            me.reSubBtn.unbind().bind('click', function(){
                var data = me.reForm.serialize();

                aj = $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '/user/addrelation', data,
                    success: function(json){
                       
                        if(json.errCode == 0){
                            window.location.reload();
                        }
                        else{
                            alert(json.errMessage);
                            return false;
                        }
                    },
                    beforeSend: function () {
                        if(aj != null) {
                            aj.abort();
                        }
                    },
                });
            });
        },

    };

    student.init();
})()
</script>

{%/block%}
