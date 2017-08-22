{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}运动圈 / 锻炼项目详情{%/block%}
{%block name="css"%}
<style type="text/css">
h4{
    text-decoration: underline;
}
.border-left{
    border-left: 1px solid #ccc;
}
.panel{
    background-color: lightseagreen;
    border-color: lightseagreen;
    color: white;
}
</style>
{%/block%}
{%block name="content"%}
<div class="row">
    <div class="col-lg-12">
        <h1>{%$pinfo.name%}  <a href="/project/addhomework?projectId={%$pinfo._id%}">创建作业</a></h1>
        <p><h1><small>{%$pinfo.desc%}</small></h1></p>
    </div>
</div>
<br>
<div class="row">
    {%if $pinfo.has_level eq 1%}
    <div class="col-md-4">
        <h4 class="text-center">低难度</h4>
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table text-center table-condensed">
                    <thead>
                        <tr>
                            <th class="text-center">文件大小</th>
                            <th class="text-center">动作数</th>
                            <th class="text-center">休息次数</th>
                            <th class="text-center">卡路里</th>
                            <th class="text-center">时长</th>
                            <th class="text-center">推荐</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{%$pro.0.vfilesize%}MB</td>
                            <td>{%$pro.0.action_count%}</td>
                            <td>{%$pro.0.rest_count%}</td>
                            <td>{%'%.2f'|sprintf:$pro.0.calorie_cost%}千卡</td>
                            <td>{%$pro.0.time_cost%}s</td>
                            <td>{%if $pro.0.recommend == 1%}是{%else%}否{%/if%}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <table class="table table-hover text-center table-condensed">
            <thead>
                <tr>
                    <th class="text-center">序号</th>
                    <th class="text-center">动作名称</th>
                    <th class="text-center">动作数</th>
                    <th class="text-center">卡路里(千卡)</th>
                    <th class="text-center">时长(s)</th>
                    <th class="text-center">类型</th>
                    <th class="text-center">创建时间</th>
                </tr>
            </thead>
            <tbody>
                {%foreach from=$pro.0.action_info key=index item=ainfo%}
                <tr class="{%if $ainfo.calorie == 0%}info{%/if%}">
                    <td>{%$index+1%}</td>
                    <td>{%$ainfo.name%}</td>
                    <td>{%$ainfo.action_groupno%}</td>
                    <td>{%$ainfo.calorie%}</td>
                    <td>{%$ainfo.action_time%}</td>
                    <td>{%$ainfo.action_type%}</td>
                    <td>
                        {%$ainfo.ctime|date_format:"%Y-%m-%d %H:%M:%S"%}
                    </td>
                </tr>
                {%/foreach%}
            </tbody>
        </table>
    </div>
    <div class="col-md-4 border-left">
        <h4 class="text-center">中等难度</h4>
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table text-center table-condensed">
                    <thead>
                        <tr>
                            <th class="text-center">文件大小</th>
                            <th class="text-center">动作数</th>
                            <th class="text-center">休息次数</th>
                            <th class="text-center">卡路里</th>
                            <th class="text-center">时长</th>
                            <th class="text-center">推荐</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{%$pro.1.vfilesize%}MB</td>
                            <td>{%$pro.1.action_count%}</td>
                            <td>{%$pro.1.rest_count%}</td>
                            <td>{%'%.2f'|sprintf:$pro.1.calorie_cost%}千卡</td>
                            <td>{%$pro.1.time_cost%}s</td>
                            <td>{%if $pro.1.recommend == 1%}是{%else%}否{%/if%}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <table class="table table-hover text-center table-condensed">
            <thead>
                <tr>
                    <th class="text-center">序号</th>
                    <th class="text-center">动作名称</th>
                    <th class="text-center">动作数</th>
                    <th class="text-center">卡路里(千卡)</th>
                    <th class="text-center">时长(s)</th>
                    <th class="text-center">类型</th>
                    <th class="text-center">创建时间</th>
                </tr>
            </thead>
            <tbody>
                {%foreach from=$pro.1.action_info key=index item=ainfo%}
                <tr class="{%if $ainfo.calorie == 0%}info{%/if%}">
                    <td>{%$index+1%}</td>
                    <td>{%$ainfo.name%}</td>
                    <td>{%$ainfo.action_groupno%}</td>
                    <td>{%$ainfo.calorie%}</td>
                    <td>{%$ainfo.action_time%}</td>
                    <td>{%$ainfo.action_type%}</td>
                    <td>
                        {%$ainfo.ctime|date_format:"%Y-%m-%d %H:%M:%S"%}
                    </td>
                </tr>
                {%/foreach%}
            </tbody>
        </table>
    </div>
    <div class="col-md-4 border-left">
        <h4 class="text-center">高难度</h4>
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table text-center table-condensed">
                    <thead>
                        <tr>
                            <th class="text-center">文件大小</th>
                            <th class="text-center">动作数</th>
                            <th class="text-center">休息次数</th>
                            <th class="text-center">卡路里</th>
                            <th class="text-center">时长</th>
                            <th class="text-center">推荐</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{%$pro.2.vfilesize%}MB</td>
                            <td>{%$pro.2.action_count%}</td>
                            <td>{%$pro.2.rest_count%}</td>
                            <td>{%'%.2f'|sprintf:$pro.2.calorie_cost%}千卡</td>
                            <td>{%$pro.2.time_cost%}s</td>
                            <td>{%if $pro.2.recommend == 1%}是{%else%}否{%/if%}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <table class="table table-hover text-center table-condensed">
            <thead>
                <tr>
                    <th class="text-center">序号</th>
                    <th class="text-center">动作名称</th>
                    <th class="text-center">动作数</th>
                    <th class="text-center">卡路里(千卡)</th>
                    <th class="text-center">时长(s)</th>
                    <th class="text-center">类型</th>
                    <th class="text-center">创建时间</th>
                </tr>
            </thead>
            <tbody>
                {%foreach from=$pro.2.action_info key=index item=ainfo%}
                <tr class="{%if $ainfo.calorie == 0%}info{%/if%}">
                    <td>{%$index+1%}</td>
                    <td>{%$ainfo.name%}</td>
                    <td>{%$ainfo.action_groupno%}</td>
                    <td>{%$ainfo.calorie%}</td>
                    <td>{%$ainfo.action_time%}</td>
                    <td>{%$ainfo.action_type%}</td>
                    <td>
                        {%$ainfo.ctime|date_format:"%Y-%m-%d %H:%M:%S"%}
                    </td>
                </tr>
                {%/foreach%}
            </tbody>
        </table>
    </div>
    {%elseif $pinfo.has_level eq -1%}
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table text-center table-condensed">
                    <thead>
                        <tr>
                            <th class="text-center">文件大小</th>
                            <th class="text-center">动作数</th>
                            <th class="text-center">休息次数</th>
                            <th class="text-center">卡路里</th>
                            <th class="text-center">时长</th>
                            <th class="text-center">推荐</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{%$pro[-1].vfilesize%}MB</td>
                            <td>{%$pro[-1].action_count%}</td>
                            <td>{%$pro[-1].rest_count%}</td>
                            <td>{%'%.2f'|sprintf:$pro[-1].calorie_cost%}千卡</td>
                            <td>{%$pro[-1].time_cost%}s</td>
                            <td>{%if $pro[-1].recommend == 1%}是{%else%}否{%/if%}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th class="text-center">序号</th>
                    <th class="text-center">动作名称</th>
                    <th class="text-center">动作数</th>
                    <th class="text-center">卡路里(千卡)</th>
                    <th class="text-center">时长(s)</th>
                    <th class="text-center">类型</th>
                    <th class="text-center">创建时间</th>
                </tr>
            </thead>
            <tbody>
                {%foreach from=$pro[-1].action_info key=index item=ainfo%}
                <tr class="{%if $ainfo.calorie == 0%}info{%/if%}">
                    <td>{%$index+1%}</td>
                    <td>{%$ainfo.name%}</td>
                    <td>{%$ainfo.action_groupno%}</td>
                    <td>{%$ainfo.calorie%}</td>
                    <td>{%$ainfo.action_time%}</td>
                    <td>{%$ainfo.action_type%}</td>
                    <td>
                        {%$ainfo.ctime|date_format:"%Y-%m-%d %H:%M:%S"%}
                    </td>
                </tr>
                {%/foreach%}
            </tbody>
        </table>
    </div>
    {%/if%}
</div>
        
        
        <!-- {%foreach from=$pro item=row%}
            <div class="table-responsive">
                <table class="table table-hover text-center">
                    <tr>
                        <td></td>
                    </tr> -->
                    <!-- <thead>
                        <tr>
                            <th class="text-center">序号</th>
                            <th class="text-center">动作名称</th>
                            <th class="text-center">动作数</th>
                            <th class="text-center">卡路里(千卡)</th>
                            <th class="text-center">时长(s)</th>
                            <th class="text-center">创建时间</th>
                            <th class="text-center">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        {%foreach from=$row.action_info key=index item=ainfo%}
                        <tr class="{%if $ainfo.calorie == 0%}danger{%/if%}">
                            <td>{%$index+1%}</td>
                            <td>{%$ainfo.name%}</td>
                            <td>{%$ainfo.action_groupno%}</td>
                            <td>{%$ainfo.calorie%}</td>
                            <td>{%$ainfo.action_time%}</td>
                            <td>
                                {%$ainfo.ctime|date_format:"%Y-%m-%d %H:%M:%S"%}
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn btn-primary">查 看</a>
                            </td>
                        </tr>
                        {%/foreach%}
                    </tbody> -->
                <!-- </table>
            </div>

        {%/foreach%} -->
        
        <!-- <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-center">难度级别</th>
                        <th class="text-center">封面图片</th>
                        <th class="text-center">适用性别</th>
                        <th class="text-center">适用年级</th>
                        <th class="text-center" style="width:300px;">描述</th>
                        <th class="text-center">创建时间</th>
                        <th class="text-center">操作</th>
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=row%}
                    <tr>
                        <td>{%$row.name%}</td>
                        <td><img src="{%$row.coverimg%}"></td>
                        <td>{%$row.gender%}</td>
                        <td>
                            {%if $row.grade_apply%}
                                {%foreach from=$row.grade_apply item=v%}
                                    {%$v%}<br/>
                                {%/foreach%}
                            {%/if%}
                        </td>
                        <td>{%$row.desc%}</td>
                        <td>
                            {%$row.ctime|date_format:"%Y-%m-%d"%}<br/>
                            {%$row.ctime|date_format:"%H:%M:%S"%}
                        </td>
                        <td>
                            <a href="/sport/pro/{%$row._id%}.html" class="btn btn-sm btn btn-primary" target="__blank">查 看</a>
                            <button type="button" data-id="{%$row._id%}.html" class="btn btn-sm btn-danger" onclick="del(this)">删 除</button>
                        </td>
                    </tr>
                    {%/foreach%}
                </tbody>
            </table>
        </div> -->

<!--     </div>
</div> -->

{%/block%}

{%block name="js"%}
<script type="text/javascript">
    
</script>
{%/block%}