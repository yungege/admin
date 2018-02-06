<?php /* Smarty version Smarty-3.1.13, created on 2018-02-06 10:45:42
         compiled from "/var/www/admin/admin/application/views/template/project/addhomework.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3054166485a7916d62940a6-94081747%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97b3f07dffbd0e61e74aaa4eac9dda83020dbdf7' => 
    array (
      0 => '/var/www/admin/admin/application/views/template/project/addhomework.tpl',
      1 => 1509502905,
      2 => 'file',
    ),
    '1af1c7811d93168106c85becc3c13354fe96fe45' => 
    array (
      0 => '/var/www/admin/admin/application/views/template/common/page/layout.tpl',
      1 => 1510105563,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3054166485a7916d62940a6-94081747',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'userInfo' => 0,
    'pageTag' => 0,
    'currentUrl' => 0,
    'myMeau' => 0,
    'idx' => 0,
    'meauItem' => 0,
    'currentId' => 0,
    'childItem' => 0,
    'tag' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a7916d64174d7_07887777',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7916d64174d7_07887777')) {function content_5a7916d64174d7_07887777($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>天天向尚管理后台</title>

    <!-- ico -->
    <link rel="icon" href="/static/imgs/favicon.ico" type="image/x-icon"/>

    <!-- Bootstrap Core CSS -->
    <link href="/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/static/bootstrap/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/static/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="/static/widget/alertBox/alert.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        body{
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif!important;
        }
        .cy-child-active{
            background-color: black;
            color: white!important;
        }
        footer{
            margin-top: 50px;
            padding-top: 15px;
            font-size: 11px;
            border-top: 1px solid #ccc;
        }
        .tt-page{
            margin-top: 15px;
        }
        .tt-page a{
            padding: 6px 12px;
            margin-right: 5px; 
            border: 1px solid #31b0d5;
            color: #31b0d5;
            text-decoration: none;
            background: #fff;

            transition: all 0.3s;
        }
        .tt-page a:hover{
            background: #31b0d5;
            color: white;
        }
        .tt-page .current{
            padding: 6px 12px;
            margin-right: 5px;
            border: 1px solid #333;
            background: #fff;
        }
        /*alert 插件*/
        .alert-btn-p{
            /*width: 100%!important;*/
            margin-bottom: 0!important;
        }
        .alert-container{
            width: 400px!important;
        }
    </style>
    
<style type="text/css">
    .fx-btn{
        border: 1px solid #ccc;
        padding: 165px 20px 0 20px;
        height: 532px;
    }
    .fx-btn a{
        display: block;
        margin-bottom: 10px;
    }
    #class-list,#class-list-select,#class-list-rest{
        height: 500px;
    }
    .border-h3{
        border-left: 5px solid #5bc0de;
        padding-left: 15px;
        font-size: 20px;
    }

  /*  #start,#end,#homework-type,#homework-name,#homework-describe,#homework-require,#homework-type,#makeup-limit,#makeup-interval{
        width: 700px;
    }*/
   
</style>

</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">&emsp;TTXS Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <!-- <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                    </ul> -->
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <?php if ($_smarty_tpl->tpl_vars['userInfo']->value['iconurl']){?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['iconurl'];?>
?imageView2/2/w/60/h/60/q/100" alt="..." width="20" height="20" style="border-radius: 10px;">
                    <?php }else{ ?>
                    <i class="fa fa-user"></i>
                    <?php }?>
                    <?php echo $_smarty_tpl->tpl_vars['userInfo']->value['username'];?>
 <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/user/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <!-- <?php if (isset($_smarty_tpl->tpl_vars['tag'])) {$_smarty_tpl->tpl_vars['tag'] = clone $_smarty_tpl->tpl_vars['tag'];
$_smarty_tpl->tpl_vars['tag']->value = (explode('-',$_smarty_tpl->tpl_vars['pageTag']->value)); $_smarty_tpl->tpl_vars['tag']->nocache = null; $_smarty_tpl->tpl_vars['tag']->scope = 0;
} else $_smarty_tpl->tpl_vars['tag'] = new Smarty_variable((explode('-',$_smarty_tpl->tpl_vars['pageTag']->value)), null, 0);?> -->
                    <li <?php if ($_smarty_tpl->tpl_vars['currentUrl']->value=='/'||$_smarty_tpl->tpl_vars['currentUrl']->value=='/index.html'){?> class="active" <?php }?>>
                        <a href="/"><i class="fa fa-fw fa-dashboard"></i> HOME PAGE</a>
                    </li>
                    <?php  $_smarty_tpl->tpl_vars['meauItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['meauItem']->_loop = false;
 $_smarty_tpl->tpl_vars['idx'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['myMeau']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['meauItem']->key => $_smarty_tpl->tpl_vars['meauItem']->value){
$_smarty_tpl->tpl_vars['meauItem']->_loop = true;
 $_smarty_tpl->tpl_vars['idx']->value = $_smarty_tpl->tpl_vars['meauItem']->key;
?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#m-<?php echo $_smarty_tpl->tpl_vars['idx']->value;?>
"><i class="<?php echo $_smarty_tpl->tpl_vars['meauItem']->value['icon_style'];?>
"></i> <?php echo $_smarty_tpl->tpl_vars['meauItem']->value['name'];?>
 <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                        <ul id="m-<?php echo $_smarty_tpl->tpl_vars['idx']->value;?>
" class="collapse <?php if ($_smarty_tpl->tpl_vars['currentId']->value==$_smarty_tpl->tpl_vars['meauItem']->value['_id']){?>in<?php }?>">
                            <?php  $_smarty_tpl->tpl_vars['childItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['childItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['meauItem']->value['_child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['childItem']->key => $_smarty_tpl->tpl_vars['childItem']->value){
$_smarty_tpl->tpl_vars['childItem']->_loop = true;
?>
                            <li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['childItem']->value['url'];?>
" class="<?php if ($_smarty_tpl->tpl_vars['childItem']->value['url']==$_smarty_tpl->tpl_vars['currentUrl']->value){?>cy-child-active<?php }?>"><?php echo $_smarty_tpl->tpl_vars['childItem']->value['name'];?>
</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                    <!-- <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#m-user"><i class="fa fa-fw fa-user"></i> 用户管理 <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                        <ul id="m-user" class="collapse <?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==2){?>in<?php }?>">
                            <li>
                                <a href="/user/student" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==2&&$_smarty_tpl->tpl_vars['tag']->value[1]==1){?>cy-child-active<?php }?>">学生管理</a>
                            </li>
                            <li>
                                <a href="/user/class" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==2&&$_smarty_tpl->tpl_vars['tag']->value[1]==2){?>cy-child-active<?php }?>">班级管理</a>
                            </li>
                            <li>
                                <a href="/user/school" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==2&&$_smarty_tpl->tpl_vars['tag']->value[1]==3){?>cy-child-active<?php }?>">学校管理</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#sport">
                            <i class="fa fa-fw fa-bicycle"></i> 锻炼内容管理 <i class="fa fa-fw fa-caret-down pull-right"></i>
                        </a>
                        <ul id="sport" class="collapse <?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==3){?>in<?php }?>">
                            <li>
                                <a href="/sport/homework" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==3&&$_smarty_tpl->tpl_vars['tag']->value[1]==1){?>cy-child-active<?php }?>">作业</a>
                            </li>
                            <li>
                                <a href="/sport/project" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==3&&$_smarty_tpl->tpl_vars['tag']->value[1]==2){?>cy-child-active<?php }?>">锻炼方案</a>
                            </li>
                            <li>
                                <a href="/sport/action" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==3&&$_smarty_tpl->tpl_vars['tag']->value[1]==3){?>cy-child-active<?php }?>">动作</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#basic"><i class="fa fa-fw fa-bar-chart-o"></i> 运营管理 <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                        <ul id="basic" class="collapse <?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==4){?>in<?php }?>">
                            <li>
                                <a href="/sport/banner" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==4&&$_smarty_tpl->tpl_vars['tag']->value[1]==1){?>cy-child-active<?php }?>">Banner</a>
                            </li>

                            <li>
                                <a href="/sport/ugc" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==4&&$_smarty_tpl->tpl_vars['tag']->value[1]==2){?>cy-child-active<?php }?>">UGC</a>
                            </li>

                            <li>
                                <a href="/stat/statistics" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==4&&$_smarty_tpl->tpl_vars['tag']->value[1]==3){?>cy-child-active<?php }?>">统计数据</a>
                            </li>

                            <li>
                                <a href="#" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==4&&$_smarty_tpl->tpl_vars['tag']->value[1]==4){?>cy-child-active<?php }?>">运动圈精华</a>
                            </li>

                            <li>
                                <a href="/feedback/index" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==4&&$_smarty_tpl->tpl_vars['tag']->value[1]==5){?>cy-child-active<?php }?>">反馈建议</a>
                            </li>
                            
                            <li>
                                <a href="/upload/index" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==4&&$_smarty_tpl->tpl_vars['tag']->value[1]==6){?>cy-child-active<?php }?>">上传学生数据</a>
                            </li>
                        
                            <li>
                                <a href="/upload/outSport" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==4&&$_smarty_tpl->tpl_vars['tag']->value[1]==7){?>cy-child-active<?php }?>">上传课外活动数据</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#app"><i class="fa fa-fw fa-apple"></i> 平台设置 <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                        <ul id="app" class="collapse <?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==5){?>in<?php }?>">
                            <li>
                                <a href="/version/index" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==5&&$_smarty_tpl->tpl_vars['tag']->value[1]==1){?>cy-child-active<?php }?>">APP版本列表</a>
                            </li>
                            <li>
                                <a href="/version/add" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==5&&$_smarty_tpl->tpl_vars['tag']->value[1]==2){?>cy-child-active<?php }?>">发布新版本</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#push"><i class="fa fa-fw fa-paper-plane"></i> 推送管理 <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                        <ul id="push" class="collapse <?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==6){?>in<?php }?>">
                            <li>
                                <a href="/push/all" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==6&&$_smarty_tpl->tpl_vars['tag']->value[1]==1){?>cy-child-active<?php }?>">全员推送</a>
                            </li>
                            <li>
                                <a href="/push/user" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==6&&$_smarty_tpl->tpl_vars['tag']->value[1]==2){?>cy-child-active<?php }?>">个人推送</a>
                            </li>
                            <li>
                                <a href="/push/school" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==6&&$_smarty_tpl->tpl_vars['tag']->value[1]==3){?>cy-child-active<?php }?>">学校推送</a>
                            </li>
                            <li>
                                <a href="/push/grade" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==6&&$_smarty_tpl->tpl_vars['tag']->value[1]==4){?>cy-child-active<?php }?>">年级推送</a>
                            </li>
                            <li>
                                <a href="/push/class" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==6&&$_smarty_tpl->tpl_vars['tag']->value[1]==5){?>cy-child-active<?php }?>">班级推送</a>
                            </li>
                            <li>
                                <a href="/push/app" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==6&&$_smarty_tpl->tpl_vars['tag']->value[1]==6){?>cy-child-active<?php }?>">平台/学校通知推送</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#meau-man"><i class="glyphicon glyphicon-list"></i> 菜单及权限分配 <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                        <ul id="meau-man" class="collapse <?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==7){?>in<?php }?>">
                            <li>
                                <a href="/meau/list" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==7&&$_smarty_tpl->tpl_vars['tag']->value[1]==1){?>cy-child-active<?php }?>">菜单管理</a>
                            </li>
                            <li>
                                <a href="/meau/role" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==7&&$_smarty_tpl->tpl_vars['tag']->value[1]==2){?>cy-child-active<?php }?>">角色管理</a>
                            </li>
                            <li>
                                <a href="/meau/url" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==7&&$_smarty_tpl->tpl_vars['tag']->value[1]==3){?>cy-child-active<?php }?>">URL管理</a>
                            </li>
                            <li>
                                <a href="/meau/admin" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==7&&$_smarty_tpl->tpl_vars['tag']->value[1]==4){?>cy-child-active<?php }?>">管理员</a>
                            </li>
                        </ul>
                    </li> -->

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid" style="min-height: 691px;">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb" style="background-color: #d9edf7;margin-top: 15px;">
                            <li class="active">
                                <i class="fa fa-dashboard" style="margin-right: 10px;"></i> 发布作业
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- 用户数据 -->
                

<div class="row">
    <div class="col-lg-12">
        <h3 class="border-h3">所选方案 ：<?php if ($_smarty_tpl->tpl_vars['projectName']->value!=''){?>  <?php echo $_smarty_tpl->tpl_vars['projectName']->value;?>
   <?php }else{ ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/sport/project">选择</a>  <?php }?></h3>
        
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <h3 class="border-h3">所选学校 ：<?php echo $_smarty_tpl->tpl_vars['schoolName']->value;?>
  &nbsp;&nbsp;&nbsp;&nbsp;<a href="/user/school?type=1&projectId=<?php echo $_smarty_tpl->tpl_vars['projectId']->value;?>
">选择</a></h3>
        
    </div>
</div>
                                                    
<div class="row">
    <div class="col-lg-12">
    <h3 class="border-h3">起止时间</h3>
    <div class="col-sm-5 input-group date date_start" data-date="" data-date-format="yyyy-mm-dd">
        <input readonly type="text" class="form-control" id="start" name="start" value="<?php echo $_GET['start'];?>
" >
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
    
    <div class="col-sm-5 input-group date date_end" data-date="" data-date-format="yyyy-mm-dd">
        <input readonly type="text" class="form-control" id="end" name="end" value="<?php echo $_GET['end'];?>
">
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
    <h3 class="border-h3">作业类型</h3>
    <select class="form-control" name="homework-type" id="homework-type">
        <option value=1>翻转课堂</option>
        <option value=2>身体素质作业</option>
    </select>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
    <H3 class="border-h3">作业名字</H3>
    <input type="text" class="form-control" name="homework-name" id="homework-name">
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
    <H3 class="border-h3">作业描述</H3>
    <input type="text" class="form-control" name="homework-describe" id="homework-describe">
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
    <H3 class="border-h3">作业要求</H3>
    <input type="text" class="form-control" name="homework-require" id="homework-require">
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
    <h3 class="border-h3">周锻炼次数</h3>
    <select class="form-control" name="week-done-no" id="week-done-no">
        <option value=1>每周1天</option>
        <option value=2>每周2天</option>
        <option value=3>每周3天</option>
        <option value=4>每周4天</option>
        <option value=5>每周5天</option>
        <option value=6>每周6天</option>
        <option value=7>每周7天</option>
    </select>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
    <H3 class="border-h3">锻炼时间间隔(每隔几小时锻炼一次)</H3>
    <input type="text" class="form-control" name="makeup-limit" id="makeup-limit">
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
    <H3 class="border-h3">补作业锻炼限制(允许补多少天以内的作业)</H3>
    <input type="text" class="form-control" name="makeup-interval" id="makeup-interval">
    </div>
</div>
          

<div class="row">
    <div class="col-lg-12">
        <h3 class="border-h3">添加班级</h3><br/>
        <form class="form-inline" name="class">
            <div class="form-group">
                <label for="grade-type">年级</label>
                <select class="form-control" name="grade" id="grade-type">
                    <option value="">ALL</option>
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
                    <!-- 4 => '休息', -->
                </select>
            </div>
            <div class="form-group">
                <label for="grade-name">班级名称</label>
                <input type="text" class="form-control" name="name" id="action-name">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" name="schoolId" value="<?php echo $_smarty_tpl->tpl_vars['schoolId']->value;?>
">
                <input type="hidden" class="form-control" name="projectId" value="<?php echo $_smarty_tpl->tpl_vars['projectId']->value;?>
">
            </div>
            
            <button type="button" class="btn btn-info" id="search">检索</button>
        </form>
    </div>
</div>


<div class="row" style="margin-top: 20px;padding: 15px;">
    <div class="col-lg-3" style="border: 1px solid #ccc;padding: 15px;">
        <select multiple class="form-control" id="class-list">
            <?php  $_smarty_tpl->tpl_vars['ac'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ac']->_loop = false;
 $_smarty_tpl->tpl_vars['idx'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['actionList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ac']->key => $_smarty_tpl->tpl_vars['ac']->value){
$_smarty_tpl->tpl_vars['ac']->_loop = true;
 $_smarty_tpl->tpl_vars['idx']->value = $_smarty_tpl->tpl_vars['ac']->key;
?>
                <optgroup label="<?php echo $_smarty_tpl->tpl_vars['type']->value[$_smarty_tpl->tpl_vars['idx']->value];?>
">
                    <?php  $_smarty_tpl->tpl_vars['acl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['acl']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ac']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['acl']->key => $_smarty_tpl->tpl_vars['acl']->value){
$_smarty_tpl->tpl_vars['acl']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['acl']->value['_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['acl']->value['name'];?>
</option>
                    <?php } ?>
                </optgroup>
            <?php } ?>
        </select>
    </div>
    <div class="col-lg-2">
        <div class="text-center fx-btn" >
            <a id="t-r" href="javascript:void(0)" class="btn btn-sm btn-default">添加</a>
            <a id="t-l" href="javascript:void(0)" class="btn btn-sm btn-default">删除</a>
        </div>
    </div>
    <div class="col-lg-3" style="border: 1px solid #ccc;padding: 15px;">
        <select multiple class="form-control" id="class-list-select">
            <!-- <option>1</option> -->
        </select>
    </div>
    
</div>

<div class="row">
    <div class="col-lg-12">
        <form class="form-inline" name="sku">
            <button type="button" id="addHomeworkBtn" class="btn btn-md btn-primary">发布作业</button>
        </form>
    </div>
</div>
        



                <!-- footer -->
                <footer class="text-center">
                    ©2017 北京天天向尚信息科技有限公司 All Rights Resrverd
                </footer>
            </div>
        </div>
        
    </div>
    <!-- jQuery -->
    <script src="/static/bootstrap/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/static/bootstrap/js/bootstrap.min.js"></script>
    <script src="/static/widget/alertBox/alert.js"></script>

    <script type="text/javascript">
        !(function(){
            $('.navbar-nav li a[data-toggle=collapse]')
                .unbind()
                .bind('mouseleave', function(){
                    $(this).attr('style','background-color:#222!important');
                }).bind('mouseenter', function(){
                    $(this).attr('style','background-color:#000!important');
                })
        })()
    </script>

    
<script type="text/javascript" src="/static/bootstrap/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="/static/project/js/addHomework.js"></script>
<!-- <script type="text/javascript" src="/static/ugc/index.js"></script> -->

</body>
</html><?php }} ?>