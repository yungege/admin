{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="css"%}
<link href="/static/bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<style type="text/css">
.date_start,.date_end{
    float: left!important;
}
.datetimepicker{
    margin-top: 50px!important;
}
</style>
{%/block%}
{%block name="bread"%}运营管理 / UGC{%/block%}
{%block name="content"%}
<div class="row">
    <div class="col-lg-12">
        <form method="get" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="form-horizontal row">

                        <div class="col-md-2">
                            <div class="row">
                                <label class="col-md-5 paddZero control-label">作业类型：</label>

                                <div class="col-md-7">
                                    <select class="input-sm form-control" name="type">
                                        <option value="-1">选择作业类型</option>
                                        {%foreach from=$worktype item=val key=idx%}
                                        <option {%(isset($smarty.get.type) && ($idx == $smarty.get.type)) ? 'selected' : ''%} value="{%$idx%}" >{%$val%}</option>
                                        {%/foreach%}
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">学生ID：</label>
                                <div class="col-md-8">
                                    <input type="text" name="uid" class="input-sm form-control" value="{%$smarty.get.uid%}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="row">
                                <label class="col-md-3 paddZero control-label">起止日期：</label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-sm-5 input-group date date_start" data-date="" data-date-format="yyyy-mm-dd">
                                            <input readonly type="text" class="form-control" id="start" name="start" value="{%$smarty.get.start%}" >
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-5 input-group date date_end" data-date="" data-date-format="yyyy-mm-dd">
                                            <input readonly type="text" class="form-control" id="end" name="end" value="{%$smarty.get.end%}">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br/>
                    <div class="form-horizontal row">
                        <div class="col-md-2">
                            <div class="row">
                                <label class="col-md-5 paddZero control-label">是否补交：</label>
                                <div class="col-md-7">
                                    <select class="input-sm form-control" name="delay">
                                        <option value="0">是否补交作业</option>
                                        <option {%if $smarty.get.delay eq 1%} selected="true" {%/if%} value="1" >是</option>
                                        <option {%if $smarty.get.delay eq -1%} selected="true" {%/if%} value="-1" >否</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div><br/>
                    <div class="form-horizontal row">
                        <div class="col-md-2 col-md-offset-1">
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
                        <th>学生</th>
                        <th>头像</th>
                        <th>作业类型</th>
                        <th>锻炼项目</th>
                        <th>能量/千卡</th>
                        <th>跑步路程/km</th>
                        <th>开始时间</th>
                        <th>结束时间</th>
                        <th>提交时间</th>
                        <th>原始时间</th>
                        <th>是否补交</th>
                        <th>作业图片</th>
                        <th>是否分享</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=row%}
                    <tr data-id="{%$row._id%}">
                        <td>姓名：<a href="/user/student?uid={%$row.userid%}">{%$row.username%}</a><br/>昵称：<a href="/user/student?uid={%$row.userid%}">{%$row.nickname%}</a></td>
                        <td><a href="/user/student?uid={%$row.userid%}"><img src="{%$row.iconurl%}?imageView2/2/w/100/h/60/q/100" width="50" height="50" style="border-radius: 25px;"></a></td>
                        <td>{%$row.hname%}</td>
                        <td><a href="{%if $row.is_old eq 1%}javascript:void(0){%else%}/sport/p/{%$row.pid%}.html{%/if%}">{%$row.pname%}</a></td>
                        <td>{%$row.burncalories%}</td>
                        <td>
                            {%$row.distance%}<br/>
                            {%if $row.avgSpeed%}均速：{%$row.avgSpeed%} km/h{%/if%}
                        </td>
                        <td>{%$row.starttime|date_format:"%Y-%m-%d"%}<br>{%$row.starttime|date_format:"%H:%M:%S"%}</td>
                        <td>{%$row.endtime|date_format:"%Y-%m-%d"%}<br>{%$row.endtime|date_format:"%H:%M:%S"%}</td>
                        <td>{%$row.createtime|date_format:"%Y-%m-%d"%}<br>{%$row.createtime|date_format:"%H:%M:%S"%}</td>
                        <td>{%$row.originaltime|date_format:"%Y-%m-%d"%}</td>
                        <td>{%if $row.isdelay == 2%}<span class="label label-danger">是</span>{%else%}<span class="label label-default">否</span>{%/if%}</td>
                        <td><button data-id="{%$row._id%}" class="btn btn-sm btn-info">查看</button></td>
                        <td>{%if $row.htype != 3 and $row.share == 1%}<button data-id="{%$row._id%}" class="btn btn-sm btn-info">查看</button>{%/if%}</td>
                        <td></td>
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

{%/block%}

{%block name="js"%}
<script type="text/javascript" src="/static/bootstrap/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="/static/ugc/index.js"></script>
{%/block%}