{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}锻炼内容管理 / 发布新方案{%/block%}
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
    #action-list,#action-list-select,#action-list-rest{
        height: 500px;
    }
</style>
{%/block%}
{%block name="content"%}

<div class="row">
    <div class="col-lg-12">
        <form class="form-inline" name="action">
            <div class="form-group">
                <label for="action-name">动作名称</label>
                <input type="text" class="form-control" name="name" id="action-name">
            </div>
            <div class="form-group">
                <label for="action-type">动作类型</label>
                <select class="form-control" name="typeno" id="action-type">
                    <option value="">ALL</option>
                    <option value="1">计时锻炼</option>
                    <option value="2">计组数锻炼</option>
                    <option value="3">节拍锻炼</option>
                    <!-- 4 => '休息', -->
                </select>
            </div>
            <div class="form-group">
                <label for="action-item">检测项目</label>
                <select class="form-control" name="physicalquality" id="action-item">
                    <option value="">ALL</option>
                    <option value="0">耐力素质</option>
                    <option value="1">上肢力量</option>
                    <option value="2">腹肌耐力</option>
                    <option value="3">柔韧素质</option>
                    <option value="4">速度素质</option>
                    <option value="5">下肢力量</option>
                    <option value="6">综合素质</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sex">性别</label>
                <select class="form-control" name="sex" id="sex">
                    <option value="2">ALL</option>
                    <option value="0">男</option>
                    <option value="1">女</option>
                </select>
            </div>
            <button type="button" class="btn btn-info" id="search">检索</button>
        </form>
    </div>
</div>


<div class="row" style="margin-top: 20px;padding: 15px;">
    <div class="col-lg-3" style="border: 1px solid #ccc;padding: 15px;">
        <select multiple class="form-control" id="action-list">
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
            <a href="javascript:void(0)" class="btn btn-sm btn-default">添加</a>
            <a href="javascript:void(0)" class="btn btn-sm btn-default">删除</a>
            <a href="javascript:void(0)" class="btn btn-sm btn-default">前移</a>
            <a style="margin-bottom: 0;" href="javascript:void(0)" class="btn btn-sm btn-default">后移</a>
        </div>
    </div>
    <div class="col-lg-3" style="border: 1px solid #ccc;padding: 15px;">
        <select multiple class="form-control" id="action-list-select">
            <!-- <option>1</option> -->
        </select>
    </div>
    <div class="col-lg-2">
        <div class="text-center fx-btn">
            <a href="javascript:void(0)" class="btn btn-sm btn-default" style="margin-top: 60px;">添加</a>
        </div>
    </div>
    <div class="col-lg-2" style="border: 1px solid #ccc;padding: 15px;">
        <select multiple class="form-control" id="action-list-rest">
            {%foreach from=$restList item=re%}
            <option value="{%$re._id%}">{%$re.name%}【{%$re.singletime%} s】</option>
            {%/foreach%}
        </select>
    </div>
</div>
        

{%/block%}

{%block name="js"%}
<script type="text/javascript" src="/static/sport/js/project.js"></script>
{%/block%}