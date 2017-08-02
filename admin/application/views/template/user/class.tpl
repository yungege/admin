{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="css"%}
<style type="text/css">
    
</style>
{%/block%}
{%block name="bread"%}用户管理 / 班级管理{%/block%}
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
                                <label class="col-md-6 paddZero control-label">学校名：</label>
                                <div class="col-md-6">
                                    <input type="text" name="schoolname" class="input-sm form-control" value="{%$smarty.get.schoolname%}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">学校ID：</label>
                                <div class="col-md-8">
                                    <input type="text" name="schoolid" class="input-sm form-control" value="{%$smarty.get.schoolid%}">
                                </div>
                            </div>
                        </div>
                        
                    </div><br/>
                   

                   <div class="form-horizontal row">
                        <div class="col-md-3">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">班级名：</label>
                                <div class="col-md-8">
                                    <input type="text" name="classname" class="input-sm form-control" value="{%$smarty.get.classname%}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <label class="col-md-6 paddZero control-label">班级ID：</label>
                                <div class="col-md-6">
                                    <input type="text" name="classid" class="input-sm form-control" value="{%$smarty.get.classid%}">
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
                        <th>班级名</th>
                        <th>班级ID</th>
                        <th>所在学校</th>
                        <!-- <th>关联账号</th> -->
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=row%}
                    <tr >
                        <td>{%$row.name%}</td>
                        <td>{%$row._id%}</td>
                        <td><a href="http://192.168.1.106:8080/user/school?schoolname={%$row.schoolname%}">{%$row.schoolname%}</a></td>
                        <!-- <td></td> -->
                        <td>
                            <a href="" class="btn btn-default btn-xs">点击</a>
                        </td>
                    </tr>
                    {%/foreach%}
                </tbody>
            </table>
        </div>
        <div class="tt-page" style="text-align:center">{%$page%}</div>
    </div>
</div>

{%/block%}

