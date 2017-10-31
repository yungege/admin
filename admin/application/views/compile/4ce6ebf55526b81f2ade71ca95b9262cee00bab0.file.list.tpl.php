<?php /* Smarty version Smarty-3.1.13, created on 2017-10-31 14:08:08
         compiled from "/var/www/admin/admin/application/views/template/meau/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21725006459f813488aae32-27148559%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ce6ebf55526b81f2ade71ca95b9262cee00bab0' => 
    array (
      0 => '/var/www/admin/admin/application/views/template/meau/list.tpl',
      1 => 1509080121,
      2 => 'file',
    ),
    '1af1c7811d93168106c85becc3c13354fe96fe45' => 
    array (
      0 => '/var/www/admin/admin/application/views/template/common/page/layout.tpl',
      1 => 1509096174,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21725006459f813488aae32-27148559',
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
  'unifunc' => 'content_59f8134890ed51_79387693',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59f8134890ed51_79387693')) {function content_59f8134890ed51_79387693($_smarty_tpl) {?><!DOCTYPE html>
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
    .table>tbody>tr>td,.table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
        vertical-align: middle;
        height: 45px;
    }
    .add-f-cate-fix,.add-s-cate-fix,.edit-cate-fix{
        width: 100%;
        height: 100%;
        overflow-y: scroll;
        position: fixed;
        top: 0;
        left: 0;
        background-color: rgba(0,0,0,.3);
        z-index: 9999;
        display: none;
    }
    .inner-box{
        background-color: white;
        width: 500px;
        /*height: 200px;*/
        border: 1px solid #999;
        border-radius: 3px;
        margin: 10% auto 0;
        box-shadow: 0 0 15px rgba(0,0,0,0.5);
        padding: 15px;
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
                                <a href="/upload/punch" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==4&&$_smarty_tpl->tpl_vars['tag']->value[1]==7){?>cy-child-active<?php }?>">课外作业替换</a>
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
                                <a href="/meau/role" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==7&&$_smarty_tpl->tpl_vars['tag']->value[1]==2){?>cy-child-active<?php }?>">角色管理</a>
                            </li>
                            <li>
                                <a href="/meau/url" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==7&&$_smarty_tpl->tpl_vars['tag']->value[1]==3){?>cy-child-active<?php }?>">URL管理</a>
                            </li>
                            <li>
                                <a href="/meau/admin" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==7&&$_smarty_tpl->tpl_vars['tag']->value[1]==4){?>cy-child-active<?php }?>">管理员</a>
                            </li>
                            
                            <li>
                                <a href="/meau/assgin" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==7&&$_smarty_tpl->tpl_vars['tag']->value[1]==5){?>cy-child-active<?php }?>">权限分配</a>
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
                                <i class="fa fa-dashboard" style="margin-right: 10px;"></i> 菜单及权限管理 / 菜单管理 <a class="btn btn-xs btn-primary" href="javascript:void(0)" id="add-f-cate">新建菜单</a>
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- 用户数据 -->
                

<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped table-bordered" style="color: #7a7676;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>排序</th>
                    <th>菜单名称</th>
                    <th>URL</th>
                    <th>图标样式</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                <tr data-seria="<?php echo serialize($_smarty_tpl->tpl_vars['row']->value);?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['_id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['new_sort'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['new_name'];?>
</td>
                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
" style="color: #65CEA7;"><?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
</a></td>
                    <td style="color: #65CEA7;font-size: 20px;font-weight: 700;"><i class="<?php echo $_smarty_tpl->tpl_vars['row']->value['icon_style'];?>
"></i></td>
                    <td>
                        <?php if ($_smarty_tpl->tpl_vars['row']->value['pid']==''){?>
                           <a data-pid="<?php echo $_smarty_tpl->tpl_vars['row']->value['_id'];?>
" data-pname="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" class="add-s-cate cate-add btn btn-xs btn-success" href="javascript:void(0)"><span class='fa fa-plus'></span> 子菜单</a>&nbsp;
                        <?php }?>
                        <a data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['_id'];?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" data-ssort="<?php echo $_smarty_tpl->tpl_vars['row']->value['sort'];?>
" data-icon="<?php echo $_smarty_tpl->tpl_vars['row']->value['icon_style'];?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
" class="cate-edit btn btn-xs btn-primary" href="javascript:void(0)"><span class='fa fa-edit'></span> 编辑</a>&nbsp;
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- 一级菜单 -->
<div class="add-f-cate-fix">
    <div class="inner-box">
        <h4>新增一级菜单</h4>
        <hr>
        <form name="add-f-cate" class="form">
            <div class="form-group">
                <label>菜单名</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>排序</label>
                <input type="text" class="form-control" name="sort">
            </div>
            <div class="form-group">
                <label>图标样式</label>
                <input type="text" class="form-control" name="icon_style">
            </div>
            <a class="btn btn-primary subf" href="javascript:void(0)">提&emsp;交</a>
            <a class="btn btn-danger canf" href="javascript:void(0)">取&emsp;消</a>
        </form>
    </div>
</div>
<!-- 二级菜单 -->
<div class="add-s-cate-fix">
    <div class="inner-box">
        <h4>新增二级菜单&emsp;&emsp;<small id="first-cate-name" style="color: #65CEA7;"></small></h4>
        <hr>
        <form name="add-s-cate" class="form">
            <div class="form-group">
                <label>菜单名</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>排序</label>
                <input type="text" class="form-control" name="sort">
            </div>
            <div class="form-group">
                <label>URL <small>[ /meau/list ]</small></label>
                <input type="text" class="form-control" name="url">
            </div>
            <input type="hidden" name="pid" class="pid-s">
            <a class="btn btn-primary subs" href="javascript:void(0)">提&emsp;交</a>
            <a class="btn btn-danger cans" href="javascript:void(0)">取&emsp;消</a>
        </form>
    </div>
</div>

<!-- 编辑菜单 -->
<div class="edit-cate-fix">
    <div class="inner-box">
        <h4>编辑菜单&emsp;&emsp;<small id="old-cate-name" style="color: #65CEA7;"></small></h4>
        <hr>
        <form name="edit-cate" class="form">
            <div class="form-group">
                <label>菜单名</label>
                <input type="text" class="form-control name-e" name="name">
            </div>
            <div class="form-group">
                <label>排序</label>
                <input type="text" class="form-control sort-e" name="sort">
            </div>
            <div class="form-group">
                <label>图标样式</label>
                <input type="text" class="form-control icon-e" name="icon_style">
            </div>
            <div class="form-group">
                <label>URL <small>[ /meau/list ]</small></label>
                <input type="text" class="form-control url-e" name="url">
            </div>
            <input type="hidden" name="id" class="pid-e">
            <a class="btn btn-primary sube" href="javascript:void(0)">提&emsp;交</a>
            <a class="btn btn-danger cane" href="javascript:void(0)">取&emsp;消</a>
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

    
<script>
$(function(){
    var meauFirst = {
        init: function(){
            this.getDom();
            this.postMeau();
            this.cancer();
            this.showBox();
        },
        getDom: function(){
            this.form = $('form[name=add-f-cate]');
            this.subBtn = $('.subf');
            this.canBtn = $('.canf');
            this.fixBox = $('.add-f-cate-fix');
            this.showBtn = $('#add-f-cate');
        },
        postMeau: function(){
            var me = this;
            me.subBtn.unbind().bind('click', function(){
                var data = me.form.serialize();
                $.post('/meau/addfirst', data, function(json){
                    if(json.errCode == 0){
                        window.location.reload();
                    }
                    else{
                        alert(json.errMessage);
                    }
                });
            });
        },
        cancer: function(){
            var me = this;
            me.canBtn.unbind().bind('click', function(){
                me.fixBox.fadeOut(200);
                me.form[0].reset();
            })
        },
        showBox: function(){
            var me = this;
            me.showBtn.unbind().bind('click', function(){
                me.fixBox.fadeIn(200);
            })
        },
    };

    // 二级菜单
    var meauSecond = {
        init: function(){
            this.getDom();
            this.postMeau();
            this.cancer();
            this.showBox();
        },
        getDom: function(){
            this.form = $('form[name=add-s-cate]');
            this.subBtn = $('.subs');
            this.canBtn = $('.cans');
            this.fixBox = $('.add-s-cate-fix');
            this.showBtn = $('.add-s-cate');
            this.pname = $('#first-cate-name');
            this.pid = $('.pid-s');
        },
        postMeau: function(){
            var me = this;
            me.subBtn.unbind().bind('click', function(){
                var data = me.form.serialize();
                $.post('/meau/addfirst?type=2', data, function(json){
                    if(json.errCode == 0){
                        window.location.reload();
                    }
                    else{
                        alert(json.errMessage);
                    }
                });
            });
        },
        cancer: function(){
            var me = this;
            me.canBtn.unbind().bind('click', function(){
                me.fixBox.fadeOut(200);
                me.form[0].reset();
            })
        },
        showBox: function(){
            var me = this;
            me.showBtn.unbind().bind('click', function(){
                var pid = $(this).data('pid'),
                    pname = $(this).data('pname');
                me.pname.text('父级菜单：'+pname);
                me.pid.val(pid);
                me.fixBox.fadeIn(200);
            })
        },
    };

    // 编辑
    var meauEdit = {
        init: function(){
            this.getDom();
            this.postMeau();
            this.cancer();
            this.showBox();
        },
        getDom: function(){
            this.form = $('form[name=edit-cate]');
            this.subBtn = $('.sube');
            this.canBtn = $('.cane');
            this.fixBox = $('.edit-cate-fix');
            this.showBtn = $('.cate-edit');
            this.cname = $('#old-cate-name');
            this.cid = $('.pid-e');
            this.csort = $('.sort-e');
            this.cicon = $('.icon-e');
            this.curl = $('.url-e');
            this.new_cname = $('.name-e');
        },
        postMeau: function(){
            var me = this;
            me.subBtn.unbind().bind('click', function(){
                var data = me.form.serialize();
                $.post('/meau/addfirst?type=3', data, function(json){
                    if(json.errCode == 0){
                        window.location.reload();
                    }
                    else{
                        alert(json.errMessage);
                    }
                });
            });
        },
        cancer: function(){
            var me = this;
            me.canBtn.unbind().bind('click', function(){
                me.fixBox.fadeOut(200);
                me.form[0].reset();
                me.cicon.attr('disabled', false);
                me.curl.attr('disabled', false);
            })
        },
        showBox: function(){
            var me = this;
            me.showBtn.unbind().bind('click', function(){
                var id = $(this).data('id'),
                    name = $(this).data('name'),
                    sort = $(this).data('ssort'),
                    icon = $(this).data('icon'),
                    url = $(this).data('url');
                me.cname.text(name);
                me.cid.val(id);
                me.new_cname.val(name);
                me.csort.val(sort);
                me.curl.val(url);
                me.cicon.val(icon);
                if(icon.length == 0){
                    me.cicon.attr('disabled', true);
                }
                if(url == '#'){
                    me.curl.attr('disabled', true);
                }
                me.fixBox.fadeIn(200);
            })
        },
    };

    meauFirst.init();
    meauSecond.init();
    meauEdit.init();
})
</script>

</body>
</html><?php }} ?>