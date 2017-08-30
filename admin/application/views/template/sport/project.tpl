{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}运动圈 / 锻炼方案管理 <a href="/project/add" class="btn btn-primary btn-sm" style="margin-left: 10px;">创建锻炼方案</a>{%/block%}
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
                        <th class="text-center">项目名称</th>
                        <th class="text-center">封面图片</th>
                        <th class="text-center">适用性别</th>
                        <th class="text-center">适用年级</th>
                        <th class="text-center">锻炼内容</th>
                        <th class="text-center" width="300">描述</th>
                        <th class="text-center">创建时间</th>
                        <th class="">操作</th>
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=row%}
                    <tr data-id="{%$row._id%}">
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
                        <td>
                            {%if $row.skus%}
                                {%foreach from=$row.skus item=sk%}
                                    {%if $sk.difficulty eq -1%}
                                        难度级别：无<br/>
                                    {%elseif $sk.difficulty eq 0%}
                                        难度级别：低<br/>
                                    {%elseif $sk.difficulty eq 1%}
                                        难度级别：中<br/>
                                    {%elseif $sk.difficulty eq 2%}
                                        难度级别：高<br/>
                                    {%else%}
                                        难度级别：未知
                                    {%/if%}
                                {%/foreach%}
                            {%else%}
                                无锻炼内容，<a href="/project/sku/{%$row._id%}.html">立即添加</a>?
                            {%/if%}
                        </td>
                        <td width="400">{%$row.desc%}</td>
                        <td>
                            {%$row.ctime|date_format:"%Y-%m-%d"%}<br/>
                            {%$row.ctime|date_format:"%H:%M:%S"%}
                        </td>
                        <td class="text-left">
                            <a href="/sport/p/{%$row._id%}.html" class="btn btn-sm btn btn-primary">查 看</a>
                            {%if $row.add eq 1%}
                            <a href="/project/sku/{%$row._id%}.html" class="btn btn-sm btn btn-info">添 加</a>
                            {%/if%}
                            <!-- <button type="button" data-id="{%$row._id%}.html" class="btn btn-sm btn-danger" onclick="del(this)">删 除</button> -->
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

{%/block%}

{%block name="js"%}
<script type="text/javascript">
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