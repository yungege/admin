<<<<<<< HEAD
<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.13, created on 2018-03-13 10:15:53
         compiled from "/var/www/admin/admin/application/views/template/user/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7673396825aa734597c99f5-20507175%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.13, created on 2018-03-12 16:30:10
         compiled from "/var/www/admin/admin/application/views/template/user/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10356193955aa63a92199111-49409312%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> b35883a0fbd35c1b6002cbc63bdc9ab3e77207ba
=======
<?php /* Smarty version Smarty-3.1.13, created on 2018-03-13 16:55:33
         compiled from "/var/www/admin/admin/application/views/template/user/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6858877425aa79205e009f3-98903615%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> a477b9a23757b443cd9a8a6751cfa17b7ad141ed
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '713206737d6eb09c8f72027c7313a6d885305480' => 
    array (
      0 => '/var/www/admin/admin/application/views/template/user/login.tpl',
<<<<<<< HEAD
<<<<<<< HEAD
      1 => 1509502905,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7673396825aa734597c99f5-20507175',
=======
      1 => 1504857674,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10356193955aa63a92199111-49409312',
>>>>>>> b35883a0fbd35c1b6002cbc63bdc9ab3e77207ba
=======
      1 => 1509080121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6858877425aa79205e009f3-98903615',
>>>>>>> a477b9a23757b443cd9a8a6751cfa17b7ad141ed
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
<<<<<<< HEAD
<<<<<<< HEAD
  'unifunc' => 'content_5aa734597cb539_68912142',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa734597cb539_68912142')) {function content_5aa734597cb539_68912142($_smarty_tpl) {?><!DOCTYPE html>
=======
  'unifunc' => 'content_5aa63a921ad817_05124922',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa63a921ad817_05124922')) {function content_5aa63a921ad817_05124922($_smarty_tpl) {?><!DOCTYPE html>
>>>>>>> b35883a0fbd35c1b6002cbc63bdc9ab3e77207ba
=======
  'unifunc' => 'content_5aa79205e349e8_73276763',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa79205e349e8_73276763')) {function content_5aa79205e349e8_73276763($_smarty_tpl) {?><!DOCTYPE html>
>>>>>>> a477b9a23757b443cd9a8a6751cfa17b7ad141ed
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="/static/imgs/favicon.ico" type="image/x-icon"/>
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/static/bootstrap/css/bootstrap.min.css">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="/static/bootstrap/css/AdminLTE.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/static/bootstrap/font-awesome/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page" style="overflow-y: hidden;">
<div class="login-box" style="margin: 15% auto;">
  <div class="login-box-body">
    <p class="login-box-msg" style="padding: 10px 20px 3px 20px;">天天向尚管理后台</p>
    <p style="text-align: center;font-size: 12px;height: 16px;line-height: 22px;text-decoration: underline;" id="warm"></p>
    <form method="post" name="login">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Mobile" name="mob">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="pwd">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              Auto login in month</br>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="button" id="sub" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="https://almsaeedstudio.com/themes/AdminLTE/pages/examples/login.html#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="https://almsaeedstudio.com/themes/AdminLTE/pages/examples/login.html#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
    <!-- /.social-auth-links -->

    <!-- <a href="https://almsaeedstudio.com/themes/AdminLTE/pages/examples/login.html#">I forgot my password</a><br>
    <a href="https://almsaeedstudio.com/themes/AdminLTE/pages/examples/register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="/static/bootstrap/js/jquery.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/static/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
  var login = {
    init: function(){
        this.getDom();
        this.subData();
    },

    getDom: function(){
        this.mob    = $('input[name=mob]');
        this.pwd    = $('input[name=pwd]');
        this.warm   = $('#warm');
        this.subBtn = $('#sub');
    },

    checkMobile: function(){
        var me = this,
            mobile = $.trim(me.mob.val());
        if(/^1\d{10}$/.test(mobile) === false){
            me.errInfo(1, '您输入的手机号码有误');
            return false;
        }
        else{
            me.errInfo();
            return true;
        }
    },

    // checkPwd: function(){
    //     var me = this,
    //         pwd = me.pwd.val();
    //     if(/^[a-zA-Z]\w{5,17}$/.test(pwd) === false){
    //         me.errInfo(1, '您输入的密码有误');
    //         return false;
    //     }
    //     else{
    //         me.errInfo();
    //         return true;
    //     }
    // },

    errInfo: function(type, msg){
        var me = this;
        if(type == 1){
            me.warm.text(msg).css({'color':'red'});
        }
        else{
            me.warm.text('');
        }
    },

    subData: function(){
        var me = this;
        me.subBtn.unbind().bind('click',function(){

            var mobRes = me.checkMobile();
            // var pwdRes = me.checkPwd();
            if(mobRes === false ){
                return false;
            }

            $.post(
                '/user/dologin',
                $('form[name=login]').serialize(),
                function(json){
                   
                    if(json.errCode == -2){
                        window.location.href = '/user/register?mod=' + me.mob.val();
                        
                    }else if(json.errCode != 0){
                        me.errInfo(1, json.errMessage);
                    }
                    else{
                        window.location.href = '/';
                    }
            })
        });
        

    }
  };

  login.init();
</script>
</body>
</html><?php }} ?>