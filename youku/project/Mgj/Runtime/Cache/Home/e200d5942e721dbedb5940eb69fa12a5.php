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
    <link rel="stylesheet" href="/Public/Home/css/address.css">

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
                <img src="/<?php echo ($detail['userpic']); ?>" alt="">
                <p><?php echo ($detail['nickname']); ?></p>

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

        <!-- 主体信息修改信息页面 -->
        <div class="info_right">
            <!-- 地址管理 -->
            <div class="dizhi">
                <h2 class="addr_title">地址管理</h2>
                <!-- 添加隐藏 -->
                <div>
                    <form action="adddizhi" method="post">
                        <div class="saddspan">
                            <span class="hover-pointer">+添加新地址</span>
                        </div>
                        <!-- 隐藏填写框 -->
                        <div class="saddress_pop" style="display:none;">

                            <div class="hidden1">
                                <dl class="saddressbox">
                                    <input type="hidden" name="id" value="" class="id">
                                    <dt>省:</dt>
                                    <dd class="">
                                        <i>*</i>
                                        <select name="sheng" id="sheng" class="vm">
                                            <option value="">--请选择--</option>
                                            <?php if(is_array($res)): foreach($res as $key=>$v): ?><option value="<?php echo ($v['id']); ?>"><?php echo ($v['name']); ?></option><?php endforeach; endif; ?>
                                        </select>
                                        <label for="" class="">市:</label>
                                        <select name="shi" id="shi" class="vm">
                                            <option value="">--请选择--</option>
                                        </select>
                                        <label for="" class="">县区:</label>
                                        <select name="xian" id="xian" class="vm">
                                            <option value="">--请选择--</option>
                                        </select>
                                    </dd>
                                    <dt>邮政编码:</dt>
                                    <dd class="">
                                        <i>*</i>
                                        <input type="text" name="postcode" value="" class="spostcode">
                                    </dd>
                                    <dt>街道地址:</dt>
                                    <dd class="">
                                        <i>*</i>
                                        <textarea name="address" id="saddress" cols="110" rows="4" class="saddress"></textarea>
                                        <p class="prompt">请填写街道地址，最少5个字，最多不能超过100个字</p>
                                    </dd>
                                    <dt>收获人姓名:</dt>
                                    <dd class="">
                                        <i>*</i>
                                        <input type="text" name="name" value="" class="sname">
                                    </dd>
                                    <dt>手机:</dt>
                                    <dd class="">
                                        <i>*</i>
                                        <input type="text" name="phone" value="" class="sphone">
                                    </dd>
                                    <dd class="pt10 oper_btn">
                                       <input type="submit" class="sconfirm_btn J_okbtn mr10">
                                        <!-- <a href="<?php echo U('Home/Userinfo/');?>" class="sconfirm_btn J_okbtn mr10">确认地址</a> -->
                                        <a href="javascript:;" class="scancel_btn">取消</a>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <!-- 隐藏展示框 -->
                        <?php if(is_array($data)): foreach($data as $key=>$v): ?><div class="saddr_section default" aid="53029993" style="display:block;">
                            <input id="adr<?php echo ($v['id']); ?>" type="radio" value="<?php echo ($v['id']); ?>" class="sdefault" <?php if($v['default'] == 1): ?>checked<?php endif; ?>>
                            <ul class="sclearfix">
                                <li class="s_name" data-name="<?php echo ($v['name']); ?>"><?php echo ($v['name']); ?></li>
                                <!-- <li class="addr" data-province="北京" data-city="北京市" data-area="朝阳区" data-street="倒萨倒萨倒萨"><?php echo ($v['address']); ?></li> -->
                                <li class="addr">
                                    <span><?php echo ($v['sheng']); ?></span><span><?php echo ($v['shi']); ?></span><span><?php echo ($v['xian']); ?></span><span><?php echo ($v['address']); ?></span>
                                </li>
                                <li class="zcode" data-postcode="<?php echo ($v['postcode']); ?>"><?php echo ($v['postcode']); ?></li>
                                <li class="mobile" data-phone="<?php echo ($v['phone']); ?>"><?php echo ($v['phone']); ?></li>
                                <li class="oper">
                                    <a href="javascript:;" index="<?php echo ($v['id']); ?>" class="s_default">默认地址</a>
                                    <a href="javascript:;" index="<?php echo ($v['id']); ?>" class="s_edit">编辑</a>
                                    <a href="javascript:;" index="<?php echo ($v['id']); ?>" class="s_del" onclick="sdel($(this))">删除</a>
                                </li>
                               <!--  <li class="enaddr"></li> -->
                            </ul>
                        </div>
                        <script>
                        function sdel(obj){
                            var id = obj.attr('index');
                            var url = 'delress';
                            // var id = $(this).attr('index');
                            $.get(url,{id:id},function(msg){
                                if(msg){
                                    obj.parent().parent().parent().remove();
                                }
                            })
                        }
                        </script><?php endforeach; endif; ?>
                    </form>
                </div>
            </div>

            <!-- 退货地址管理 -->
            <div class="dizhi">
                <h2 class="addr_title">退货地址管理</h2>
                <!-- 添加隐藏 -->
                <div>
                    <form action="tuidizhi" method="post">
                        <div class="taddspan">
                            <span class="hover-pointer">+添加新地址</span>
                        </div>
                        <!-- 隐藏填写框 -->
                        <div class="taddress_pop" style="display:none">
                            <div class="hidden1">
                                <dl class="taddressbox">
                                    <input type="hidden" name="id" value="" class="tid">
                                    <dt>省:</dt>
                                    <dd class="">
                                        <i>*</i>
                                        <select name="sheng" id="t_sheng" class="tvm">
                                            <option value="">--请选择--</option>
                                            <?php if(is_array($res)): foreach($res as $key=>$v): ?><option value="<?php echo ($v['id']); ?>"><?php echo ($v['name']); ?></option><?php endforeach; endif; ?>
                                        </select>
                                        <label for="" class="">市:</label>
                                        <select name="shi" id="t_shi" class="tvm shi">
                                            <option value="">--请选择--</option>
                                        </select>
                                        <label for="" class="">县区:</label>
                                        <select name="xian" id="t_xian" class="tvm">
                                            <option value="">--请选择--</option>
                                        </select>
                                    </dd>
                                    <dt>邮政编码:</dt>
                                    <dd class="">
                                        <i>*</i>
                                        <input type="text" name="postcode" value="" class="tpostcode">
                                    </dd>
                                    <dt>街道地址:</dt>
                                    <dd class="">
                                        <i>*</i>
                                        <textarea name="address" id="" cols="110" rows="4" class="taddress"></textarea>
                                        <p class="prompt">请填写街道地址，最少5个字，最多不能超过100个字</p>
                                    </dd>
                                    <dt>收获人姓名:</dt>
                                    <dd class="">
                                        <i>*</i>
                                        <input type="text" name="name" value="" id="tname">
                                    </dd>
                                    <dt>手机:</dt>
                                    <dd class="">
                                        <i>*</i>
                                        <input type="text" name="phone" value="" class="tphone">
                                    </dd>
                                    <dd class="pt10 oper_btn">
                                        <input type="submit" class="tconfirm_btn J_okbtn mr10">
                                        <a href="javascript:;" class="tcancel_btn">取消</a>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <!-- 隐藏展示框 -->
                        <?php if(is_array($info)): foreach($info as $key=>$vo): ?><div class="taddr_section default" aid="53029993" style="display:block;" >
                            <input id="adr<?php echo ($vo['id']); ?>" type="radio" value="<?php echo ($vo['id']); ?>" class="tdefault" <?php if($vo['default'] == 1): ?>checked<?php endif; ?>>
                            <ul class="tclearfix">
                                <li class="s_name" data-name="<?php echo ($vo['name']); ?>"><?php echo ($vo['name']); ?></li>
                                <li class="addr">
                                    <span><?php echo ($vo['sheng']); ?></span><span><?php echo ($vo['shi']); ?></span><span><?php echo ($vo['xian']); ?></span><span><?php echo ($vo['address']); ?></span>
                                </li>
                                <li class="zcode"><?php echo ($vo['postcode']); ?></li>
                                <li class="mobile"><?php echo ($vo['phone']); ?></li>
                                <li class="oper">
                                    <a href="javascript:;" index="<?php echo ($vo['id']); ?>" class="t_default">默认地址</a>
                                    <a href="javascript:;" index="<?php echo ($vo['id']); ?>" class="t_edit">编辑</a>
                                    <a href="javascript:;" index="<?php echo ($vo['id']); ?>" class="t_del" onclick="tdel($(this))">删除</a>
                                </li>
                               <!--  <li class="enaddr"></li> -->
                            </ul>
                        </div>
                        <script>
                        function tdel(obj){
                            var id = obj.attr('index');
                            var url = 'delress';
                            // var id = $(this).attr('index');
                            $.get(url,{id:id},function(msg){
                                if(msg){
                                    obj.parent().parent().parent().remove();
                                }
                            })
                        }
                        </script><?php endforeach; endif; ?>
                    </form>
                </div>
            </div>
            <!-- 退货说明 -->
            <div class="tuihuo_intro">
                <label>退货说明：</label>
                <div class="ctrl J_intro">
                    <div class="show_stage">
                        <textarea class="showedit" placeholder="退货说明中可对退货的相关事宜进行备注"></textarea>
                    </div>

                    <div class="oper">
                        <a href="javascript:;" class="edit stage_hide">编辑</a>
                        <a href="javascript:;" class="del nobd stage_hide">删除</a>
                        <a href="javascript:;" class="save nobd">保存</a>
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

<script src="/Public/Home/js/userinfo.js"></script>

</body>
</html>