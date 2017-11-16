{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}运动圈 / 动作管理 <a href="/action/add" class="btn btn-primary btn-sm" style="margin-left: 10px;">上传新动作</a>{%/block%}
{%block name="css"%}
<style type="text/css">
.video{
    cursor: pointer;
    border: 1px solid #ccc;
    padding: 5px 15px 5px 15px;
    border-radius: 3px;
    display: inline-block;
    width: 60px;
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}
.video:hover{
    border-color: #0c9;
    background-color: #0c9;
    color: white;
}
</style>
{%/block%}
{%block name="content"%}
<div class="row">
    <div class="col-lg-12">
        <form method="get" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="form-horizontal row">
                        <div class="col-md-3">
                            <div class="row">
                                <label class="col-md-4 control-label" style="text-align: left;">动作名称：</label>
                                <div class="col-md-8">
                                    <input type="text" name="aname" class="input-sm form-control" value="{%$smarty.get.aname%}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-info btn-sm" type="submit">查&emsp;询</button>
                            <button class="btn btn-warning btn-sm reset-btn" type="button">清除条件</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-center">动作名称</th>
                        <th class="text-center">动作类型</th>
                        <th class="text-center">封面图片</th>
                        <th class="text-center">视频文件</th>
                        <th class="text-center">文件大小</th>
                        <th class="text-center">耗时（单次）</th>
                        <th class="text-center">能量（单次）</th>
                        <!-- <th class="text-center">年级难度</th> -->
                        <!-- <th class="text-center">检测项目</th> -->
                        <th class="text-center" style="width:300px;">描述</th>
                        <th class="text-center">创建人</th>
                        <th class="text-center">创建时间</th>
                        <th class="text-center">操作</th>
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=row%}
                    <tr>
                        <td>{%$row.name%}</td>
                        <td>{%$row.typeno%}</td>
                        <td><img src="{%$row.coverimg%}"></td>
                        <td>{%if $row.video %}
                            <!-- <img src="/static/imgs/video.png" alt="..." width="40" height="40" style="cursor: pointer;"> -->
                            <span data-toggle="modal" data-target="#video" class="video" data-name="{%$row.name%}" data-uri="{%$row.video%}">播放</span>{%/if%}
                        </td>
                        <td>{%$row.vfilesize%}MB</td>
                        <td>{%$row.singletime%}秒</td>
                        <td>{%$row.calorie%}千卡</td>
                        <!-- <td>
                            {%if $row.gradedifficulty%}
                                <ul>
                                {%foreach from=$row.gradedifficulty key=grade item=fid%}
                                    <li>{%$grade%} -- {%$fid%}</li>
                                {%/foreach%}
                                </ul>
                            {%/if%}
                        </td> -->
                        <!-- <td>{%$row.physicalquality%}</td> -->
                        <td>{%$row.describe%}</td>
                        <td>{%$row.createor%}</td>
                        <td>{%$row.createtime|date_format:"%Y-%m-%d"%}<br/>{%$row.createtime|date_format:"%H:%M:%S"%}</td>
                        <td>
                            <!-- <button type="button" data-id="{%$row._id%}" class="btn btn-sm btn-danger" onclick="del(this)">删 除</button> -->
                        </td>
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

<!-- modal -->
<div class="modal fade" id="video" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document" style="margin-top:7%;">
        <div class="modal-content">
            <div class="modal-body" id="display-body">
                
            </div>
        </div>
    </div>
</div>

{%/block%}

{%block name="js"%}
<script type="text/javascript">
    // function del(el){
    //     if(!confirm('确定要删除该动作？')) return false;

    //     var id = $(el).data('id');
    //     if(!id) return false;

    //     $.post('/sport/actionDel',{'id':id},function(json){
    //         if(json.errCode == 0){
    //             window.location.reload();
    //         }
    //         else{
    //             alert(json.errMessage ? : '删除失败.');
    //         }
    //     });
    // }

    var video = {
        init: function () {
            this.getDom();
            this.display();
        },

        getDom: function () {
            this.disBtn = $('.video');
            this.videoTitle = $('#modalLabel');
            this.videoUri = $('#display-body');
            this.showVoiceBoxBtn = $('.add-voice');
        },

        display: function () {
            var me = this;
            me.disBtn.unbind().bind('click', function(){
                var uri = $(this).data('uri');
                var name = $(this).data('name');
                me.videoTitle.text(name);
                var html = "<video style=\"width:100%;\" controls autobuffer autoplay>" +
                                "<source src='" + uri + "' type='video/mp4; codecs=\"avc1.42E01E, mp4a.40.2\"'></source>" +
                            "</video>";
                me.videoUri.html(html);
            })
        }
    };

    video.init();
</script>
{%/block%}