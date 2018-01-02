{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}学校信息管理 / 添加学生{%/block%}
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
            
            <form name="school">

                <div class="form-group">
                    <label for="province">所属省份</label>
                    <select id="province" class="form-control" name="province">
                        <option value="-1" selected>请选择学校所在省份</option>
                        {%foreach from=$provinceList item=provinceName key=provinceId %}
                            <option value="{%$provinceId%}">{%$provinceName%}</option>
                        {%/foreach%}          
                    </select>
                </div>

                <div class="form-group">
                    <label for="city">所在城市</label>
                    <select id="city" class="form-control" name="city">
                        <option value="-1" selected>请选择学校所在城市</option>
                       
                    </select>
                </div>

                <div class="form-group">
                    <label for="district">所在区</label>
                    <select id="district" class="form-control" name="district">
                        <option value="-1" selected>请选择学校所在区</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="school">所在学校</label>
                    <select id="school" class="form-control" name="school">
                        <option value="-1" selected>请选择学生所在学校</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="grade">所在年级</label>
                    <select id="grade" class="form-control" name="grade">
                        <option value="-1" selected>请选择学生所在年级</option>
                        {%foreach from=$gradeList item=gradeName key=gradeNo %}
                            <option value="{%$gradeNo%}">{%$gradeName%}</option>
                        {%/foreach%}  
                    </select>
                </div>

                <div class="form-group">
                    <label for="class">所在班级</label>
                    <select id="class" class="form-control" name="class">
                        <option value="-1" selected>请选择学生所在班级</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="username">姓名</label>
                    <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                </div>

                <div class="form-group">
                    <label for="sex">性别</label>
                    <select id="sex" class="form-control" name="sex">
                        <option value="-1" selected>请选择学生性别</option>
                        {%foreach from=$sex item=sexName key=sexNo %}
                            <option value="{%$sexNo%}">{%$sexName%}</option>
                        {%/foreach%}  
                    </select>
                </div>

                <div class="form-group">
                    <label for="birthday">生日</label></label>
                    <div class="col-sm-5 input-group date date_start" data-date="" data-date-format="yyyy-mm-dd">
                        <input readonly type="text" class="form-control" id="birthday" name="birthday" value="{%$smarty.get.start%}" >
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
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

<script type="text/javascript" src="/static/student/js/add.js"></script>
<script type="text/javascript" src="/static/bootstrap/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<!-- <script type="text/javascript" src="/static/ugc/index.js"></script> -->

{%/block%}

