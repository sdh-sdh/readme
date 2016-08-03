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
    <link rel="stylesheet" href="/Public/Home/css/orderDetail.css">
    <link rel="stylesheet" href="/Public/Home/css/Detailsee.css">

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
		<!-- 中间区域 -->
		<div id="body_wrap">
	    <div id="body" class="fm960">
			<div class="muorder">
	    		<div class="mu_wrap">
			        <h2 class="mu_head">订单详情</h2>
			        <!-- 订单时间 -->
			        <div class="mu_d_lines mu_d_mrgin">
			            <span class="mw">订单编号: <?php echo ($order["ordernum"]); ?></span>
			            <span class="mw">当前状态: <span class="cancel">交易取消</span></span>
			        </div>
			        <!-- 订单进度 -->
			        <!-- 普通订单进度 -->
					<div class="md_process mu_d_mrgin">
					    <div class="md_process_wrap md_process_step1">
					        <!-- class: step样式不加为全黑，md_process_step1 为第一步，依次类推 -->
					        <div class="md_process_sd"></div>
					        <i class="md_process_i md_process_i1">
					            1
					            <span class="md_process_tip">提交订单</span>
					            <span class="md_process_tip_bt"><?php echo (date( "Y-m-d H:i:s",$order["ordertime"])); ?></span></i>
					        <i class="md_process_i md_process_i2">
					            2
					            <span class="md_process_tip">买家支付</span>
					                    </i>
					        <i class="md_process_i md_process_i3">
					            3
					            <span class="md_process_tip">卖家发货</span>
					                    </i>
					        <i class="md_process_i md_process_i4">
					            4
					            <span class="md_process_tip">确认收货</span>
					                    </i>
					        <i class="md_process_i md_process_i5">5<span class="md_process_tip">评价</span></i>
					    </div>
					</div>
			        <!-- 详细信息 start-->
			        <div class="mu_d_info">
			        <h5 class="mu_d_info_tit">详细信息</h5>
			            <dl class="mu_d_infolist">
			                <dt>收 货 人：</dt>
			                <dd><?php echo ($order["name"]); ?></dd>
			                <dt>收货地址：</dt>
			                <dd><?php echo ($order["sheng"]); ?> <?php echo ($order["shi"]); ?> <?php echo ($order["xian"]); ?> <?php echo ($order["adress"]); ?></dd>
			                <dt>收货邮编：</dt>
			                <dd><?php echo ($order["postcode"]); ?></dd>
			                <dt>联系电话：</dt>
			                <dd><?php echo ($order["phone"]); ?></dd>
			            </dl>
					</div>
			        <!-- 详细信息 end-->
			        <div class="mu_d_orderlist mu_d_mrgin">
			            <h5 class="mu_d_info_tit">商品清单</h5>
						<!-- 订单列表 start-->
			            <!-- order list -->
						<ul class="mo_orderlist">
						    <!-- 已发货多个商品 -->
						    <li class="mo_orderitem">
						        <ul class="mo_orderitem_thlist clearfix">
						            <li class="td_goods">商品</li>
						            <li class="td_price">单价（元）</li>
						            <li class="td_count">　　</li>
						            <li class="td_wipay">交易状态</li>
						            <li class="td_ictrl">店铺优惠</li>
						            <li class="td_afmak">全场优惠</li>
						            <li class="td_total">订单额（元）</li>
						        </ul>
				        <!-- 商品信息 -->
				        		<ul class="mo_orderitem_det clearfix">
						            <li class="td_colrow">
						                <!-- loop1 -->
						                <?php if(is_array($order['myattr'])): foreach($order['myattr'] as $key=>$goods): ?><ul class="td_colrow_wrap clearfix">
						                    <li class="td_goods">
						                        <div class="td_wrap txtleft">
						                            <a href="javascript:;" title="(年末新品）<?php echo ($goods['goodname']); ?>" target="_blank">
						                                <img class="mo_orderitem_gdimg" src="<?php echo ($goods['goodpic']); ?>" width="60" height="60" alt="(年末新品）<?php echo ($goods['goodname']); ?>" title="(年末新品）<?php echo ($goods['goodname']); ?>">
						                            </a>
						                            <p class="mo_orderitem_h mo_orderitem_gdinfo mb4">
							                            <a href="javascript:;" title="(年末新品）<?php echo ($goods['goodname']); ?>" target="_blank">(年末新品）<?php echo ($goods['goodname']); ?></a>
						                            </p>
						                            <?php if(is_array($goods['attr_v'])): foreach($goods['attr_v'] as $key=>$attr_val): ?><p class="mo_orderitem_d mo_orderitem_gdinfo"><?php echo ($attr_val); ?></p><?php endforeach; endif; ?>
						                        </div>
						                    </li>
						                    <li class="td_price">
						                        <div class="td_wrap">
						                            <p class="mu_money mu_org_money">¥ <?php echo ($goods['nowprice']); ?></p>
						                            <p class="mu_money">¥ <?php echo ($goods['price']); ?></p>
						                        </div>
						                    </li>
			            				</ul><?php endforeach; endif; ?>
			                            <!-- loop1 end -->
			        				</li>
						            <li class="td_wipay mo_orderitem_lfence">
						                <div class="td_wrap">
						                    <span class="cancel">交易取消</span>
						                </div>
						            </li>
						            <li class="td_ictrl mo_orderitem_lfence">
						                <div class="td_wrap">
						                    <p class="mu_d_discount">未使用店铺优惠券</p>
						                </div>
						            </li>
						            <li class="td_afmak mo_orderitem_lfence">
						                <div class="td_wrap">
						                    <p class="mu_d_discount">无优惠</p>
						                </div>
						            </li>
						            <li class="td_total mo_orderitem_lfence">
						                <div class="td_wrap">
						                    <span class="mo_orderitem_money_gray mu_money">¥ <?php echo ($order['orderprice']); ?>.00</span>
						                </div>
						            </li>
			    				</ul>
			    			</li>
		                <!-- 商品信息 end -->
						</ul>
			            <!-- 订单列表 end-->
			            <!-- 订单备注 start-->
			            <dl class="mu_d_infolist">
			                <dt>买家备注：</dt>
			                <dd>快递公司 [全国包邮]</dd>
			            </dl>
			            <!-- 订单备注 end-->
					</div>


					<div class="mu_browser_content_wrap" data-param="{&quot;scene&quot;:&quot;detail4buyer&quot;, &quot;cmsid&quot;:2984, &quot;ptraceid&quot;:&quot;trade_order_detail4buyer_2ul9yvgkg7wg&quot;}">
		                <div class="mu_browser">
		                    <div class="mu_browser_h">
		                        <h5>
		                            <a href="javascript:;" class="c mu_last_viewed J_click" trigger="muBrowserSilde_01">最近浏览过的</a>
		                        </h5>
		                    </div>
		                     <!--最近浏览 start-->
		                	<div id="muBrowserSilde_01" class="muBrowserSilde" data-step="6">
		                		<div class="mu_browser_h">
		                            <div class="mu_browser_h_wrap">
		                                <ul data-type="last_browser" class="mu_browser_curwrap fr ms_tips">
		                                    <li><!-- <a href="javascript:;" class="ms_item c"></a> --></li>
		                                    <li><!-- <a href="javascript:;" class="ms_item"></a> --></li>
		                                </ul>
		                                <!--最近浏览 end-->
		                                <!--最近浏览推荐关键字 start-->
		                                <p data-type="last_browser" class="key_words fr">
		                                    <a href="javascript:;" target="_blank" title="墨镜">墨镜</a> | <a href="javascript:;" target="_blank" title="手拿包">手拿包</a> | <a href="javascript:;" target="_blank" title="单鞋">单鞋</a> | <a href="javascript:;" target="_blank" title="热裤">热裤</a> | <a href="javascript:;" target="_blank" title="春夏睡衣">春夏睡衣</a> | <a href="javascript:;" target="_blank" title="N字鞋">N字鞋</a>
		                                </p>
		                                <!--最近浏览推荐关键字 end-->
		                            </div>
		                        </div>
		                        <div class="mu_browser_list_wrap">
		                        <!--最近浏览 start-->
		                			<ul data-type="last_browser" class="mu_browser_list clearfix ms_slider" id="roll" style="left: 0px;">
		                                <li class="ms_item">
			        						<a href="javascript:;" class="mu_browser_img_a" target="_blank" title="澳洲Aveeno燕麦护手霜，长效滋养，敏感肌肤也能用哦~">
			        						  <img src="/Public/Home/images/1s0xkb_170x170.jpg" width="134" alt="澳洲Aveeno燕麦护手霜，长效滋养，敏感肌肤也能用哦~" title="澳洲Aveeno燕麦护手霜，长效滋养，敏感肌肤也能用哦~">
			        						</a>
			        						<a class="mu_browser_t mu_hoverline singleline" href="javascript:;" title="澳洲Aveeno燕麦护手霜，长效滋养，敏感肌肤也能用哦~" target="_blank">澳洲Aveeno燕麦护手霜...</a>
			        						<p class="mu_browser_p clearfix">
			        							<span class="fl mu_red">¥ 88.00</span>
			        						</p>
			        						<p class="mu_lightgray mu_browser_x">销量12</p>
		        						</li>
		        						<li class="ms_item">
		        							<a href="javascript:;" class="mu_browser_img_a" target="_blank" title="(年末新品）韩版潮新款时尚跑步运动鞋">
		        								<img src="/Public/Home/images/1ngme2_170x170.jpg" width="134" alt="(年末新品）韩版潮新款时尚跑步运动鞋" title="(年末新品）韩版潮新款时尚跑步运动鞋">
		        							</a>
		        							<a class="mu_browser_t mu_hoverline singleline" href="javascript:;" title="(年末新品）韩版潮新款时尚跑步运动鞋" target="_blank">(年末新品）韩版潮新款...</a>
		        							<p class="mu_browser_p clearfix">
		        								<span class="fl mu_red">¥ 66.85</span>
		        								<span class="fl mu_tip_green mt1 ml10">6.5折</span>
		        							</p>
		        							<p class="mu_lightgray mu_browser_x">销量139</p>
		        						</li>
		        						<li class="ms_item">
		        							<a href="javascript:;" class="mu_browser_img_a" target="_blank" title="*木子*复古拼接手提单肩斜挎包（送小熊）">
		        								<img src="/Public/Home/images/n3qen_170x170.jpg" width="134" alt="*木子*复古拼接手提单肩斜挎包（送小熊）" title="*木子*复古拼接手提单肩斜挎包（送小熊）">
		        							</a>
		        							<a class="mu_browser_t mu_hoverline singleline" href="javascript:;" title="*木子*复古拼接手提单肩斜挎包（送小熊）" target="_blank">*木子*复古拼接手提单...</a>
		        							<p class="mu_browser_p clearfix">
		        								<span class="fl mu_red">¥ 68.00</span>
		        								<span class="fl mu_tip_green mt1 ml10">7折</span>
		        							</p>
		        							<p class="mu_lightgray mu_browser_x">销量409</p>
		        						</li>
		        						<li class="ms_item">
		        							<a href="javascript:;" class="mu_browser_img_a" target="_blank" title="爱尚女包 韩国新款百搭蝙蝠单肩包">
		        								<img src="/Public/Home/images/11ovry_170x170.jpg" width="134" alt="爱尚女包 韩国新款百搭蝙蝠单肩包" title="爱尚女包 韩国新款百搭蝙蝠单肩包">
		        							</a>
		        							<a class="mu_browser_t mu_hoverline singleline" href="javascript:;" title="爱尚女包 韩国新款百搭蝙蝠单肩包" target="_blank">爱尚女包 韩国新款百搭...</a>
		        							<p class="mu_browser_p clearfix">
		        								<span class="fl mu_red">¥ 69.00</span>
		        								<span class="fl mu_tip_green mt1 ml10">7折</span>
		        							</p>
		        							<p class="mu_lightgray mu_browser_x">销量2</p>
		        						</li>
		        						<li class="ms_item">
		        							<a href="javascript:;" class="mu_browser_img_a" target="_blank" title="【乌拉拉】休闲连帽连衣裙">
		        								<img src="/Public/Home/images/i1rap_170x170.jpg" width="134" alt="【乌拉拉】休闲连帽连衣裙" title="【乌拉拉】休闲连帽连衣裙">
		        							</a>
		        							<a class="mu_browser_t mu_hoverline singleline" href="javascript:;" title="【乌拉拉】休闲连帽连衣裙" target="_blank">【乌拉拉】休闲连帽连...</a>
		        							<p class="mu_browser_p clearfix">
		        								<span class="fl mu_red">¥ 49.30</span>
		        								<span class="fl mu_tip_green mt1 ml10">5.8折</span>
		        							</p>
		        							<p class="mu_lightgray mu_browser_x">销量415</p>
		        						</li>
		        						<li class="ms_item">
		        							<a href="javascript:;" class="mu_browser_img_a" target="_blank" title="【yoka】促销大回馈！亏本甩卖雪地靴">
		        								<img src="/Public/Home/images/1gr24n_170x170.jpg" width="134" alt="【yoka】促销大回馈！亏本甩卖雪地靴" title="【yoka】促销大回馈！亏本甩卖雪地靴">
		        							</a>
		        							<a class="mu_browser_t mu_hoverline singleline" href="javascript:;" title="【yoka】促销大回馈！亏本甩卖雪地靴" target="_blank">【yoka】促销大回馈！...</a>
		        							<p class="mu_browser_p clearfix">
		        								<span class="fl mu_red">¥ 39.90</span>
		        								<span class="fl mu_tip_green mt1 ml10">7折</span>
		        							</p>
		        							<p class="mu_lightgray mu_browser_x">销量9184</p>
		        						</li>
		        						<li class="ms_item">
		        							<a href="javascript:;" class="mu_browser_img_a" target="_blank" title="【韩味服饰】韩版麂皮绒牛角扣长款拼接羊羔毛棉服外套棉衣">
		        								<img src="/Public/Home/images/11gcf9_170x170.jpg" width="134" alt="【韩味服饰】韩版麂皮绒牛角扣长款拼接羊羔毛棉服外套棉衣" title="【韩味服饰】韩版麂皮绒牛角扣长款拼接羊羔毛棉服外套棉衣">
		        							</a>
		        							<a class="mu_browser_t mu_hoverline singleline" href="javascript:;" title="【韩味服饰】韩版麂皮绒牛角扣长款拼接羊羔毛棉服外套棉衣" target="_blank">【韩味服饰】韩版麂皮...</a>
		        							<p class="mu_browser_p clearfix">
		        								<span class="fl mu_red">¥ 128.10</span>
		        								<span class="fl mu_tip_green mt1 ml10">7折</span>
		        							</p>
		        							<p class="mu_lightgray mu_browser_x">销量98</p>
		        						</li>
		        						<li class="ms_item">
		        							<a href="javascript:;" class="mu_browser_img_a" target="_blank" title="冬季新品 韩版高腰弹力显瘦小脚牛仔裤">
		        								<img src="/Public/Home/images/126nhf_170x170.jpg" width="134" alt="冬季新品 韩版高腰弹力显瘦小脚牛仔裤" title="冬季新品 韩版高腰弹力显瘦小脚牛仔裤">
		        							</a>
		        							<a class="mu_browser_t mu_hoverline singleline" href="javascript:;" title="冬季新品 韩版高腰弹力显瘦小脚牛仔裤" target="_blank">冬季新品 韩版高腰弹力...</a>
		        							<p class="mu_browser_p clearfix">
		        								<span class="fl mu_red">¥ 55.00</span>
		        								<span class="fl mu_tip_green mt1 ml10">7折</span>
		        							</p>
		        							<p class="mu_lightgray mu_browser_x">销量25815</p>
		        						</li>
		                			</ul>
		                			<!--最近浏览 end-->
		                		</div>
		                	</div>
		                    <!--最近浏览 end-->
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

<script src="/Public/Home/js/userOrder.js"></script>
<script type="text/javascript">

		$(function(){
			//将下标为零的隐藏,为6的显示
			function piao(){
				if($('.mu_browser_list_wrap').find('li').index() == 0){
					$('.mu_browser_list_wrap').find('li:eq(0)').css('display','none');
					$('.mu_browser_list_wrap').find('li:eq(6)').css('display','block');
					var zero = $('.mu_browser_list_wrap').find('li:eq(0)');
					$('.mu_browser_list_wrap').find('li:eq(7)').after(zero);
				}
			}
			setInterval(function(){
				piao();

			},1000)

 		})
</script>

</body>
</html>