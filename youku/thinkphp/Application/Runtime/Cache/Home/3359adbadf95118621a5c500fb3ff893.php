<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" href="/zhangdi/youku/thinkphp/Public/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/zhangdi/youku/thinkphp/Public/Home/css/index.css">
</head>
<body>

<div class="container">
    <div class="row">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="">客服在线</a></li>
                        <li><a href="#">常见问题</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>
</div>

<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title text-center">注册信息</h3>
            </div>
            <div class="panel-body">
                <form id="regForm" action="<?php echo U('Home/UCenter/index');?>" method="post" class="form-horizontal" role="form">
                    <!--<div class="form-group has-feedback">-->
                        <!--<label for="username" class="col-sm-3 control-label">用户名</label>-->

                        <!--<div class="col-sm-9">-->
                            <!--<input type="text" class="form-control" name="username" id="username" placeholder="用户名">-->
                            <!--<span class="form-control-feedback"></span>-->
                        <!--</div>-->
                    <!--</div>-->
                    <div class="form-group has-feedback">
                        <label for="phone" class="col-sm-3 control-label">手机号</label>

                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="手机号">
                            <span class="form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="password1" class="col-sm-3 control-label">密码</label>

                        <div class="col-sm-7">
                            <input type="password" class="form-control" name="password" id="password1" placeholder="密码">
                            <span class="form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="password2" class="col-sm-3 control-label">确认密码</label>

                        <div class="col-sm-7">
                            <input type="password" class="form-control" id="password2" placeholder="确认密码">
                            <span class="form-control-feedback"></span>
                        </div>
                    </div>
                    <!--<div class="form-group has-feedback">-->
                        <!--<label for="vCode" class="col-sm-3 control-label">输入验证码</label>-->

                        <!--<div class="col-sm-4">-->
                            <!--<input type="text" class="form-control" id="vCode" placeholder="输入验证码">-->
                            <!--<span class="form-control-feedback"></span>-->
                        <!--</div>-->
                        <!--<div class="col-sm-5">-->
                            <!--<button type="button" class="btn btn-info">获取手机验证码</button>-->
                        <!--</div>-->
                    <!--</div>-->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-4">
                            <button type="button" id="normalSub" class="btn btn-default" disabled>完　成　注　册</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var checkRegisterUrl = "<?php echo U('Home/User/checkRegister');?>";
    var checkPhoneUrl = "<?php echo U('Home/User/checkPhone');?>";
    var UCenterUrl = "<?php echo U('Home/Index/index');?>";
</script>
<script src="/zhangdi/youku/thinkphp/Public/Home/js/jquery-1.11.3.min.js"></script>
<script src="/zhangdi/youku/thinkphp/Public/Home/js/bootstrap.min.js"></script>
<script src="/zhangdi/youku/thinkphp/Public/Home/js/register.js"></script>
</body>
</html>