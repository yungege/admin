{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}学校信息管理 / 添加老师{%/block%}
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

    .fix-grade , .fix-class{
        display:none;
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

                <div class="form-group class-add">
                    <label for="add-class">添加管理班级</label>
                    <select id="add-class" class="form-control" name="type">
                        <option value="-1" selected>请选择添加方式</option>
                        <option value="1" >添加整个学校的班级</option>
                        <option value="2" >添加整个年级的班级</option>
                        <option value="3" >添加部分班级</option>
                    </select>
                </div>

                <div class="form-group fix-grade">
                    <label for="grade">所管年级</label>
                    <select id="grade" class="form-control" name="grade">
                        <option value="-1" selected>请选择学生所在年级</option>
                        {%foreach from=$gradeList item=gradeName key=gradeNo %}
                            <option value="{%$gradeNo%}">{%$gradeName%}</option>
                        {%/foreach%}  
                    </select>
                </div>

                <div class="form-group fix-class">
                    <label for="class">所管班级ID(多个班级ID用  |  隔开)</label>
                    <input type="text" name="class" class="form-control" placeholder="ClassId">
                </div>

                <div class="form-group">
                    <label for="username">姓名</label>
                    <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                </div>
                     
                <div class="form-group">
                    <label for="isTest">是否是体验老师</label>
                    <select id="isTest" class="form-control" name="isTest">
                        <option value="0" selected>不是</option>
                        <option value="1" >是</option>
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

<script type="text/javascript" src="/static/teacher/js/add.js"></script>
<script type="text/javascript" src="/static/bootstrap/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>

{%/block%}

