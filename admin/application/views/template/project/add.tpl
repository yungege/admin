{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}锻炼内容管理 / 发布新方案{%/block%}

{%block name="content"%}

<div class="row">
    <div class="col-lg-12">
        <form class="form-inline">
            <div class="form-group">
                <label for="action-name">动作名称</label>
                <input type="text" class="form-control" id="action-name">
            </div>
            <div class="form-group">
                <label for="action-type">动作类型</label>
                <select class="form-control" name="typeno" id="action-type">
                    <option value="-1">ALL</option>
                    <option value="1">计时锻炼</option>
                    <option value="2">计组数锻炼</option>
                    <option value="3">节拍锻炼</option>
                    <!-- 4 => '休息', -->
                </select>
            </div>
            <div class="form-group">
                <label for="action-item">检测项目</label>
                <select class="form-control" name="physicalquality" id="action-item">
                    <option value="-1">ALL</option>
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
            <button type="button" class="btn btn-info">检索</button>
        </form>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class=""></div>
        </div>
    </div>
    
</div>

{%/block%}

{%block name="js"%}
<script type="text/javascript">
    !(function(){
        var publish = {
            init: function(){
                this.getDom();

            },
            getDom: function(){
                
            },
            
        };

        publish.init();
    })()
</script>
{%/block%}