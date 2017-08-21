{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}班级信息管理 / 添加班级{%/block%}
{%block name="css"%}
<style type="text/css">
    .fix-per{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        background: rgba(0,0,0,0.4);
        z-index: 9999;
        display: none;
    }
    .fix-per .fix-cont{
        width: 400px;
        height: 200px;
        line-height: 200px;
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-left: -200px;
        margin-top: -100px;
        font-size: 100px;
        color: orange;
    }
    .form-wrap{
        border: 1px solid #ccc;
        padding: 8px 15px 15px 15px;
        border-radius: 5px;
    }
</style>
{%/block%}
{%block name="content"%}
<div class="row">
    <div class="col-lg-8">
        <div class="form-wrap">
            
            <form name="class">
                <div class="form-group">
                    <label for="aname">学校ID</label>
                    <input type="text" class="form-control" id="schoolId" placeholder="School ID" name="schoolId">
                </div>

                <div class="form-group"> 
                    <label for="start">入学时间</label>
                    <div class="col-sm-5 input-group date date_start" data-date="" data-date-format="yyyy-mm-dd">

                        <input readonly type="text" class="form-control" id="start" name="start" value="{%$smarty.get.start%}" >
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="grade">年级</label>
                    <select id="grade" class="form-control" name="grade">
                        <option value="-1">请选择班级所在年级</option>
                        <option value="11">小学1年级</option>
                        <option value="12">小学2年级</option>
                        <option value="13">小学3年级</option>
                        <option value="14">小学4年级</option>
                        <option value="15">小学5年级</option>
                        <option value="16">小学6年级</option>
                        <option value="21">初中1年级</option>
                        <option value="22">初中2年级</option>
                        <option value="23">初中3年级</option>
                        <option value="31">高中1年级</option>
                        <option value="32">高中2年级</option>
                        <option value="33">高中3年级</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="classNo">所在班级</label>
                    <select id="classNo" class="form-control" name="classNo">
                        <option value="-1">请选择班级号</option>
                        <option value="1">1班</option>
                        <option value="2">2班</option>
                        <option value="3">3班</option>
                        <option value="4">4班</option>
                        <option value="5">5班</option>
                        <option value="6">6班</option>
                        <option value="7">7班</option>
                        <option value="8">8班</option>
                        <option value="9">9班</option>
                        <option value="10">10班</option>
                        <option value="11">11班</option>
                        <option value="12">12班</option>
                        <option value="13">13班</option>
                        <option value="14">14班</option>
                        <option value="15">15班</option>
                        <option value="16">16班</option>
                        <option value="17">17班</option>
                        <option value="18">18班</option>
                        <option value="19">19班</option>
                        <option value="20">20班</option>
                        <option value="21">21班</option>
                        <option value="22">22班</option>
                        <option value="23">23班</option>
                        <option value="24">24班</option>
                        <option value="25">25班</option>
                        <option value="26">26班</option>
                        <option value="27">27班</option>
                        <option value="28">28班</option>
                        <option value="29">29班</option>
                        <option value="30">30班</option>
                    </select>
                </div>
                            
                <button id="sub" type="button" class="btn btn-primary">确认提交</button>
               <!--  <button id="button" type="button" class="btn btn-danger" >取&emsp;消</button> -->
            </form>
        </div>
    </div>
</div>

<!-- modal-add -->
<div class="fix-per">
    <div class="fix-cont">
        <!-- 100% -->
    </div>
    
</div>

{%/block%}

{%block name="js"%}

<script type="text/javascript" src="/static/bootstrap/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="/static/class/js/add.js"></script>
<script type="text/javascript" src="/static/ugc/index.js"></script>
{%/block%}

