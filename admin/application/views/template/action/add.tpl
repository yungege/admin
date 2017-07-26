{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}锻炼内容管理 / 上传新动作{%/block%}
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
                <label for="singletime">单次动作计划所需时间</label>
                <input type="text" class="form-control" id="singletime" placeholder="Single Time" name="singletime">
            </div>

            <div class="form-group">
                <label for="calorie">单次动作计划所需能量</label>
                <input type="text" class="form-control" id="calorie" placeholder="Calorie" name="calorie">
            </div>
            

            <div class="form-group">
                <label for="coverimg">动作封面图片</label>
                <input type="file" class="form-control" id="coverimg-hide">
                <input type="hidden" name="coverimg">
            </div>

            <div class="form-group">
                <label for="video">视频文件</label>
                <input type="file" class="form-control" id="video" name="video-hide">
                <input type="hidden" name="video">
            </div>

            <div class="form-group">
                <label for="audio">音频文件</label>
                <input type="file" class="form-control" id="audio" name="audio-hide">
                <input type="hidden" name="audio">
            </div>

            <div class="form-group">
                <label for="describe">动作介绍</label>
                <textarea id="describe" class="form-control" rows="3" name="describe"></textarea>
            </div>
            
              
            <button id="sub" type="button" class="btn btn-primary" data-0="{%$ios%}" data-1="{%$android%}">确认发布</button>
        </form>
    </div>
</div>

{%/block%}

{%block name="js"%}
<script type="text/javascript">
    !(function(){
        var action = {
            init: function(){
                this.getDom();
                
            },
            getDom: function(){
                
            },
            

        };

        action.init();
    })()
</script>
{%/block%}