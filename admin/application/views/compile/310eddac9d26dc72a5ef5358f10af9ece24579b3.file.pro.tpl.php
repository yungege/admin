<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.13, created on 2017-05-12 14:43:36
         compiled from "/var/www/admin/admin/application/views/template/sport/pro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2122100414591559980e3503-63074558%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.13, created on 2017-07-26 16:00:08
         compiled from "/var/www/admin/admin/application/views/template/sport/pro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:151659947259784c08d41bb1-43030423%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 1118562bf833e62cc7306876136e6401150dbd38
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '310eddac9d26dc72a5ef5358f10af9ece24579b3' => 
    array (
      0 => '/var/www/admin/admin/application/views/template/sport/pro.tpl',
<<<<<<< HEAD
      1 => 1494228733,
=======
      1 => 1498034778,
>>>>>>> 1118562bf833e62cc7306876136e6401150dbd38
      2 => 'file',
    ),
    '1af1c7811d93168106c85becc3c13354fe96fe45' => 
    array (
      0 => '/var/www/admin/admin/application/views/template/common/page/layout.tpl',
      1 => 1501055140,
      2 => 'file',
    ),
  ),
<<<<<<< HEAD
  'nocache_hash' => '2122100414591559980e3503-63074558',
=======
  'nocache_hash' => '151659947259784c08d41bb1-43030423',
>>>>>>> 1118562bf833e62cc7306876136e6401150dbd38
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
  'unifunc' => 'content_59155998192885_92450857',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59155998192885_92450857')) {function content_59155998192885_92450857($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/admin/admin/library/smarty/plugins/modifier.date_format.php';
=======
  'unifunc' => 'content_59784c08e11414_85861652',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59784c08e11414_85861652')) {function content_59784c08e11414_85861652($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/admin/admin/library/smarty/plugins/modifier.date_format.php';
>>>>>>> 1118562bf833e62cc7306876136e6401150dbd38
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
    </style>
    
<style type="text/css">
h4{
    text-decoration: underline;
}
.border-left{
    border-left: 1px solid #ccc;
}
.panel{
    background-color: lightseagreen;
    border-color: lightseagreen;
    color: white;
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
                        <a href="javascript:;" data-toggle="collapse" data-target="#user"><i class="fa fa-fw fa-user"></i> 用户管理 <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                        <ul id="user" class="collapse <?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==2){?>in<?php }?>">
                            <li>
                                <a href="#" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==2&&$_smarty_tpl->tpl_vars['tag']->value[1]==1){?>cy-child-active<?php }?>">班级管理</a>
                            </li>
                            <li>
                                <a href="#" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==2&&$_smarty_tpl->tpl_vars['tag']->value[1]==2){?>cy-child-active<?php }?>">年级管理</a>
                            </li>
                            <li>
                                <a href="#" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==2&&$_smarty_tpl->tpl_vars['tag']->value[1]==3){?>cy-child-active<?php }?>">学校管理</a>
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
                                <a href="#" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==4&&$_smarty_tpl->tpl_vars['tag']->value[1]==2){?>cy-child-active<?php }?>">UGC</a>
                            </li>

                            <li>
                                <a href="#" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==4&&$_smarty_tpl->tpl_vars['tag']->value[1]==3){?>cy-child-active<?php }?>">统计数据</a>
                            </li>

                            <li>
                                <a href="#" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==4&&$_smarty_tpl->tpl_vars['tag']->value[1]==4){?>cy-child-active<?php }?>">运动圈精华</a>
                            </li>

                            <li>
                                <a href="/feedback/index" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==4&&$_smarty_tpl->tpl_vars['tag']->value[1]==5){?>cy-child-active<?php }?>">反馈建议</a>
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
                                <i class="fa fa-dashboard" style="margin-right: 10px;"></i> 运动圈 / 锻炼项目详情
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- 用户数据 -->
                
<div class="row">
    <div class="col-lg-12">
        <h1><?php echo $_smarty_tpl->tpl_vars['pinfo']->value['name'];?>
</h1>
        <p><h1><small><?php echo $_smarty_tpl->tpl_vars['pinfo']->value['desc'];?>
</small></h1></p>
    </div>
</div>
<br>
<div class="row">
    <?php if ($_smarty_tpl->tpl_vars['pinfo']->value['has_level']==1){?>
    <div class="col-md-4">
        <h4 class="text-center">低难度</h4>
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table text-center table-condensed">
                    <thead>
                        <tr>
                            <th class="text-center">文件大小</th>
                            <th class="text-center">动作数</th>
                            <th class="text-center">休息次数</th>
                            <th class="text-center">卡路里</th>
                            <th class="text-center">时长</th>
                            <th class="text-center">推荐</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['pro']->value[0]['vfilesize'];?>
MB</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['pro']->value[0]['action_count'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['pro']->value[0]['rest_count'];?>
</td>
                            <td><?php echo sprintf('%.2f',$_smarty_tpl->tpl_vars['pro']->value[0]['calorie_cost']);?>
千卡</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['pro']->value[0]['time_cost'];?>
s</td>
                            <td><?php if ($_smarty_tpl->tpl_vars['pro']->value[0]['recommend']==1){?>是<?php }else{ ?>否<?php }?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <table class="table table-hover text-center table-condensed">
            <thead>
                <tr>
                    <th class="text-center">序号</th>
                    <th class="text-center">动作名称</th>
                    <th class="text-center">动作数</th>
                    <th class="text-center">卡路里(千卡)</th>
                    <th class="text-center">时长(s)</th>
                    <th class="text-center">类型</th>
                    <th class="text-center">创建时间</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars['ainfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ainfo']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['pro']->value[0]['action_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ainfo']->key => $_smarty_tpl->tpl_vars['ainfo']->value){
$_smarty_tpl->tpl_vars['ainfo']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['ainfo']->key;
?>
                <tr class="<?php if ($_smarty_tpl->tpl_vars['ainfo']->value['calorie']==0){?>info<?php }?>">
                    <td><?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['name'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['action_groupno'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['calorie'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['action_time'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['action_type'];?>
</td>
                    <td>
                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ainfo']->value['ctime'],"%Y-%m-%d %H:%M:%S");?>

                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-4 border-left">
        <h4 class="text-center">中等难度</h4>
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table text-center table-condensed">
                    <thead>
                        <tr>
                            <th class="text-center">文件大小</th>
                            <th class="text-center">动作数</th>
                            <th class="text-center">休息次数</th>
                            <th class="text-center">卡路里</th>
                            <th class="text-center">时长</th>
                            <th class="text-center">推荐</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['pro']->value[1]['vfilesize'];?>
MB</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['pro']->value[1]['action_count'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['pro']->value[1]['rest_count'];?>
</td>
                            <td><?php echo sprintf('%.2f',$_smarty_tpl->tpl_vars['pro']->value[1]['calorie_cost']);?>
千卡</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['pro']->value[1]['time_cost'];?>
s</td>
                            <td><?php if ($_smarty_tpl->tpl_vars['pro']->value[1]['recommend']==1){?>是<?php }else{ ?>否<?php }?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <table class="table table-hover text-center table-condensed">
            <thead>
                <tr>
                    <th class="text-center">序号</th>
                    <th class="text-center">动作名称</th>
                    <th class="text-center">动作数</th>
                    <th class="text-center">卡路里(千卡)</th>
                    <th class="text-center">时长(s)</th>
                    <th class="text-center">类型</th>
                    <th class="text-center">创建时间</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars['ainfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ainfo']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['pro']->value[1]['action_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ainfo']->key => $_smarty_tpl->tpl_vars['ainfo']->value){
$_smarty_tpl->tpl_vars['ainfo']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['ainfo']->key;
?>
                <tr class="<?php if ($_smarty_tpl->tpl_vars['ainfo']->value['calorie']==0){?>info<?php }?>">
                    <td><?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['name'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['action_groupno'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['calorie'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['action_time'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['action_type'];?>
</td>
                    <td>
                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ainfo']->value['ctime'],"%Y-%m-%d %H:%M:%S");?>

                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-4 border-left">
        <h4 class="text-center">高难度</h4>
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table text-center table-condensed">
                    <thead>
                        <tr>
                            <th class="text-center">文件大小</th>
                            <th class="text-center">动作数</th>
                            <th class="text-center">休息次数</th>
                            <th class="text-center">卡路里</th>
                            <th class="text-center">时长</th>
                            <th class="text-center">推荐</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['pro']->value[2]['vfilesize'];?>
MB</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['pro']->value[2]['action_count'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['pro']->value[2]['rest_count'];?>
</td>
                            <td><?php echo sprintf('%.2f',$_smarty_tpl->tpl_vars['pro']->value[2]['calorie_cost']);?>
千卡</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['pro']->value[2]['time_cost'];?>
s</td>
                            <td><?php if ($_smarty_tpl->tpl_vars['pro']->value[2]['recommend']==1){?>是<?php }else{ ?>否<?php }?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <table class="table table-hover text-center table-condensed">
            <thead>
                <tr>
                    <th class="text-center">序号</th>
                    <th class="text-center">动作名称</th>
                    <th class="text-center">动作数</th>
                    <th class="text-center">卡路里(千卡)</th>
                    <th class="text-center">时长(s)</th>
                    <th class="text-center">类型</th>
                    <th class="text-center">创建时间</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars['ainfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ainfo']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['pro']->value[2]['action_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ainfo']->key => $_smarty_tpl->tpl_vars['ainfo']->value){
$_smarty_tpl->tpl_vars['ainfo']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['ainfo']->key;
?>
                <tr class="<?php if ($_smarty_tpl->tpl_vars['ainfo']->value['calorie']==0){?>info<?php }?>">
                    <td><?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['name'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['action_groupno'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['calorie'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['action_time'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['action_type'];?>
</td>
                    <td>
                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ainfo']->value['ctime'],"%Y-%m-%d %H:%M:%S");?>

                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php }elseif($_smarty_tpl->tpl_vars['pinfo']->value['has_level']==-1){?>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table text-center table-condensed">
                    <thead>
                        <tr>
                            <th class="text-center">文件大小</th>
                            <th class="text-center">动作数</th>
                            <th class="text-center">休息次数</th>
                            <th class="text-center">卡路里</th>
                            <th class="text-center">时长</th>
                            <th class="text-center">推荐</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['pro']->value[-1]['vfilesize'];?>
MB</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['pro']->value[-1]['action_count'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['pro']->value[-1]['rest_count'];?>
</td>
                            <td><?php echo sprintf('%.2f',$_smarty_tpl->tpl_vars['pro']->value[-1]['calorie_cost']);?>
千卡</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['pro']->value[-1]['time_cost'];?>
s</td>
                            <td><?php if ($_smarty_tpl->tpl_vars['pro']->value[-1]['recommend']==1){?>是<?php }else{ ?>否<?php }?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th class="text-center">序号</th>
                    <th class="text-center">动作名称</th>
                    <th class="text-center">动作数</th>
                    <th class="text-center">卡路里(千卡)</th>
                    <th class="text-center">时长(s)</th>
                    <th class="text-center">类型</th>
                    <th class="text-center">创建时间</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars['ainfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ainfo']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['pro']->value[-1]['action_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ainfo']->key => $_smarty_tpl->tpl_vars['ainfo']->value){
$_smarty_tpl->tpl_vars['ainfo']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['ainfo']->key;
?>
                <tr class="<?php if ($_smarty_tpl->tpl_vars['ainfo']->value['calorie']==0){?>info<?php }?>">
                    <td><?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['name'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['action_groupno'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['calorie'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['action_time'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['action_type'];?>
</td>
                    <td>
                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ainfo']->value['ctime'],"%Y-%m-%d %H:%M:%S");?>

                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php }?>
</div>
        
        
        <!-- <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pro']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
            <div class="table-responsive">
                <table class="table table-hover text-center">
                    <tr>
                        <td></td>
                    </tr> -->
                    <!-- <thead>
                        <tr>
                            <th class="text-center">序号</th>
                            <th class="text-center">动作名称</th>
                            <th class="text-center">动作数</th>
                            <th class="text-center">卡路里(千卡)</th>
                            <th class="text-center">时长(s)</th>
                            <th class="text-center">创建时间</th>
                            <th class="text-center">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $_smarty_tpl->tpl_vars['ainfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ainfo']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['row']->value['action_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ainfo']->key => $_smarty_tpl->tpl_vars['ainfo']->value){
$_smarty_tpl->tpl_vars['ainfo']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['ainfo']->key;
?>
                        <tr class="<?php if ($_smarty_tpl->tpl_vars['ainfo']->value['calorie']==0){?>danger<?php }?>">
                            <td><?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['name'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['action_groupno'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['calorie'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['action_time'];?>
</td>
                            <td>
                                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ainfo']->value['ctime'],"%Y-%m-%d %H:%M:%S");?>

                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn btn-primary">查 看</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody> -->
                <!-- </table>
            </div>

        <?php } ?> -->
        
        <!-- <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-center">难度级别</th>
                        <th class="text-center">封面图片</th>
                        <th class="text-center">适用性别</th>
                        <th class="text-center">适用年级</th>
                        <th class="text-center" style="width:300px;">描述</th>
                        <th class="text-center">创建时间</th>
                        <th class="text-center">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</td>
                        <td><img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['coverimg'];?>
"></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['gender'];?>
</td>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['row']->value['grade_apply']){?>
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['grade_apply']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                    <?php echo $_smarty_tpl->tpl_vars['v']->value;?>
<br/>
                                <?php } ?>
                            <?php }?>
                        </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['desc'];?>
</td>
                        <td>
                            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['ctime'],"%Y-%m-%d");?>
<br/>
                            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['ctime'],"%H:%M:%S");?>

                        </td>
                        <td>
                            <a href="/sport/pro/<?php echo $_smarty_tpl->tpl_vars['row']->value['_id'];?>
.html" class="btn btn-sm btn btn-primary" target="__blank">查 看</a>
                            <button type="button" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['_id'];?>
.html" class="btn btn-sm btn-danger" onclick="del(this)">删 除</button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div> -->

<!--     </div>
</div> -->



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

    
<script type="text/javascript">
    
</script>

</body>
</html><?php }} ?>