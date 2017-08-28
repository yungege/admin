{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="css"%}
<style type="text/css">
    .add-ugc-fix{
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
        height: 200px;
        border: 1px solid white;
        background-color: white;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -100px;
        margin-left: -250px;
        border-radius: 4px;
        padding: 10px;
    }
    .add-ugc-inner > h4{
        border-bottom: 1px solid #ccc;
        padding-bottom: 5px;
    }
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
    
</style>
{%/block%}
{%block name="bread"%}用户管理 / 学生管理{%/block%}
{%block name="content"%}
<div class="row">
    <div class="col-lg-12">
        <form method="get" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="form-horizontal row">

                        <div class="col-md-3">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">年级：</label>

                                <div class="col-md-8">
                                    <select class="input-sm form-control" name="grade">
                                        <option value="-1">选择年级</option>
                                        {%foreach from=$grade item=val key=idx%}
                                        <option {%(isset($smarty.get.grade) && ($idx == $smarty.get.grade)) ? 'selected' : ''%} value="{%$idx%}" >{%$val%}</option>
                                        {%/foreach%}
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="row">
                                <label class="col-md-6 paddZero control-label">学生姓名/昵称：</label>
                                <div class="col-md-6">
                                    <input type="text" name="username" class="input-sm form-control" value="{%$smarty.get.username%}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">学生ID：</label>
                                <div class="col-md-8">
                                    <input type="text" name="uid" class="input-sm form-control" value="{%$smarty.get.uid%}">
                                </div>
                            </div>
                        </div>
                    </div><br/>
                    <div class="form-horizontal row">
                        <div class="col-md-3">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">家长姓名：</label>
                                <div class="col-md-8">
                                    <input type="text" name="parentname" class="input-sm form-control" value="{%$smarty.get.parentname%}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <label class="col-md-6 paddZero control-label">家长手机：</label>
                                <div class="col-md-6">
                                    <input type="text" name="mobile" class="input-sm form-control" value="{%$smarty.get.mobile%}">
                                </div>
                            </div>
                        </div>
                    </div><br/>
                    <div class="form-horizontal row">
                        <div class="col-md-4 col-md-offset-1">
                            <button class="btn btn-info btn-sm" type="submit">查&emsp;询</button>
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
                        <th>年级</th>
                        <th>班级</th>
                        <th>平台（版本号）</th>
                        <th>绑定手机</th>
                        <th>家长</th>
                        <th>生日</th>
                        <th>性别</th>
                        <th>注册日期</th>
                        <th>上次登录</th>
                        <th>上次锻炼</th>
                        <!-- <th>关联账号</th> -->
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=row%}
                    <tr data-uid="{%$row._id%}">
                        <td><img src="{%$row.iconurl%}?imageView2/2/w/100/h/60/q/100" width="50" height="50" style="border-radius: 25px;"></td>
                        <td>姓名：{%$row.username%}<br/>昵称：{%$row.nickname%}</td>
                        <td>{%$row._id%}</td>
                        <td><a href="/user/school?schoolid={%$row.schoolinfo.schoolid%}">{%$row.schoolinfo.schoolname%}</a></td>
                        <td>{%$row.grade%}</td>
                        <td><a href="/user/class?classid={%$row.classinfo.classid%}">{%$row.classinfo.classname%}</a></td>
                        <td>{%$row.clientsource%}<br/>{%$row.versions%}</td>
                        <td>{%$row.mobileno%}</td>
                        <td>{%$row.parentname%}</td>
                        <td>{%$row.birthday|date_format:"%Y-%m-%d"%}</td>
                        <td>{%if $row.sex eq 1%}女{%else%}男{%/if%}</td>
                        <td>{%$row.createtime|date_format:"%Y-%m-%d"%}</td>
                        <td>{%$row.lastlogin%}</td>
                        <td>
                            {%if $row.lastsubmittime neq 0%}
                                {%$row.lastsubmittime|date_format:"%Y-%m-%d"%}<br/>
                                {%$row.lastsubmittime|date_format:"%H:%M:%S"%}<br/>
                            {%else%}
                                <span class="label label-warning">无记录</span>
                            {%/if%}
                        </td>
                        <!-- <td></td> -->
                        <td>
                            <a href="/sport/ugc?uid={%$row._id%}" class="btn btn-default btn-xs">UGC</a>
                            <a data-uid="{%$row._id%}" data-cid="{%$row.classinfo.classid%}" href="javascript:void(0)" class="btn btn-danger btn-xs addUgc">补交UGC</a>
                        </td>
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

<div class="add-ugc-fix">
    <div class="add-ugc-inner">
        <h4>补交UGC</h4>
        <i class="glyphicon glyphicon-remove"></i>
        <form name="ugc" class="ugcform">
            <div class="form-group">
                <label for="hid">作业 ID</label>
                <input type="text" class="form-control" id="hid" placeholder="">
            </div>
            <button id="sub" type="button" class="btn btn-default pull-right">Submit</button>
        </form>
    </div>
</div>

{%/block%}

{%block name="js"%}
<script type="text/javascript">
!(function(){
    var student = {

        init: function (){
            this.getDom();
            this.addUgc();
            this.clickCloseFix();
            this.postData();
        },

        getDom: function(){
            this.ugcBtn = $('.addUgc');
            this.form = $('form[name=ugc]');
            this.hid = $('#hid');
            this.fixBox = $('.add-ugc-fix');
            this.closeFixBoxBtn = $('.glyphicon-remove');
            this.subBtn = $('#sub');
        },

        showDialog: function(){
            var me = this;

            me.fixBox.fadeIn(200);
        },

        hideDialog: function(){
            var me = this;

            me.fixBox.fadeOut(200);
        },

        clickCloseFix: function(){
            var me = this;

            me.closeFixBoxBtn.click(function(){
                me.hideDialog();
            });
        },

        addUgc: function(){
            var me = this;

            me.ugcBtn.unbind().bind('click', function(){
                var uid = $.trim($(this).data('uid')),
                    cid = $.trim($(this).data('cid'));
                me.subBtn.attr('data-uid', uid);
                me.subBtn.attr('data-cid', cid);
                me.showDialog();
            })
        },

        postData: function(){
            var me = this,
                aj = null;
            me.subBtn.unbind().bind('click', function(){
                var uid = $.trim($(this).data('uid')),
                    cid = $.trim($(this).data('cid')),
                    hid = $.trim(me.hid.val());
                
                if(!uid || !cid || !hid){
                    alert('参数错误.');
                    return false;
                }

                aj = $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '/user/addUgc?uid=' + uid + '&cid=' + cid + '&hid=' + hid,
                    success: function(json){
                        if(json.errCode == 200){
                            window.location = "/sport/ugc?uid=" + uid;
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