{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="css"%}
<style type="text/css">
    
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
                                        <option {%(isset($smarty.get.grade) && ($val == $smarty.get.grade)) ? 'selected' : ''%} value="{%$idx%}" >{%$val%}</option>
                                        {%/foreach%}
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="row">
                                <label class="col-md-6 paddZero control-label">学生姓名/昵称：</label>
                                <div class="col-md-6">
                                    <input type="text" name="username" class="input-sm form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">学生ID：</label>
                                <div class="col-md-8">
                                    <input type="text" name="uid" class="input-sm form-control">
                                </div>
                            </div>
                        </div>
                    </div><br/>
                    <div class="form-horizontal row">
                        <div class="col-md-3">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">家长姓名：</label>
                                <div class="col-md-8">
                                    <input type="text" name="parentname" class="input-sm form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <label class="col-md-6 paddZero control-label">家长手机：</label>
                                <div class="col-md-6">
                                    <input type="text" name="mobile" class="input-sm form-control">
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
            <table class="table table-bordered table-hover table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">姓名/昵称</th>
                        <th class="text-center">头像</th>
                        <th class="text-center">学校</th>
                        <th class="text-center">年级</th>
                        <th class="text-center">班级</th>
                        <th class="text-center">平台（版本号）</th>
                        <th class="text-center">绑定手机</th>
                        <th class="text-center">家长</th>
                        <th class="text-center">手机</th>
                        <th class="text-center">生日</th>
                        <th class="text-center">性别</th>
                        <th class="text-center">注册日期</th>
                        <th class="text-center">上次登录</th>
                        <th class="text-center">关联账号</th>
                        <th class="text-center">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- {%foreach from=$list item=row%}
                    <tr>
                        <td>
                            {%if $row.type eq 1 %}
                                Android
                            {%else%}
                                iOS
                            {%/if%}
                        </td>
                        <td>{%$row.version%}</td>
                        <td>{%$row.versionno%}</td>
                        <td style="text-align: left;">{%$row.description|nl2br%}</td>
                        <td>{%$row.createtime|date_format:"%Y-%m-%d"%}<br/>{%$row.createtime|date_format:"%H:%M:%S"%}</td>
                        <td>
                            <a href="{%$row.downloadurl%}" class="btn btn-sm btn-info">下载</a>
                        </td>
                    </tr>
                    {%/foreach%} -->
                </tbody>
            </table>
        </div>
        {%if $pageCount > 1%}
        <div class="text-center">
            <ul id="page" style="margin: 0;" data-url-pn="{%$smarty.get.pn%}"></ul>
        </div>
        {%/if%}
    </div>
</div>


{%/block%}