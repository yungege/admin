{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}学生登陆日志信息{%/block%}
{%block name="css"%}
<style type="text/css">

</style>
{%/block%}
{%block name="bread"%}运营管理 / LOG{%/block%}
{%block name="content"%}
<!-- <div class="row">
    <div class="col-lg-12">
        <form method="get" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="form-horizontal row">

                        <div class="col-md-4">
                            <div class="row">
                                <label class="col-md-3 paddZero control-label">查询时间：</label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-sm-5 input-group date date_start" data-date="" data-date-format="yyyy-mm-dd">
                                            <input readonly type="text" class="form-control" id="start" name="start" value="{%$smarty.get.start%}" >
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                        <div class="col-sm-1"></div>

                                        <a class="btn btn-info btn-sm" id="submit">查&emsp;询</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><br/>
                </div>
            </div>
        </form>
    </div>
</div> -->

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>用户名</th>
                        <th>平台</th>
                        <th>版本号</th>
                        <th>登录方式</th>
                        <th>手机号</th>
                        <th>登陆时间</th>
                    </tr>
                </thead>
                <tbody id='log-list'>
                    {%foreach from=$list item=row%}
                    <tr >
                        <td>{%$row.username%}</td>
                        <td>{%$row.platform%}</td>
                        <td>{%$row.version%}</td>
                        <td>
                            {%if $row.type eq 1%}
                                手机号登陆
                            {%elseif $row.type eq 2%}
                                微信登陆
                            {%elseif $row.type eq 3%}
                                QQ登陆
                            {%else%}
                                账号切换
                            {%/if%}
                        </td>
                        <td>{%$row.mobile%}</td>
                        <td>
                            {%$row.ctime|date_format:"%Y-%m-%d"%}<br/>
                            {%$row.ctime|date_format:"%H:%M:%S"%}<br/>
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


{%/block%}

{%block name="js"%}

{%/block%}