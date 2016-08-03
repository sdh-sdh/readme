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
                    <img src="<?php echo ($config['headlogo']); ?>">
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



	<div style="height:15px;"></div>
		<div class="container">
		    <div class="row">
		        <div class="col-xs-12 clear_padding">
		            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		                <div class="carousel-inner" style="height:100px;">
		                    <div class="item active">
		                        <img src="/Public/Home/images/a.jpg"  alt="..."> 
		                    </div>
		                    <div class="item">
		                        <img src="/Public/Home/images/f.jpg"  alt="...">
		                    </div>
		                    <div class="item">
		                        <img src="/Public/Home/images/h.jpg"  alt="...">
		                    </div>
		                    <div class="item">
		                        <img src="/Public/Home/images/i.jpg"  alt="...">
		                    </div>
		                    <div class="item">
		                        <img src="/Public/Home/images/hj.jpg"  alt="...">
		                    </div>
		                </div>
		                <!-- Controls -->
		            </div>
		        </div>
		    </div>
		</div>

		<?php if($_GET['id'] != 6 && $_GET['id'] != 7 && $_GET['id'] != 8 && $_GET['id'] != 9 && $_GET['id'] != 10 && $_GET['id'] != 11 && $_GET['id'] != 12): ?><div class="container" style="width:1260px;margin:0 40px;">
		    <div class="row">
		    <?php if(is_array($goods)): foreach($goods as $key=>$vo): if(($_GET['id']== $vo['asortid']) OR ($_GET['state']== $vo['state'])): ?><div class="col-xs-5ths">
			    	<div class="arrange">
		                <div class="new_poster">
		                    <div class="np_pic hover_pic">
		                        <a class="pic_load" href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["goodname"]); ?>"><img class="goods_pic" width="226" height="317" src="<?php echo ($vo["goodpic"]); ?>" alt="<?php echo ($vo["goodname"]); ?>"></a> 
		                        <div style="height:30px">
		                        	<div class="showy_info"><span>￥</span><?php echo ($vo["nowprice"]); ?></div>
									<div class="sale_num" style="background-image: url(/Public/Home/image/ss.png);background-position: 3px -317px;background-repeat: no-repeat;">　 &nbsp;<?php echo ($vo["collect"]); ?></div>
								</div>
								<div class="title">   
									<p>
									<a href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["goodname"]); ?>" alt="<?php echo ($vo["goodname"]); ?>"><?php echo ($vo["goodname"]); ?></a>
									</p>
								</div>
		                    </div>
		                </div>
		            </div>
			    </div>
			    </else/><?php endif; endforeach; endif; ?>
            </div>
	    </div>
		<?php else: endif; ?>
	    <?php if(empty($_GET['state']) && $_GET['id'] == 1): ?><div class="container" style="width:1260px;margin:0 40px;">
		    <div class="row">
		    <?php if(is_array($goods1)): foreach($goods1 as $key=>$vo): ?><div class="col-xs-5ths">
			    	<div class="arrange">
		                <div class="new_poster">
		                    <div class="np_pic hover_pic">
		                        <a class="pic_load" href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["goodname"]); ?>"><img class="goods_pic" width="226" height="317" src="<?php echo ($vo["goodpic"]); ?>" alt="<?php echo ($vo["goodname"]); ?>"></a> 
		                        <div style="height:30px">
		                        	<div class="showy_info"><span>￥</span><?php echo ($vo["nowprice"]); ?></div>
									<div class="sale_num" style="background-image: url(/Public/Home/image/ss.png);background-position: 3px -317px;background-repeat: no-repeat;">　 &nbsp;<?php echo ($vo["collect"]); ?></div>
								</div>
								<div class="title">   
									<p>
									<a href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["goodname"]); ?>" alt="<?php echo ($vo["goodname"]); ?>"><?php echo ($vo["goodname"]); ?></a>
									</p>
								</div>
		                    </div>
		                </div>
		            </div>
			    </div><?php endforeach; endif; ?>
            </div>
	    </div>
	    <?php else: endif; ?>
	    <?php if(empty($_GET['state']) && $_GET['id'] == 2): ?><div class="container" style="width:1260px;margin:0 40px;">
		    <div class="row">
		    <?php if(is_array($goods2)): foreach($goods2 as $key=>$vo): ?><div class="col-xs-5ths">
			    	<div class="arrange">
		                <div class="new_poster">
		                    <div class="np_pic hover_pic">
		                        <a class="pic_load" href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["goodname"]); ?>"><img class="goods_pic" width="226" height="317" src="<?php echo ($vo["goodpic"]); ?>" alt="<?php echo ($vo["goodname"]); ?>"></a> 
		                        <div style="height:30px">
		                        	<div class="showy_info"><span>￥</span><?php echo ($vo["nowprice"]); ?></div>
									<div class="sale_num" style="background-image: url(/Public/Home/image/ss.png);background-position: 3px -317px;background-repeat: no-repeat;">　 &nbsp;<?php echo ($vo["collect"]); ?></div>
								</div>
								<div class="title">   
									<p>
									<a href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["goodname"]); ?>" alt="<?php echo ($vo["goodname"]); ?>"><?php echo ($vo["goodname"]); ?></a>
									</p>
								</div>
		                    </div>
		                </div>
		            </div>
			    </div><?php endforeach; endif; ?>
            </div>
	    </div>
	    <?php else: endif; ?>
	    <?php if(empty($_GET['state']) && $_GET['id'] == 3): ?><div class="container" style="width:1260px;margin:0 40px;">
		    <div class="row">
		    <?php if(is_array($goods3)): foreach($goods3 as $key=>$vo): ?><div class="col-xs-5ths">
			    	<div class="arrange">
		                <div class="new_poster">
		                    <div class="np_pic hover_pic">
		                        <a class="pic_load" href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["goodname"]); ?>"><img class="goods_pic" width="226" height="317" src="<?php echo ($vo["goodpic"]); ?>" alt="<?php echo ($vo["goodname"]); ?>"></a> 
		                        <div style="height:30px">
		                        	<div class="showy_info"><span>￥</span><?php echo ($vo["nowprice"]); ?></div>
									<div class="sale_num" style="background-image: url(/Public/Home/image/ss.png);background-position: 3px -317px;background-repeat: no-repeat;">　 &nbsp;<?php echo ($vo["collect"]); ?></div>
								</div>
								<div class="title">   
									<p>
									<a href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["goodname"]); ?>" alt="<?php echo ($vo["goodname"]); ?>"><?php echo ($vo["goodname"]); ?></a>
									</p>
								</div>
		                    </div>
		                </div>
		            </div>
			    </div><?php endforeach; endif; ?>
            </div>
	    </div>
	    <?php else: endif; ?>
	     <?php if(empty($_GET['state']) && $_GET['id'] == 4): ?><div class="container" style="width:1260px;margin:0 40px;">
		    <div class="row">
		    <?php if(is_array($goods4)): foreach($goods4 as $key=>$vo): ?><div class="col-xs-5ths">
			    	<div class="arrange">
		                <div class="new_poster">
		                    <div class="np_pic hover_pic">
		                        <a class="pic_load" href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["goodname"]); ?>"><img class="goods_pic" width="226" height="317" src="<?php echo ($vo["goodpic"]); ?>" alt="<?php echo ($vo["goodname"]); ?>"></a> 
		                        <div style="height:30px">
		                        	<div class="showy_info"><span>￥</span><?php echo ($vo["nowprice"]); ?></div>
									<div class="sale_num" style="background-image: url(/Public/Home/image/ss.png);background-position: 3px -317px;background-repeat: no-repeat;">　 &nbsp;<?php echo ($vo["collect"]); ?></div>
								</div>
								<div class="title">   
									<p>
									<a href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["goodname"]); ?>" alt="<?php echo ($vo["goodname"]); ?>"><?php echo ($vo["goodname"]); ?></a>
									</p>
								</div>
		                    </div>
		                </div>
		            </div>
			    </div><?php endforeach; endif; ?>
            </div>
	    </div>
	    <?php else: endif; ?>
	     <?php if(empty($_GET['state']) && $_GET['id'] == 5): ?><div class="container" style="width:1260px;margin:0 40px;">
		    <div class="row">
		    <?php if(is_array($goods5)): foreach($goods5 as $key=>$vo): ?><div class="col-xs-5ths">
			    	<div class="arrange">
		                <div class="new_poster">
		                    <div class="np_pic hover_pic">
		                        <a class="pic_load" href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["goodname"]); ?>"><img class="goods_pic" width="226" height="317" src="<?php echo ($vo["goodpic"]); ?>" alt="<?php echo ($vo["goodname"]); ?>"></a> 
		                        <div style="height:30px">
		                        	<div class="showy_info"><span>￥</span><?php echo ($vo["nowprice"]); ?></div>
									<div class="sale_num" style="background-image: url(/Public/Home/image/ss.png);background-position: 3px -317px;background-repeat: no-repeat;">　 &nbsp;<?php echo ($vo["collect"]); ?></div>
								</div>
								<div class="title">   
									<p>
									<a href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["goodname"]); ?>" alt="<?php echo ($vo["goodname"]); ?>"><?php echo ($vo["goodname"]); ?></a>
									</p>
								</div>
		                    </div>
		                </div>
		            </div>
			    </div><?php endforeach; endif; ?>
            </div>
	    </div>
	    <?php else: endif; ?>
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

</body>
</html>