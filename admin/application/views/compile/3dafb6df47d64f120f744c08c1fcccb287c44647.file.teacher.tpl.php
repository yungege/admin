<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.13, created on 2017-12-27 18:00:27
         compiled from "/var/www/admin/admin/application/views/template/user/teacher.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12679932435a436f3b1e0f37-93413904%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.13, created on 2017-12-27 18:03:34
         compiled from "/var/www/admin/admin/application/views/template/user/teacher.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17220205175a436ff64720b1-53421274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 7073400c550bc8c757983642c34c465c119372b8
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3dafb6df47d64f120f744c08c1fcccb287c44647' => 
    array (
      0 => '/var/www/admin/admin/application/views/template/user/teacher.tpl',
<<<<<<< HEAD
      1 => 1514368250,
=======
      1 => 1514366823,
>>>>>>> 7073400c550bc8c757983642c34c465c119372b8
      2 => 'file',
    ),
    '1af1c7811d93168106c85becc3c13354fe96fe45' => 
    array (
      0 => '/var/www/admin/admin/application/views/template/common/page/layout.tpl',
<<<<<<< HEAD
      1 => 1510105563,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12679932435a436f3b1e0f37-93413904',
=======
      1 => 1512353715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17220205175a436ff64720b1-53421274',
>>>>>>> 7073400c550bc8c757983642c34c465c119372b8
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
  'unifunc' => 'content_5a436f3b371ad3_69082471',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a436f3b371ad3_69082471')) {function content_5a436f3b371ad3_69082471($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/admin/admin/library/smarty/plugins/modifier.date_format.php';
=======
  'unifunc' => 'content_5a436ff65f32d6_82129282',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a436ff65f32d6_82129282')) {function content_5a436ff65f32d6_82129282($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/admin/admin/library/smarty/plugins/modifier.date_format.php';
>>>>>>> 7073400c550bc8c757983642c34c465c119372b8
?><!DOCTYPE html>
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
    .add-ugc-fix,.add-mobile-fix,.add-class-fix{
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        background-color: rgba(0,0,0,0.4);
        z-index: 9999;
        display: none;
    }
    .add-ugc-inner{
        width: 500px;
        height: auto;
        border: 1px solid white;
        background-color: white;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -15%;
        margin-left: -250px;
        border-radius: 4px;
        padding: 15px;
    }
    .add-mobile-inner{
        height: 200px;
        margin-top: -170px;
    }
    .add-class-inner{
        height: 200px;
        margin-top: -170px;
    }
    /*.add-ugc-inner > h4{
        border-bottom: 1px solid #ccc;
        padding-bottom: 5px;
    }*/
    .glyphicon-remove{
        position: absolute;
        top: 10px;
        right: 20px;
        cursor: pointer;
        padding: 10px;
    }
    .glyphicon-remove:hover{
        color: red;
    }
    .run-type,.normal,.punch-type{
        display: none;
    }
    .homework-inner{
        border: 1px solid #31b0d5;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 15px;
    }
    .checkbox-inline+.checkbox-inline, .radio-inline+.radio-inline,.radio-inline{
        margin-left: 0;
        margin-right: 10px;
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
                                <i class="fa fa-dashboard" style="margin-right: 10px;"></i> 用户管理 / 老师管理<a href="/student/add" class="btn btn-primary btn-sm" style="margin-left: 10px;">添加老师</a>
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- 用户数据 -->
                
<div class="row">
    <div class="col-lg-12">
        <form method="get" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="form-horizontal row">

                        <div class="col-md-4">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">班级ID：</label>
                                <div class="col-md-8">
                                    <input type="text" name="cid" class="input-sm form-control" value="<?php echo $_GET['cid'];?>
">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">所在学校ID：</label>
                                <div class="col-md-8">
                                   <input type="text" name="sid" class="input-sm form-control" value="<?php echo $_GET['sid'];?>
">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="row">
                                <label class="col-md-6 paddZero control-label">老师姓名/昵称：</label>
                                <div class="col-md-6">
                                    <input type="text" name="username" class="input-sm form-control" value="<?php echo $_GET['username'];?>
">
                                </div>
                            </div>
                        </div>
                    </div><br/>
                    <div class="form-horizontal row">
                        <div class="col-md-4">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">老师ID：</label>
                                <div class="col-md-8">
                                    <input type="text" name="uid" class="input-sm form-control" value="<?php echo $_GET['uid'];?>
">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">学校名：</label>
                                <div class="col-md-8">
                                    <input type="text" name="sname" class="input-sm form-control" value="<?php echo $_GET['sname'];?>
">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <label class="col-md-6 paddZero control-label">老师手机：</label>
                                <div class="col-md-6">
                                    <input type="text" name="mobile" class="input-sm form-control" value="<?php echo $_GET['mobile'];?>
">
                                </div>
                            </div>
                        </div>
                    </div><br/>
                    <div class="form-horizontal row">
                        <div class="col-md-4 col-md-offset-1">
                            <button class="btn btn-info btn-sm" type="submit">查&emsp;询</button>
                            <button class="btn btn-warning btn-sm reset-btn" type="button">清除条件</button>
                        </div>
                    </div>
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
                        <!-- <th class="text-center">ID</th> -->
                        <th>头像</th>
                        <th>姓名/昵称</th>
                        <th>用户ID</th>
                        <th>学校</th>
                        <th>班级</th>
                        <th>平台（版本号）</th>
                        <th>绑定手机</th>
                        <!-- <th>生日</th> -->
                        <th>性别</th>
                        <th>注册日期</th>
                        <th>上次登录</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                    <tr data-uid="<?php echo $_smarty_tpl->tpl_vars['row']->value['_id'];?>
">
                        <td><img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['iconurl'];?>
?imageView2/2/w/100/h/60/q/100" width="50" height="50" style="border-radius: 25px;"></td>
                        <td>姓名：<?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
<br/>昵称：<?php echo $_smarty_tpl->tpl_vars['row']->value['nickname'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['_id'];?>
</td>
                        <td><a href="/user/school?schoolid=<?php echo $_smarty_tpl->tpl_vars['row']->value['schoolinfo']['schoolid'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['schoolinfo']['schoolname'];?>
</a></td>
                        <td>
                            <?php  $_smarty_tpl->tpl_vars['teacher'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['teacher']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['manageclassinfo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['teacher']->key => $_smarty_tpl->tpl_vars['teacher']->value){
$_smarty_tpl->tpl_vars['teacher']->_loop = true;
?>
                            <a href="/user/class?classid=<?php echo $_smarty_tpl->tpl_vars['teacher']->value['classid'];?>
"><?php echo $_smarty_tpl->tpl_vars['teacher']->value['classname'];?>
</a><br/>
                            <?php } ?>
                            <a data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['_id'];?>
" class="btn btn-xs btn-primary add-class" href="javascript:void(0)">添加班级？</a>
                        </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['clientsource'];?>
<br/><?php echo $_smarty_tpl->tpl_vars['row']->value['versions'];?>
</td>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['row']->value['mobileno'];?>
<br/>
                            <a data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['_id'];?>
" class="btn btn-xs btn-primary add-mobile" href="javascript:void(0)">添加手机？</a>
                        </td>
                        <!-- <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['birthday'],"%Y-%m-%d");?>
</td> -->
                        <td><?php if ($_smarty_tpl->tpl_vars['row']->value['sex']==1){?>女<?php }else{ ?>男<?php }?></td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['createtime'],"%Y-%m-%d");?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['lastlogin'];?>
</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
        <div class="text-center tt-page">
            <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

        </div>
        
    </div>
</div>

<div class="add-mobile-fix">
    <div class="add-ugc-inner add-mobile-inner">
        <h4>新增绑定关系</h4>
        <i class="glyphicon glyphicon-remove"></i>
        <form name="relation">
            <div class="form-group">
                <label for="re-mobile">手机号码</label>
                <input type="text" class="form-control" id="re-mobile" name="re-mobile">
            </div>
            <div class="form-group">
              <!--   <label for="re-name">绑定人</label> -->
                <input type="hidden" class="form-control" id="re-name" name="re-name" value="自己">
            </div>
            <div class="form-group">
                <!-- <label for="re-name">绑定关系</label> -->
                <input type="hidden" class="form-control" id="re-sel" name="re-sel" value="7">
            </div>
            <input type="hidden" name="uid" id="hide-uid">
            <button id="re-sub" type="button" class="btn btn-primary pull-right">Submit</button>
        </form>
    </div>
</div>

<div class="add-class-fix">
    <div class="add-ugc-inner add-class-inner">
        <h4>添加班级</h4>
        <i class="glyphicon glyphicon-remove"></i>
        <form name="class">
            <div class="form-group">
                <label for="classid">班级ID</label>
                <input type="text" class="form-control" id="classid" name="classid">
            </div>
            <input type="hidden" name="uid" id="hide-uid-class">
            <input type="hidden" name="type" id="type-class" value="1">
            <button id="re-sub-class" type="button" class="btn btn-primary pull-right">Submit</button>
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

    
<script src="/static/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">

!(function(){
    var student = {

        init: function (){
            this.getDom();
            this.clickCloseFix();
            this.initDate();
            this.resetForm();
            this.addRelation();
            this.postRelationData();
            this.addClass();
            this.postClassData();
        },

        initDate: function(){
            var me = this;
            me.dateBtn.datetimepicker({
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                minView: 2,
                endDate: new Date(),
            })
        },

        getDom: function(){
            this.ugcBtn = $('.addUgc');
            this.form = $('form[name=ugc]');
            this.fixBox = $('.add-ugc-fix');
            this.closeFixBoxBtn = $('.glyphicon-remove');
            this.subBtn = $('#sub');
            this.resetBtn = $('.reset-btn');
            this.dateBtn = $('.wtime');
            this.uname = $('#uname');
            this.htype = $('.htype');
            this.runTypeDiv = $('.run-type');
            this.punchTypeDiv = $('.punch-type');
            this.normalDiv = $('.normal');
            this.workarea = $('.homework-inner');

            this.reBtn = $('.add-mobile');
            this.reFixBox = $('.add-mobile-fix');
            this.reBtnClass = $('.add-class');
            this.reFixBoxClass = $('.add-class-fix');
            this.reSubBtn = $('#re-sub');
            this.reSubBtnClass = $('#re-sub-class');
            this.hideUid = $('#hide-uid');
            this.hideUidClass = $('#hide-uid-class');
            this.reMobile = $('#re-mobile');
            this.reName = $('#re-name');
            this.reSel = $('#re-sel');
            this.reForm = $('form[name=relation]');
            this.reFormClass = $('form[name=class]');
        },

        // 清楚查询条件
        resetForm: function(){
            var me = this;
            me.resetBtn.unbind().bind('click', function(){
                me.form.submit();
            });
        },

        hideDialog: function(){

            var me = this;
            me.fixBox.fadeOut(200);
            me.subBtn.attr('data-uid', '');
            me.subBtn.attr('data-cid', '');
            me.uname.text('');
            me.reFixBox.fadeOut(200);
            me.reFixBoxClass.fadeOut(200);
            me.hideUid.val('');
            me.reForm[0].reset();
        },

        clickCloseFix: function(){
            var me = this;
            me.closeFixBoxBtn.click(function(){
                me.hideDialog();
            });
        },

        addClass: function(){
            var me = this;
            me.reBtnClass.unbind().bind('click', function(){
                var uid = $.trim($(this).data('id'));
                me.hideUidClass.val(uid);
                me.reFixBoxClass.fadeIn(200);
            });
        },

        postClassData: function(){
            var me = this;
            me.reSubBtnClass.unbind().bind('click',function(){

                var data = me.reFormClass.serialize();

                 $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '/user/addclass', data,
                    success: function(json){

                        if(json.errCode == 0){
                            window.location.reload();
                        }
                        else{
                            alert(json.errMessage);
                            return false;
                        }
                    },
                });
            });
        },

        addRelation: function(){
            var me = this;
            me.reBtn.unbind().bind('click', function(){
                var uid = $.trim($(this).data('id'));
                me.hideUid.val(uid);
                me.reFixBox.fadeIn(200);
            });
        },

        postRelationData: function(){
            var me = this,
                aj = null;
            me.reSubBtn.unbind().bind('click', function(){
                var data = me.reForm.serialize();

                aj = $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '/user/addrelation', data,
                    success: function(json){
                       
                        if(json.errCode == 0){
                            window.location.reload();
                        }
                        else{
                            alert(json.errMessage);
                            return false;
                        }
                    },
                    beforeSend: function () {
                        if(aj != null) {
                            aj.abort();
                        }
                    },
                });
            });
        },

    };

    student.init();
})()
</script>


</body>
</html><?php }} ?>