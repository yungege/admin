{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}运动圈 / 锻炼项目管理{%/block%}
{%block name="css"%}
<style type="text/css">

</style>
{%/block%}
{%block name="content"%}
<div class="row">
    <div class="col-lg-12">
        <button type="button" class="btn btn-primary pull-right">创建新项目</button>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-center">项目名称</th>
                        <th class="text-center">封面图片</th>
                        <th class="text-center">适用性别</th>
                        <th class="text-center">适用年级</th>
                        <th class="text-center" style="width:300px;">描述</th>
                        <th class="text-center">创建时间</th>
                        <th class="text-center">操作</th>
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=row%}
                    <tr>
                        <td>{%$row.name%}</td>
                        <td><img src="{%$row.coverimg%}"></td>
                        <td>{%$row.gender%}</td>
                        <td>
                            {%if $row.grade_apply%}
                                {%foreach from=$row.grade_apply item=v%}
                                    {%$v%}<br/>
                                {%/foreach%}
                            {%/if%}
                        </td>
                        <td>{%$row.desc%}</td>
                        <td>
                            {%$row.ctime|date_format:"%Y-%m-%d"%}<br/>
                            {%$row.ctime|date_format:"%H:%M:%S"%}
                        </td>
                        <td>
                            <a href="/sport/p/{%$row._id%}.html" class="btn btn-sm btn btn-primary" target="__blank">查 看</a>
                            <!-- <button type="button" data-id="{%$row._id%}.html" class="btn btn-sm btn-danger" onclick="del(this)">删 除</button> -->
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
        // if(!confirm('确定要删除该动作？')) return false;

        // var id = $(el).data('id');
        // if(!id) return false;

        // $.post('/sport/actionDel',{'id':id},function(json){
        //     if(json.errCode == 0){
        //         window.location.reload();
        //     }
        //     else{
        //         alert('删除失败.');
        //     }
        // });
    }
</script>
{%/block%}