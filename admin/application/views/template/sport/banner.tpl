{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="css"%}
<link href="/static/bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<style type="text/css">
    .datetimepicker{
        margin-top: 50px;
    }
    .glyphicon-calendar{
        color: red;
        cursor: pointer;
    }
    .thumbnail > img{
        height: 100px;
        overflow: hidden;
    }
</style>
{%/block%}
{%block name="bread"%}运动圈 / banner{%/block%}
{%block name="content"%}
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-center">标题</th>
                        <th class="text-center">上传者</th>
                        <th style="max-width: 160px;" class="text-center">描述</th>
                        <th class="text-center">图片</th>
                        <th class="text-center">有效期</th>
                        <th class="text-center">Access</th>
                        <th class="text-center">创建时间</th>
                        <th class="text-center">操作</th>
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=row%}
                    <tr data-id="{%$row['_id']%}">
                        <td>{%$row['title']%}</td>
                        <td>{%$row['creator']%}</td>
                        <td>{%$row['h5content']%}</td>
                        <td><img src="{%$row['coverimgurl']%}" height="80" /></td>
                        <td>{%$row['starttime']%} <br/>至<br/> {%$row['endtime']%}</td>
                        <td>{%$row['Access']%}</td>
                        <td>{%$row['createtime']%}</td>
                        <td style="width: 160px;">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit-form" onclick="edit(this)" data-row='{%$row|json_encode%}' class="edit-btn">编 辑</button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="del(this)">删 除</button>
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
<div class="modal fade" id="edit-form" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document" style="margin-top:7%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalLabel">Banner Edit</h4>
            </div>
            <div class="modal-body">
                <form name="banner">
                    <div class="form-group">
                        <label for="b-title" class="control-label">标题:</label>
                        <input type="text" class="form-control" id="b-title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="b-desc" class="control-label">描述:</label>
                        <textarea class="form-control" id="b-desc" name="h5content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="b-stime" class="control-label">开始时间:</label>
                        <div class="input-group date date_start" data-date="" data-date-format="yyyy-mm-dd">
                            <input readonly type="text" class="form-control" id="b-stime" name="starttime">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="b-etime" class="control-label">结束时间:</label>
                        <div class="input-group date date_end" data-date="" data-date-format="yyyy-mm-dd">
                            <input readonly type="text" class="form-control" id="b-etime" name="endtime">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="b-url" class="control-label">URL:</label>
                        <input type="text" class="form-control" id="b-url" name="h5url">
                    </div>
                    <input type="hidden" name="uptoken" id="uptoken" value="{%$uptoken%}">
                    <input type="hidden" name="coverimgurl" value="">
                </form>

                <label class="control-label">IMG:</label>
                <div class="thumbnail">
                    <img src="" alt="..." id="coverimgurl">
                </div>

                <a class="btn btn-default btn-lg " id="pickfiles" href="#" style="position: relative; z-index: 1;">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>选择文件</span>
                </a>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="reset()">Close</button>
                <button type="button" class="btn btn-primary" onclick="commit(this)" data-id="" id="sub-btn">Summit</button>
            </div>
        </div>
    </div>
</div>

{%/block%}
{%block name="js"%}
<script type="text/javascript" src="/static/qiniu/moxie.min.js"></script>
<script type="text/javascript" src="/static/qiniu/plupload.full.min.js"></script>
<script type="text/javascript" src="/static/qiniu/zh_CN.js"></script>
<script type="text/javascript" src="/static/qiniu/qiniu.min.js"></script>
<script type="text/javascript" src="/static/bootstrap/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="/static/sport/js/banner.js"></script>
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
</script>
{%/block%}