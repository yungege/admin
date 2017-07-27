{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}锻炼内容管理 / 上传新动作{%/block%}
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
</style>
{%/block%}
{%block name="content"%}
<div class="row">
    <div class="col-lg-12">
        <form name="action">
            <div class="form-group">
                <label for="aname">动作名称</label>
                <input type="text" class="form-control" id="aname" placeholder="Action Name" name="name">
            </div>

            <div class="form-group">
                <label for="atype">动作类型</label>
                <select id="atype" class="form-control" name="typeno">
                    <option value="-1">请选择动作类型</option>
                    <option value="1">计时锻炼</option>
                    <option value="2">计组数锻炼</option>
                    <option value="3">节拍锻炼</option>
                    <option value="4">休息</option>
                </select>
            </div>

            <div class="form-group">
                <label for="ftype">检测项目</label>
                <select id="ftype" class="form-control" name="physicalquality">
                    <option value="-1">无</option>
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
                <label for="sex">适用性别</label>
                <select id="sex" class="form-control" name="sex">
                    <option value="-1">请选择性别</option>
                    <option value="0">男</option>
                    <option value="1">女</option>
                    <option value="2">不限</option>
                </select>
            </div>

            <div class="form-group">
                <label for="actiongroupno">动作组数</label>
                <input type="text" class="form-control" id="actiongroupno" placeholder="Action Group Num" name="actiongroupno">
            </div>

            <div class="form-group">
                <label for="singletime">单次动作计划所需时间（秒）</label>
                <input type="text" class="form-control" id="singletime" placeholder="Single Time" name="singletime">
            </div>

            <div class="form-group">
                <label for="calorie">单次动作计划所需能量（千卡）</label>
                <input type="text" class="form-control" id="calorie" placeholder="Calorie" name="calorie">
            </div>
            
            <div class="form-group">
                <a class="btn btn-default btn-lg" id="coverimg" href="#" style="position: relative; z-index: 1;">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>上传封面图片</span>
                </a>
                <input type="hidden" name="coverimg" id="coverimg-val">
            </div>
            <div id="picshow"></div>

            <div class="form-group">
                <a class="btn btn-default btn-lg" id="video" href="#" style="position: relative; z-index: 1;">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>上传动作视频</span>
                </a>
                <input type="hidden" name="video" id="video-val">
                <input type="hidden" name="vfilesize" id="vfilesize-val">
            </div>
            <div id="mp4Show"></div>

            <!-- <div class="form-group">
                <a class="btn btn-default btn-lg" id="audio" href="#" style="position: relative; z-index: 1;">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>上传动作音频</span>
                </a>
                <input type="hidden" name="audio" id="audio-val">
            </div> -->

            <div class="form-group">
                <label for="describe">动作介绍</label>
                <textarea id="describe" class="form-control" rows="3" name="describe"></textarea>
            </div>
              
            <button id="sub" type="button" class="btn btn-primary">确认提交</button>
            <button id="cancer" type="button" class="btn btn-danger" >取&emsp;消</button>
            <input type="hidden" name="uptoken" id="uptoken" value="{%$uptoken%}">
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
<script type="text/javascript" src="/static/bootstrap/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="/static/sport/js/action.js"></script>
{%/block%}