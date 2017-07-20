{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}客户端管理 / 版本列表<a href="/version/add" class="btn btn-primary btn-sm" style="margin-left: 10px;">发布新版本</a>{%/block%}
{%block name="content"%}

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-center">平台类型</th>
                        <th class="text-center">版本号名称</th>
                        <th class="text-center">版本号</th>
                        <th class="text-center" style="width: 400px;">升级描述</th>
                        <th class="text-center" style="min-width: 100px;">发布时间</th>
                        <th class="text-center" style="min-width: 100px;">操作</th>
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=row%}
                    <tr>
                        <td>
                            {%if $row.type eq 1 %}
                                Android
                            {%else%}
                                iOS
                            {%/if%}
                        </td>
                        <td>{%$row.version%}</td>
                        <td>{%$row.versionno%}</td>
                        <td style="text-align: left;">{%$row.description|nl2br%}</td>
                        <td>{%$row.createtime|date_format:"%Y-%m-%d"%}<br/>{%$row.createtime|date_format:"%H:%M:%S"%}</td>
                        <td>
                            <a href="{%$row.downloadurl%}" class="btn btn-sm btn-info">下载</a>
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