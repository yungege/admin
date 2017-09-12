{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}UGC / 标记{%/block%}
{%block name="content"%}

<div class="row">
    <div class="col-lg-12">
        <form name="version">
            
            <div class="form-group">
                <label for="description">标记内容</label>
                <textarea id="description" class="form-control" rows="8"  name="description" >{%$mark%}</textarea>
            </div>
              
            <button id="sub" type="button" class="btn btn-primary">确认发布</button>
        </form>
    </div>
</div>

{%/block%}

