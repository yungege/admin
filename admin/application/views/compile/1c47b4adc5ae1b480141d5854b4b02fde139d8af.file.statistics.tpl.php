<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.13, created on 2018-03-13 09:49:53
         compiled from "/var/www/admin/admin/application/views/template/stat/statistics.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14612564565aa72e41541639-29408527%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.13, created on 2018-03-12 10:36:28
         compiled from "/var/www/admin/admin/application/views/template/stat/statistics.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7039566515aa5e7acbc1fb9-05869688%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> a477b9a23757b443cd9a8a6751cfa17b7ad141ed
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c47b4adc5ae1b480141d5854b4b02fde139d8af' => 
    array (
      0 => '/var/www/admin/admin/application/views/template/stat/statistics.tpl',
      1 => 1518002143,
      2 => 'file',
    ),
    '1af1c7811d93168106c85becc3c13354fe96fe45' => 
    array (
      0 => '/var/www/admin/admin/application/views/template/common/page/layout.tpl',
      1 => 1510105483,
      2 => 'file',
    ),
  ),
<<<<<<< HEAD
  'nocache_hash' => '14612564565aa72e41541639-29408527',
=======
  'nocache_hash' => '7039566515aa5e7acbc1fb9-05869688',
>>>>>>> a477b9a23757b443cd9a8a6751cfa17b7ad141ed
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
<<<<<<< HEAD
  'unifunc' => 'content_5aa72e416a56d0_88143219',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa72e416a56d0_88143219')) {function content_5aa72e416a56d0_88143219($_smarty_tpl) {?><!DOCTYPE html>
=======
  'unifunc' => 'content_5aa5e7acc13f52_98026187',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa5e7acc13f52_98026187')) {function content_5aa5e7acc13f52_98026187($_smarty_tpl) {?><!DOCTYPE html>
>>>>>>> a477b9a23757b443cd9a8a6751cfa17b7ad141ed
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
                                <i class="fa fa-dashboard" style="margin-right: 10px;"></i> 运营管理 / 业务数据统计 
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- 用户数据 -->
                
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
                            <p><strong>时间维度：</strong>  <a class="btn btn-primary btn-sm" style="margin-left: 10px;" id="half_quarter_time">半个季度</a> <a  class="btn btn-primary btn-sm" style="margin-left: 10px;" id="quarter_time">一个季度</a>  </p>
                            <div class="input-group">
                                <input readonly="true" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['initStart'];?>
" data-type="time" id="date_start" name="start" type="text" class="form-control date_start date" data-date-format="yyyy-mm-dd"/>
                                <div class="input-group-addon" style="border-left: 0;border-right: 0;"> 至 </div>
                                <input readonly="true" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['initEnd'];?>
" data-type="time" id="date_end" name="end" type="text" class="form-control date_end date" data-date-format="yyyy-mm-dd"/>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
                
            <li id="kj" style="border-bottom:1px dashed #ddd;overflow:hidden;margin-bottom:10px;">
                <p><strong>空间维度：</strong></p>

                <?php if ($_smarty_tpl->tpl_vars['data']->value['type']==1){?>
                <select class="form-control" id="province" name="province" style="margin-bottom:15px;width: 110px;float: left;">
                    <option value="-1">全部</option>
                    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['province']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</option>
                    <?php } ?>
                </select>
                <?php }else{ ?>
                <input id="school" name="school" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['schoolid'];?>
">
                <select class="form-control" id="grade" name="grade" style="margin-bottom:15px;width: 110px;float: left;">
                    <option value="-1">全部</option>
                    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['grade']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</option>
                    <?php } ?>


                    <!-- <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['schoolid'];?>
"> <?php echo $_smarty_tpl->tpl_vars['data']->value['schoolname'];?>
 </option> -->
                </select>
                <?php }?>


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
            
            <li style="border-bottom:1px dashed #ddd;overflow:hidden;margin-bottom:15px;padding-bottom:5px;">
                <label class="control-label" style="width:80px;">统计分项：</label>
                
                <label class="radio-inline" style="width:95px;">
                    <input type="radio" value="1" name="stat_type" checked="true"/>锻炼完成情况数据统计
                </label>
                <label class="radio-inline" style="width:95px;">
                    <input type="radio" value="2" name="stat_type"/>完成锻炼数据统计
                </label>
                <label class="radio-inline" style="width:95px;">
                    <input type="radio" value="3" name="stat_type"/>各班级数据统计
                </label>
            </li>

            <li style="overflow:hidden;">
                <button type="button" class="btn btn-primary" id="subbtn" style="width:100px;">查询</button>
                <button type="button" class="btn btn-info" id="export" style="width:100px;margin-left:20px;" >导出</button>
                <button type="button" class="btn btn-info" id="export-word" style="width:100px;margin-left:20px;" >导出Word</button>
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

    
<script src="/static/bootstrap/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script src="/static/widget/echarts/echarts.min.js"></script>
<script src="/static/stat/contrist.js"></script>

</body>
</html><?php }} ?>