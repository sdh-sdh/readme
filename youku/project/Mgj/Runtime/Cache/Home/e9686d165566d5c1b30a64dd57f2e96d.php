<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/Public/Home/css/login.css">
    <!-- <link rel="stylesheet" href="/Public/Home/images/favicon32.ico"> -->
    <title>登录</title>
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
            <!-- 大图片logo -->
            <div class="dl_img">
            <img src="/Public/Home/images/zc_login.jpg" alt="">
            </div>
            <!-- 用户注册填写 -->
            <div class="dl_fk">
                <!-- 表单题目 -->
                <div class="dl_logocon">
                    <div class="dl_lg_left">
                    <div  class="dl_lg_tab">
                        <div class="dl_lg_title"><a href="login.html">普通登录</a></div>
                        <div class="dl_lg_title dl_active"><a href="loginp.html">手机无密码登录</a></div>
                    </div>

                    <div class="dl_lg_form">
                        <form action="/index.php/Home/Index/index" method="post">
                            <p class="error_tip" id="error_phone" style="display: none;">请输入正确的手机号码</p>
                            <p class="error_tip" id="none_phone" style="display: none;">电话号码未注册</p>
                            <div class="clearfix mb">
                                <select class="country_select">
                                    <?php if(is_array($data)): foreach($data as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
                                </select>
                                <input type="text" maxlength="32" class="short_text" name="tel" placeholder="手机号码" id="get_phone" style="border-color:#CFCFCF; color:#999;">
                            </div>

                            <div class="dl_mod_box">
                                <p><input type="text" name="code" id="get_code" placeholder="动态密码" value=""></p>
                                <p><a href="javascript:;" class="get_tel_code" id="get_tel_code">获取手机动态密码</a></p>
                            </div>
                            <div class="dl_mod_box1" style="display:none;">

                            </div>
                            <div class="dl_lg"><input type="checkbox" name="dl_lg" id="dl_login"><label for="dl_login">2周内自动登录</label><a href="uppwd" >忘记密码</a></div>
                            <div class="dl_sub"><input type="submit" name="sub" value="登录"></div>
                        </form>
                        <div class="dl_lg_reg">
                            <span>海外手机登录</span><a href="/index.php/Home/User/register">新用户注册</a>
                        </div>
                        <div class="dl_ot_login">
                            <span>你也可以用以下方式登录：</span>
                            <div class="dl_ot_btn">
                                <a href=""><img src="/Public/Home/images/d_qq.png"></a>
                                <a href=""><img src="/Public/Home/images/d_weixin.png"></a>
                                <a href=""><img src="/Public/Home/images/d_xl.png"></a>
                                <a href=""><img src="/Public/Home/images/d_weibo.png"></a>
                                <a href=""><img src="/Public/Home/images/d_ren.png"></a>
                                <a href=""><img src="/Public/Home/images/d_tong.png"></a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- 尾部内容 -->
    <div class="dl_footer">
        <div class="dl_footer_link">
            <div class="dl_code">
                <h3>蘑菇街移动客户端</h3>
                <a target="_blank" href="">
                    <img src="/Public/Home/images/zc_code.png" alt="">
                </a>
            </div>
            <ul class="dl_link_list">
                <li>
                    <h3>新手帮助</h3>
                    <a href="" target="_blank">如何购买</a>
                    <a href="" target="_blank">支付教程</a>
                    <a href="" target="_blank">优惠劵使用</a>
                    <a href="" target="_blank">常见问题</a>
                </li>
                <li>
                    <h3>权益保障</h3>
                    <p>全国包邮</p>
                    <p>7天无理由退货</p>
                    <p>退货运费补贴</p>
                    <p>72小时发货</p>
                </li>
                <li>
                    <h3>商家服务</h3>
                    <a target="_blank" href="">免费开店</a>
                    <a target="_blank" href="">商家入驻</a>
                    <a target="_blank" href="">管理后台</a>
                </li>
            </ul>
            <div class="clear"></div>
            <p class="dl_copyright">©Copyright 2010-2015 蘑菇街 Mogujie.com (增值电信业务经营许可证：浙B2-20110349)</p>
        </div>
    </div>
</body>
<script src="/Public/Home/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript">
        var ccode;

        //a链接发送手机号
        $("#get_tel_code").click(function(){
            var phone = $("#get_phone").val();
            var reg = /^1\d{10}$/;
            var res = reg.test(phone);
            if(!res){
                $("#get_phone").attr("style","border: 1px solid red");
                return false;
            }else{
                $("#get_phone").attr("style","border: 1px solid #cfcfcf");

                // 如果手机号有值,发送Ajax
                $.post('/index.php/Home/User/codeMessage',{phone:phone},function(code){
                    $("#none_phone").attr("style","display:none;");
                    //将返回的验证码输入在文本框中
                    if(code){
                        $('#get_code').val(code);
                        ccode = code;
                    }else{
                        $("#none_phone").attr("style","display:block;");
                    }

                });
            }

        });

        //判断如果没有验证码的情况
        $("input[name=sub]").click(function(){
            var pcode = $("#get_code").val();
            if(!pcode){
                $("#error_phone").attr("style","display:block;");
                return false;
            }else{
                $("#error_phone").attr("style","display:none;");

            }

            //判断如果电话是否为空
            var phone = $("#get_phone").val();
            if(phone == ''){
                return false;
            }

            //判断Ajax传的验证码与输入的是否相等
            if(pcode == ccode){
                return true;
            }else{
                return false;
            }
        })

    </script>
</script>
</html>