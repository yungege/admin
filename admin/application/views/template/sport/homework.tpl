{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}运动圈 / 作业管理  <a href="/sport/project" class="btn btn-primary btn-sm" style="margin-left: 10px;">发布作业</a>{%/block%}
{%block name="css"%}
<style type="text/css">

</style>
{%/block%}
{%block name="content"%}
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-center">作业名称</th>
                        <th class="text-center">作业类型</th>
                        <th class="text-center">封面图片</th>
                        <th class="text-center">学校</th>
                        <th class="text-center">年级</th>
                        <th class="text-center">班级</th>
                        <!-- <th class="text-center">周锻炼时间</th> -->
                        <th class="text-center">周锻炼次数</th>
                        <th class="text-center">作业间隔</th>
                        <th class="text-center">补作业间隔</th>
                        <th class="text-center">性别</th>
                        <th class="text-center">项目</th>
                        <th style="width: 170px;" class="text-center">有效期</th>
                        <th style="width: 100px;" class="text-center">创建时间</th>
                        <th>状态</th>
                        <th class="text-center">操作</th>
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=row%}
                    <tr data-id="{%$row._id%}">
                        <td>{%$row.name%}</td>
                        <td>{%if $row.type eq 1%}<span class="label label-warning">翻</span>{%else%}<span class="label label-primary">素</span>{%/if%}</td>
                        <td><img src="{%$row.project[0].coverimg%}" width="100"></td>
                        <td>{%$row.school%}</td>
                        <td>{%$row.grade%}</td>
                        <td><button type="button" data-id="{%$row._id%}" class="btn btn-sm btn-success" onclick="getClass(this)">查 看</button></td>
                        <!-- <td>{%$row.exertime%}</td> -->
                        <td>{%$row.weekdoneno%}</td>
                        <td>{%$row.makeup_limit|ttxs_parse_stamp%}</td>
                        <td>{%if $row.makeup_interval eq 0%}无限制{%else%}{%$row.makeup_interval%}天{%/if%}</td>
                        <td>{%if $row.gender eq 1%}女{%elseif $row.gender eq 2%}无限制{%else%}男{%/if%}</td>
                        <td>
                            {%foreach from=$row.project item=pro%}
                                <a href="/sport/p/{%$pro._id%}.html">{%$pro.name%}</a><br/>
                            {%/foreach%}
                        </td>
                        <td>
                            {%$row.start_time|date_format:"%Y-%m-%d %H:%M:%S"%}<br/>
                            {%$row.deadline_time|date_format:"%Y-%m-%d %H:%M:%S"%}
                        </td>
                        <td>{%$row.create_time|date_format:"%Y-%m-%d"%}</td>
                        <td>{%if $row.status == 1%}<span class="label label-success">锻炼中</span>{%elseif $row.status == -1%}<span class="label label-danger">已过期</span>{%else%}<span class="label label-defult">未生效</span>{%/if%}</td>
                        <td>
                            <!-- <button type="button" data-id="{%$row._id%}" class="btn btn-sm btn-danger" onclick="del(this)">删 除</button> -->
                        </td>
                    </tr>
                    {%/foreach%}
                </tbody>
            </table>
        </div>
        {%if $pageCount > 1%}
        <div class="text-center">
            <ul id="page" style="margin: 0;" data-url-pn="{%$smarty.get.pn%}"></ul>
        </div>
        {%/if%}
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="video" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document" style="margin-top:7%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalLabel">动作视频</h4>
            </div>
            <div class="modal-body" id="display-body">
                
            </div>
        </div>
    </div>
</div>

{%/block%}

{%block name="js"%}
<script type="text/javascript" src="/static/bootstrap/js/bootstrap-paginator.js"></script>
<script type="text/javascript">
    var currentPage = {%$pn%};
    var pageCount = {%$pageCount%};
    var urlPage = parseInt($("#page").data('url-pn'));
    if(isNaN(urlPage)){
        urlPage = 0;
    }

    $('#page').twbsPagination({
        totalPages: pageCount,
        visiblePages: 7,
        version: '1.1',
        first: '首页',
        prev: '上一页',
        next: '下一页',
        last: '尾页',
        startPage: currentPage,
        onPageClick: function (event, page) {
            if(urlPage == page)
                return;

            window.location = "?pn=" + page;
        }
    });

    function del(el){
        if(!confirm('确定要删除该动作？')) return false;

        var id = $(el).data('id');
        if(!id) return false;

        $.post('/sport/actionDel',{'id':id},function(json){
            if(json.errCode == 0){
                window.location.reload();
            }
            else{
                alert('删除失败.');
            }
        });
    }

    var video = {
        init: function () {
            this.getDom();
            this.display();
        },

        getDom: function () {
            this.disBtn = $('.video');
            this.videoTitle = $('#modalLabel');
            this.videoUri = $('#display-body');
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