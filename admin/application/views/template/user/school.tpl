{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="css"%}
<style type="text/css">
    
</style>
{%/block%}
{%block name="bread"%}用户管理 / 学校管理   <a href="/school/add" class="btn btn-primary btn-sm" style="margin-left: 10px;">添加学校</a>{%/block%}
{%block name="content"%}
<div class="row">
    <div class="col-lg-12">
        <form method="get" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="form-horizontal row">

                        <div class="col-md-3">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">学校名：</label>
                                <div class="col-md-8">
                                   <input type="text" name="schoolname" class="input-sm form-control" value="{%$smarty.get.schoolname%}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="row">
                                <label class="col-md-6 paddZero control-label">学校ID：</label>
                                <div class="col-md-6">
                                    <input type="text" name="schoolid" class="input-sm form-control" value="{%$smarty.get.schoolid%}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="row">
                                <label class="col-md-6 paddZero control-label"></label>
                                <div class="col-md-6">
                                    <input type="hidden" name="projectId" class="input-sm form-control" value="{%$projectId%}">
                                </div>
                            </div>
                        </div>
                        {%if $type eq 1%}
                        <div class="col-md-7">
                            <div class="row">
                                <label class="col-md-8 paddZero control-label"></label>
                                <div class="col-md-8">
                                    <input type="hidden" name="type" class="input-sm form-control" value=1>
                                </div>
                            </div>
                        </div>

                        {%/if%}


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
                        <th>学校名称</th></th>
                        <th>学校ID</th>
                        <th>学校所在省份</th>
                        <th>学校所在城市</th>
                        <!-- <th>关联账号</th> -->
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=row%}
                    <tr >
                        <td>{%$row.name%}</td>
                        <td>{%$row._id%}</td>
                        <td>{%$row.province%}</td>
                        <td>{%$row.city%}</td>
                        <!-- <td></td> -->
                        <td>

                            {%if $type eq 1%} <a href="/project/addhomework?schoolId={%$row._id%}&projectId={%$projectId%}" class="btn btn-default btn-xs">选择</a> {%else%} <a href="" class="btn btn-default btn-xs">点击</a> {%/if%}
                            <!-- <a href="" class="btn btn-default btn-xs">点击</a> -->
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
