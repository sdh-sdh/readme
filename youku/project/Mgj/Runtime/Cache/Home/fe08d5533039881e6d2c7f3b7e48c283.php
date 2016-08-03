<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <title><?php echo ($config['title']); ?></title>
    <meta name="keywords" content="<?php echo ($config['keywords']); ?>"/>
    <meta name="description" content="<?php echo ($config['description']); ?>"/>

	<link rel="icon" href="/youku/project/Public/Home/images/favicon32.ico" type="image/x-icon"/>
    <meta name="copyright" content="<?php echo ($config['content']); ?>"/>
    <link rel="stylesheet" href="/youku/project/Public/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/youku/project/Public/Home/css/css.css">
    
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


    <nav id="fixed-top" class="navbar navbar-inverse navbar-fixed-top display-none" role="navigation">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3" style="margin-top: 7px">
                    <form action="">
                        <div class="input-group text-center">
						<span id="t-search-menu" class="input-group-btn">
							<button class="btn btn-default" type="button">
                                商品 <span class="caret"></span>
                            </button>
							<ul class="s-menu" id="t-menu" role="menu" style="display: none; opacity: 1;">
                                <li><a href="javascript:void (0);">商品</a></li>
                                <li><a href="javascript:void (0);">店铺</a></li>
                            </ul>
						</span> <input type="text" class="form-control"> <span class="input-group-btn">
							<button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search" style="color: red"></span>
                            </button>
						</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </nav>



</div>
<!-- 头部 logo  搜索-->

    <div class="container-fluid header_hei">
        <div class="row header_bg">
            <div class="col-xs-2 col-xs-offset-1 header_logo">
                <a href="<?php echo U('Home/Index/index');?>" style="line-height: 28px">
                    <img src="/youku/project<?php echo ($config['headlogo']); ?>">
                </a>
            </div>
            <div class="col-xs-5 col-xs-offset-1" style="margin-top: 10px">
                <form action="">
                    <div class="input-group text-center">
						<span id="search_menu" class="input-group-btn">
							<button class="btn btn-default" type="button">
                                商品 <span class="caret"></span>
                            </button>
							<ul class="s-menu" id="s-menu" role="menu">
                                <li><a href="javascript:void (0);">商品</a></li>
                                <li><a href="javascript:void (0);">店铺</a></li>
                            </ul>
						</span> <input type="text" class="form-control"> <span
                            class="input-group-btn">
							<button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search" style="color: red"></span>
                            </button>
						</span>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <div class="container-fluid clear_padding">
        <div class="row">
            <div class="col-xs-12">
                <!--导航部分-->
                <?php echo W('Cate/indexNavbar');?>
            </div>
        </div>
    </div>



    <div class="container-fluid">
        <div class="row">
            <div class="width-2" style="margin-left: 3%;">
                <!--左半部分-->
                <div class="left_list">
                    <ul class="ass">
                        <?php if(is_array($goodslist)): foreach($goodslist as $key=>$vo): ?><li data-index="<?php echo ($key); ?>" class="add">
                                <p class="listp">
                                    <a href=""><b class="width-25 clear_padding nav_ico"><?php echo ($vo["aname"]); ?></b></a>
                                    <a class="red_f width-25 clear_padding" href="#"><?php echo ($vo['subcate'][0]['aname']); ?></a>
                                    <a class="width-25 clear_padding" href="#"><?php echo ($vo['subcate'][1]['aname']); ?></a>
                                    <a class="red_f width-25 clear_padding" href="#"><?php echo ($vo['subcate'][2]['aname']); ?></a>
                                </p>
                                <span class="glyphicon glyphicon-chevron-right jiantou"></span>
                            </li><?php endforeach; endif; ?>
                    </ul>
                    <div class="left_detail_box">
                        <?php if(is_array($goodslist)): foreach($goodslist as $key=>$vo): ?><div data-v="<?php echo ($key); ?>" class="left_detail">
                                <div style="overflow: hidden;">
                                    <h4 class="red_f clear-float"><?php echo ($vo['subcate'][0]['subcate'][0]['aname']); ?></h4>
                                    <ul>
                                        <?php if(is_array($vo['subcate'][0]['subcate'][0]['subcate'])): foreach($vo['subcate'][0]['subcate'][0]['subcate'] as $key=>$qwe): ?><li class="width-25 line_height"><a href="#"><?php echo ($qwe['aname']); ?></a></li><?php endforeach; endif; ?>
                                    </ul>
                                </div>

                                <div style="overflow: hidden;">
                                    <h4 class="clear-float red_f"><?php echo ($vo['subcate'][0]['subcate'][1]['aname']); ?></h4>
                                    <ul>
                                        <?php if(is_array($vo['subcate'][0]['subcate'][1]['subcate'])): foreach($vo['subcate'][0]['subcate'][1]['subcate'] as $key=>$qwe): ?><li class="width-25 line_height"><a href="#"><?php echo ($qwe['aname']); ?></a></li><?php endforeach; endif; ?>
                                    </ul>
                                </div>

                                <div style="overflow: hidden;">
                                    <h4 class="clear-float red_f"><?php echo ($vo['subcate'][0]['subcate'][2]['aname']); ?></h4>
                                    <ul>
                                        <?php if(is_array($vo['subcate'][0]['subcate'][2]['subcate'])): foreach($vo['subcate'][0]['subcate'][2]['subcate'] as $key=>$qwe): ?><li class="width-25 line_height"><a href="#"><?php echo ($qwe['aname']); ?></a></li><?php endforeach; endif; ?>
                                    </ul>
                                </div>
                            </div><?php endforeach; endif; ?>
                    </div>
                </div>

            </div>
            <div class="width-55 clear_padding">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php if(is_array($lunbo)): foreach($lunbo as $key=>$vo): if($key == 0): ?><li data-target="#carousel-example-generic" data-slide-to="<?php echo ($key); ?>" class="active"></li>
                                <?php else: ?>
                                <li data-target="#carousel-example-generic" data-slide-to="<?php echo ($key); ?>"></li><?php endif; endforeach; endif; ?>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <?php if(is_array($lunbo)): foreach($lunbo as $key=>$vo): if($key == 0): ?><div class="item active">
                                    <img src="/youku/project<?php echo ($vo['lunbo']); ?>">
                                </div>
                                <?php else: ?>
                                <div class="item">
                                    <img src="/youku/project<?php echo ($vo['lunbo']); ?>">
                                </div><?php endif; endforeach; endif; ?>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic"
                       data-slide="prev"> <span
                            class="glyphicon glyphicon-chevron-left"></span>
                    </a> <a class="right carousel-control" href="#carousel-example-generic"
                            data-slide="next"> <span
                        class="glyphicon glyphicon-chevron-right"></span>
                </a>
                </div>
                <div class="bnr_box">
                    <ul class="pic_attr">
                        <li><a href="#"><img
                                src="/youku/project/Public/Home/images/rexiao.jpg"></a></li>
                        <li><a href="#"><img
                                src="/youku/project/Public/Home/images/liuxing.jpg"></a></li>
                        <li><a href="#"><img
                                src="/youku/project/Public/Home/images/shangxin.jpg"></a></li>
                        <li><a href="#"><img
                                src="/youku/project/Public/Home/images/zhuanti.jpg"></a></li>
                    </ul>
                </div>
            </div>
            <div class="width-2">
                <!--又半部分-->
                <div class="right">
                    <a href="#"><img src="/youku/project/Public/Home/images/tuangou.jpg"></a>
                    <a href="#"><img src="/youku/project/Public/Home/images/shili.jpg"></a>
                    <a href="#"><img src="/youku/project/Public/Home/images/shengxia.jpg"></a>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-bottom: 80px" class="container">
        <div class="width-10 margin-bottom-20 fen-title">
            <div class="col-xs-3 line_height clear-padding">
                <b class="ftit">新品热卖</b>
            </div>
        </div>
        <div class="row">
            <?php if(is_array($goodsInfo)): foreach($goodsInfo as $key=>$vo): ?><div class="col-xs-3" style="min-height: 485px">
                    <div class="img_box">
                        <a href="<?php echo ($vo["url"]); ?>" target="_blank">
                            <img class="img-responsive" src="/youku/project<?php echo ($vo["goodpic"]); ?>">
                        </a>
                    </div>
                    <p class="title_box"><?php echo ($vo["goodname"]); ?></p>
                    <p class="price_box clearfix">
                        <span class="yuan">￥</span>
                        <span class="num"><?php echo ($vo["nowprice"]); ?></span>
                    </p>
                </div><?php endforeach; endif; ?>
        </div>
    </div>

    <div style="margin-bottom: 80px" class="container">
        <div class="width-10 margin-bottom-20 fen-title">
            <div class="col-xs-3 line_height clear-padding">
                <b class="ftit">当季热卖</b>
            </div>
        </div>
        <div class="row">
            <?php if(is_array($goodsInfo1)): foreach($goodsInfo1 as $key=>$vo): ?><div class="col-xs-3" style="min-height: 485px">
                    <div class="img_box">
                        <a href="<?php echo ($vo["url"]); ?>" target="_blank">
                            <img class="img-responsive" src="/youku/project<?php echo ($vo["goodpic"]); ?>">
                        </a>
                    </div>
                    <p class="title_box"><?php echo ($vo["goodname"]); ?></p>
                    <p class="price_box clearfix">
                        <span class="yuan">￥</span>
                        <span class="num"><?php echo ($vo["nowprice"]); ?></span>
                    </p>
                </div><?php endforeach; endif; ?>
        </div>
    </div>

    <div style="margin-bottom: 80px" class="container">
        <div class="width-10 margin-bottom-20 fen-title">
            <div class="col-xs-3 line_height clear-padding">
                <b class="ftit">冬季热卖</b>
            </div>
        </div>
        <div class="row">
            <?php if(is_array($goodsInfo2)): foreach($goodsInfo2 as $key=>$vo): ?><div class="col-xs-3" style="min-height: 485px">
                    <div class="img_box">
                        <a href="<?php echo ($vo["url"]); ?>" target="_blank">
                            <img class="img-responsive" src="/youku/project<?php echo ($vo["goodpic"]); ?>">
                        </a>
                    </div>
                    <p class="title_box"><?php echo ($vo["goodname"]); ?></p>
                    <p class="price_box clearfix">
                        <span class="yuan">￥</span>
                        <span class="num"><?php echo ($vo["nowprice"]); ?></span>
                    </p>
                </div><?php endforeach; endif; ?>
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
                        <img src="/youku/project/Public/Home/images/ma.jpg" alt="蘑菇街服务号二维码">
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





<script src="/youku/project/Public/Home/js/jquery-1.11.3.min.js"></script>
<script src="/youku/project/Public/Home/js/bootstrap.min.js"></script>
<script src="/youku/project/Public/Home/js/move.js"></script>
<script src="/youku/project/Public/Home/js/indexs.js"></script>

</body>
</html>