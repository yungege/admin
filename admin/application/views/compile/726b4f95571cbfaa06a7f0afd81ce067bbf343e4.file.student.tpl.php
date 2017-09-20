<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.13, created on 2017-09-20 09:53:01
         compiled from "/var/www/admin/admin/application/views/template/user/student.tpl" */ ?>
<?php /*%%SmartyHeaderCode:50650805459c1c9fdea7939-14956310%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.13, created on 2017-09-19 15:54:56
         compiled from "/var/www/admin/admin/application/views/template/user/student.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67728846559c0cd509b6a39-81016057%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.13, created on 2017-09-20 08:23:58
         compiled from "/var/www/admin/admin/application/views/template/user/student.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99123972659c1b51ec96b79-40921390%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 5993590e1e349b22f209636db566f4f709d91f14
>>>>>>> e545b91ee4d24514057f59b1ffb0aceee854ecf9
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '726b4f95571cbfaa06a7f0afd81ce067bbf343e4' => 
    array (
      0 => '/var/www/admin/admin/application/views/template/user/student.tpl',
<<<<<<< HEAD
      1 => 1505719537,
=======
<<<<<<< HEAD
      1 => 1505212197,
=======
      1 => 1505222262,
>>>>>>> 5993590e1e349b22f209636db566f4f709d91f14
>>>>>>> e545b91ee4d24514057f59b1ffb0aceee854ecf9
      2 => 'file',
    ),
    '1af1c7811d93168106c85becc3c13354fe96fe45' => 
    array (
      0 => '/var/www/admin/admin/application/views/template/common/page/layout.tpl',
<<<<<<< HEAD
      1 => 1505722731,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50650805459c1c9fdea7939-14956310',
=======
<<<<<<< HEAD
      1 => 1505720839,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67728846559c0cd509b6a39-81016057',
=======
      1 => 1505722784,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99123972659c1b51ec96b79-40921390',
>>>>>>> 5993590e1e349b22f209636db566f4f709d91f14
>>>>>>> e545b91ee4d24514057f59b1ffb0aceee854ecf9
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'userInfo' => 0,
    'pageTag' => 0,
    'tag' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
<<<<<<< HEAD
  'unifunc' => 'content_59c1c9fdf19e92_60644113',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c1c9fdf19e92_60644113')) {function content_59c1c9fdf19e92_60644113($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/admin/admin/library/smarty/plugins/modifier.date_format.php';
=======
<<<<<<< HEAD
  'unifunc' => 'content_59c0cd50b3e591_18502057',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c0cd50b3e591_18502057')) {function content_59c0cd50b3e591_18502057($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/admin/admin/library/smarty/plugins/modifier.date_format.php';
=======
  'unifunc' => 'content_59c1b51ed4fd59_13367115',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c1b51ed4fd59_13367115')) {function content_59c1b51ed4fd59_13367115($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/admin/admin/library/smarty/plugins/modifier.date_format.php';
>>>>>>> 5993590e1e349b22f209636db566f4f709d91f14
>>>>>>> e545b91ee4d24514057f59b1ffb0aceee854ecf9
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
    .add-ugc-fix,.add-mobile-fix{
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
        height: 340px;
        margin-top: -170px;
    }
    .add-ugc-inner > h4{
        border-bottom: 1px solid #ccc;
        padding-bottom: 5px;
    }
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
    .run-type,.normal{
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
                <a class="navbar-brand" href="index.html">TTXS Admin</a>
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
" alt="..." width="20" height="20" style="border-radius: 10px;">
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
                    <?php if (isset($_smarty_tpl->tpl_vars['tag'])) {$_smarty_tpl->tpl_vars['tag'] = clone $_smarty_tpl->tpl_vars['tag'];
$_smarty_tpl->tpl_vars['tag']->value = (explode('-',$_smarty_tpl->tpl_vars['pageTag']->value)); $_smarty_tpl->tpl_vars['tag']->nocache = null; $_smarty_tpl->tpl_vars['tag']->scope = 0;
} else $_smarty_tpl->tpl_vars['tag'] = new Smarty_variable((explode('-',$_smarty_tpl->tpl_vars['pageTag']->value)), null, 0);?>
                    <li <?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==1){?> class="active" <?php }?>>
                        <a href="/index.html"><i class="fa fa-fw fa-dashboard"></i> HOME PAGE</a>
                    </li>
                    <li>
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
                            <!-- <li>
                                <a href="/train/list" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==3&&$_smarty_tpl->tpl_vars['tag']->value[1]==4){?>cy-child-active<?php }?>">锻炼内容</a>
                            </li> -->
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
                                <a href="/push/app" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==6&&$_smarty_tpl->tpl_vars['tag']->value[1]==6){?>cy-child-active<?php }?>">平台消息推送</a>
                            </li>
                           <!--  <li>
                                <a href="/push/province" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==6&&$_smarty_tpl->tpl_vars['tag']->value[1]==6){?>cy-child-active<?php }?>">省推送</a>
                            </li>
                             <li>
                                <a href="/push/city" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==6&&$_smarty_tpl->tpl_vars['tag']->value[1]==7){?>cy-child-active<?php }?>">市推送</a>
                            </li>
                             <li>
                                <a href="/push/district" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==6&&$_smarty_tpl->tpl_vars['tag']->value[1]==8){?>cy-child-active<?php }?>">区推送</a>
                            </li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#meau-man"><i class="glyphicon glyphicon-list"></i> 菜单及权限分配 <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                        <ul id="meau-man" class="collapse <?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==7){?>in<?php }?>">
                            <li>
                                <a href="/meau/list" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==7&&$_smarty_tpl->tpl_vars['tag']->value[1]==1){?>cy-child-active<?php }?>">菜单管理</a>
                            </li>
                            <li>
                                <a href="" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==7&&$_smarty_tpl->tpl_vars['tag']->value[1]==2){?>cy-child-active<?php }?>">角色管理</a>
                            </li>
                            <li>
                                <a href="" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==7&&$_smarty_tpl->tpl_vars['tag']->value[1]==3){?>cy-child-active<?php }?>">权限分配</a>
                            </li>
                        </ul>
                    </li>

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
                                <i class="fa fa-dashboard" style="margin-right: 10px;"></i> 用户管理 / 学生管理<a href="/student/add" class="btn btn-primary btn-sm" style="margin-left: 10px;">添加学生</a>
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
                                <label class="col-md-4 paddZero control-label">年级：</label>

                                <div class="col-md-8">
                                    <select class="input-sm form-control" name="grade">
                                        <option value="-1">选择年级</option>
                                        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['idx'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['grade']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['idx']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                                        <option <?php echo isset($_GET['grade'])&&($_smarty_tpl->tpl_vars['idx']->value==$_GET['grade']) ? 'selected' : '';?>
 value="<?php echo $_smarty_tpl->tpl_vars['idx']->value;?>
" ><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="row">
                                <label class="col-md-6 paddZero control-label">学生姓名/昵称：</label>
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
                                <label class="col-md-4 paddZero control-label">学生ID：</label>
                                <div class="col-md-8">
                                    <input type="text" name="uid" class="input-sm form-control" value="<?php echo $_GET['uid'];?>
">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">家长姓名：</label>
                                <div class="col-md-8">
                                    <input type="text" name="parentname" class="input-sm form-control" value="<?php echo $_GET['parentname'];?>
">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <label class="col-md-6 paddZero control-label">家长手机：</label>
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
                        <th>年级</th>
                        <th>班级</th>
                        <th>平台（版本号）</th>
                        <th>绑定手机</th>
                        <th>家长</th>
                        <th>生日</th>
                        <th>性别</th>
                        <th>注册日期</th>
                        <th>上次登录</th>
                        <th>上次锻炼</th>
                        <!-- <th>关联账号</th> -->
                        <th>操作</th>
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
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['grade'];?>
</td>
                        <td>
                            <a href="/user/class?classid=<?php echo $_smarty_tpl->tpl_vars['row']->value['classinfo']['classid'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['classinfo']['classname'];?>
</a><br/>
                            <a class="btn btn-xs btn-primary" href="?cid=<?php echo $_smarty_tpl->tpl_vars['row']->value['classinfo']['classid'];?>
">只看本班？</a>
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
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['parentname'];?>
</td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['birthday'],"%Y-%m-%d");?>
</td>
                        <td><?php if ($_smarty_tpl->tpl_vars['row']->value['sex']==1){?>女<?php }else{ ?>男<?php }?></td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['createtime'],"%Y-%m-%d");?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['lastlogin'];?>
</td>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['row']->value['lastsubmittime']!=0){?>
                                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['lastsubmittime'],"%Y-%m-%d");?>
<br/>
                                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['lastsubmittime'],"%H:%M:%S");?>
<br/>
                            <?php }else{ ?>
                                <span class="label label-warning">无记录</span>
                            <?php }?>
                        </td>
                        <!-- <td></td> -->
                        <td>
                            <a href="/sport/ugc?uid=<?php echo $_smarty_tpl->tpl_vars['row']->value['_id'];?>
" class="btn btn-default btn-xs">UGC</a>
                            <a data-uname="<?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['row']->value['_id'];?>
" data-cid="<?php echo $_smarty_tpl->tpl_vars['row']->value['classinfo']['classid'];?>
" href="javascript:void(0)" class="btn btn-danger btn-xs addUgc">补作业</a>
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

<div class="add-ugc-fix">
    <div class="add-ugc-inner">
        <h4>补作业&emsp;&emsp;<small>学生信息：<span id="uname"></span></small></h4>
        <i class="glyphicon glyphicon-remove"></i>
        <form name="ugc" class="ugcform">
            <div class="form-group">
                <label>作业时间</label>
                <input readonly="true" data-type="time" name="wtime" type="text" class="form-control wtime date" data-date-format="yyyy-mm-dd" value="<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
" />
            </div>
            <div class="form-group">
                <label>作业类型</label>
                <select class="form-control htype" name="htype">
                    <option value="-1">请选择作业类型</option>
                    <option value="1">翻转课堂</option>
                    <option value="2">身体素质</option>
                    <option value="3">跑步作业</option>
                </select>
            </div>

            <!-- 翻转课堂 + 身体素质 -->
            <div class="normal">
                <label>请选择作业</label><br/>
                <div class="homework-inner">
                </div>
            </div>
            
            <!-- 跑步 -->
            <div class="run-type">
                <div class="form-group">
                    <label>跑步时长(sec)</label>
                    <input class="form-control" type="text" name="time_cost">
                </div>
                <div class="form-group">
                    <label>跑步距离(km)</label>
                    <input class="form-control" type="text" name="distance">
                </div>
            </div>
            
            <button id="sub" type="button" class="btn btn-default pull-right">Submit</button>
        </form>
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
                <label for="re-name">家长姓名</label>
                <input type="text" class="form-control" id="re-name" name="re-name">
            </div>
            <div class="form-group">
                <label for="re-sel">绑定关系</label>
                <select class="form-control" id="re-sel" name="re-sel">
                    <option value="-1">请选择绑定关系</option>
                    <option value="1">父亲</option>
                    <option value="2">母亲</option>
                    <option value="3">外公</option>
                    <option value="4">外婆</option>
                    <option value="5">爷爷</option>
                    <option value="6">奶奶</option>
                    <option value="7">其他</option>
                </select>
            </div>
            <input type="hidden" name="uid" id="hide-uid">
            <button id="re-sub" type="button" class="btn btn-primary pull-right">Submit</button>
        </form>
    </div>
</div>



                <!-- footer -->
                <footer class="text-center">
                    ©2017 北京天天向尚信息科技发展有限公司 All Rights Resrverd
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
            this.addUgc();
            this.clickCloseFix();
            this.postData();
            this.initDate();
            this.matchHomework();

            this.resetForm();

            this.addRelation();
            this.postRelationData();
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
            this.normalDiv = $('.normal');
            this.workarea = $('.homework-inner');

            this.reBtn = $('.add-mobile');
            this.reFixBox = $('.add-mobile-fix');
            this.reSubBtn = $('#re-sub');
            this.hideUid = $('#hide-uid');
            this.reMobile = $('#re-mobile');
            this.reName = $('#re-name');
            this.reSel = $('#re-sel');
            this.reForm = $('form[name=relation]');
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
            me.workarea.html('');
            me.form[0].reset();
            me.normalDiv.slideUp(200);
            me.runTypeDiv.slideUp(200);

            me.reFixBox.fadeOut(200);
            me.hideUid.val('');
            me.reForm[0].reset();
        },

        clickCloseFix: function(){
            var me = this;

            me.closeFixBoxBtn.click(function(){
                me.hideDialog();
            });
        },

        addUgc: function(){
            var me = this;

            me.ugcBtn.unbind().bind('click', function(){
                var uid = $.trim($(this).data('uid')),
                    cid = $.trim($(this).data('cid')),
                    sname = $.trim($(this).data('uname'))
                me.subBtn.attr('data-uid', uid);
                me.subBtn.attr('data-cid', cid);
                me.uname.text(sname);
                
                me.fixBox.fadeIn(200);
            })
        },

        // 根据时间和作业类型匹配作业信息
        matchHomework: function(){
            var me = this;

            // date
            me.dateBtn.on('changeDate', function(){
                var htype = me.htype.val();
                me.xhrGetHomework(htype);
            });

            // htype
            me.htype.on('change', function(){
                me.xhrGetHomework($(this).val());
            })
        },

        xhrGetHomework: function(type){
            var me = this;
            var uid = me.subBtn.attr('data-uid'),
                cid = me.subBtn.attr('data-cid'),
                date = me.dateBtn.val(),
                work = [
                    '翻转课堂作业',
                    '身体素质作业',
                ];

            if(type == -1){
                me.normalDiv.slideUp(100);
                me.runTypeDiv.slideUp(100);
                me.workarea.html('');
                return;
            }
            else if(type == 3){
                me.normalDiv.hide();
                me.runTypeDiv.slideDown(100);
                me.workarea.html('');
                me.subBtn.show();
                return;
            }
            else{
                me.runTypeDiv.hide();

                if(!date || (type != 2 && type != 1)){
                    me.workarea.html('');
                    return;
                };
                me.normalDiv.slideDown(100);

                $.get(
                    '/homework/match?cid='+cid+'&uid='+uid+'&type='+type+'&date='+date,
                    function(json){
                        if(json.data.works.length == 0){
                            me.workarea.html('该学生在 ' + date + ' 无 ' + work[type-1]);
                            me.subBtn.hide();
                        }
                        else{
                            var checkBox = '';
                            for(var i in json.data.works){
                                checkBox = '<h5>'+(parseInt(i)+1)+'、'+json.data.works[i].name+'</h5>';
                                $.each(json.data.works[i].projects, function(k,v){
                                    var kval = json.data.works[i]._id+'|'+v.sku_id+'|'+v.calorie+'|'+v.time+'|'+v.action;
                                    checkBox += '<label class="radio-inline"><input type="radio" name="h-pid" value="'+kval+'">' + v.name+'('+v.calorie+'千卡)' + '</label>';
                                });
                                
                            }
                            me.workarea.html(checkBox);
                            me.subBtn.show();
                        }
                    }
                );
            }
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
                    url: '/user/addRelation', data,
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

        postData: function(){
            var me = this,
                aj = null;
            me.subBtn.unbind().bind('click', function(){
                var uid = $.trim($(this).data('uid')),
                    cid = $.trim($(this).data('cid'));

                if(!uid || !cid){
                    alert('参数错误.');
                    return false;
                }

                var data = me.form.serialize() + '&uid='+uid;
                

                aj = $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '/user/addUgc',
                    data: data,
                    success: function(json){
                        if(json.errCode == 0){
                            window.location = "/sport/ugc?uid=" + uid;
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