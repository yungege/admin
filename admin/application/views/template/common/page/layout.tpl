<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{%block name="title"%}{%/block%}</title>

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
    {%block name="css"%}{%/block%}
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
                    {%if $userInfo.iconurl%}
                    <img src="{%$userInfo.iconurl%}" alt="..." width="20" height="20" style="border-radius: 10px;">
                    {%else%}
                    <i class="fa fa-user"></i>
                    {%/if%}
                    {%$userInfo.username%} <b class="caret"></b></a>
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
                    {%$tag=('-'|explode:$pageTag)%}
                    <li {%if $tag.0 == 1%} class="active" {%/if%}>
                        <a href="/index.html"><i class="fa fa-fw fa-dashboard"></i> HOME PAGE</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#m-user"><i class="fa fa-fw fa-user"></i> 用户管理 <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                        <ul id="m-user" class="collapse {%if $tag.0 == 2%}in{%/if%}">
                            <li>
                                <a href="/user/student" class="{%if $tag.0 == 2 && $tag.1 == 1%}cy-child-active{%/if%}">学生管理</a>
                            </li>
                            <li>
                                <a href="/user/class" class="{%if $tag.0 == 2 && $tag.1 == 2%}cy-child-active{%/if%}">班级管理</a>
                            </li>
                            <li>
                                <a href="/user/school" class="{%if $tag.0 == 2 && $tag.1 == 3%}cy-child-active{%/if%}">学校管理</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#sport">
                            <i class="fa fa-fw fa-bicycle"></i> 锻炼内容管理 <i class="fa fa-fw fa-caret-down pull-right"></i>
                        </a>
                        <ul id="sport" class="collapse {%if $tag.0 == 3%}in{%/if%}">
                            <li>
                                <a href="/sport/homework" class="{%if $tag.0 == 3 && $tag.1 == 1%}cy-child-active{%/if%}">作业</a>
                            </li>
                            <li>
                                <a href="/sport/project" class="{%if $tag.0 == 3 && $tag.1 == 2%}cy-child-active{%/if%}">锻炼方案</a>
                            </li>
                            <li>
                                <a href="/sport/action" class="{%if $tag.0 == 3 && $tag.1 == 3%}cy-child-active{%/if%}">动作</a>
                            </li>
                            <!-- <li>
                                <a href="/train/list" class="{%if $tag.0 == 3 && $tag.1 == 4%}cy-child-active{%/if%}">锻炼内容</a>
                            </li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#basic"><i class="fa fa-fw fa-bar-chart-o"></i> 运营管理 <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                        <ul id="basic" class="collapse {%if $tag.0 == 4%}in{%/if%}">
                            <li>
                                <a href="/sport/banner" class="{%if $tag.0 == 4 && $tag.1 == 1%}cy-child-active{%/if%}">Banner</a>
                            </li>

                            <li>
                                <a href="/sport/ugc" class="{%if $tag.0 == 4 && $tag.1 == 2%}cy-child-active{%/if%}">UGC</a>
                            </li>

                            <li>
                                <a href="/stat/statistics" class="{%if $tag.0 == 4 && $tag.1 == 3%}cy-child-active{%/if%}">统计数据</a>
                            </li>

                            <li>
                                <a href="#" class="{%if $tag.0 == 4 && $tag.1 == 4%}cy-child-active{%/if%}">运动圈精华</a>
                            </li>

                            <li>
                                <a href="/feedback/index" class="{%if $tag.0 == 4 && $tag.1 == 5%}cy-child-active{%/if%}">反馈建议</a>
                            </li>
                            <li>
                                <a href="/upload/index" class="{%if $tag.0 == 4 && $tag.1 == 6%}cy-child-active{%/if%}">上传学生数据</a>
                            </li>
                            <!-- <li>
                                <a href="/upload/outSport" class="{%if $tag.0 == 4 && $tag.1 == 7%}cy-child-active{%/if%}">上传课外活动数据</a>
                            </li> -->


                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#app"><i class="fa fa-fw fa-apple"></i> 平台设置 <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                        <ul id="app" class="collapse {%if $tag.0 == 5%}in{%/if%}">
                            <li>
                                <a href="/version/index" class="{%if $tag.0 == 5 && $tag.1 == 1%}cy-child-active{%/if%}">APP版本列表</a>
                            </li>
                            <li>
                                <a href="/version/add" class="{%if $tag.0 == 5 && $tag.1 == 2%}cy-child-active{%/if%}">发布新版本</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#push"><i class="fa fa-fw fa-paper-plane"></i> 推送管理 <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                        <ul id="push" class="collapse {%if $tag.0 == 6%}in{%/if%}">
                            <li>
                                <a href="/push/all" class="{%if $tag.0 == 6 && $tag.1 == 1%}cy-child-active{%/if%}">全员推送</a>
                            </li>
                            <li>
                                <a href="/push/user" class="{%if $tag.0 == 6 && $tag.1 == 2%}cy-child-active{%/if%}">个人推送</a>
                            </li>
                            <li>
                                <a href="/push/school" class="{%if $tag.0 == 6 && $tag.1 == 3%}cy-child-active{%/if%}">学校推送</a>
                            </li>
                            <li>
                                <a href="/push/grade" class="{%if $tag.0 == 6 && $tag.1 == 4%}cy-child-active{%/if%}">年级推送</a>
                            </li>
                            <li>
                                <a href="/push/class" class="{%if $tag.0 == 6 && $tag.1 == 5%}cy-child-active{%/if%}">班级推送</a>
                            </li>
                            <li>
                                <a href="/push/app" class="{%if $tag.0 == 6 && $tag.1 == 6%}cy-child-active{%/if%}">平台消息推送</a>
                            </li>
                           <!--  <li>
                                <a href="/push/province" class="{%if $tag.0 == 6 && $tag.1 == 6%}cy-child-active{%/if%}">省推送</a>
                            </li>
                             <li>
                                <a href="/push/city" class="{%if $tag.0 == 6 && $tag.1 == 7%}cy-child-active{%/if%}">市推送</a>
                            </li>
                             <li>
                                <a href="/push/district" class="{%if $tag.0 == 6 && $tag.1 == 8%}cy-child-active{%/if%}">区推送</a>
                            </li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#meau-man"><i class="glyphicon glyphicon-list"></i> 菜单及权限分配 <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                        <ul id="meau-man" class="collapse {%if $tag.0 == 7%}in{%/if%}">
                            <li>
                                <a href="/meau/list" class="{%if $tag.0 == 7 && $tag.1 == 1%}cy-child-active{%/if%}">菜单管理</a>
                            </li>
                            <li>
                                <a href="" class="{%if $tag.0 == 7 && $tag.1 == 2%}cy-child-active{%/if%}">角色管理</a>
                            </li>
                            <li>
                                <a href="" class="{%if $tag.0 == 7 && $tag.1 == 3%}cy-child-active{%/if%}">权限分配</a>
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
                                <i class="fa fa-dashboard" style="margin-right: 10px;"></i> {%block name="bread"%}{%/block%}
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- 用户数据 -->
                {%block name="content"%}{%/block%}

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

    {%block name="js"%}{%/block%}
</body>
</html>