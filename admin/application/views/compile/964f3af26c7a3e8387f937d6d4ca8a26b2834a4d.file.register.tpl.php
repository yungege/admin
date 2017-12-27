<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.13, created on 2017-12-22 12:12:56
         compiled from "/var/www/admin/admin/application/views/template/user/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11866723225a3c86480c9e75-53611212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.13, created on 2017-12-10 12:08:44
         compiled from "/var/www/admin/admin/application/views/template/user/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10977725625a2cb34c1b4c75-90088591%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 7bb41cd23732f53853bb2f27fe7f9bafa0739b89
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '964f3af26c7a3e8387f937d6d4ca8a26b2834a4d' => 
    array (
      0 => '/var/www/admin/admin/application/views/template/user/register.tpl',
<<<<<<< HEAD
      1 => 1512523019,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11866723225a3c86480c9e75-53611212',
=======
      1 => 1512471400,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10977725625a2cb34c1b4c75-90088591',
>>>>>>> 7bb41cd23732f53853bb2f27fe7f9bafa0739b89
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mod' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
<<<<<<< HEAD
  'unifunc' => 'content_5a3c86480e9d97_88425829',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a3c86480e9d97_88425829')) {function content_5a3c86480e9d97_88425829($_smarty_tpl) {?><!DOCTYPE html>
=======
  'unifunc' => 'content_5a2cb34c1b8f85_10612578',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2cb34c1b8f85_10612578')) {function content_5a2cb34c1b8f85_10612578($_smarty_tpl) {?><!DOCTYPE html>
>>>>>>> 7bb41cd23732f53853bb2f27fe7f9bafa0739b89
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
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
    <p class="login-box-msg" style="padding: 10px 20px 3px 20px;">请设置账户密码</p>
    <p style="text-align: center;font-size: 12px;height: 16px;line-height: 22px;text-decoration: underline;" id="warm"></p>
    <form method="post" name="register">
      <div class="form-group has-feedback">
        <input type="hidden" class="form-control" placeholder="Mobile" name="mob" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value;?>
">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="pwd">
        <span class="glyphicon glyphicon-eye-open   form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Confirm Password" name="pwd2">
        <span class="glyphicon glyphicon-ok form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>

            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="button" id="sub" class="btn btn-primary btn-block btn-flat">Confirm</button>
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
        this.pwd2   = $('input[name=pwd2]');
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

    checkPwd: function(){
        var me = this,
            pwd = me.pwd.val();
            pwd2 = me.pwd2.val();
        if(/^[a-zA-Z]\w{5,17}$/.test(pwd) === false){
            me.errInfo(1, '您输入的密码有误');
            return false;
        }
        if(pwd !== pwd2){
            me.errInfo(1, '您输入的密码不一致');
            return false;
        }
       
        me.errInfo();
        return true;
        
    },

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
            var pwdRes = me.checkPwd();
            var data = $('form[name=register]').serialize();
            if(mobRes === false || pwdRes === false){
                return false;
            }

            $.post(
                '/user/doregister',
                $('form[name=register]').serialize(),
                function(json){
                    if(json.errCode != 0){
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