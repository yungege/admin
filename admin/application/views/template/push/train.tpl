{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}推送管理 / 锻炼提醒{%/block%}
{%block name="css"%}
<style type="text/css">
    .fix-per{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        background: rgba(0,0,0,0.4);
        z-index: 9999;
        display: none;
    }
    .fix-per .fix-cont{
        width: 400px;
        height: 200px;
        line-height: 200px;
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-left: -200px;
        margin-top: -100px;
        font-size: 100px;
        color: orange;
    }
    .form-wrap{
        border: 1px solid #ccc;
        padding: 8px 15px 15px 15px;
        border-radius: 5px;
    }
    #grade_apply,#grade_apply_select,.fx-btn{
        height: 254px;
    }
    #grade_apply_select{
        color: black;
    }
    
    .fx-btn{
        border: 1px solid #ccc;
        margin-top: 25px;
    }
    .fx-btn > a{
        display: block;
        width: 60%;
        margin: 0 auto 10px auto;
    }
</style>
{%/block%}
{%block name="content"%}

<div class="row">
    <div class="col-lg-12">
        <form name="push">

            <div class="form-group">
                <label for="platform" >推送类型</label>
                <div >
                    <select id="type" class="form-control" name="platform">
                        <option value="">选择类型</option>
                        <option value="1">个人锻炼提醒</option>
                        <option value="2">班级锻炼提醒</option>
                        <option value="3">年级锻炼提醒</option>
                    </select>
                </div>
            </div>
            <input class="form-control" id="platform" name="type" value="3" type="hidden">
            <div class="form-group school" style="display: none;">
                <label for="name">学校ID &nbsp;( 提示 ：多个学校ID通过 &nbsp; | &nbsp; 隔开 )</label>
                <input type="text" class="form-control" id="schoolIds" name="schoolIds" placeholder="学校ID">
            </div>

            <div class="row grade" style="display: none">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="grade_apply">适用年级</label>
                        <select multiple id="grade_apply" class="form-control">
                            {%foreach from=$grade item=gl key=idx%}
                            <option value="{%$idx%}">{%$gl%}</option>
                            {%/foreach%}
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center fx-btn" >
                        <a id="t-r" href="javascript:void(0)" class="btn btn-sm btn-default" style="margin-top:87px;">添加</a>
                        <a id="t-l" href="javascript:void(0)" class="btn btn-sm btn-default">删除</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="grade_apply_select">已选年级</label>
                        <select multiple class="form-control" id="grade_apply_select">
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group class" style="display: none">
                <label for="vname">班级ID &nbsp; (&nbsp; 提示：多个ClassId通过 &nbsp;&nbsp;| &nbsp;&nbsp; 隔开 &nbsp;)</label>
                <input type="text" class="form-control" id="classIds" placeholder="班级ID" name="classIds">
            </div>

            <div class="form-group user" style="display: none">
                <label for="vname">用户ID &nbsp; (&nbsp; 提示：多个UserId通过 &nbsp;&nbsp;| &nbsp;&nbsp; 隔开 &nbsp;)</label>
                <input type="text" class="form-control" id="userIds" placeholder="用户ID" name="userIds">
            </div>

            <div class="form-group">
                <label for="name">标题</label>
                <input type="text" class="form-control" id="theme" name="theme" placeholder="标题">
            </div>

            <div class="form-group">
                <label for="desc">内容摘要</label>
                <textarea id="desc" class="form-control" rows="3" name="description" placeholder="摘要"></textarea>
            </div>

            <div class="form-group">
                <label for="editor">详细内容</label>
                <div id="editor" name="content"></div>
            </div>

            <button id="sub" type="button" class="btn btn-primary">确认推送</button>
        </form>
    </div>
</div>

<!-- modal-add -->
<div class="fix-per">
    <div class="fix-cont">
        <!-- 100% -->
    </div>
    
</div>

{%/block%}

{%block name="js"%}
<script src="/static/widget/ueditor/ueditor.config.js"></script>
<script src="/static/widget/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/static/push/js/trainPush.js"></script>
{%/block%}