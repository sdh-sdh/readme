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
                        <div class="progress-bar progress-bar-danger" role="progressbar"
                             style="width: 38%;height: 10px"></div>
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
    </div>

    <div class="container">
        <div class="row">
            <div class="panel panel-warning">
                <div class="panel-heading"><h3>确认收货地址</h3></div>
                <div class="panel-body">
                    <div class="row">
                        <?php if(is_array($adrInfo)): foreach($adrInfo as $key=>$vo): ?><div class="col-sm-6 col-md-3">
                                <!-- adr-checked-->
                                <?php if($vo["default"] == 1 ): ?><div class="thumbnail adr-list adr-checked" data-id="<?php echo ($vo["id"]); ?>">
                                <?php else: ?>
                                    <div class="thumbnail adr-list" data-id="<?php echo ($vo["id"]); ?>"><?php endif; ?>
                                        <div class="caption">
                                        <h4 style="border-bottom: 1px solid grey;">收货人：<?php echo ($vo["name"]); ?></h4>
                                        <p>地址：<?php echo ($vo["address"]); ?></p>
                                        <p>电话：<?php echo ($vo["phone"]); ?></p>
                                        <p>邮编：<?php echo ($vo["postcode"]); ?></p>
                                        </div>
                                    </div>
                            </div><?php endforeach; endif; ?>
                    </div>
                <div class="row" style="height: 50px">
                    <div class="col-xs-2 col-xs-offset-1">
                        <a href="">管理收货地址</a>
                    </div>
                    <div class="col-xs-2">
                        <a id="make_adr_btn" href="javascript:void(0);">填写新地址</a>
                    </div>
                </div>
                <?php if($newadr == 0): ?><div class="row show adr_form">
                    <?php else: ?>
                        <div class="row hidden adr_form"><?php endif; ?>
                    <form onsubmit="return false;" id="adr_form" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-xs-2 control-label">地址：<span class="color-red">*</span></label>

                            <div class="col-xs-2">
                                <select class="form-control input-sm" name="sheng" id="sheng">
                                    <option value="0">---选择省---</option>
                                    <?php if(is_array($shenglist)): foreach($shenglist as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>

                                </select>
                            </div>
                            <div class="col-xs-2">
                                <select class="form-control input-sm" name="shi" id="shi">
                                    <option value="0">---选择市---</option>
                                </select>
                            </div>
                            <div class="col-xs-2">
                                <select class="form-control input-sm" name="xian" id="xian">
                                    <option value="0">---选择区县---</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="postal" class="col-xs-2 control-label">邮政编码：<span
                                    class="color-red">*</span></label>

                            <div class="col-xs-2">
                                <input type="text" class="form-control" name="postcode" id="postal">
                            </div>

                        </div>
                        <div class="form-group has-feedback">
                            <label for="address" class="col-xs-2 control-label">街道地址：<span class="color-red">*</span></label>
                            <div class="col-xs-6">
                                <textarea class="form-control" rows="3" name="jiedao" id="address"></textarea>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="postal" class="col-xs-2 control-label">收货人姓名：<span
                                    class="color-red">*</span></label>

                            <div class="col-xs-2">
                                <input type="text" class="form-control" name="name" id="username">
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="postal" class="col-xs-2 control-label">手机号：<span class="color-red">*</span></label>
                            <div class="col-xs-2">
                                <input type="text" class="form-control" name="phone" id="phone">
                            </div>
                        </div>
                        <button type="submit" id="make_adr_form" class="col-xs-offset-2 btn btn-default adr-sub btn-lg"><b>确认地址</b>
                        </button>
                        <button type="button" id="cancel_make_adr" class="btn btn-default btn-lg">取消填写</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title"><h3>确认商品信息</h3></h3>
            </div>
            <form id="goodsForm" class="form-inline" role="form" action="<?php echo U('Home/Order/pay');?>" method="post">
                <input type="hidden" id="orderid" name="orderid" value="">
                <input type="hidden" id="adrid" name="adrid" value="">
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="col-xs-5 text-center">商品</th>
                            <th>商品信息</th>
                            <th>单价(元)</th>
                            <th>数量</th>
                            <th>优惠</th>
                            <th>小计(元)</th>
                        </tr>
                        </thead>
                        <?php if(is_array($cartGoods)): foreach($cartGoods as $key=>$vo): ?><tbody id="<?php echo ($vo["skuid"]); ?>">
                            <input type="hidden" value="<?php echo ($vo["skuid"]); ?>" name="sku[]">
                            <tr>
                                <td colspan="6">店铺: 自营</td>
                            </tr>
                            <tr style="height: 112px;">
                                <td>
                                    <div class="col-xs-3">
                                        <img src="<?php echo ($vo["goodpic"]); ?>" class="imgSize-2">
                                    </div>
                                    <div class="col-xs-9">
                                        <a href="<?php echo U('Home/Detail/index', array('id'=>$vo['id']));?>">
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
                                    <input type="hidden" value="<?php echo ($vo["num"]); ?>" name="num[]">
                                    <?php echo ($vo["num"]); ?>
                                </td>
                                <td>无</td>
                                <td>
                                    <div id="xj<?php echo ($key); ?>" class="price"><?php echo ($vo["Price"]); ?></div>
                                </td>
                            </tr>
                            </tbody><?php endforeach; endif; ?>
                    </table>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-2 col-xs-offset-6 total_num">
                            共有 <?php echo ($key+1); ?> 件商品　总计:
                        </div>
                        <input type="hidden" value="" name="orderprice" id="price_hidden">
                        <div class="col-xs-2 total_price">¥ <span>0</span></div>
                        <div class="col-xs-2">
                            <div class="form-group pull-right">
                                <div class="">
                                    <button type="submit" class="btn btn-danger btn-lg">确认并付款</button>
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
        var urlForAdress = "<?php echo U('Home/Adress/adress_area');?>";
        var urlAddAdress = "<?php echo U('Home/Adress/add_adr');?>";
        var subUrl = "<?php echo U('Home/Order/makeOrder');?>";
    </script>
    <script src="/Public/Home/js/order.js"></script>

</body>
</html>