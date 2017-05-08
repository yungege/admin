{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}BUG收集 / 反馈建议{%/block%}
{%block name="content"%}
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-center">头像</th>
                        <th class="text-center">反馈人</th>
                        <th class="text-center">昵称</th>
                        <th class="text-center">号码</th>
                        <th class="text-center" style="min-width: 150px;">家长</th>
                        <th class="text-center">反馈内容</th>
                        <th class="text-center" style="min-width: 100px;">反馈时间</th>
                        <th class="text-center" style="min-width: 100px;">操作</th>
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=row%}
                    <tr>
                        <td><img src="{%$row.iconurl%}" style="width: 40px;height: 40px;border-radius: 20px;"></td>
                        <td>{%$row.username%}</td>
                        <td>{%$row.nickname%}</td>
                        <td>{%if $row.mobile%}{%$row.mobile%}{%/if%}</td>
                        <td class="text-left">
                            {%if $row.parent%}
                                {%foreach from=$row.parent item=par%}
                                    {%$par%}<br/>
                                {%/foreach%}
                            {%/if%}
                        </td>
                        <td>{%$row.content%}</td>
                        <td>{%$row.date%}<br/>{%$row.time%}</td>
                        <td></td>
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
</script>
{%/block%}