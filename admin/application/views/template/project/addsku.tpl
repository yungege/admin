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
    .border-h3{
        border-left: 5px solid #5bc0de;
        padding-left: 15px;
        font-size: 20px;
    }
    .fix-int-wrmp{
        position: fixed;
        top: 0;
        left: 0;
        z-index: 999;
        background-color: rgba(0,0,0,0.4);
        width: 100%;
        height: 100%;
        display: none;
    }
    .fix-int{
        width: 400px;
        height: 160px;
        background-color: white;
        border: 1px solid #333;
        padding: 15px;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -80px;
        margin-left: -200px;
    }
    .btn-success{
        margin-right: 10px;
    }
    #actionNameSpan{
        padding-left: 15px;
        font-size: 14px;
        color: #565656;
        color: #0c9;
    }
</style>
{%/block%}
{%block name="content"%}
<div class="row">
    <div class="col-lg-12">
        <h3 class="border-h3">当前项目信息</h3>
        <table class="table table-bordered">
            <tr>
                <td style="line-height: 7;">{%$project.name%}</td>
                <td><img src="{%$project.coverimg%}?imageView2/2/h/100"></td>
            </tr>
        </table>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <h3 class="border-h3">添加锻炼内容</h3><br/>
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
                    <option value="{%$acl._id%}" type-no="{%$acl.typeno%}">{%$acl.name%}</option>
                    {%/foreach%}
                </optgroup>
            {%/foreach%}
        </select>
    </div>
    <div class="col-lg-2">
        <div class="text-center fx-btn" >
            <a href="javascript:void(0)" class="btn btn-sm btn-default" id="addBtn">添加 >></a>
            <a href="javascript:void(0)" class="btn btn-sm btn-default" id="delBtn">删除 <<</a>
            <a href="javascript:void(0)" class="btn btn-sm btn-default" id="upBtn">前移</a>
            <a style="margin-bottom: 0;" href="javascript:void(0)" id="downBtn" class="btn btn-sm btn-default">后移</a>
        </div>
    </div>
    <div class="col-lg-3" style="border: 1px solid #ccc;padding: 15px;">
        <select multiple class="form-control" id="action-list-select">
            <!-- <option>1</option> -->
        </select>
    </div>
    <div class="col-lg-2">
        <div class="text-center fx-btn">
            <a href="javascript:void(0)" class="btn btn-sm btn-default" id="rest-add-btn"><< 添加</a>
        </div>
    </div>
    <div class="col-lg-2" style="border: 1px solid #ccc;padding: 15px;">
        <select multiple class="form-control" id="action-list-rest">
            {%foreach from=$restList item=re%}
            <option value="{%$re._id%}" type-no="4">{%$re.name%}【{%$re.singletime%} s】</option>
            {%/foreach%}
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="desc">方案简介：</label><br/>
            <textarea id="desc" class="form-control" rows="3" name="desc"></textarea>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <form class="form-inline" name="sku">
            <div class="form-group">
                <label for="difficulty">难度：</label>
                <select class="form-control" name="difficulty">
                    {%if $project.has_level eq -1%}
                    <option value="-1">无难度级别</option>
                    {%else%}
                        <option value="-2">请选择难度级别</option>
                        {%foreach from=$project.difficultyVal item=darr%}
                            <option value="{%$darr%}">{%$project.difficultyArr.$darr%}</option>
                        {%/foreach%}
                    {%/if%}
                </select>
            </div>
            <input type="hidden" name="project_id" value="{%$project._id%}">&emsp;
            <button type="button" id="addSkuBtn" class="btn btn-md btn-primary">确认提交</button>
        </form>
    </div>
</div>

<div class="fix-int-wrmp">
    <div class="fix-int">
        <h4>请输入循环次数<span id="actionNameSpan"></span></h4>
        <input type="text" id="actionNo" class="form-control">
        <br/>
        <button class="btn btn-default pull-right" type="button" id="canNo">&emsp;取&emsp;消&emsp;</button>
        <button class="btn btn-success pull-right" type="button" id="subNo">&emsp;确&emsp;定&emsp;</button>
    </div>
</div>  

{%/block%}

{%block name="js"%}
<script type="text/javascript" src="/static/project/js/addSku.js"></script>
{%/block%}