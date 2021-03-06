<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/Public/Home/css/uppwd.css">
    <link rel="stylesheet" href="/Public/Home/images/favicon32.ico">
    <link rel="stylesheet" href="/Public/Home/css/bootstrap.min.css">
    <script src="/Public/Home/js/jquery-1.11.3.min.js"></script>
    <script src="/Public/Home/js/uppwd.js"></script>
    <title>修改密码</title>
</head>
<body>
    <!-- logo与主体内容 -->
    <div class="dl">
        <!-- logo显示 -->
        <div class="dl_logo">
            <a href="#"><img src="/Public/Home/images/zc_logo.jpg" alt=""></a>
        </div>
        <!-- 主体内容 -->
        <div class="dl_main">
            <h3>安全设置-找回密码</h3>
            <div class="step_box step1_box">
            <ul class="clearfix">
                <li><span>输入登录名验证</span></li>
                <li class="no2"><span>重置密码</span></li>
                <li class="no3"><span>修改结果</span></li>
            </ul>
            </div>
            <div class="formbox">
                <form class="form-horizontal" role="form" method="post" action="/index.php/Home/User/editpwd">
                    <ul>
                        <li class="delu_box">
                        <p class="error_tip" id="error_phone" style="display: none;">请输入正确的验证码</p>
                            <label class="label_title">登录名：</label>
                            <div class="">
                                <input type="text" name="tel" value="" placeholder="请填写正确的手机" id="tel_box" />
                                <span id="tel_span"></span>
                            </div>
                        </li>
                        <li class="delu_box">
                            <label class="label_title">验证码：</label>
                            <div class="">
                                <input type="text" value="" placeholder="请填写手机验证码" class="code_box" />
                                <span class=""></span>
                            </div>
                        </li>
                        <li class="delu_box">
                            <div class="">
                             <p><a href="javascript:;" class="get_tel_code" id="get_tel_code">获取手机动态密码</a></p>
                            </div>
                        </li>
                        <li class="delu_box">
                            <input type="submit" id="btn_sub_form" class="btn_check btn_sub_form" value="下一步">
                        </li>
                    </ul>
                </form>
            </div>
            <div class="verify_foot clearfix">
                <b class="mr10 fl">上述方法无法找回？牙牙来帮助你：</b>
                <p>1、发邮件到 <b>guest@mogujie.com</b> (邮件记得备注登录名哦~)</p>
                <p class="pt5">2、拨打客服热线：<b>0571-87361599</b></p>
            </div>
        </div>
        <!-- 尾部内容 -->
        <p class="footer">©Copyright 2010-2015 蘑菇街 Mogujie.com (增值电信业务经营许可证：浙B2-20110349)</p>
    </div>
</body>
</html>