{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="css"%}
<link href="/static/bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="/static/ugc/css/jPicture.min.css">

<style type="text/css">
.date_start,.date_end{
    float: left!important;
}
.datetimepicker{
    margin-top: 50px!important;
}
.fix-box{
    width: 100%;
    height: 100%;
    position: fixed;
    z-index: 99999;
    background-color: rgba(0,0,0,0.4);
    top: 0;
    left: 0;
    display: none;
}
.fix-box-inner{
    width: 400px;
    height: 300px;
    background-color: white;
    padding: 15px;
    border: #ccc;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -80px;
    margin-left: -200px;
}
.fix-box-picture{
    width: 100%;
    height: 100%;
    position: fixed;
    z-index: 99999;
    background-color: rgba(0,0,0,0.4);
    top: 0;
    left: 0;
    display: none;
}
.fix-box-inner-picture{
    width: 530px;
    height: 430px;
    background-color: white;
    padding: 15px;
    border: #ccc;
    position: absolute;
    top: 30%;
    left: 50%;
    margin-top: -80px;
    margin-left: -200px;
}
#imgBox{
    width:500px;
    height:300px;
}
.item{
    width: 500px;
}
.carousel-inner{
    height:300px;
    width:500px;
}

}
</style>
{%/block%}
{%block name="bread"%}运营管理 / LOG{%/block%}
{%block name="content"%}
<div class="row">
    <div class="col-lg-12">
        <form method="get" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="form-horizontal row">

                        <div class="col-md-4">
                            <div class="row">
                                <label class="col-md-3 paddZero control-label">查询时间：</label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-sm-5 input-group date date_start" data-date="" data-date-format="yyyy-mm-dd">
                                            <input readonly type="text" class="form-control" id="start" name="start" value="{%$smarty.get.start%}" >
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                        <div class="col-sm-1"></div>
                                       
                                        <a class="btn btn-info btn-sm" id="submit">查&emsp;询</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><br/>
                    
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

                        <th>日志信息</th>
                        
                    </tr>
                </thead>
                <tbody id='log-list'>
                    {%foreach from=$content item=row%}
                    <tr >
                        <td>{%$row%}</td>
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
<script type="text/javascript" src="/static/bootstrap/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="/static/log/js/index.js"></script>
{%/block%}