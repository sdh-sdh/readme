<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/zhangdi/youku/project/Public/Home/css/login.css">
    <link rel="stylesheet" href="/zhangdi/youku/project/Public/Home/images/favicon32.ico">
    <title>登录</title>
</head>
<body>
    <!-- logo与主体内容 -->
    <div class="dl">
        <!-- logo显示 -->
        <div class="dl_logo">
            <a href="#"><img src="/zhangdi/youku/project/Public/Home/images/zc_logo.jpg" alt=""></a>
        </div>
        <!-- 主体内容 -->
        <div class="dl_main">
            <!-- 大图片logo -->
            <div class="dl_img">
            <img src="/zhangdi/youku/project/Public/Home/images/zc_login.jpg" alt="">
            </div>
            <!-- 用户注册填写 -->
            <div class="dl_fk">
                <!-- 表单题目 -->
                <div class="dl_logocon">
                    <div class="dl_lg_left">
                    <div  class="dl_lg_tab">
                        <div class="dl_lg_title dl_active"><a href="login.html">普通登录</a></div>
                        <div class="dl_lg_title"><a href="loginp.html">手机无密码登录</a></div>
                    </div>

                    <div class="dl_lg_form">
                        <form action="/zhangdi/youku/project/index.php/Home/User/login" method="post">
                            <div class="dl_mod_box">
                                <p><input type="text" name="username" placeholder="登陆账号"></p>
                                <p><input type="password" name="password" placeholder="密码"></p>
                            </div>
                            <div class="dl_mod_box1" style="display:none;">

                            </div>
                            <div class="dl_lg"><input type="checkbox" name="dl_lg" id="dl_login"><label for="dl_login">2周内自动登录</label><a href="uppwd" >忘记密码</a></div>
                            <div class="dl_sub"><input type="button" name="sub" value="登录"></div>
                        </form>
                        <div class="dl_lg_reg">
                            <span>海外手机登录</span><a href="/zhangdi/youku/project/index.php/Home/User/register">新用户注册</a>
                        </div>
                        <div class="dl_ot_login">
                            <span>你也可以用以下方式登录：</span>
                            <div class="dl_ot_btn">
                                <a href=""><img src="/zhangdi/youku/project/Public/Home/images/d_qq.png"></a>
                                <a href=""><img src="/zhangdi/youku/project/Public/Home/images/d_weixin.png"></a>
                                <a href=""><img src="/zhangdi/youku/project/Public/Home/images/d_xl.png"></a>
                                <a href=""><img src="/zhangdi/youku/project/Public/Home/images/d_weibo.png"></a>
                                <a href=""><img src="/zhangdi/youku/project/Public/Home/images/d_ren.png"></a>
                                <a href=""><img src="/zhangdi/youku/project/Public/Home/images/d_tong.png"></a>
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
                    <img src="/zhangdi/youku/project/Public/Home/images/zc_code.png" alt="">
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
<script src="/zhangdi/youku/project/Public/Home/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript">
        //用户名判断
        var text = false;
        $("input[type=text]").blur(function(){
            text = false;
            $tv = $(this).val();
            $that = $(this);
            if(!$tv){
                $that.attr('style','border:1px solid red');
                return false;
            }else{
                $that.attr('style','border:1px solid green');
                return true;
            }
        })

        //密码判断
        var pwd = false;
        $("input[type=password]").blur(function(){
            pwd = false;
            $ps = $(this).val();
            $that = $(this);
            if(!$ps){
                $that.attr('style','border:1px solid red');
                return false;
            }else{
                $that.attr('style','border:1px solid green');
                return true;
            }
        })

        $("input[type=button]").click(function(){
            $('input[type=text], input[type=password]').trigger('blur');
            var name = $("input:text").val();
            var pass = $("input:password").val()
            if(name && pass){
                //发送ajax
                $.ajax({
                    url: '<?php echo U("Home/User/aLogin");?>',
                    data: {username:name,password:pass},
                    type: "POST",
                    dataType:'html',
                    success: function(msg){
                        if(msg){
                            //判断跳转页面
                            if(msg != 0){
                                location.href = msg;
                            }else{
                                location.href = '<?php echo U("Home/User/login");?>';
                            }
                        }
                    },
                    async:false
                });
            }
            return false;
        });
    </script>
</html>