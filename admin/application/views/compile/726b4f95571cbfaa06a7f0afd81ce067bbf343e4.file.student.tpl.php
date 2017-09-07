<?php /* Smarty version Smarty-3.1.13, created on 2017-09-07 22:13:17
         compiled from "/var/www/admin/admin/application/views/template/user/student.tpl" */ ?>
<?php /*%%SmartyHeaderCode:202796277459b153fd4a35b5-95306826%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '726b4f95571cbfaa06a7f0afd81ce067bbf343e4' => 
    array (
      0 => '/var/www/admin/admin/application/views/template/user/student.tpl',
      1 => 1504095261,
      2 => 'file',
    ),
    '1af1c7811d93168106c85becc3c13354fe96fe45' => 
    array (
      0 => '/var/www/admin/admin/application/views/template/common/page/layout.tpl',
      1 => 1504619863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202796277459b153fd4a35b5-95306826',
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
  'unifunc' => 'content_59b153fd5460a6_17028063',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59b153fd5460a6_17028063')) {function content_59b153fd5460a6_17028063($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/admin/admin/library/smarty/plugins/modifier.date_format.php';
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
    .add-ugc-fix{
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
        height: 200px;
        border: 1px solid white;
        background-color: white;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -100px;
        margin-left: -250px;
        border-radius: 4px;
        padding: 10px;
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
                                <i class="fa fa-dashboard" style="margin-right: 10px;"></i> 用户管理 / 学生管理
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

                        <div class="col-md-4">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">学生ID：</label>
                                <div class="col-md-8">
                                    <input type="text" name="uid" class="input-sm form-control" value="<?php echo $_GET['uid'];?>
">
                                </div>
                            </div>
                        </div>
                    </div><br/>
                    <div class="form-horizontal row">
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
                        <td><a href="/user/class?classid=<?php echo $_smarty_tpl->tpl_vars['row']->value['classinfo']['classid'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['classinfo']['classname'];?>
</a></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['clientsource'];?>
<br/><?php echo $_smarty_tpl->tpl_vars['row']->value['versions'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['mobileno'];?>
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
                            <a data-uid="<?php echo $_smarty_tpl->tpl_vars['row']->value['_id'];?>
" data-cid="<?php echo $_smarty_tpl->tpl_vars['row']->value['classinfo']['classid'];?>
" href="javascript:void(0)" class="btn btn-danger btn-xs addUgc">补交UGC</a>
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
        <h4>补交UGC</h4>
        <i class="glyphicon glyphicon-remove"></i>
        <form name="ugc" class="ugcform">
            <div class="form-group">
                <label for="hid">作业 ID</label>
                <input type="text" class="form-control" id="hid" placeholder="">
            </div>
            <button id="sub" type="button" class="btn btn-default pull-right">Submit</button>
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

    
<script type="text/javascript">
!(function(){
    var student = {

        init: function (){
            this.getDom();
            this.addUgc();
            this.clickCloseFix();
            this.postData();
        },

        getDom: function(){
            this.ugcBtn = $('.addUgc');
            this.form = $('form[name=ugc]');
            this.hid = $('#hid');
            this.fixBox = $('.add-ugc-fix');
            this.closeFixBoxBtn = $('.glyphicon-remove');
            this.subBtn = $('#sub');
        },

        showDialog: function(){
            var me = this;

            me.fixBox.fadeIn(200);
        },

        hideDialog: function(){
            var me = this;

            me.fixBox.fadeOut(200);
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
                    cid = $.trim($(this).data('cid'));
                me.subBtn.attr('data-uid', uid);
                me.subBtn.attr('data-cid', cid);
                me.showDialog();
            })
        },

        postData: function(){
            var me = this,
                aj = null;
            me.subBtn.unbind().bind('click', function(){
                var uid = $.trim($(this).data('uid')),
                    cid = $.trim($(this).data('cid')),
                    hid = $.trim(me.hid.val());
                
                if(!uid || !cid || !hid){
                    alert('参数错误.');
                    return false;
                }

                aj = $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '/user/addUgc?uid=' + uid + '&cid=' + cid + '&hid=' + hid,
                    success: function(json){
                        if(json.errCode == 200){
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