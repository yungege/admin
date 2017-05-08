{%if $page_count > 1%}
<div class="paging">
{%*默认显示7个页码，采取前3后3标准*%}
{%$total = 7%}
{%*begin 循环开始*%}
{%*end 循环结束*%}
{%if $page_count > $total%}
{%if $pn == 1 || $pn <= floor($total / 2)%}
{%$begin = 1%}
{%else%}
{%$begin = $pn - floor($total / 2)%}
{%/if%}
{%$end = $begin + $total - 1%}
{%if $end > $page_count%}
{%$end = $page_count%}
{%$begin = $end - $total + 1%}
{%/if%}
{%else%}
{%$begin = 1%}
{%$end = $page_count%}
{%/if%}
<div class="paging-inner">
{%if $pn != 1 && $begin != 1%}
<a href="?{%$req_params|parse_uri:pn|f_escape_path%}pn=1">首页</a>
{%/if%}
{%if $pn !=1 %}
<a href="?{%$req_params|parse_uri:pn|f_escape_path%}pn={%$pn - 1%}">上一页</a>
{%/if%}
{%section name=loop loop=$total%}
{%$index = $smarty.section.loop.index + $begin%}
{%if $index <= $end%}
{%if $index != $pn%}
<a href="?{%$req_params|parse_uri:pn|f_escape_path%}pn={%$index|f_escape_path%}">{%$index|f_escape_xml%}</a>
{%else%}
<a href="javascript:void(0)" class="current">{%$index|f_escape_xml%}</a>
{%/if%}
{%/if%}
{%/section%}
{%if $pn != $page_count%}
<a href="?{%$req_params|parse_uri:pn|f_escape_path%}pn={%$pn + 1%}">下一页</a>
{%/if%}
{%if $pn < $page_count%}
<a href="?{%$req_params|parse_uri:pn|f_escape_path%}pn={%$page_count|f_escape_path%}">尾页</a>
{%/if%}
<span class="page-count">共{%$page_count|f_escape_xml%}页</span>
</div>
</div>
{%/if%}