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
                    <input type="text" class="form-control" id="aname" placeholder="School Name" name="name">
                </div>

                <div class="form-group">
                    <label for="atype">所属省份</label>
                    <select id="atype" class="form-control" name="province">
                        <option value="-1">请选择学校所在省份</option>
                        <option value="北京" selected>北京</option>
                       
                    </select>
                </div>

                <div class="form-group">
                    <label for="ftype">所在城市</label>
                    <select id="ftype" class="form-control" name="city">
                        <option value="-1">请选择学校所在城市</option>
                        <option value="北京" selected>北京市</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="sex">所在区</label>
                    <select id="sex" class="form-control" name="district">
                        <option value="-1">请选择学校所在区</option>
                        <option value="东城">东城区</option>
                        <option value="西城">西城区</option>
                        <option value="朝阳">朝阳区</option>
                        <option value="海淀">海淀区</option>
                        <option value="丰台">丰台区</option>
                        <option value="通州">通州区</option>
                        <option value="昌平">昌平区</option>
                        <option value="石景山">石景山区</option>
                        <option value="房山">房山区</option>
                        <option value="门头沟">门头沟区</option>
                        <option value="顺义">顺义区</option>
                        <option value="怀柔">怀柔区</option>
                        <option value="平谷">平谷区</option>
                        <option value="密云">密云区</option>
                        <option value="延庆">延庆区</option>
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

