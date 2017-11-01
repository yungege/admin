{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="css"%}
<link href="/static/bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<style type="text/css">
    .datetimepicker{
        margin-top: 50px;
    }
    .add-ugc-fix,.add-mobile-fix{
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
        height: 340px;
        margin-top: -170px;
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
{%block name="bread"%}用户管理 / 学生管理<a href="/student/add" class="btn btn-primary btn-sm" style="margin-left: 10px;">添加学生</a>{%/block%}
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
                    </div><br/>
                    <div class="form-horizontal row">
                        <div class="col-md-4">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">学生ID：</label>
                                <div class="col-md-8">
                                    <input type="text" name="uid" class="input-sm form-control" value="{%$smarty.get.uid%}">
                                </div>
                            </div>
                        </div>
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
                        <td>
                            <a href="/user/class?classid={%$row.classinfo.classid%}">{%$row.classinfo.classname%}</a><br/>
                            <a class="btn btn-xs btn-primary" href="?cid={%$row.classinfo.classid%}">只看本班？</a>
                        </td>
                        <td>{%$row.clientsource%}<br/>{%$row.versions%}</td>
                        <td>
                            {%$row.mobileno%}<br/>
                            <a data-id="{%$row._id%}" class="btn btn-xs btn-primary add-mobile" href="javascript:void(0)">添加手机？</a>
                        </td>
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
                            <a data-uname="{%$row.username%}" data-uid="{%$row._id%}" data-cid="{%$row.classinfo.classid%}" href="javascript:void(0)" class="btn btn-danger btn-xs addUgc">补作业及打卡</a>
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
        <h4>补作业&emsp;&emsp;<small>学生信息：<span id="uname"></span></small></h4>
        <i class="glyphicon glyphicon-remove"></i>
        <form name="ugc" class="ugcform">
            <div class="form-group">
                <label>作业时间</label>
                <input readonly="true" data-type="time" name="wtime" type="text" class="form-control wtime date" data-date-format="yyyy-mm-dd" value="{%$today%}" />
            </div>
            <div class="form-group">
                <label>作业类型</label>
                <select class="form-control htype" name="htype">
                    <option value="-1">请选择作业类型</option>
                    <option value="1">翻转课堂</option>
                    <option value="2">身体素质</option>
                    <option value="3">跑步作业</option>
                    <option value="4">课外活动打卡</option>
                </select>
            </div>

            <!-- 翻转课堂 + 身体素质 -->
            <div class="normal">
                <label>请选择作业</label><br/>
                <div class="homework-inner">
                </div>
            </div>
            
            <!-- 跑步 -->
            <div class="run-type">
                <div class="form-group">
                    <label>跑步时长(sec)</label>
                    <input class="form-control" type="text" name="time_cost">
                </div>
                <div class="form-group">
                    <label>跑步距离(km)</label>
                    <input class="form-control" type="text" name="distance">
                </div>
            </div>

            <!-- 课外作业替换 -->
            <div class="punch-type">
                <div class="form-group">
                    <label>教育机构</label>
                    <input class="form-control" type="text" name="school_name">
                </div>
                <div class="form-group">
                    <label>教育机构联系电话</label>
                    <input class="form-control" type="text" name="school_mobile">
                </div>
                <div class="form-group">
                    <label>课外活动项目</label>
                    <input class="form-control" type="text" name="train_name">
                </div>
            </div>
            
            <button id="sub" type="button" class="btn btn-default pull-right">Submit</button>
        </form>
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
                <label for="re-name">家长姓名</label>
                <input type="text" class="form-control" id="re-name" name="re-name">
            </div>
            <div class="form-group">
                <label for="re-sel">绑定关系</label>
                <select class="form-control" id="re-sel" name="re-sel">
                    <option value="-1">请选择绑定关系</option>
                    <option value="1">父亲</option>
                    <option value="2">母亲</option>
                    <option value="3">外公</option>
                    <option value="4">外婆</option>
                    <option value="5">爷爷</option>
                    <option value="6">奶奶</option>
                    <option value="7">其他</option>
                </select>
            </div>
            <input type="hidden" name="uid" id="hide-uid">
            <button id="re-sub" type="button" class="btn btn-primary pull-right">Submit</button>
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
            this.addUgc();
            this.clickCloseFix();
            this.postData();
            this.initDate();
            this.matchHomework();

            this.resetForm();

            this.addRelation();
            this.postRelationData();
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
            this.reSubBtn = $('#re-sub');
            this.hideUid = $('#hide-uid');
            this.reMobile = $('#re-mobile');
            this.reName = $('#re-name');
            this.reSel = $('#re-sel');
            this.reForm = $('form[name=relation]');
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
            me.workarea.html('');
            me.form[0].reset();
            me.normalDiv.slideUp(200);
            me.runTypeDiv.slideUp(200);
            me.punchTypeDiv.slideUp(100);

            me.reFixBox.fadeOut(200);
            me.hideUid.val('');
            me.reForm[0].reset();
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
                    cid = $.trim($(this).data('cid')),
                    sname = $.trim($(this).data('uname'))
                me.subBtn.attr('data-uid', uid);
                me.subBtn.attr('data-cid', cid);
                me.uname.text(sname);
                
                me.fixBox.fadeIn(200);
            })
        },

        // 根据时间和作业类型匹配作业信息
        matchHomework: function(){
            var me = this;

            // date
            me.dateBtn.on('changeDate', function(){
                var htype = me.htype.val();
                me.xhrGetHomework(htype);
            });

            // htype
            me.htype.on('change', function(){
                me.xhrGetHomework($(this).val());
            })
        },

        xhrGetHomework: function(type){
            var me = this;
            var uid = me.subBtn.attr('data-uid'),
                cid = me.subBtn.attr('data-cid'),
                date = me.dateBtn.val(),
                work = [
                    '翻转课堂作业',
                    '身体素质作业',
                ];

            if(type == -1){
                me.punchTypeDiv.slideUp(100);
                me.normalDiv.slideUp(100);
                me.runTypeDiv.slideUp(100);
                me.workarea.html('');
                return;
            }
            else if(type == 3){
                me.normalDiv.hide();
                me.punchTypeDiv.hide();
                me.runTypeDiv.slideDown(100);
                me.workarea.html('');
                me.subBtn.show();
                return;
            }
            else if(type == 4){
                me.runTypeDiv.hide();
                me.normalDiv.hide();
                me.punchTypeDiv.slideDown(100);
                me.workarea.html('');
                me.subBtn.show();
                return;
            }
            else{
                me.runTypeDiv.hide();
                me.punchTypeDiv.hide();

                if(!date || (type != 2 && type != 1)){
                    me.workarea.html('');
                    return;
                };
                me.normalDiv.slideDown(100);

                $.get(
                    '/homework/match?cid='+cid+'&uid='+uid+'&type='+type+'&date='+date,
                    function(json){
                        if(json.data.works.length == 0){
                            me.workarea.html('该学生在 ' + date + ' 无 ' + work[type-1]);
                            me.subBtn.hide();
                        }
                        else{
                            var checkBox = '';
                            for(var i in json.data.works){
                                checkBox = '<h5>'+(parseInt(i)+1)+'、'+json.data.works[i].name+'</h5>';
                                $.each(json.data.works[i].projects, function(k,v){
                                    var kval = json.data.works[i]._id+'|'+v.sku_id+'|'+v.calorie+'|'+v.time+'|'+v.action;
                                    checkBox += '<label class="radio-inline"><input type="radio" name="h-pid" value="'+kval+'">' + v.name+'('+v.calorie+'千卡)' + '</label>';
                                });
                                
                            }
                            me.workarea.html(checkBox);
                            me.subBtn.show();
                        }
                    }
                );
            }
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
                    url: '/user/addRelation', data,
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

        postData: function(){
            var me = this,
                aj = null;
            me.subBtn.unbind().bind('click', function(){
                var uid = $.trim($(this).data('uid')),
                    cid = $.trim($(this).data('cid'));

                var htype = me.htype.val();

                if(!uid || !cid){
                    alert('参数错误.');
                    return false;
                }

                var data = me.form.serialize() + '&uid='+uid;

                aj = $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '/user/addUgc',
                    data: data,
                    success: function(json){
                        if(json.errCode == 0){

                            if(htype == 4){
                                alert('添加成功');
                                window.location = "/sport/ugc?uid=" + uid + '&type=4';
                            }else{
                                window.location = "/sport/ugc?uid=" + uid;
                            }
                            
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
