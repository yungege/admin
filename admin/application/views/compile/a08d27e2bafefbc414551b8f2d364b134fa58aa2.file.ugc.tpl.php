<?php /* Smarty version Smarty-3.1.13, created on 2017-08-18 17:53:45
         compiled from "/var/www/aa/admin/admin/application/views/template/sport/ugc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14914286685996b929574a04-60859797%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a08d27e2bafefbc414551b8f2d364b134fa58aa2' => 
    array (
      0 => '/var/www/aa/admin/admin/application/views/template/sport/ugc.tpl',
      1 => 1502949805,
      2 => 'file',
    ),
    '29e75058da3e02dbeb1c4f16cdcca6bb7fcb9ff6' => 
    array (
      0 => '/var/www/aa/admin/admin/application/views/template/common/page/layout.tpl',
      1 => 1502137853,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14914286685996b929574a04-60859797',
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
  'unifunc' => 'content_5996b929615916_90400526',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5996b929615916_90400526')) {function content_5996b929615916_90400526($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/aa/admin/admin/library/smarty/plugins/modifier.date_format.php';
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
    </style>
    
<link href="/static/bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<style type="text/css">
.date_start,.date_end{
    float: left!important;
}
.datetimepicker{
    margin-top: 50px!important;
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
                           <!--  <li>
                                <a href="/user/grade" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==2&&$_smarty_tpl->tpl_vars['tag']->value[1]==3){?>cy-child-active<?php }?>">年级管理</a>
                            </li> -->
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
                                <i class="fa fa-dashboard" style="margin-right: 10px;"></i> 运营管理 / UGC
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

                        <div class="col-md-2">
                            <div class="row">
                                <label class="col-md-5 paddZero control-label">作业类型：</label>

                                <div class="col-md-7">
                                    <select class="input-sm form-control" name="type">
                                        <option value="-1">选择作业类型</option>
                                        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['idx'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['worktype']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['idx']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                                        <option <?php echo isset($_GET['type'])&&($_smarty_tpl->tpl_vars['idx']->value==$_GET['type']) ? 'selected' : '';?>
 value="<?php echo $_smarty_tpl->tpl_vars['idx']->value;?>
" ><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="row">
                                <label class="col-md-4 paddZero control-label">学生ID：</label>
                                <div class="col-md-8">
                                    <input type="text" name="uid" class="input-sm form-control" value="<?php echo $_GET['uid'];?>
">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="row">
                                <label class="col-md-3 paddZero control-label">起止日期：</label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-sm-5 input-group date date_start" data-date="" data-date-format="yyyy-mm-dd">
                                            <input readonly type="text" class="form-control" id="start" name="start" value="<?php echo $_GET['start'];?>
" >
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-5 input-group date date_end" data-date="" data-date-format="yyyy-mm-dd">
                                            <input readonly type="text" class="form-control" id="end" name="end" value="<?php echo $_GET['end'];?>
">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br/>
                    <div class="form-horizontal row">
                        <div class="col-md-2">
                            <div class="row">
                                <label class="col-md-5 paddZero control-label">是否补交：</label>
                                <div class="col-md-7">
                                    <select class="input-sm form-control" name="delay">
                                        <option value="0">是否补交作业</option>
                                        <option <?php if ($_GET['delay']==1){?> selected="true" <?php }?> value="1" >是</option>
                                        <option <?php if ($_GET['delay']==-1){?> selected="true" <?php }?> value="-1" >否</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div><br/>
                    <div class="form-horizontal row">
                        <div class="col-md-2 col-md-offset-1">
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
                        <th>学生</th>
                        <th>头像</th>
                        <th>作业类型</th>
                        <th>锻炼项目</th>
                        <th>能量/千卡</th>
                        <th>跑步路程/m</th>
                        <th>开始时间</th>
                        <th>结束时间</th>
                        <th>提交时间</th>
                        <th>原始时间</th>
                        <th>是否补交</th>
                        <th>作业图片</th>
                        <th>是否分享</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                    <tr data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['_id'];?>
">
                        <td>姓名：<a href="/user/student?uid=<?php echo $_smarty_tpl->tpl_vars['row']->value['userid'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
</a><br/>昵称：<a href="/user/student?uid=<?php echo $_smarty_tpl->tpl_vars['row']->value['userid'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['nickname'];?>
</a></td>
                        <td><a href="/user/student?uid=<?php echo $_smarty_tpl->tpl_vars['row']->value['userid'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['iconurl'];?>
?imageView2/2/w/100/h/60/q/100" width="50" height="50" style="border-radius: 25px;"></a></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['hname'];?>
</td>
                        <td><a href="/sport/p/<?php echo $_smarty_tpl->tpl_vars['row']->value['pid'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['row']->value['pname'];?>
</a></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['burncalories'];?>
</td>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['row']->value['distance'];?>
<br/>
                            <?php if ($_smarty_tpl->tpl_vars['row']->value['avgSpeed']){?>平均速度：<?php echo $_smarty_tpl->tpl_vars['row']->value['avgSpeed'];?>
 km/h<?php }?>
                        </td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['starttime'],"%Y-%m-%d");?>
<br><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['starttime'],"%H:%M:%S");?>
</td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['endtime'],"%Y-%m-%d");?>
<br><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['endtime'],"%H:%M:%S");?>
</td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['createtime'],"%Y-%m-%d");?>
<br><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['createtime'],"%H:%M:%S");?>
</td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['originaltime'],"%Y-%m-%d");?>
</td>
                        <td><?php if ($_smarty_tpl->tpl_vars['row']->value['isdelay']==2){?><span class="label label-danger">是</span><?php }else{ ?><span class="label label-default">否</span><?php }?></td>
                        <td><button data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['_id'];?>
" class="btn btn-sm btn-info">查看</button></td>
                        <td><?php if ($_smarty_tpl->tpl_vars['row']->value['htype']!=3&&$_smarty_tpl->tpl_vars['row']->value['share']==1){?><button data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['_id'];?>
" class="btn btn-sm btn-info">查看</button><?php }?></td>
                        <td></td>
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

    
<script type="text/javascript" src="/static/bootstrap/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="/static/ugc/index.js"></script>

<!-- <script type="text/javascript" src="/static/bootstrap/js/bootstrap-paginator.js"></script> -->
<script type="text/javascript">
    

    // var currentPage = <?php echo $_smarty_tpl->tpl_vars['pn']->value;?>
;
    // var pageCount = <?php echo $_smarty_tpl->tpl_vars['pageCount']->value;?>
;
    // var urlPage = parseInt($("#page").data('url-pn'));
    // var queryStr = $("#page").data('query');
    // if(isNaN(urlPage)){
    //     urlPage = 0;
    // }

    // $('#page').twbsPagination({
    //     totalPages: pageCount,
    //     visiblePages: 7,
    //     version: '1.1',
    //     first: '首页',
    //     prev: '上一页',
    //     next: '下一页',
    //     last: '尾页',
    //     startPage: currentPage,
    //     onPageClick: function (event, page) {
    //         if(urlPage == page)
    //             return;

    //         window.location = "?" + queryStr + '&pn=' + page;
    //     }
    // });
</script>

</body>
</html><?php }} ?>