<?php /* Smarty version Smarty-3.1.13, created on 2017-10-31 14:12:24
         compiled from "/var/www/admin/admin/application/views/template/push/app.tpl" */ ?>
<?php /*%%SmartyHeaderCode:117133368759f81448b9c0a2-68580170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85c2d86e360babdaef67aee860bd8a8a9236bd13' => 
    array (
      0 => '/var/www/admin/admin/application/views/template/push/app.tpl',
      1 => 1509080121,
      2 => 'file',
    ),
    '1af1c7811d93168106c85becc3c13354fe96fe45' => 
    array (
      0 => '/var/www/admin/admin/application/views/template/common/page/layout.tpl',
      1 => 1509430210,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117133368759f81448b9c0a2-68580170',
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
  'unifunc' => 'content_59f81448cd3020_50081160',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59f81448cd3020_50081160')) {function content_59f81448cd3020_50081160($_smarty_tpl) {?><!DOCTYPE html>
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
    
<link href="/static/widget/ueditor/themes/default/css/ueditor.css" type="text/css" rel="stylesheet">
<style type="text/css">
    .edui-editor{
        width: 100%!important;
    }
    .edui-editor-iframeholder{
        width: 100%!important;
        min-height: 300px;
    }
    #pic-show{
        border: 1px solid #fff;
        display: inline-block;
        height: 46px;
        vertical-align: top;
        width: 100px;
        border-radius: 5px;
        overflow: hidden;
        background-repeat: no-repeat;
    }
    .s-ul{
        list-style: none;
    }
    .s-ul li{
        float: left;
        border: 1px solid #d9edf7;
        padding: 5px 10px;
        border-radius: 4px;
        margin-top: 10px;
        margin-right: 10px;
    }
    .s-ul li:hover{
        background: #d9edf7;
    }
    .glyphicon-remove{
        cursor: pointer;
        color: red;
        vertical-align: middle;
        margin-left: 5px;
        padding: 2px;
        margin-top: -4px;
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
                                <i class="fa fa-dashboard" style="margin-right: 10px;"></i> 推送管理 / 平台消息推送
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- 用户数据 -->
                
<div class="row">
    <div class="col-md-8" style="overflow: hidden;">
        <form class="form-horizontal" name="news" style="border: 1px solid #ddd;padding: 15px;border-radius: 5px;">
            <div class="form-group">
                <label for="platform" class="col-sm-2 control-label">类型</label>
                <div class="col-sm-10">
                    <select id="platform" class="form-control" name="type">
                        <option value="">选择类型</option>
                        <option value="1">学校通知</option>
                        <option value="2">平台消息</option>
                    </select>
                </div>
            </div>
            <div class="row form-group sarea" style="display: none;">
                <label class="col-sm-2 control-label">请选择学校</label>
                <div class="col-sm-10">
                    <div class="col-sm-4" style="padding: 0">
                        <input type="text" class="form-control" id="school" placeholder="请输入学校名称" value="">
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-primary gets" href="javascript:void(0)">
                            添 加
                        </a>
                    </div>
                    <ul class="s-ul col-sm-12" style="padding:0;">
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">标题</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" placeholder="title" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="desc" class="col-sm-2 control-label">摘要</label>
                <div class="col-sm-10">
                    <textarea id="desc" name="desc" class="form-control" rows="3" placeholder="摘要"></textarea>
                </div>
            </div>
            <div class="form-group img-div" style="display: none;">
                <label for="cover" class="col-sm-2 control-label">封面图片</label>
                <div class="col-sm-10">
                    <a class="btn btn-default btn-lg" id="pickfiles" href="#" style="position: relative; z-index: 1;">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>选择文件</span>
                    </a>
                    <p id="pic-show"></p>
                    <!-- <input style="padding-left: 0;" type="file" id="cover" name="cover" class="col-sm-6" value="">-->
                    <input type="hidden" name="cover_img" id="cover_img" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">消息内容</label>
                <div class="col-sm-10">
                    <div id="editor" name="content"></div>
                </div>
            </div>

            <button id="sub" style="margin-left: 17%;" type="button" class="btn btn-md btn-primary">确认发布</button>
            
        </form>
    </div>
</div>
<input type="hidden" name="uptoken" id="uptoken" value="<?php echo $_smarty_tpl->tpl_vars['uptoken']->value;?>
">


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

    
<script src="/static/widget/ueditor/ueditor.config.js"></script>
<script src="/static/widget/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/static/qiniu/moxie.min.js"></script>
<script type="text/javascript" src="/static/qiniu/plupload.full.min.js"></script>
<script type="text/javascript" src="/static/qiniu/zh_CN.js"></script>
<script type="text/javascript" src="/static/qiniu/qiniu.min.js"></script>
<script type="text/javascript" src="/static/bootstrap/js/bootstrap-typeahead.js"></script>
<script>
$(function(){
    var domain = 'https://oi7ro6pyq.qnssl.com/';
    var schoolIds = [];

    var publish = {
        init: function(){
            this.getDom();
            this.initUe();
            this.uploadPic();
            this.sendXhr();
            this.chooseType();
            this.getSchool();
            this.removeSchool();
        },

        getDom: function(){
            this.form = $('form[name=news]');
            this.picshow = $('#pic-show');
            this.picUrl = $('input[name=cover_img]');
            this.subBtn = $('#sub');
            this.img = $('.img-div');
            this.selectBtn = $('select[name=type]');
            this.schoolBtn = $('#school');
            this.sUl = $('.s-ul');
            this.getBtn = $('.gets');
            this.schoolArea = $('.sarea');
            this.removeBtn = $('.remove-school');
            this.dialogDom = {};
        },

        getSchool: function(){
            var me  =this;
            me.schoolBtn.typeahead({
                source: function (query, process) {
                    return $.ajax({
                        url: '/school/search?name=' + query,
                        type: 'get',
                        success: function (result) {
                            if(!result.data.list || result.data.list.length == 0){
                                return;
                            }
                            return process(result.data.list);
                        },
                    });
                }
            });

            me.getBtn.bind('click', function(){
                var inputVal = $.trim(me.schoolBtn.val());
                var searchVal = $('.dropdown-menu > .active').data();
                if(!inputVal || !searchVal || (searchVal.value.name != inputVal) || !searchVal.value._id){
                    me.alertMsg('请选择学校', 'd1');
                    return false;
                }
                if($.inArray(searchVal.value._id, schoolIds) != -1){
                    me.schoolBtn.val('');
                    return false;
                }
                var liHtml = '<li data-id="'+searchVal.value._id+'"><span>'+searchVal.value.name+'</span><span class="glyphicon glyphicon-remove remove-school"></span></li>';
                me.sUl.append(liHtml);
                me.schoolBtn.val('');
                schoolIds.push(searchVal.value._id);
            })
        },

        removeSchool: function(){
            var me = this;
            
            $(document).on('click', '.remove-school', function(e){
                var sid = $(this).parent().data('id');
                for(var i=0; i<schoolIds.length; i++) {
                    if(schoolIds[i] == sid) {
                        schoolIds.splice(i, 1);
                        break;
                    }
                }
                $(this).parent().remove();
                return false;
            })
        },

        chooseType: function(){
            var me = this;
            me.selectBtn.bind('change', function(){
                var type = $(this).val();
                if(type == 1){
                    me.img.hide();
                    me.picshow.attr('style', '');
                    me.picUrl.val('');
                    me.schoolArea.show();
                }
                else{
                    me.schoolArea.hide();
                    me.img.show();
                }
            })
        },

        initUe: function(){
            this.ue = UE.getEditor('editor');
        },

        uploadPic: function(){
            var me = this;
            // 七牛文件上传 基于Puploader
            var uploader = Qiniu.uploader({
                runtimes: 'html5,flash,html4',
                browse_button: 'pickfiles',
                max_file_size: '1mb',
                flash_swf_url: '/static/qiniu/Moxie.swf',
                dragdrop: false,
                uptoken: $('#uptoken').val(),
                domain: domain,
                get_new_uptoken: false,
                unique_names: true,
                max_retries: 3,
                auto_start: true,
                multi_selection: false,
                filters: {
                    mime_types : [ //只允许上传图片
                        { title : "Image files", extensions : "jpg,png,jpeg" }
                    ]
                },

                init: {
                    'UploadProgress': function(up, file) {
                        // todo
                    },
                    'FileUploaded': function(up, file, info) {
                        if(info.status == 200){
                            var url = domain + eval('('+info.response+')')['key'];
                            me.picshow.css({'background':'url('+url+') no-repeat center center','background-size':'auto 46px','border-color':'#ccc'});
                            me.picUrl.val(url);
                        }
                    },
                    'Error': function(up, err, errTip) {
                        me.picshow.css({'background':'','background-size':'','border-color':'#fff'});
                        me.picUrl.val('');
                        alert(errTip);
                        return false;
                    }
                }
            });
        },

        sendXhr: function(){
            var me = this,
                xhr = null;
            me.subBtn.unbind().bind('click',function(){
                var atype = me.selectBtn.val();
                $('.append-int').remove();
                if(!atype){
                    me.alertMsg('请选择推送类型','d2');
                    return false;
                }
                else if(atype == 1){
                    if(schoolIds.length == 0){
                        me.alertMsg('请选择学校','d2');
                        return false;
                    }
                    for (var i in schoolIds) {
                        var intHtml = "<input class='append-int' type='hidden' name='schools[]' value='"+schoolIds[i]+"'>";
                        me.form.append(intHtml);
                    }
                }
                var data = me.form.serialize();
                xhr = $.ajax({
                    url: '/push/appnotice', 
                    data: data, 
                    type: 'POST',
                    dataType: 'json',
                    success: function(json){
                        if(json.errCode == 0){
                            me.alertMsg('推送成功','d3');
                        }
                        else{
                            me.alertMsg(json.errMessage,'d4');
                            return false;
                        }
                        
                    },
                    beforeSend: function () {
                        if(xhr != null) {
                            xhr.abort();
                        }
                    },
                });
            })
        },

        alertMsg: function(text, name){
            var me = this,
                configs = {
                    'title'   : '',
                    'content' : text,
                    'modal'   : true,
                    'buttons' : {
                        '明白了' : function(){
                            me.dialogDom.name.close();
                        },
                    }
                };

            if(name == 'd3'){
                configs.buttons = {
                    '确 定' : function(){
                        me.dialogDom.name.close();
                        window.location.reload();
                    },
                };
            }

            me.dialogDom.name = jqueryAlert(configs);

            return false;
        },
    }

    publish.init();

})
</script>

</body>
</html><?php }} ?>