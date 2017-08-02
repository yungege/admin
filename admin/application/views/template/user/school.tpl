{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="css"%}
<style type="text/css">
    
</style>
{%/block%}
{%block name="bread"%}用户管理 / 学校管理{%/block%}
{%block name="content"%}
<div class="row">
    <div class="col-lg-12">
        <form method="get" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="form-horizontal row">

                        <div class="col-md-3">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">学校ID：</label>

                                <div class="col-md-8">
                                    <div class="col-md-8">
                                    <input type="text" name="schoolid" class="input-sm form-control" value="{%$smarty.get.schoolid%}">
                                </div>
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
                        <th>学校名称</th></th>
                        <th>学校ID</th>
                        <th>学校所在省份</th>
                        <th>学校所在城市</th>
                        <!-- <th>关联账号</th> -->
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=row%}
                    <tr >
                        <td>{%$row.name%}</td>
                        <td>{%$row._id%}</td>
                        <td>{%$row.province%}</td>
                        <td>{%$row.city%}</td>
                        <!-- <td></td> -->
                        <td>
                            <a href="" class="btn btn-default btn-xs">点击</a>
                        </td>
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
