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
    
    <link rel="stylesheet" href="/Public/Home/css/info.css">
    <link rel="stylesheet" href="/Public/Home/css/orderComment.css">

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






    <div class="info">
        <!-- 主体信息选项部分 -->
        <div class="info_left">
            <!-- 头像、等级 -->
            <div class="left_img">
                <img src="/<?php echo ($order['userpic']); ?>" alt="">
                <p><?php echo ($order['nickname']); ?></p>

                <div class="col-xs-5 8e"></div>
                <span class="vip_level0"></span>
            </div>
            <!-- 详细信息选项 -->
            <!-- 详细信息选项 -->
            <dl class="mu_nav">
                <dt>我的订单</dt>
                <dd><a href="<?php echo U('Home/Userinfo/order');?>">全部订单</a></dd>
                <dd><a href="<?php echo U('Home/Userinfo/order',array('state'=>1));?>">待付款</a></dd>
                <dd><a href="<?php echo U('Home/Userinfo/order',array('state'=>2));?>">待收货</a></dd>
                <dd><a href="<?php echo U('Home/Userinfo/order',array('state'=>3));?>">待评价</a></dd>
                <dd><a href="<?php echo U('Home/Userinfo/order',array('state'=>4));?>">退货退款</a></dd>
                <dd><a href="<?php echo U('Home/Userinfo/orderRecycle');?>">订单回收站</a></dd>
            </dl>
            <dl class="mu_nav">
                <dt><a href="">我的钱包</a></dt>
            </dl>
            <dl class="mu_nav">
                <dt><a href="<?php echo U('Home/Userinfo/address');?>">地址管理</a></dt>
            </dl>
            <dl class="mu_nav">
                <dt>账号设置</dt>
                <dd><a href="<?php echo U('Home/Userinfo/userinfo');?>">基本信息</a></dd>
                <dd><a href="<?php echo U('Home/Userinfo/uploded');?>">修改头像</a></dd>
            </dl>
        </div>

        <!-- 主体信息修改信息页面 -->
        <div class="info_right">
            <div class="right_main">
            <div class="rightCloumns span9">
                <div class="span9 area_r">
                    <div class="box2">
                        <div class="focus pd12 clearfix" style="border:none;">
                            <div class="property">
                            <?php if(is_array($order['myattr'])): foreach($order['myattr'] as $key=>$stor): ?><h1><?php echo ($stor['goodname']); ?></h1>
                                <p>打折价：<span class="price"><span id="goodspricediv"><?php echo ($stor['nowprice']); ?></span>元</span></p><?php endforeach; endif; ?>
                                <p></p>
                                <p><span class="scores">商品编码：<em>+<?php echo ($order['ordernum']); ?> </em></span></p>
                                <p><?php echo ($stor['attr_v'][0]); ?></p>
                                <p><?php echo ($stor['attr_v'][1]); ?></p>
                                <p><?php echo ($stor['attr_v'][2]); ?></p>
                                <style>
                                    #attr{padding:8px;}
                                    #attr .item a {
                                        background: none repeat scroll 0 0 #fff;
                                        float: left;
                                        padding: 5px 6px;
                                    }
                                    #attr .item a:hover {
                                        padding: 3px 5px;
                                    }
                                </style>
                                <!--<p class="mg20b">购买数量:-->
                                    <!--<input id="buynum" class="field_num" type="text" maxlength="4"   value="<?php echo ($order['number']); ?>" name="number[]">-->
                                <!--</p>-->
                            </div>
                            <div class="imageViewerFrame">
                                <div class="imgTop">
                                    <!--图片放大镜-->
                                    <img id="imgLens" src="<?php echo ($stor['goodpic']); ?>" width="245" height="240" />
                                </div>
                                <div class="imgList clearfix">
                                </div>
                                <div style="clear:both"></div>
                            </div>
                            <div class="blank"></div>
                        </div>
                        <div class="focus pd12 t_l">
                            <div class="comment_show pd12">
                                <p class="head_ttlm clearfix">
                                    <span class="ttlm">我要评论</span>
                                </p>
                                <div class="blank"></div>
                                <form name="commentform" action="/index.php/Home/Userinfo/insertComment" method="post">
                                    <input type="hidden" name="orderid" value="<?php echo ($order["id"]); ?>">
                                    <input type="hidden" name="gid" value="<?php echo ($stor["id"]); ?>">

                                    <table class="tab_comt" width="100%">
                                        <tbody>
                                        <tr>
                                            <th width="100">评论星级：</th>
                                            <td style="height:auto;">
                                            <div class="pro_rating">
                                                <input type="hidden" name="score" value="">
                                                <ul class="rating nostar">
                                                    <li class="one"><a href="#" title="1">1</a></li>
                                                    <li class="two"><a href="#" title="2">2</a></li>
                                                    <li class="three"><a href="#" title="3">3</a></li>
                                                    <li class="four"><a href="#" title="4">4</a></li>
                                                    <li class="five"><a href="#" title="5">5</a></li>
                                                </ul>
                                            </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>评论内容: </th>
                                            <td>
                                            <textarea class="field_area span5" style="overflow:auto; resize: none;" name="content"rows="10"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td>
                                                <a href="javascript:void(0);" id="goreply" name="reply"><img src="/Public/Home/images/btn_sendComment.gif"/></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
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

<script src="/Public/Home/js/jquery-1.11.3.min.js"></script>
<script src="/Public/Home/js/userinfo.js"></script>
<script type="text/javascript">
    /*商品评分效果*/
    $(function(){
        //通过修改样式来显示不同的星级
        $("ul.rating li a").click(function(){
             var title = $(this).attr("title");
            $("input[name='score']").val(title);
             var cl = $(this).parent().attr("class");
             $(this).parent().parent().removeClass().addClass("rating "+cl+"star");
             $(this).blur();//去掉超链接的虚线框
             return false;
        });

        $("#gobuy").click(function(){
            $("form[name='buygoods']").submit();
        });
        $("#goreply").click(function(){
            $("form[name='commentform']").submit();
        });
    })
</script>

</body>
</html>