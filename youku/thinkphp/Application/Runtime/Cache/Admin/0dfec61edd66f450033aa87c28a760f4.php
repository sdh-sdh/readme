<?php if (!defined('THINK_PATH')) exit();?><html>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <title>登录(Login)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <link rel="stylesheet" href="/Public/Admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/Admin/css/reset.css">
    <link rel="stylesheet" href="/Public/Admin/css/supersized.css">
    <link rel="stylesheet" href="/Public/Admin/css/style.css">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="/Public/Admin/js/html5.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
        <div class="row a"></div>
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <form action="<?php echo U('Admin/Login/checkLogin');?>" method="post" class="form-horizontal" role="form">
                    <h1>后台登录</h1>
                    <div class="form-group has-feedback">
                        <label for="username" class="col-xs-2 control-label">用户名</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control input-lg" name="username" id="username" placeholder="请输入用户名" autofocus style="background: rgba(45,45,45,.15);">
                            <span class="form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="password" class="col-xs-2 control-label">Password</label>
                        <div class="col-xs-8">
                            <input type="password" class="form-control input-lg" name="password" id="password" placeholder="请输入密码" style="background: rgba(45,45,45,.15);">
                            <span class="form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="checkCode" class="col-xs-2 control-label">验证码</label>
                        <div class="col-xs-3">
                            <input type="text" class="form-control input-lg" name="checkCode" id="checkCode" placeholder="验证码" style="background: rgba(45,45,45,.15);">
                        </div>
                        <div class="col-xs-5">
                            <img id="verifyCode" class="verifyCode" src="<?php echo U('Admin/Manager/verify');?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-offset-2 col-xs-8">
                            <button type="submit" class="btn btn-warning btn-lg" disabled>登 录</button>
                        </div>
                    </div>
                </form>
                <div class="connect">
                    <p>快捷</p>
                    <p>
                        <a class="facebook" href=""></a>
                        <a class="twitter" href=""></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
<!-- Javascript -->
<script src="/Public/Admin/js/jquery-1.11.3.min.js"></script>
<script src="/Public/Admin/js/bootstrap.min.js"></script>
<script src="/Public/Admin/js/supersized.3.2.7.min.js"></script>
<script src="/Public/Admin/js/supersized-init.js"></script>
<script src="/Public/Admin/js/scripts.js"></script>

</body>
</html>