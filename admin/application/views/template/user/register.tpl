<!DOCTYPE html>
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
    <p class="login-box-msg" style="padding: 10px 20px 3px 20px;">天天向尚管理后台</p>
    <p style="text-align: center;font-size: 12px;height: 16px;line-height: 22px;text-decoration: underline;" id="warm"></p>
    <form method="post" name="register">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Mobile" name="mob">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="pwd">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Confirm Password" name="pwd2">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <a href="/user/login">登录界面</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="button" id="sub" class="btn btn-primary btn-block btn-flat">Register</button>
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
</html>