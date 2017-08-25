{%extends file="common/page/layout.tpl"%} 
{%block name="title"%}天天向尚管理后台{%/block%}
{%block name="bread"%}学校信息管理 / 添加学校{%/block%}
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
                    <label for="aname">学校名称</label>
                    <input type="text" class="form-control" id="schoolName" placeholder="School Name" name="name">
                </div>

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
                    <label for="singletime">所在地址</label>
                    <input type="text" class="form-control" id="singletime" placeholder="Adress" name="adress">
                </div>

                <div class="form-group">
                    <label for="calorie">学校介绍</label>
                    <input type="text" class="form-control" id="calorie" placeholder="School Intruction" name="introduction">
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

<script type="text/javascript" src="/static/school/js/add.js"></script>
{%/block%}

