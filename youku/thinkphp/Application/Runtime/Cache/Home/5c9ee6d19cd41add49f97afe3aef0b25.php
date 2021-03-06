<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" href="/zhangdi/youku/thinkphp/Public/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/zhangdi/youku/thinkphp/Public/Home/css/index.css">
    <style>
        .panel-title{
            font-size: 30px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row" style="height: 100px"></div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h2 class="panel-title text-center">登　录</h2>
                </div>
                <div class="panel-body">
                    <div class="col-md-10 col-md-offset-1">
                        <form role="form" action="<?php echo U('Home/User/checkLogin');?>" method="post">
                            <div class="form-group has-feedback">
                                <label for="phone">手机号</label>

                                <input type="text" class="form-control" name="phone" id="phone" placeholder="手机号">
                                <span class="form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="password">密码</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="密码">
                                <span class="form-control-feedback"></span>
                            </div>
                            <a href="<?php echo U('Home/User/register');?>" class="btn btn-default">没有账号</a>
							<!-- <button type="submit" >没有账号</button> -->
                            <button type="submit" class="btn btn-success pull-right">登　录</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>


<script src="/zhangdi/youku/thinkphp/Public/Home/js/jquery-1.11.3.min.js"></script>
<script src="/zhangdi/youku/thinkphp/Public/Home/js/bootstrap.min.js"></script>
<script>
    /**
     *      手机号
     */
    var checkPhoneUrl = "<?php echo U('Home/User/checkPhone');?>";
    var checkPhone = 0;

    $('#phone').blur(function ()
    {
        checkPhone = 0;
        var that = $(this);
        var reg = /^1\d{10}$/;
        var res = reg.test($(this).val());

        if (that.val() == '' || !res)
        {
            that.next().removeClass('glyphicon glyphicon-ok').addClass('glyphicon glyphicon-remove')
                    .parent().removeClass('has-success').addClass('has-error');
            return;
        } else
        {
            that.next().removeClass('glyphicon glyphicon-remove').addClass('glyphicon glyphicon-ok')
                    .parent().removeClass('has-error').addClass('has-success');
        }

        //ajax 验证手机号是否重复
        $.post(checkPhoneUrl, {phone: that.val()}, function (msg)
        {
            if (msg == '0')
            {
                that.next().removeClass('glyphicon glyphicon-remove').addClass('glyphicon glyphicon-ok')
                        .parent().removeClass('has-error').addClass('has-success');
                checkPhone = 1
            } else
            {
                that.next().removeClass('glyphicon glyphicon-ok').addClass('glyphicon glyphicon-remove')
                        .parent().removeClass('has-success').addClass('has-error');
                checkPhone = 0;
            }
        }, 'html');
    });


</script>
</body>
</html>