<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <title><?php echo ($config['title']); ?></title>
    <meta name="keywords" content="<?php echo ($config['keywords']); ?>"/>
    <meta name="description" content="<?php echo ($config['description']); ?>"/>

	<link rel="icon" href="/Public/Home/images/favicon32.ico" type="image/x-icon"/>
    <meta name="copyright" content="<?php echo ($config['content']); ?>"/>
    <link rel="stylesheet" href="/Public/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/Home/css/css.css">
    
    <link rel="stylesheet" href="/Public/Home/css/ordercss.css">
    <link rel="stylesheet" href="/Public/Home/css/dialogbox.css">

</head>
<body>

<!-- 头部-->

    <div class="container-fluid" style="background: #F5F5F5;">
        <div class="container">
            <div class="row">
                <div class="col-xs-1">
                    <a href="<?php echo U('Home/Index/index');?>" style="line-height: 28px">回到首页</a>
                </div>
                <div class="col-xs-6 col-xs-offset-5">
                    <ul class="menu_leo">
                        <li><a href=""><em class="i_QQ">&nbsp;</em> QQ登录</a></li>
                        <?php echo W('Cate/indexlogin');?>
                        <li><a href="<?php echo U('Home/Userinfo/order');?>" target="_blank"><em class="i_order">&nbsp;</em>我的订单</a></li>
                        <li><a href="<?php echo U('Home/Collect/index');?>" target="_blank"><em>&nbsp;</em>我的收藏</a></li>
                        <li>
                            <a class="last" href="<?php echo U('Home/Sort/control');?>" target="_blank">我的小店</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>




</div>
<!-- 头部 logo  搜索-->






    <div class="container">
        <div class="row" style="height: 150px">
            <div class="height-1"></div>
            <div class="col-xs-5 col-xs-offset-6 height-1 clear-padding">

                <div class="progress" style="height: 10px">
                    <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 70%;height: 10px"></div>
                </div>

            </div>
            <div class="col-xs-5 col-xs-offset-6 height-1 clear-padding">
                <div class="row" style="color: #FF6699;">
                    <div class="col-xs-3">
                        <span class="first current">我的购物车</span>
                    </div>
                    <div class="col-xs-3 text-center">
                        <span class="middle">核对订单</span>
                    </div>
                    <div class="col-xs-3 text-right">
                        <span>付款</span>
                    </div>
                    <div class="col-xs-3 text-right">
                        <span>完成购买</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="page-header">
                                <h1>
                                    <b class="width-25">订单提交成功</b>
                                    <small class="font-12">订单号：<span id="ordernum"><?php echo ($info["ordernum"]); ?></span></small>
                                    <?php if($info["state"] == 1): ?>已支付<?php endif; ?>
                                    <span class="fr">
                                        <span class="font-16">应付金额：</span>
                                        <span class="mon-num">
                                            <span>¥</span> <span class="cr"><?php echo ($info["orderprice"]); ?></span>
                                        </span>
                                    </span>
                                </h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <div data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                                                 class="hover-pointer">
                                                <b>网上银行支付</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse in" style="height: auto;">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-xs-2 col-md-2">
                                                    <a index="工商银行" href="javascript:void(0);" class="thumbnail">
                                                        <img data-src="holder.js/100%x180"
                                                             src="/Public/Home/images/0001.jpg"
                                                             style="height: 40px; width: 130px; display: block;">
                                                    </a>
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <a index="农业银行" href="javascript:void(0);" class="thumbnail">
                                                        <img data-src="holder.js/100%x180"
                                                             src="/Public/Home/images/0002.jpg"
                                                             style="height: 40px; width: 130px; display: block;">
                                                    </a>
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <a index="中国银行" href="javascript:void(0);" class="thumbnail">
                                                        <img data-src="holder.js/100%x180"
                                                             src="/Public/Home/images/0003.jpg"
                                                             style="height: 40px; width: 130px; display: block;">
                                                    </a>
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <a index="建设银行" href="javascript:void(0);" class="thumbnail">
                                                        <img data-src="holder.js/100%x180"
                                                             src="/Public/Home/images/0004.jpg"
                                                             style="height: 40px; width: 130px; display: block;">
                                                    </a>
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <a index="招商银行" href="javascript:void(0);" class="thumbnail">
                                                        <img data-src="holder.js/100%x180"
                                                             src="/Public/Home/images/0005.jpg"
                                                             style="height: 40px; width: 130px; display: block;">
                                                    </a>
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <a index="浦发银行" href="javascript:void(0);" class="thumbnail">
                                                        <img data-src="holder.js/100%x180"
                                                             src="/Public/Home/images/0006.jpg"
                                                             style="height: 40px; width: 130px; display: block;">
                                                    </a>
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <a index="广发银行" href="javascript:void(0);" class="thumbnail">
                                                        <img data-src="holder.js/100%x180"
                                                             src="/Public/Home/images/0007.jpg"
                                                             style="height: 40px; width: 130px; display: block;">
                                                    </a>
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <a index="交通银行" href="javascript:void(0);" class="thumbnail">
                                                        <img data-src="holder.js/100%x180"
                                                             src="/Public/Home/images/0008.jpg"
                                                             style="height: 40px; width: 130px; display: block;">
                                                    </a>
                                                </div>
                                                <div class="col-xs-2 col-md-2">
                                                    <a index="中信银行" href="javascript:void(0);" class="thumbnail">
                                                        <img data-src="holder.js/100%x180"
                                                             src="/Public/Home/images/0009.jpg"
                                                             style="height: 40px; width: 130px; display: block;">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <div data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                                                 class="collapsed hover-pointer">
                                                <b>其他支付</b>　
                                                <small>(支付宝、微信、银联)</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                                            <div class="col-xs-2 col-md-2">
                                                <a index="支付宝" href="javascript:void(0);" class="thumbnail">
                                                    <img src="/Public/Home/images/zhifubao.jpg"
                                                         style="height: 40px; width: 130px; display: block;">
                                                </a>
                                            </div>
                                            <div class="col-xs-2 col-md-2">
                                                <a index="微信" href="javascript:void(0);" class="thumbnail">
                                                    <img src="/Public/Home/images/weixin.png"
                                                         style="height: 40px; width: 130px; display: block;">
                                                </a>
                                            </div>
                                            <div class="col-xs-2 col-md-2">
                                                <a index="银联" href="javascript:void(0);" class="thumbnail">
                                                    <img src="/Public/Home/images/yinlian.png"
                                                         style="height: 40px; width: 130px; display: block;">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-2 col-xs-offset-8">
                                <h5 class="pull-right">实际支付： ¥</h5>
                            </div>
                            <div class="col-xs-1 clear-padding">
                                <h2 class="cr" style="margin: 0;"><?php echo ($info["orderprice"]); ?></h2>
                            </div>
                            <div class="col-xs-1 clear-padding">
                                <button id="btn-sub" type="button" url="<?php echo U('Home/Order/payAction');?>" class="btn btn-danger">点击支付</button>
                                <div id="type-dialogBox"></div>
                                <div id="stantard-dialogBox"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!--页脚-->
<div class="container-fluid footer">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-3">
                    <div class="f_list service_info">
                        <div class="kefu">
                            <span class="tel_ico"></span>

                            <p class="f20_f">4000-800-577</p>

                            <p class="f14_f mt4_f">蘑菇街客服热线</p>
                        </div>
                        <ol class="business">
                            <li style="width:186px">周一至周日：08:00-24:00</li>
                        </ol>
                    </div>
                </div>
                <div class="col-xs-1 clear_padding">
                    <div class="f_list">
                        <h4>买家帮助</h4>
                        <ul>
                            <li><a href="#">新手指南</a></li>
                            <li><a href="#">服务保障</a></li>
                            <li><a href="#">帮助中心</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-1 clear_padding">
                    <div class="f_list">
                        <h4>关于我们</h4>
                        <ul>
                            <li><a href="#">关于蘑菇街</a></li>
                            <li><a href="#">联系我们</a></li>
                            <li><a href="#">加入蘑菇街</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-1 clear_padding">
                    <div class="f_list">
                        <h4>商家帮助</h4>
                        <ul>
                            <li><a href="#">商家入驻</a></li>
                            <li><a href="#">商家推广</a></li>
                            <li><a href="#">帮助中心</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-1 clear_padding">
                    <div class="f_list">
                        <h4>关注我们</h4>
                        <ul>
                            <li><a href="#"><span class="i_sina">&nbsp;</span>新浪微博</a></li>
                            <li><a href="#"><span class="i_qzone">&nbsp;</span>QQ空间</a></li>
                            <li><a href=#""><span class="i_tx">&nbsp;</span>腾讯微博</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-2 clear_padding">
                    <div class="f_list qr-code pull-right">
                        <h4>蘑菇街微信服务号</h4>
                        <img src="/Public/Home/images/ma.jpg" alt="蘑菇街服务号二维码">
                    </div>
                </div>
                <div class="col-xs-2 clear_padding">
                    <div class="f_list weixin_code pull-right">
                        <h4>蘑菇街客服端下载</h4>
                        <a class="client_pic" href="#"></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8 col-xs-offset-1 rolling" align="center">
                        <ul>
                            <li>友情链接：</li>
                            <?php if(is_array($flink)): foreach($flink as $key=>$vo): ?><li><a href="<?php echo ($vo['url']); ?>" alt="<?php echo ($vo['content']); ?>"><?php echo ($vo['linkname']); ?></a></li><?php endforeach; endif; ?>
                        </ul>
                    </div>
                    <div class="col-xs-2 link_more">
                        <a href="">更多>></a>
                    </div>
                </div>
                <div class="row">
                    <div class="record" align="center">
                        Copyright <?php echo ($config['copyright']); ?> &nbsp; <a
                            href="http://i.meilishuo.net/css/images/about/licenseIPC.jpg"
                            target="_blank">电信与信息服务许可证&nbsp;<?php echo ($config['allow']); ?></a>&nbsp; <a
                            href="http://d03.res.meilishuo.net/pic/_o/e1/80/4f22feee45bb9d0a92e7a950f9c5_1131_1600.cg.jpg"
                            target="_blank">经营性网站备案信息</a>&nbsp; <?php echo ($config['number']); ?>&nbsp;
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php echo W('Cate/indexCart');?>





<script src="/Public/Home/js/jquery-1.11.3.min.js"></script>
<script src="/Public/Home/js/bootstrap.min.js"></script>
<script src="/Public/Home/js/move.js"></script>
<script src="/Public/Home/js/indexs.js"></script>

    <script src="/Public/Home/js/jquery.dialog.js"></script>
    <script src="/Public/Home/js/pay.js"></script>

</body>
</html>