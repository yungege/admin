<?php /* Smarty version Smarty-3.1.13, created on 2017-05-15 17:28:06
         compiled from "/var/www/admin/admin/application/views/template/sport/action.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1689956267591974a6784d15-51157640%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1aa31fe68596b69275b00bb70552d612bede4f8' => 
    array (
      0 => '/var/www/admin/admin/application/views/template/sport/action.tpl',
      1 => 1494840479,
      2 => 'file',
    ),
    '1af1c7811d93168106c85becc3c13354fe96fe45' => 
    array (
      0 => '/var/www/admin/admin/application/views/template/common/page/layout.tpl',
      1 => 1494210642,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1689956267591974a6784d15-51157640',
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
  'unifunc' => 'content_591974a67c7748_99276495',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591974a67c7748_99276495')) {function content_591974a67c7748_99276495($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/admin/admin/library/smarty/plugins/modifier.date_format.php';
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
.video{
    cursor: pointer;
    border: 1px solid #ccc;
    padding: 5px 15px 5px 15px;
    border-radius: 3px;
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}
.video:hover{
    border-color: #0c9;
    background-color: #0c9;
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
                        <a href="javascript:;" data-toggle="collapse" data-target="#user"><i class="fa fa-fw fa-user"></i> 用户 <i class="fa fa-fw fa-caret-down pull-right"></i></a>
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
                            <i class="fa fa-fw fa-bicycle"></i> 运动圈 <i class="fa fa-fw fa-caret-down pull-right"></i>
                        </a>
                        <ul id="sport" class="collapse <?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==3){?>in<?php }?>">
                            <li>
                                <a href="/sport/banner" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==3&&$_smarty_tpl->tpl_vars['tag']->value[1]==1){?>cy-child-active<?php }?>">Banner</a>
                            </li>
                            <li>
                                <a href="/sport/project" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==3&&$_smarty_tpl->tpl_vars['tag']->value[1]==2){?>cy-child-active<?php }?>">项目</a>
                            </li>
                            <li>
                                <a href="/sport/action" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==3&&$_smarty_tpl->tpl_vars['tag']->value[1]==3){?>cy-child-active<?php }?>">动作</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#basic"><i class="fa fa-fw fa-bar-chart-o"></i> 基础数据 <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                        <ul id="basic" class="collapse <?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==4){?>in<?php }?>">
                            <li>
                                <a href="#" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==4&&$_smarty_tpl->tpl_vars['tag']->value[1]==1){?>cy-child-active<?php }?>">今日活跃学生</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#bug"><i class="fa fa-fw fa-bug"></i> BUG收集 <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                        <ul id="bug" class="collapse <?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==5){?>in<?php }?>">
                            <li>
                                <a href="/feedback/index" class="<?php if ($_smarty_tpl->tpl_vars['tag']->value[0]==5&&$_smarty_tpl->tpl_vars['tag']->value[1]==1){?>cy-child-active<?php }?>">反馈建议</a>
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
                                <i class="fa fa-dashboard" style="margin-right: 10px;"></i> 运动圈 / 动作管理
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
                        <th class="text-center">动作名称</th>
                        <th class="text-center">动作类型</th>
                        <th class="text-center">封面图片</th>
                        <th class="text-center">视频文件</th>
                        <th class="text-center">文件大小</th>
                        <th class="text-center">耗时（单次）</th>
                        <th class="text-center">能量（单次）</th>
                        <th class="text-center">年级难度</th>
                        <th class="text-center">检测项目</th>
                        <th class="text-center" style="width:300px;">描述</th>
                        <th class="text-center">创建人</th>
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
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['typeno'];?>
</td>
                        <td><img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['coverimg'];?>
"></td>
                        <td><?php if ($_smarty_tpl->tpl_vars['row']->value['video']){?>
                            <!-- <img src="/static/imgs/video.png" alt="..." width="40" height="40" style="cursor: pointer;"> -->
                            <span data-toggle="modal" data-target="#video" class="video" data-name="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" data-uri="<?php echo $_smarty_tpl->tpl_vars['row']->value['video'];?>
">播放</span><?php }?>
                        </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['vfilesize'];?>
MB</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['singletime'];?>
秒</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['calorie'];?>
千卡</td>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['row']->value['gradedifficulty']){?>
                                <ul>
                                <?php  $_smarty_tpl->tpl_vars['fid'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fid']->_loop = false;
 $_smarty_tpl->tpl_vars['grade'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['row']->value['gradedifficulty']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fid']->key => $_smarty_tpl->tpl_vars['fid']->value){
$_smarty_tpl->tpl_vars['fid']->_loop = true;
 $_smarty_tpl->tpl_vars['grade']->value = $_smarty_tpl->tpl_vars['fid']->key;
?>
                                    <li><?php echo $_smarty_tpl->tpl_vars['grade']->value;?>
 -- <?php echo $_smarty_tpl->tpl_vars['fid']->value;?>
</li>
                                <?php } ?>
                                </ul>
                            <?php }?>
                        </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['physicalquality'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['describe'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['createor'];?>
</td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['createtime'],"%Y-%m-%d");?>
<br/><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['createtime'],"%H:%M:%S");?>
</td>
                        <td>
                            <button type="button" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['_id'];?>
" class="btn btn-sm btn-danger" onclick="del(this)">删 除</button>
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

<!-- modal -->
<div class="modal fade" id="video" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document" style="margin-top:7%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalLabel">动作视频</h4>
            </div>
            <div class="modal-body" id="display-body">
                
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

    function del(el){
        if(!confirm('确定要删除该动作？')) return false;

        var id = $(el).data('id');
        if(!id) return false;

        $.post('/sport/actionDel',{'id':id},function(json){
            if(json.errCode == 0){
                window.location.reload();
            }
            else{
                alert('删除失败.');
            }
        });
    }

    var video = {
        init: function () {
            this.getDom();
            this.display();
        },

        getDom: function () {
            this.disBtn = $('.video');
            this.videoTitle = $('#modalLabel');
            this.videoUri = $('#display-body');
        },

        display: function () {
            var me = this;
            me.disBtn.unbind().bind('click', function(){
                var uri = $(this).data('uri');
                var name = $(this).data('name');
                me.videoTitle.text(name);
                var html = "<video style=\"width:100%;\" controls autobuffer autoplay>" +
                                "<source src='" + uri + "' type='video/mp4; codecs=\"avc1.42E01E, mp4a.40.2\"'></source>" +
                            "</video>";
                me.videoUri.html(html);
            })
        }
    };

    video.init();
</script>

</body>
</html><?php }} ?>