{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}发布作业{%/block%}
{%block name="css"%}
<style type="text/css">
    .fx-btn{
        border: 1px solid #ccc;
        padding: 165px 20px 0 20px;
        height: 532px;
    }
    .fx-btn a{
        display: block;
        margin-bottom: 10px;
    }
    #class-list,#class-list-select,#class-list-rest{
        height: 500px;
    }
    .border-h3{
        border-left: 5px solid #5bc0de;
        padding-left: 15px;
        font-size: 20px;
    }

  /*  #start,#end,#homework-type,#homework-name,#homework-describe,#homework-require,#homework-type,#makeup-limit,#makeup-interval{
        width: 700px;
    }*/
   
</style>
{%/block%}
{%block name="content"%}

<div class="row">
    <div class="col-lg-12">
        <h3 class="border-h3">所选方案 ：{%if $projectName neq "" %}  {%$projectName%}   {%else%}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/sport/project">选择</a>  {%/if%}</h3>
        
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <h3 class="border-h3">所选学校 ：{%$schoolName%}  &nbsp;&nbsp;&nbsp;&nbsp;<a href="/user/school?type=1&projectId={%$projectId%}">选择</a></h3>
        
    </div>
</div>
                                                    
<div class="row">
    <div class="col-lg-12">
    <h3 class="border-h3">起止时间</h3>
    <div class="col-sm-5 input-group date date_start" data-date="" data-date-format="yyyy-mm-dd">
        <input readonly type="text" class="form-control" id="start" name="start" value="{%$smarty.get.start%}" >
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
    
    <div class="col-sm-5 input-group date date_end" data-date="" data-date-format="yyyy-mm-dd">
        <input readonly type="text" class="form-control" id="end" name="end" value="{%$smarty.get.end%}">
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
    <h3 class="border-h3">作业类型</h3>
    <select class="form-control" name="homework-type" id="homework-type">
        <option value=1>翻转课堂</option>
        <option value=2>身体素质作业</option>
    </select>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
    <H3 class="border-h3">作业名字</H3>
    <input type="text" class="form-control" name="homework-name" id="homework-name">
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
    <H3 class="border-h3">作业描述</H3>
    <input type="text" class="form-control" name="homework-describe" id="homework-describe">
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
    <H3 class="border-h3">作业要求</H3>
    <input type="text" class="form-control" name="homework-require" id="homework-require">
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
    <h3 class="border-h3">周锻炼次数</h3>
    <select class="form-control" name="week-done-no" id="week-done-no">
        <option value=1>每周1天</option>
        <option value=2>每周2天</option>
        <option value=3>每周3天</option>
        <option value=4>每周4天</option>
        <option value=5>每周5天</option>
        <option value=6>每周6天</option>
        <option value=7>每周7天</option>
    </select>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
    <H3 class="border-h3">锻炼时间间隔(每隔几小时锻炼一次)</H3>
    <input type="text" class="form-control" name="makeup-limit" id="makeup-limit">
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
    <H3 class="border-h3">补作业锻炼限制(允许补多少天以内的作业)</H3>
    <input type="text" class="form-control" name="makeup-interval" id="makeup-interval">
    </div>
</div>
          

<div class="row">
    <div class="col-lg-12">
        <h3 class="border-h3">添加班级</h3><br/>
        <form class="form-inline" name="class">
            <div class="form-group">
                <label for="grade-type">年级</label>
                <select class="form-control" name="grade" id="grade-type">
                    <option value="">ALL</option>
                    <option value="11">小学1年级</option>
                    <option value="12">小学2年级</option>
                    <option value="13">小学3年级</option>
                    <option value="14">小学4年级</option>
                    <option value="15">小学5年级</option>
                    <option value="16">小学6年级</option>
                    <option value="21">初中1年级</option>
                    <option value="22">初中2年级</option>
                    <option value="23">初中3年级</option>
                    <option value="31">高中1年级</option>
                    <option value="32">高中2年级</option>
                    <option value="33">高中3年级</option>
                    <!-- 4 => '休息', -->
                </select>
            </div>
            <div class="form-group">
                <label for="grade-name">班级名称</label>
                <input type="text" class="form-control" name="name" id="action-name">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" name="schoolId" value="{%$schoolId%}">
                <input type="hidden" class="form-control" name="projectId" value="{%$projectId%}">
            </div>
            
            <button type="button" class="btn btn-info" id="search">检索</button>
        </form>
    </div>
</div>


<div class="row" style="margin-top: 20px;padding: 15px;">
    <div class="col-lg-3" style="border: 1px solid #ccc;padding: 15px;">
        <select multiple class="form-control" id="class-list">
            {%foreach from=$actionList item=ac key=idx%}
                <optgroup label="{%$type[$idx]%}">
                    {%foreach from=$ac item=acl%}
                    <option value="{%$acl._id%}">{%$acl.name%}</option>
                    {%/foreach%}
                </optgroup>
            {%/foreach%}
        </select>
    </div>
    <div class="col-lg-2">
        <div class="text-center fx-btn" >
            <a id="t-r" href="javascript:void(0)" class="btn btn-sm btn-default">添加</a>
            <a id="t-l" href="javascript:void(0)" class="btn btn-sm btn-default">删除</a>
        </div>
    </div>
    <div class="col-lg-3" style="border: 1px solid #ccc;padding: 15px;">
        <select multiple class="form-control" id="class-list-select">
            <!-- <option>1</option> -->
        </select>
    </div>
    
</div>

<div class="row">
    <div class="col-lg-12">
        <form class="form-inline" name="sku">
            <button type="button" id="addHomeworkBtn" class="btn btn-md btn-primary">发布作业</button>
        </form>
    </div>
</div>
        

{%/block%}

{%block name="js"%}
<script type="text/javascript" src="/static/bootstrap/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="/static/project/js/addHomework.js"></script>
<script type="text/javascript" src="/static/ugc/index.js"></script>
{%/block%}