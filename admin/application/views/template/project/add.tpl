{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}锻炼内容管理 / 发布新方案{%/block%}
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
        <form name="pro">
            <div class="row">
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

            <div class="form-group">
                <label for="has_level">难度区分</label>
                <select id="has_level" class="form-control" name="has_level">
                    <option value="0">难度区分</option>
                    <option value="1">是</option>
                    <option value="-1">否</option>
                </select>
            </div>

            <div class="form-group">
                <label for="gender">适用性别</label>
                <select id="gender" class="form-control" name="gender">
                    <option value="2">全部</option>
                    <option value="0">男</option>
                    <option value="1">女</option>
                </select>
            </div>

            <div class="form-group">
                <label for="pro-type">项目类型</label>
                <select id="pro-type" class="form-control" name="pro-type">
                    <option value="0">项目类型</option>
                    <option value="1">室内锻炼</option>
                    <option value="2">户外锻炼</option>
                </select>
            </div>

            <div class="form-group">
                <label for="name">项目名称</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="desc">方案简介</label>
                <textarea id="desc" class="form-control" rows="3" name="desc"></textarea>
            </div>

            <div class="form-group">
                <a class="btn btn-default btn-lg" id="coverimg" href="#" style="position: relative; z-index: 1;">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>上传封面图片</span>
                </a>
                <input type="hidden" name="coverimg" id="coverimg-val">
            </div>
            <div id="picshow"></div>
            <input type="hidden" name="uptoken" id="uptoken" value="{%$uptoken%}">
            <button id="sub" type="button" class="btn btn-primary">确认发布</button>
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
<script type="text/javascript" src="/static/qiniu/moxie.min.js"></script>
<script type="text/javascript" src="/static/qiniu/plupload.full.min.js"></script>
<script type="text/javascript" src="/static/qiniu/zh_CN.js"></script>
<script type="text/javascript" src="/static/qiniu/qiniu.min.js"></script>
<script type="text/javascript" src="/static/project/js/addPro.js"></script>
{%/block%}