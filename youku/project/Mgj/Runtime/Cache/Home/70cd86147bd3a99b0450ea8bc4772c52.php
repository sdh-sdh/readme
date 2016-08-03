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
    
    <link rel="stylesheet" href="/Public/Home/css/cartcss.css">

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






    <div class="container">
        <div class="row" style="height: 150px">
            <div class="height-1"></div>
            <div class="col-xs-5 col-xs-offset-6 height-1 clear-padding">
                <div class="row clear_padding">
                    <div class="progress" style="height: 10px">
                        <div class="progress-bar progress-bar-success" role="progressbar"
                             style="width: 10%;height: 10px"></div>
                    </div>
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
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3>全部商品</h3>
                </div>
                <form action="<?php echo U('Home/Order/index');?>" method="post" class="form-inline" role="form" id="CartForm">
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="col-xs-1">
                                    <button type="button" id="s_all" class="btn btn-info btn-xs">全选</button>
                                    <button type="button" id="s_no" class="btn btn-info btn-xs pull-right">取消</button>
                                </th>
                                <th class="col-xs-4 text-center">商品</th>
                                <th class="col-xs-2">商品信息</th>
                                <th class="col-xs-1">单价(元)</th>
                                <th class="col-xs-2 text-center">数量</th>
                                <th class="col-xs-1 text-center">小计(元)</th>
                                <th class="col-xs-1">操作</th>
                            </tr>
                            </thead>
                            <?php if(is_array($cartGoods)): foreach($cartGoods as $key=>$vo): ?><tbody id="<?php echo ($vo["skuid"]); ?>" goodsid="<?php echo ($vo["id"]); ?>">
                                <tr>
                                    <td colspan="6">店铺: <?php echo ($vo["storeid"]); ?></td>
                                </tr>
                                <tr style="height: 112px;">
                                    <td>
                                        <div class="col-xs-6">
                                            <div class="input-group">
                                            <span class="input-group-addon" style="border-radius: 4px">
                                                <input type="checkbox" class="check" index="<?php echo ($key); ?>" name="<?php echo ($vo["skuid"]); ?>">
                                            </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-xs-3">
                                            <img src="<?php echo ($vo["goodpic"]); ?>" class="imgSize-2">
                                        </div>
                                        <div class="col-xs-9">
                                            <a href="<?php echo U('Home/Detail/index', array('id'=>$vo['id']));?>" target="_blank">
                                                <b class="cart-name-font"><?php echo ($vo["goodname"]); ?></b>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div>颜色：<?php echo ($vo['颜色']); ?></div>
                                        <div>尺码：<?php echo ($vo['尺码']); ?></div>
                                    </td>
                                    <td><span>¥</span><span id="single-price<?php echo ($key); ?>" class="single-price"><?php echo ($vo["sprice"]); ?></span></td>
                                    <td>
                                        <div class="input-group col-xs-8 col-xs-offset-2">
                                            <a href="javascript:;" index="<?php echo ($key); ?>" class="input-group-addon cutNum ">
                                                <span  class="glyphicon glyphicon-minus"></span>
                                            </a>
                                            <input type="text" id="gNum<?php echo ($key); ?>" name="num[]" class="form-control input-sm padding-6 " value="<?php echo ($vo["num"]); ?>">
                                            <a href="javascript:;" index="<?php echo ($key); ?>" class="input-group-addon addNum">
                                                <span  class="glyphicon glyphicon-plus"></span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <input id="hxj<?php echo ($key); ?>" type="hidden" name="price[]" value="<?php echo ($vo["Price"]); ?>">
                                        <div id="xj<?php echo ($key); ?>" price-sku="<?php echo ($vo["skuid"]); ?>" class="price text-center"><?php echo ($vo["Price"]); ?></div>
                                    </td>
                                    <td>
                                        <a class="delCart" data-sku="<?php echo ($vo["skuid"]); ?>" href="javascript:void(0);">删除</a>
                                    </td>
                                </tr>
                                </tbody><?php endforeach; endif; ?>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <div class="row">

                            <div class="col-xs-1">

                            </div>
                            <div class="col-xs-1">

                            </div>

                            <div class="col-xs-2 col-xs-offset-4 total_num">
                                共有 <span></span> 件商品　总计:
                            </div>
                            <div class="col-xs-2 total_price">
                                ¥ <span>0</span>
                            </div>
                            <div class="col-xs-2">
                                <div class="form-group pull-right">
                                    <div class="">
                                        <button type="submit"  class="btn btn-default btn-lg" disabled>确认并付款</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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

    <script>
        var delCartUrl = '<?php echo U("Home/Cart/delCart");?>';
    </script>
    <script src="/Public/Home/js/cart.js"></script>

</body>
</html>