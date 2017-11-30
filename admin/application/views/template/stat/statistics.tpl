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

</style>
{%/block%}
{%block name="bread"%}运营管理 / 业务数据统计 {%/block%}
{%block name="content"%}
<div class="row">
     <div class="col-md-12">
        <form name ="form">
        <ul class="list-unstyled" style="border:1px solid #ddd;overflow:hidden;padding:20px;border-radius: 5px;">

            <li id="ty" style="border-bottom:1px dashed #ddd;overflow:hidden;margin-bottom:10px;">
                <div class="row">
                    <div class="col-md-2"> 
                        <p><strong>锻炼类型：</strong></p>
                        <select class="form-control" id="type" name="type" style="margin-bottom:15px;width: 110px;float: left;">
                            <option value="-1" selected="selected">全部</option>
                            <option value="1">正常锻炼</option>
                            <option value="2">校外打卡</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <p><strong>查询时间单位：</strong></p>
                        <select class="form-control" id="timeStype" name="timeStype" style="margin-bottom:15px;width: 110px;float: left;">
                            <!-- <option value="-1">全部</option> -->
                            <option value="1" selected="selected">每日</option>
                            <option value="2">每周</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" style="border-bottom:1px ;overflow:hidden;margin-bottom:10px;">
                            <p><strong>时间维度：</strong></p>
                            <div class="input-group">
                                <input readonly="true" value="{%$data.initStart%}" data-type="time" id="date_start" name="start" type="text" class="form-control date_start date" data-date-format="yyyy-mm-dd"/>
                                <div class="input-group-addon" style="border-left: 0;border-right: 0;"> 至 </div>
                                <input readonly="true" value="{%$data.initEnd%}" data-type="time" id="date_end" name="end" type="text" class="form-control date_end date" data-date-format="yyyy-mm-dd"/>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
                
            <li id="kj" style="border-bottom:1px dashed #ddd;overflow:hidden;margin-bottom:10px;">
                <p><strong>空间维度：</strong></p>
                <select class="form-control" id="province" name="province" style="margin-bottom:15px;width: 110px;float: left;">
                    <option value="-1">全部</option>
                    {%foreach from=$data.province item=row%}
                    <option value="{%$row._id%}">{%$row.name%}</option>
                    {%/foreach%}
                </select>
            </li>

            <li style="border-bottom:1px dashed #ddd;overflow:hidden;margin-bottom:15px;padding-bottom:5px;">
                <label class="control-label" style="width:80px;">数据指标：</label>
                
                <label class="radio-inline" style="width:95px;">
                    <input type="radio" value="1" name="source" checked="true"/>总体数据
                </label>
                <label class="radio-inline" style="width:95px;">
                    <input type="radio" value="2" name="source"/>分项数据
                </label>
                <label class="radio-inline" style="width:120px;">
                    <input type="radio" value="3" name="source"/>体测与锻炼数据
                </label>
            </li>
            
            <li style="overflow:hidden;">
                <button type="button" class="btn btn-primary" id="subbtn" style="width:80px;">查询</button>
                <button type="button" class="btn btn-info" id="export" style="width:80px;margin-left:20px;" >导出</button>
            </li>
        </ul>

        </form>
    </div>
</div>

<!-- 图表 -->
<div class="row">
    <div class="col-md-12">
        <div class="" style="border-radius: 5px;border:1px solid #ddd;padding: 15px;">
            <div id="charts" style="height:450px;width:100%;border:1px solid #ddd;margin-bottom:15px;line-height: 450px;text-align: center;">

            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="charts-table">
                
                </table>
            </div>

            <div id="trainCount" style="height:450px;width:100%;border:1px solid #ddd;margin-bottom:15px;line-height: 450px;text-align: center;">

            </div>
            <div id="trainTime" style="height:450px;width:100%;border:1px solid #ddd;margin-bottom:15px;line-height: 450px;text-align: center;">

            </div>
            <div id="trainCal" style="height:450px;width:100%;border:1px solid #ddd;margin-bottom:15px;line-height: 450px;text-align: center;">

            </div>
            <div id="doneRate" style="height:450px;width:100%;border:1px solid #ddd;margin-bottom:15px;line-height: 450px;text-align: center;">

            </div>


        </div>
    </div>
</div>
{%/block%}

{%block name=js%}
<script src="/static/bootstrap/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script src="/static/widget/echarts/echarts.min.js"></script>
<script src="/static/stat/contrist.js"></script>
{%/block%}