<?php /* Smarty version Smarty-3.1.13, created on 2017-08-21 08:57:18
         compiled from "/var/www/aa/admin/admin/application/views/template/sport/banner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:947175370599a2feed39800-44711834%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2fe685b24cb8f77d15a8ebe57f386536090bbd1b' => 
    array (
      0 => '/var/www/aa/admin/admin/application/views/template/sport/banner.tpl',
      1 => 1501639058,
      2 => 'file',
    ),
    '29e75058da3e02dbeb1c4f16cdcca6bb7fcb9ff6' => 
    array (
      0 => '/var/www/aa/admin/admin/application/views/template/common/page/layout.tpl',
      1 => 1503275848,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '947175370599a2feed39800-44711834',
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
  'unifunc' => 'content_599a2feedc8619_09628899',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599a2feedc8619_09628899')) {function content_599a2feedc8619_09628899($_smarty_tpl) {?><!DOCTYPE html>
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
    
<link href="/static/bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<style type="text/css">
    .datetimepicker{
        margin-top: 50px;
    }
    .glyphicon-calendar{
        color: red;
        cursor: pointer;
    }
    .thumbnail > img{
        height: 100px;
        overflow: hidden;
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
                                <i class="fa fa-dashboard" style="margin-right: 10px;"></i> 运动圈 / banner <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-form">添加Banner</a>
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- 用户数据 -->
                
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-center">标题</th>
                        <th class="text-center">上传者</th>
                        <th style="max-width: 160px;" class="text-center">描述</th>
                        <th class="text-center">图片</th>
                        <th class="text-center">长宽比</th>
                        <th class="text-center">有效期</th>
                        <th class="text-center">Access</th>
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
                    <tr data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['_id'];?>
">
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['creator'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['h5content'];?>
</td>
                        <td><img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['coverimgurl'];?>
" height="80" /></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['aspectRatio'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['starttime'];?>
 <br/>至<br/> <?php echo $_smarty_tpl->tpl_vars['row']->value['endtime'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['Access'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['createtime'];?>
</td>
                        <td style="width: 160px;">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit-form" onclick="edit(this)" data-row='<?php echo json_encode($_smarty_tpl->tpl_vars['row']->value);?>
' class="edit-btn">编 辑</button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="del(this)">删 除</button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['pageCount']->value>1){?>
        <div class="text-center">
            <ul id="page" style="margin: 0;" data-url-pn="<?php echo $_GET['pn'];?>
"></ul>
        </div>
        <?php }?>
    </div>
</div>

<!-- modal-edit -->
<div class="modal fade" id="edit-form" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document" style="margin-top:7%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalLabel">Banner Edit</h4>
            </div>
            <div class="modal-body">
                <form name="banner">
                    <div class="form-group">
                        <label for="b-title" class="control-label">标题:</label>
                        <input type="text" class="form-control" id="b-title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="b-desc" class="control-label">描述:</label>
                        <textarea class="form-control" id="b-desc" name="h5content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="b-stime" class="control-label">开始时间:</label>
                        <div class="input-group date date_start" data-date="" data-date-format="yyyy-mm-dd">
                            <input readonly type="text" class="form-control" id="b-stime" name="starttime">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="b-etime" class="control-label">结束时间:</label>
                        <div class="input-group date date_end" data-date="" data-date-format="yyyy-mm-dd">
                            <input readonly type="text" class="form-control" id="b-etime" name="endtime">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="b-url" class="control-label">URL:</label>
                        <input type="text" class="form-control" id="b-url" name="h5url">
                    </div>
                    <div class="form-group">
                        <label for="img-size" class="control-label">图片比例:</label>
                        <input type="input" class="form-control" id="img-size" name="aspectRatio">
                    </div>
                    <input type="hidden" name="uptoken" id="uptoken" value="<?php echo $_smarty_tpl->tpl_vars['uptoken']->value;?>
">
                    <input type="hidden" name="coverimgurl" value="">
                </form>

                <label class="control-label">IMG:</label>
                <div class="thumbnail">
                    <img src="" alt="..." id="coverimgurl">
                </div>

                <a class="btn btn-default btn-lg" id="pickfiles" href="#" style="position: relative; z-index: 1;">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>选择文件</span>
                </a>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="reset()">Close</button>
                <button type="button" class="btn btn-primary" onclick="commit(this)" data-id="" id="sub-btn">Summit</button>
            </div>
        </div>
    </div>
</div>

<!-- modal-add -->
<div class="modal fade" id="add-form" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document" style="margin-top:7%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalLabel">Banner Add</h4>
            </div>
            <div class="modal-body">
                <form name="banner-add">
                    <div class="form-group">
                        <label for="b-title-add" class="control-label">标题:</label>
                        <input type="text" class="form-control" id="b-title-add" name="title">
                    </div>
                    <div class="form-group">
                        <label for="b-desc-add" class="control-label">描述:</label>
                        <textarea class="form-control" id="b-desc-add" name="h5content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="b-stime-add" class="control-label">开始时间:</label>
                        <div class="input-group date date_start" data-date="" data-date-format="yyyy-mm-dd">
                            <input readonly type="text" class="form-control" id="b-stime-add" name="starttime">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="b-etime-add" class="control-label">结束时间:</label>
                        <div class="input-group date date_end" data-date="" data-date-format="yyyy-mm-dd">
                            <input readonly type="text" class="form-control" id="b-etime-add" name="endtime">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="b-url-add" class="control-label">URL:</label>
                        <input type="input" class="form-control" id="b-url-add" name="h5url">
                    </div>
                    <div class="form-group">
                        <label for="b-img-size" class="control-label">图片比例:</label>
                        <input type="input" class="form-control" id="b-img-size" name="aspectRatio">
                    </div>
                    <input type="hidden" name="coverimgurl-add" value="">
                </form>

                <label class="control-label">IMG:</label>
                <div class="thumbnail">
                    <img src="" id="coverimgurl-add">
                </div>

                <a class="btn btn-default btn-lg" id="pickfiles-add" href="#" style="position: relative; z-index: 1;">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>选择文件</span>
                </a>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addBanner()" data-id="" id="sub-btn">Summit</button>
            </div>
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
<script type="text/javascript" src="/static/bootstrap/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="/static/sport/js/banner.js"></script>
<script type="text/javascript" src="/static/bootstrap/js/bootstrap-paginator.js"></script>
<script type="text/javascript">
    var currentPage = <?php echo $_smarty_tpl->tpl_vars['pn']->value;?>
;
    var pageCount = <?php echo $_smarty_tpl->tpl_vars['pageCount']->value;?>
;
    var urlPage = parseInt($("#page").data('url-pn'));
    if(isNaN(urlPage)){
        urlPage = 0;
    }

    $('#page').twbsPagination({
        totalPages: pageCount,
        visiblePages: 7,
        version: '1.1',
        first: '首页',
        prev: '上一页',
        next: '下一页',
        last: '尾页',
        startPage: currentPage,
        onPageClick: function (event, page) {
            if(urlPage == page)
                return;

            window.location = "?pn=" + page;
        }
    });
</script>

</body>
</html><?php }} ?>