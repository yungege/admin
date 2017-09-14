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
{%block name="bread"%}UGC / 分享详情{%/block%}
{%block name="content"%}

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>分享人</th>
                        <th>学校</th>
                        <th>班级</th>
                        <th>分享类型</th>
                        <th>分享时间</th>
                        <th>点赞数</th>      
                        <th>锻炼图片</th>                      
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=row%}
                    <tr>
                        <td>{%$row.username%}</td>
                        <td>{%$row.schoolinfo.schoolname%}</td>
                        <td>{%$row.classinfo.classname%}</td>
                        <td>{%if $row.share_type == 0%}系统分享{%else%}用户主动分享{%/if%}</td>
                        <td>{%$row.ctime%}</td>
                        <td>{%$row.up_num%}</td>
                        <td>查看</td>                
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

