<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.13, created on 2018-02-06 12:44:33
         compiled from "/var/www/admin/admin/application/views/template/project/addsku.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8652940455a7932b1050ab0-90193522%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.13, created on 2018-02-06 10:45:50
         compiled from "/var/www/admin/admin/application/views/template/project/addsku.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4847855745a7916decdeca7-24464676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 2c7cc0ee79cb0b1d1ac89a74bbf098ce3846383f
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d8e04a89d68bf3e9905973d00de2e54d91741e4' => 
    array (
      0 => '/var/www/admin/admin/application/views/template/project/addsku.tpl',
<<<<<<< HEAD
      1 => 1514861948,
=======
      1 => 1517884731,
>>>>>>> 2c7cc0ee79cb0b1d1ac89a74bbf098ce3846383f
      2 => 'file',
    ),
    '1af1c7811d93168106c85becc3c13354fe96fe45' => 
    array (
      0 => '/var/www/admin/admin/application/views/template/common/page/layout.tpl',
<<<<<<< HEAD
      1 => 1510105483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8652940455a7932b1050ab0-90193522',
=======
      1 => 1510105563,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4847855745a7916decdeca7-24464676',
>>>>>>> 2c7cc0ee79cb0b1d1ac89a74bbf098ce3846383f
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
  'unifunc' => 'content_5a7932b10b4531_58260459',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7932b10b4531_58260459')) {function content_5a7932b10b4531_58260459($_smarty_tpl) {?><!DOCTYPE html>
=======
  'unifunc' => 'content_5a7916dee3d080_68712008',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7916dee3d080_68712008')) {function content_5a7916dee3d080_68712008($_smarty_tpl) {?><!DOCTYPE html>
>>>>>>> 2c7cc0ee79cb0b1d1ac89a74bbf098ce3846383f
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
    #action-list,#action-list-select,#action-list-rest{
        height: 500px;
    }
    .border-h3{
        border-left: 5px solid #5bc0de;
        padding-left: 15px;
        font-size: 20px;
    }
    .fix-int-wrmp{
        position: fixed;
        top: 0;
        left: 0;
        z-index: 999;
        background-color: rgba(0,0,0,0.4);
        width: 100%;
        height: 100%;
        display: none;
    }
    .fix-int{
        width: 400px;
        height: 160px;
        background-color: white;
        border: 1px solid #333;
        padding: 15px;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -80px;
        margin-left: -200px;
    }
    .btn-success{
        margin-right: 10px;
    }
    #actionNameSpan{
        padding-left: 15px;
        font-size: 14px;
        color: #565656;
        color: #0c9;
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
                                <i class="fa fa-dashboard" style="margin-right: 10px;"></i> 锻炼内容管理 / 发布新方案
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- 用户数据 -->
                
<div class="row">
    <div class="col-lg-12">
        <h3 class="border-h3">当前项目信息</h3>
        <table class="table table-bordered">
            <tr>
                <td style="line-height: 7;"><?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
</td>
                <td><img src="<?php echo $_smarty_tpl->tpl_vars['project']->value['coverimg'];?>
?imageView2/2/h/100"></td>
            </tr>
        </table>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <h3 class="border-h3">添加锻炼内容</h3><br/>
        <form class="form-inline" name="action">
            <div class="form-group">
                <label for="action-name">动作名称</label>
                <input type="text" class="form-control" name="name" id="action-name">
            </div>
            <div class="form-group">
                <label for="action-type">动作类型</label>
                <select class="form-control" name="typeno" id="action-type">
                    <option value="">ALL</option>
                    <option value="1">计时锻炼</option>
                    <option value="2">计组数锻炼</option>
                    <option value="3">节拍锻炼</option>
                    <!-- 4 => '休息', -->
                </select>
            </div>
            <div class="form-group">
                <label for="action-item">检测项目</label>
                <select class="form-control" name="physicalquality" id="action-item">
                    <option value="">ALL</option>
                    <option value="0">耐力素质</option>
                    <option value="1">上肢力量</option>
                    <option value="2">腹肌耐力</option>
                    <option value="3">柔韧素质</option>
                    <option value="4">速度素质</option>
                    <option value="5">下肢力量</option>
                    <option value="6">综合素质</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sex">性别</label>
                <select class="form-control" name="sex" id="sex">
                    <option value="2">ALL</option>
                    <option value="0">男</option>
                    <option value="1">女</option>
                </select>
            </div>
            <button type="button" class="btn btn-info" id="search">检索</button>
        </form>
    </div>
</div>


<div class="row" style="margin-top: 20px;padding: 15px;">
    <div class="col-lg-3" style="border: 1px solid #ccc;padding: 15px;">
        <select multiple class="form-control" id="action-list">
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
" type-no="<?php echo $_smarty_tpl->tpl_vars['acl']->value['typeno'];?>
"><?php echo $_smarty_tpl->tpl_vars['acl']->value['name'];?>
</option>
                    <?php } ?>
                </optgroup>
            <?php } ?>
        </select>
    </div>
    <div class="col-lg-2">
        <div class="text-center fx-btn" >
            <a href="javascript:void(0)" class="btn btn-sm btn-default" id="addBtn">添加 >></a>
            <a href="javascript:void(0)" class="btn btn-sm btn-default" id="delBtn">删除 <<</a>
            <a href="javascript:void(0)" class="btn btn-sm btn-default" id="upBtn">前移</a>
            <a style="margin-bottom: 0;" href="javascript:void(0)" id="downBtn" class="btn btn-sm btn-default">后移</a>
        </div>
    </div>
    <div class="col-lg-3" style="border: 1px solid #ccc;padding: 15px;">
        <select multiple class="form-control" id="action-list-select">
            <!-- <option>1</option> -->
        </select>
    </div>
    <div class="col-lg-2">
        <div class="text-center fx-btn">
            <a href="javascript:void(0)" class="btn btn-sm btn-default" id="rest-add-btn"><< 添加</a>
        </div>
    </div>
    <div class="col-lg-2" style="border: 1px solid #ccc;padding: 15px;">
        <select multiple class="form-control" id="action-list-rest">
            <?php  $_smarty_tpl->tpl_vars['re'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['re']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['restList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['re']->key => $_smarty_tpl->tpl_vars['re']->value){
$_smarty_tpl->tpl_vars['re']->_loop = true;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['re']->value['_id'];?>
" type-no="<?php echo $_smarty_tpl->tpl_vars['re']->value['typeno'];?>
"><?php echo $_smarty_tpl->tpl_vars['re']->value['name'];?>
【<?php echo $_smarty_tpl->tpl_vars['re']->value['singletime'];?>
 s】</option>
            <?php } ?>
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="desc">方案简介：</label><br/>
            <textarea id="desc" class="form-control" rows="3" name="desc"></textarea>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="course_type">课程类型：</label><br/>
            <textarea id="course_type" class="form-control" rows="1" name="course_type"></textarea>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="users">适用人群：</label><br/>
            <textarea id="users" class="form-control" rows="1" name="users"></textarea>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="taboo_crowd">禁忌人群：</label><br/>
            <textarea id="taboo_crowd" class="form-control" rows="2" name="taboo_crowd"></textarea>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="prepare">练前准备：</label><br/>
            <textarea id="prepare" class="form-control" rows="2" name="prepare"></textarea>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="physical_reaction">身体反应：</label><br/>
            <textarea id="physical_reaction" class="form-control" rows="2" name="physical_reaction"></textarea>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="course_advice">课程建议：</label><br/>
            <textarea id="course_advice" class="form-control" rows="2" name="course_advice"></textarea>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
           <a class="btn btn-default btn-lg" id="coverimg" href="#" style="position: relative; z-index: 1;">
                <i class="glyphicon glyphicon-plus"></i>
                <span>上传封面图片</span>
            </a>
            <input type="hidden" name="coverimg" id="coverimg-val">
        </div>

        <div id="picshow"></div>
        <input type="hidden" name="uptoken" id="uptoken" value="<?php echo $_smarty_tpl->tpl_vars['uptoken']->value;?>
">

    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <form class="form-inline" name="sku">
            <div class="form-group">
                <label for="difficulty">难度：</label>
                <select class="form-control" name="difficulty">
                    <?php if ($_smarty_tpl->tpl_vars['project']->value['has_level']==-1){?>
                    <option value="-1">无难度级别</option>
                    <?php }else{ ?>
                        <option value="-2">请选择难度级别</option>
                        <?php  $_smarty_tpl->tpl_vars['darr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['darr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project']->value['difficultyVal']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['darr']->key => $_smarty_tpl->tpl_vars['darr']->value){
$_smarty_tpl->tpl_vars['darr']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['darr']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['project']->value['difficultyArr'][$_smarty_tpl->tpl_vars['darr']->value];?>
</option>
                        <?php } ?>
                    <?php }?>
                </select>
            </div>
            <input type="hidden" name="project_id" value="<?php echo $_smarty_tpl->tpl_vars['project']->value['_id'];?>
">&emsp;
            <button type="button" id="addSkuBtn" class="btn btn-md btn-primary">确认提交</button>
        </form>
    </div>
</div>

<div class="fix-int-wrmp">
    <div class="fix-int">
        <h4>请输入循环次数<span id="actionNameSpan"></span></h4>
        <input type="text" id="actionNo" class="form-control">
        <br/>
        <button class="btn btn-default pull-right" type="button" id="canNo">&emsp;取&emsp;消&emsp;</button>
        <button class="btn btn-success pull-right" type="button" id="subNo">&emsp;确&emsp;定&emsp;</button>
    </div>
</div>  

<div class="fix-per">
    <div class="fix-cont">
        <!-- 100% -->
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

    
<script type="text/javascript" src="/static/qiniu/moxie.min.js"></script>
<script type="text/javascript" src="/static/qiniu/plupload.full.min.js"></script>
<script type="text/javascript" src="/static/qiniu/zh_CN.js"></script>
<script type="text/javascript" src="/static/qiniu/qiniu.min.js"></script>
<script type="text/javascript" src="/static/project/js/addSku.js"></script>

</body>
</html><?php }} ?>