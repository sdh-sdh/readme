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
    <link rel="stylesheet" href="/Public/Home/css/orderUser.css">

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
        <!-- 主体信息左选项部分 -->
        <!-- 左侧内容开始 -->
        <div class="info_left">
            <!-- 头像、等级 -->
            <div class="left_img">
                <img src="/<?php echo ($u['userpic']); ?>" alt="">
                <p><?php echo ($u['nickname']); ?></p>

                <div class="col-xs-5 8e"></div>
                <span class="vip_level0"></span>
            </div>
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
                <dt><a href="">我的理财</a></dt>
            </dl>
            <dl class="mu_nav">
                <dt>优惠特权</dt>
                <dd><a href="">钻石会员</a></dd>
                <dd><a href="">我的蘑豆</a></dd>
                <dd><a href="">现金卷</a></dd>
                <dd><a href="">店铺优惠劵</a></dd>
            </dl>
            <dl class="mu_nav">
                <dt><a href="<?php echo U('Home/Userinfo/address');?>">地址管理</a></dt>
            </dl>
            <dl class="mu_nav">
                <dt><a href="">安全设置</a></dt>
            </dl>
            <dl class="mu_nav">
                <dt>维权管理</dt>
                <dd><a href="">投诉管理</a></dd>
                <dd><a href="">举报管理</a></dd>
                <dd><a href="">被盗举证</a></dd>
            </dl>
            <dl class="mu_nav">
                <dt>账号设置</dt>
                <dd><a href="<?php echo U('Home/Userinfo/userinfo');?>">基本信息</a></dd>
                <dd><a href="<?php echo U('Home/Userinfo/uploded');?>">修改头像</a></dd>
            </dl>
        </div>

        <!--我的订单内容左边结束-->
        <!--右侧内容开始-->
        <div class="info_right">
            <!-- 订单支付的标题 -->
            <div>
            <h2>订单回收站</h2>
            </div>
            <!-- 判断是否存在订单 -->
            <?php if(empty($order)){ ?>
                <div class="d_order_list_empty">
                    <div class="d_order_empty_icon d_fl"></div>
                    <div class="d_order_empty_content d_fl">
                        <h5>你还没有购买过商品，赶紧去挑选商品～</h5>
                        <ul class="d_order_empty_list">
                            <li>去 <a href="<?php echo U("Index/index");?>" target="_balnk">服饰</a> 看看大家都喜欢的商品</li>
                            <li>去 <a href="<?php echo U("Index/index");?>" target="_balnk">团购</a> 看看折扣中的商品</li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="d_order_pagination"></div>
            <?php }else{ ?>
                <!--订单列表开始-->
                <div class="d_order_list">
                    <div class="d_order_section">
                        <?php if(is_array($order)): foreach($order as $key=>$orders): ?><table class="d_order_table" style="background:#ddd;">
                            <tbody>
                                <!--订单列表头部开始-->
                                <tr class="d_order_table_header" style="background:#ddd;">
                                    <td colspan="7" style="padding-top:5px;">
                                        <div class="d_table_info">
                                            <span class="d_info_no">订单编号：
                                                <span class="d_order_num"><del><?php echo ($orders["ordernum"]); ?></del></span>
                                            </span>
                                            <span class="d_info_deal_time">退订时间：<del><?php echo (date( "Y-m-d H:i:s",$orders["ordertime"])); ?></del></span>
                                            <?php if(is_array($orders['mygoods'])): foreach($orders['mygoods'] as $key=>$stor): ?><a href="javascript:;" class="d_shop_name">店铺：<span><?php echo ($stor['shopname']); ?></span></a><?php endforeach; endif; ?>
                                        </div>
                                        <a href="javascript:;" class="d_order_connect_btn">联系商家</a>
                                    </td>
                                </tr>
                                <!--订单列表头部结束-->
                                <!--订单列表中部开始-->
                                <tr class="d_order_table_item">
                                    <td class="d_goods">
                                        <?php if(is_array($orders['mygoods'])): foreach($orders['mygoods'] as $key=>$stor): if(is_array($stor['myattr'])): foreach($stor['myattr'] as $key=>$godatr): ?><a href="" class="d_pic" hidefocus="true" title="" target="_blank"><img src="<?php echo ($stor['goodpic']); ?>" alt="" width="70"></a>
                                        <div class="d_order_desc">
                                            <div class="goods" style="margin-bottom:40px;">
                                            <p>
                                                <a href="/index.php/Detail/particulars/goodsid/<?php echo ($stor["goodsid"]); ?>" target="_blank"><?php echo ($stor['goodname']); ?></a>
                                                <a href="javascript:;" target="_blank" class="d_order_snapshot">[交易快照]</a>
                                            </p>

                                            <p><?php echo ($godatr[0]); ?><span style="margin-left:170px;"><del><?php echo ($stor['price']); ?>.00</del></span>
                                            </p>
                                            <p><?php echo ($godatr[1]); ?></p>
                                            <p><?php echo ($godatr[2]); ?></p>
                                            </div>

                                        </div><?php endforeach; endif; endforeach; endif; ?>
                                    </td>
                                    <td class="d_total" rowspan="1">
                                        <ul>
                                            <li>
                                                <p class="d_total_price"><del>￥<?php echo ($stor['price']); ?>.00</del></p>
                                                <p>(包邮)</p>
                                                <p></p>
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="d_status" rowspan="1">
                                        <?php if($orders["isdelete"] == 1): ?><p class="d_order_p">交易关闭</p><?php endif; ?>
                                    </td>
                                    <td class="d_other" rowspan="1">
                                        <a class="d_order_link">订单已删除</a>
                                    </td>
                                </tr>
                                <!--订单列表中部结束-->
                            </tbody>
                        </table><?php endforeach; endif; ?>
                    </div></div>
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div id="pages"><?php echo ($page); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!--订单列表结束-->
                <style type="text/css">
                     #pages a, #pages span{
                        background-color: #fff;
                        border: 1px solid #ddd;
                        color: #337ab7;
                        float: left;
                        line-height: 1.42857;
                        margin-left: -1px;
                        padding: 6px 12px;
                        position: relative;
                        text-decoration: none;
                     }
                     #pages span{
                        background-color: #337ab7;
                        border-color: #337ab7;
                        color: #fff;
                        cursor:pointer;
                        z-index: 2;
                     }
                </style>
                <?php } ?>
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

<script src="/Public/Home/js/userOrder.js"></script>
<script>
    //最近浏览轮播

</script>

</body>
</html>