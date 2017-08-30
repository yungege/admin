{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}运动圈 / 作业管理  <a href="/sport/project" class="btn btn-primary btn-sm" style="margin-left: 10px;">发布作业</a>{%/block%}
{%block name="css"%}
<link href="/static/bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<style type="text/css">
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
    height: 160px;
    background-color: white;
    padding: 15px;
    border: #ccc;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -80px;
    margin-left: -200px;
}
.inner-btn{
    margin-top: 15px;
}
.inner-btn .btn{
    width: 80px;
}
</style>
{%/block%}
{%block name="content"%}
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">名称</th>
                        <th class="text-center">类型</th>
                        <th class="text-center">封面</th>
                        <th class="text-center">学校</th>
                        <th class="text-center">班级</th>
                        <th class="text-center">周锻炼次数</th>
                        <th class="text-center">作业间隔</th>
                        <th class="text-center">补作业间隔</th>
                        <th class="text-center">性别</th>
                        <th class="text-center">项目</th>
                        <th style="width: 100px;" class="text-center">有效期</th>
                        <th style="width: 100px;" class="text-center">创建时间</th>
                        <th>状态</th>
                        <th class="text-center">操作</th>
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=row%}
                    <tr data-id="{%$row._id%}">
                        <td>{%$row._id%}</td>
                        <td>{%$row.name%}</td>
                        <td>{%if $row.type eq 1%}<span class="label label-warning">翻</span>{%else%}<span class="label label-primary">素</span>{%/if%}</td>
                        <td><img src="{%$row.project[0].coverimg%}" width="100"></td>
                        <td>{%$row.school%}</td>
                        <td><button type="button" data-id="{%$row._id%}" class="btn btn-sm btn-success" onclick="getClass(this)">查 看</button></td>
                        <td>{%$row.weekdoneno%}</td>
                        <td>{%$row.makeup_limit|ttxs_parse_stamp%}</td>
                        <td>{%if $row.makeup_interval eq 0%}无限制{%else%}{%$row.makeup_interval%}天{%/if%}</td>
                        <td>{%if $row.gender eq 1%}女{%elseif $row.gender eq 2%}无限制{%else%}男{%/if%}</td>
                        <td>
                            {%foreach from=$row.project item=pro%}
                                <a href="/sport/p/{%$pro._id%}.html">{%$pro.name%}</a><br/>
                            {%/foreach%}
                        </td>
                        <td>
                            {%$row.start_time|date_format:"%Y-%m-%d"%}<br/>
                            {%$row.deadline_time|date_format:"%Y-%m-%d"%}
                        </td>
                        <td>{%$row.create_time|date_format:"%Y-%m-%d"%}</td>
                        <td>{%if $row.status == 1%}<span class="label label-success">锻炼中</span>{%elseif $row.status == -1%}<span class="label label-danger">已过期</span>{%else%}<span class="label label-defult">未生效</span>{%/if%}</td>
                        <td>
                            <!-- <button type="button" data-id="{%$row._id%}" class="btn btn-sm btn-danger" onclick="del(this)">删 除</button> -->
                            {%if $row.status == 1%}
                            <button type="button" data-id="{%$row._id%}" data-old-date="{%$row.deadline_time|date_format:'%Y-%m-%d'%}" class="btn btn-sm btn-primary delay_date">修改结束时间</button>
                            {%/if%}
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

<!-- modal -->
<div class="fix-box">
    <div class="fix-box-inner">
        <h4>修改作业结束时间</h4>
        <form class="form" name="work">
            <div class="input-append date" id="datetimepicker" data-date-format="yyyy-mm-dd">
                <input class="form-control" readonly size="16" id="deadline_time" name="deadline_time" type="text">
                <span class="add-on"><i class="icon-remove"></i></span>
                <span class="add-on"><i class="icon-th"></i></span>
            </div>   
           <input type="hidden" name="hid">
           <input type="hidden" name="old">
            <div class="inner-btn">
                <button id="sub" type="button" class="btn btn-primary">确定</button>
                <button id="can" type="button" class="btn btn-default">取消</button>
            </div>
        </form>
    </div>
</div>

{%/block%}

{%block name="js"%}
<script type="text/javascript" src="/static/bootstrap/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script type="text/javascript">

    function del(el){
        if(!confirm('确定要删除该动作？')) return false;

        var id = $(el).data('id');
        if(!id) return false;

        $.post('/sport/actionDel',{'id':id},function(json){
            if(json.errCode == 0){
                window.location.reload();
            }
            else{
                alert('删除失败.');
            }
        });
    }

    $(function(){
        var delayDate = {
            init: function(){
                this.getDom();
                this.displayBox();
                this.hideBox();
                this.initDate();
                this.postData();
            },
            getDom: function(){
                this.showBtn = $('.delay_date');
                this.hideBtn = $('#can');
                this.showBox = $('.fix-box');
                this.timeInt = $('#deadline_time');
                this.timeShow = $('#datetimepicker');
                this.subBtn = $('#sub');

                this.old = $('input[name=old]');
                this.hid = $('input[name=hid]');
                this.form = $('form[name=work]')
            },
            initDate: function(){
                var me = this;

                me.timeShow.datetimepicker({
                    autoclose: 1,
                    todayHighlight: 1,
                    minView: 2,
                    forceParse: 0,
                    startDate: new Date(),
                });
            },
            displayBox: function(){
                var me = this;
                me.showBtn.unbind().bind('click', function(){
                    var date = $(this).data('old-date'),
                        id = $(this).data('id');
                    me.timeInt.attr('placeholder', date);
                    me.showBox.fadeIn(200);

                    me.old.val(date);
                    me.hid.val(id);
                });
            },
            hideBox: function(){
                var me = this;
                me.hideBtn.unbind().bind('click', function(){
                    me.showBox.fadeOut(200);
                    me.old.val('');
                    me.hid.val('');
                    me.timeInt.attr('placeholder', '');
                });
            },

            postData: function(){
                var me = this;
                me.subBtn.unbind().bind('click', function(){
                    if(!me.timeInt.val){
                        alert('请选择结束日期');
                        return false;
                    }
                    var data = me.form.serialize();
                    $.post('/sport/updateDeadlineTime', data, function(json){
                        if(json.errCode == 0){
                            window.location.reload();
                        }
                        else{
                            alert(json.errMessage);
                        }
                    })
                });
                
            }
        };

        delayDate.init()
    })
</script>
{%/block%}