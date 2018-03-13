{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="css"%}
<link href="/static/bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<style type="text/css">
.datetimepicker{
    margin-top: 50px;
}
.today{
    border: 1px solid #d9edf7!important;
}
.user-a{
    display: block;
    float: left;
    margin-left: 5px;
    text-decoration: underline;
}
#ty + div{
    margin:0px;
    border:0px;
    padding:0px;
}
.img-c{
    border: 1px solid #ddd;
    padding: 20px;
    width: 50%;
    height: 300px;
    overflow-y: scroll;
}

.img-c>img{
    width: 100%;
}
</style>
{%/block%}
{%block name="bread"%}运营管理 / 各班锻炼次数学生信息 {%/block%}
{%block name="content"%}
<div class="row">
     <div class="col-md-12">
        <form name ="form">
        <ul class="list-unstyled" style="border:1px solid #ddd;overflow:hidden;padding:20px;border-radius: 5px;">

            <li id="ty" style="border-bottom:1px dashed #ddd;overflow:hidden;margin-bottom:10px;">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group" style="border-bottom:1px ;overflow:hidden;margin-bottom:10px;">
                            <p><strong>请选择日期：</strong> </p>
                            <div class="input-group">
                                <input readonly="true" value="{%$initStart%}" data-type="time" id="date_start" name="start" type="text" class="form-control date_start date" data-date-format="yyyy-mm-dd"/>
                                <div class="input-group-addon" style="border-left: 0;border-right: 0;"> 至 </div>
                                <input readonly="true" value="{%$initEnd%}" data-type="time" id="date_end" name="end" type="text" class="form-control date_end date" data-date-format="yyyy-mm-dd"/>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li id="kj" style="border-bottom:1px dashed #ddd;overflow:hidden;margin-bottom:10px;">
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>请选择学校：</strong></p>
                        <select class="form-control" id="school" name="school" style="margin-bottom:15px;float: left;">
                            <option value="-1">请选择学校</option>
                            {%foreach from=$schoolList item=row%}
                            <option value="{%$row._id%}">{%$row.name%}</option>
                            {%/foreach%}
                        </select>
                    </div>
                </div>

            </li>

            <li style="overflow:hidden;">
                <a id="sub" href="javascript:void(0)" class="btn btn-primary" style="width:100px;" >导出Excel</a>
            </li>
        </ul>

        </form>

        <h3>Excel表格模板如下：</h3>
        <div class="img-c">
            <img src="https://oi7ro6pyq.qnssl.com/o_1c8ffuajpr40edlopn1pj315l2d.jpg">
        </div>
    </div>
</div>
{%/block%}

{%block name=js%}
<script src="/static/bootstrap/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<!-- <script src="/static/widget/echarts/echarts.min.js"></script> -->
<script type="text/javascript">
;(function($){
    var btn = $('#sub');
    var form = $('form[name=form]');
    $('#date_start').datetimepicker({
        language: 'zh-CN',
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        minView: 2,
        endDate: new Date(),
    });

    $('#date_end').datetimepicker({
        language: 'zh-CN',
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        minView: 2,
    });

    btn.on('click', function(e){
        if($('#school').val() == -1){
            alert('请选择学校');
            return false;
        }
        var data = form.serialize();
        window.location = '?' + data + '&export=1';
    })
})(jQuery)
</script>
{%/block%}