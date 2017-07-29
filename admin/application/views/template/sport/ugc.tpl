{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="css"%}
<style type="text/css">
    
</style>
{%/block%}
{%block name="bread"%}运营管理 / UGC{%/block%}
{%block name="content"%}
<div class="row">
    <div class="col-lg-12">
        <form method="get" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="form-horizontal row">

                        <div class="col-md-3">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">作业类型：</label>

                                <div class="col-md-8">
                                    <select class="input-sm form-control" name="type">
                                        <option value="-1">选择作业类型</option>
                                        {%foreach from=$worktype item=val key=idx%}
                                        <option {%(isset($smarty.get.type) && ($idx == $smarty.get.type)) ? 'selected' : ''%} value="{%$idx%}" >{%$val%}</option>
                                        {%/foreach%}
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">学生ID：</label>
                                <div class="col-md-8">
                                    <input type="text" name="uid" class="input-sm form-control" value="{%$smarty.get.uid%}">
                                </div>
                            </div>
                        </div>
                    </div><br/>
                    
                    <div class="form-horizontal row">
                        <div class="col-md-4 col-md-offset-1">
                            <button class="btn btn-info btn-sm" type="submit">查&emsp;询</button>
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
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <!-- <th class="text-center">ID</th> -->
                        <th>学生</th>
                        <th>头像</th>
                        <th>作业类型</th>
                        <th>锻炼项目</th>
                        <th>能量/千卡</th>
                        <th>作业时长</th>
                        <th>跑步路程</th>
                        <th>开始时间</th>
                        <th>结束时间</th>
                        <th>提交时间</th>
                        <th>原始时间</th>
                        <th>是否补交</th>
                        <th>作业图片</th>
                        <th>是否分享</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=row%}
                    <tr data-uid="{%$row._id%}">
                        <td>姓名：{%$row.username%}<br/>昵称：{%$row.nickname%}</td>
                        <td><img src="{%$row.iconurl%}?imageView2/2/w/100/h/60/q/100" width="50" height="50" style="border-radius: 25px;"></td>
                        
                        <td>{%$row.type%}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    {%/foreach%}
                </tbody>
            </table>
        </div>
        {%if $pageCount > 1%}
        <div class="text-center">
            <ul id="page" style="margin: 0;" data-url-pn="{%if !empty($smarty.get.pn)%}{%$smarty.get.pn%}{%else%}1{%/if%}" data-query="{%$query%}"></ul>
        </div>
        {%/if%}
    </div>
</div>

{%/block%}

{%block name="js"%}
<script type="text/javascript" src="/static/bootstrap/js/bootstrap-paginator.js"></script>
<script type="text/javascript">
    var currentPage = {%$pn%};
    var pageCount = {%$pageCount%};
    var urlPage = parseInt($("#page").data('url-pn'));
    var queryStr = $("#page").data('query');
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

            window.location = "?" + queryStr + '&pn=' + page;
        }
    });
</script>
{%/block%}