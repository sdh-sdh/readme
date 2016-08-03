<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <title><?php echo ($shops[0][title]); ?></title>
    <meta name="keywords" content="<?php echo ($shops[0][keywords]); ?>"/>
    <meta name="description" content="<?php echo ($shops[0][description]); ?>"/>

	<link rel="icon" href="/Public/Home/images/favicon32.ico" type="image/x-icon"/>
    <meta name="copyright" content="<?php echo ($config['content']); ?>"/>
    <link rel="stylesheet" href="/Public/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/Home/css/css.css">
    
	<link rel="stylesheet" href="/Public/Home/css/sort.css">
	<style type="text/css">
		body {
			  background-color:  <?php echo $shops[0]['shopcolor'] ?>
;
			  background-repeat: repeat;
			  background-position: undefined top;
			}
		.footer {
		  background-color: #f5f5f5;
		  border-top: 1px solid #ddd;
		  /*width: 1349px;*/
		  margin: 0px -75px;
		}
	</style>

</head>
<body>

<!-- 头部-->

	<!-- 店铺公共头部-店铺信息 start -->
	<div id="header" class="header_2015">
		<div class="wrap clearfix">
			<a href="<?php echo U('Home/Index/index');?>" class="home fl">蘑菇街首页</a>
			<ul class="header_top"  style="width:550px">
				<?php if(empty($_SESSION['home'])): ?><li class="s1 show-nologin has_line"><a rel="nofollow" href="<?php echo U('Home/User/register');?>">注册</a></li>
				<li class="s1 show-nologin has_line"><a rel="nofollow" href="<?php echo U('Home/User/login');?>" style="padding-left:10px;">登录</a></li>
				<?php else: ?>
				<li class="s1 show-nologin has_line"><a rel="nofollow" href="<?php echo U('Home/Userinfo/userinfo');?>" style="color:red">您好：<?php echo ($ud['nickname']); ?></a></li>
				<li class="s1 show-nologin has_line logut"><a rel="nofollow" href="javascript:;">注销</a></li><?php endif; ?>
				<li class="s1 has_line "><a href="" target="_blank" class="text display_u" ref="nofollow" style="padding-left:10px;">我的订单</a></li>
				<li class="s1 has_line has_icon custom_item cas">
                	<a rel="nofollow" href="<?php echo U('Home/Collect/index');?>" style="padding-left:10px;" target="_blank">我的收藏</a>
                	<i class="icon_delta"></i>
                	<ol class="ext_mode ccc" style="display:none;">
                    	<li class="s2"><a target="_blank" rel="nofollow" href="/index.php/Home/Collect/index/state/2">收藏的小店</a></li>
                    	<li class="s2"><a rel="nofollow" href="/index.php/Home/Collect/index/state/1" target="_blank">喜欢的商品</a></li>
                    	<li class="s2"><a rel="nofollow" href="/index.php/Home/Collect/index/state/3" target="_blank">浏览足迹</a></li>

                	</ol>
            	</li>
				<li class="s1 has_line has_icon custom_item css">
                	<a rel="nofollow" href="" style="padding-left:10px;" target="_blank">客户服务</a>
                	<i class="icon_delta"></i>
                	<ol class="ext_mode sss" style="display:none;">
                    	<li class="s2"><a target="_blank" rel="nofollow" href="<?php echo U('Home/Sort/control');?>">联系合作</a></li>
                    	<li class="s2"><a rel="nofollow" href="" target="_blank">帮助</a></li>
                	</ol>
            	</li>
            	<li class="s1 has_line myxiaodian"><a href="<?php echo U('Home/Sort/control');?>" ref="nofollow" target="_blank" class="text display_u">我的小店</a>
            </li>
			</ul>
		</div>
	</div>


	<div class="shop-header">
		<div class="header clearfix">
			<div class="user-info fl">
				<a href="" class="avatar" title="<?php echo ($shops[0][shopname]); ?>"><img class="face fl" src="/<?php echo ($shops[0][userpic]); ?>"></a>
				<div class="shop-name fl">
            		<div class="name-wrap clearfix">
                		<a href="" class="name fl" title="<?php echo ($shops[0][shopname]); ?>" data-ptp-idx="16"><?php echo ($shops[0][shopname]); ?></a>
            		</div>
            			<!-- 评分信息 -->
            		<div class="shop-score" id="d_shop-score">
	                    <p> 
	                    	<span class="s-cat">描述<b>4.64</b></span>
	                        <span class="s-cat">质量<b>4.64</b></span>
	                        <span class="s-cat">价格<b>4.64</b></span>
	                        <span class="s-cat">服务<b>4.60</b></span>
	                    </p>
                				<!-- 下拉列表 -->
                		<div class="shop-info" style="display:none;">
                			<div class="shop-info-content clearfix">
                				<div class="info-box fl">
	                    			<ol class="li li3">
	                    				<li><span class="tag">所在地区：</span><?php echo ($shops[0]['area']); ?></li>
	                    				<li><span class="tag">商品数：</span><?php echo ($con); ?></li>
	                    				<li><span class="tag">收藏数：</span>30725</li>
	                    				<li><span class="tag">销售量：</span>12.5 万</li>
	                    				<li><span class="tag">创建时间：</span><?php echo date('Y-m-d',$shops[0]['shoptime']);?></li>
	                    				<li><span class="tag">店铺保证金：</span>已缴纳</li>
	                    				<li class="tc mt10"><a class="go-detail" href="" target="_blank" rel="nofollow" data-ptp-idx="17">查看详情</a></li>
	                    			</ol>
	                    		</div>
	                    		<ol class="li li1">
	                    			<li class="title">动态评分</li>
	                    			<li>描述相符：<span class="num">4.64</span></li>
	                    			<li>质量满意：<span class="num">4.64</span></li>
	                    			<li>价格合理：<span class="num">4.64</span></li>
	                    			<li>服务周到：<span class="num">4.6</span></li>
	                    		</ol>
	                    		<ol class="li li2">
	                    			<li class="title">比同行平均</li>
	                    			<li><span class="tag up">高</span><span class="num">3.34%</span></li>
	                    			<li><span class="tag up">高</span><span class="num">3.34%</span></li>
	                    			<li><span class="tag up">高</span><span class="num">3.34%</span></li>
	                    			<li><span class="tag up">高</span><span class="num">0.66%</span></li>
	                    		</ol>
	                    		<ol class="li li4">
	                    			<li class="title"> 本店 </li>
	                    			<li>平均发货时间：<span class="num">1.06</span>天</li>
	                    			<li>退货率：<span class="low">11.05</span>%</li>
	                    			<li>有效投诉率：<span class="low">0.22</span>%</li>
	                    		</ol>
	                    		<ol class="li li5">
	                    			<li class="title"> 行业 </li>
	                    			<li>1.09 天</li>
	                    			<li>6.77 %</li>
	                    			<li>0.07 %</li>
	                    		</ol>
                			</div>
                		</div>
            		</div>
        		</div>        		
        		<div class="shop-action fl">
        			<div class="shop-flow fl ">
        				<?php if($c[0]['state'] == 2): ?><a class="J-shop-follow shop-follow fl shop-followed" rel="nofollow" href="javascript:;" data-shopid="14ryk">已收藏</a>
        				<?php else: ?>
        					<a class="J-shop-follow shop-follow header-icons " rel="nofollow" href="javascript:;">收藏</a><?php endif; ?>
        			</div>
        			<a href="javascript:;" class="chart fl clearfix" data-ptp-idx="19">
                        <div class="mogutalk_widget_btn kefu fl">
                        	<iframe src="/Public/Home/image/sl.gif" width="48" height="20" frameborder="0" scrolling="no" marginheight="0" allowtransparency="true"></iframe>
                        </div>
                    </a>
        		</div>
        		<div class="line-right fr"></div>
			</div>
			<div class="shop-search">
				<div id="nav_search_form" id="top_nav_search">
					<form action="" target="_blank" method="get" id="top_nav_form">
						<div class="text-wrap clearfix">
							<input type="text" id="J_SearchKey" class="text ts_txt" autocomplete="off" name="q" placeholder="输入你想要的商品">
							<a href="javascript:;" id="J_SearchInShop" class="search-inshop">搜本店</a>
							<input type="submit" class="submit-btn" value="搜全站">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	


</div>
<!-- 头部 logo  搜索-->


	



		
    


	<div class="ovbox mod_topBanner">
		<div class="mod_list clearfix">
			<div class="mod_item w1200">    
				<div class="mod_cont topbanner">
                	<a class="shop_bg_img" href="" style="background: url(<?php echo ($shops[0]['shoplogo']); ?>) center no-repeat"></a>
                </div>
            </div>
        </div>
    </div>		
    <div class="ovbox mod_topNav blackStyle">
    	<div class="mod_list clearfix">
    		<div class="mod_item">    
    			<div class="mod_cont topNav">
					<ol class="clearfix">
						<li><a href="/index.php/Home/Sorts/index/uid/<?php echo ($shopo[0]['uid']); ?>">首页</a></li>
                		<li class="all"><a href="/index.php/Home/Sorts/index/uid/<?php echo ($shopo[0]['uid']); ?>" class="al">全部商品</a>
                		<dl style="display:none">
                				<?php if(is_array($shopo)): foreach($shopo as $key=>$vo): ?><dd><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["aname"]); ?></a></dd><?php endforeach; endif; ?>
                    		</dl>
                    		
                		</li>
                		<?php if(is_array($shopo)): foreach($shopo as $key=>$v): ?><li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["aname"]); ?></a></li><?php endforeach; endif; ?>
        			</ol>
				</div>
			</div>
		</div>
	</div>
	
	<div class="ovbox mod_topSilderBanner">
		<div class="mod_list clearfix">
			<div class="mod_item w1200">  
	      		<div class="mod_cont topSliderBanner">
        			<div class="tempitem">
            			<div class="tabbox switchbox">
                			<div class="switchable-content" style="position: relative;">
                            	<a href="" style=" opacity: 1; position: absolute; z-index: 9; background: url(/Public/Home/image/d.jpg) 50% 50% no-repeat white;" target="_blank" class="switchable-panel-internal"></a>
                            </div>
            			</div>
        			</div>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="shop-main">
    	<div class="ovbox mod_promotions">
    		<div class="mod_list clearfix">
    			<div class="mod_item w1200">
    				<div class="mod_cont coupon clearfix">
    					<span title="店铺优惠" class="c_title fl"></span>
    					<ol class="coupon_wrap fl clearfix">
                            <li><div class="c_item_empty c_"></div></li>
                            <li><div class="c_item_empty c_"></div></li>
                            <li><div class="c_item_empty c_"></div></li>
                            <li class="last"><div class="c_item_empty c_"></div></li>
        				</ol>
    				</div>
    			</div>
    		</div>
    	</div>
    	<?php if(!empty($goods)) { ?>
    	<div class="ovbox mod_customWall">
	    	<div class="mod_list clearfix">
	    		<div class="mod_item w1200" >       
	    			<div class="custom_wall_box">
	        			<div class="title">
	            			<span class="text_area fl">新款</span>
	        			</div>
	        			<div class="feedsbox ovbox">
	            			<div class="lists_box clearfix">
	            				<?php if(is_array($goods)): foreach($goods as $key=>$vo): ?><div class="wall_box">
	                                <div class="feed_box" data-feedid="">
	                                    <div class="img_box">
	                                		<a href="/index.php/Home/Detail/index/id/<?php echo ($vo['id']); ?>" target="_blank">
	                                    		<img src="<?php echo ($vo['goodpic']); ?>">
	                                		</a>
	                            		</div>
	                            		<div class="title_box"><?php echo ($vo['goodname']); ?></div>
	                            		<div class="price_box clearfix">
	                                		<span class="yuan">￥</span>
	                                		<span class="num"><?php echo ($vo['nowprice']); ?></span>
	                            		</div>
	                        		</div>
	                            </div><?php endforeach; endif; ?>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <?php }else{ '' ;}?>
	    <?php if(!empty($goods1)) { ?>
	    <div class="ovbox mod_customWall">
	        <div class="mod_list clearfix">
	            <div class="mod_item w1200">        
	                <div class="custom_wall_box">
	        			<div class="title">
	            			<span class="text_area fl">冬装新品</span>
	        			</div>
	        			<div class="feedsbox ovbox">
	            			<div class="lists_box clearfix">
	                			<?php if(is_array($goods1)): foreach($goods1 as $key=>$vo): ?><div class="wall_box">
	                                <div class="feed_box" data-feedid="">
	                                    <div class="img_box">
	                                		<a href="/index.php/Home/Detail/index/id/<?php echo ($vo['id']); ?>" target="_blank">
	                                    		<img src="<?php echo ($vo['goodpic']); ?>">
	                                		</a>
	                            		</div>
	                            		<div class="title_box"><?php echo ($vo['goodname']); ?></div>
	                            		<div class="price_box clearfix">
	                                		<span class="yuan">￥</span>
	                                		<span class="num"><?php echo ($vo['nowprice']); ?></span>
	                            		</div>
	                        		</div>
	                            </div><?php endforeach; endif; ?>
	            			</div>
	        			</div>
	    			</div>
				</div>
        	</div>
		</div>
		<?php }else{ '' ;}?>
		<?php if(!empty($goods2)) { ?>
		<div class="ovbox mod_customWall">
	        <div class="mod_list clearfix">
	            <div class="mod_item w1200">        
	                <div class="custom_wall_box">
	        			<div class="title">
	            			<span class="text_area fl">韩版时尚</span>
	        			</div>
	        			<div class="feedsbox ovbox">
	            			<div class="lists_box clearfix">
	                			<?php if(is_array($goods2)): foreach($goods2 as $key=>$vo): ?><div class="wall_box">
	                                <div class="feed_box" data-feedid="">
	                                    <div class="img_box">
	                                		<a href="/index.php/Home/Detail/index/id/<?php echo ($vo['id']); ?>" target="_blank">
	                                    		<img src="<?php echo ($vo['goodpic']); ?>">
	                                		</a>
	                            		</div>
	                            		<div class="title_box"><?php echo ($vo['goodname']); ?></div>
	                            		<div class="price_box clearfix">
	                                		<span class="yuan">￥</span>
	                                		<span class="num"><?php echo ($vo['nowprice']); ?></span>
	                            		</div>
	                        		</div>
	                            </div><?php endforeach; endif; ?>
	            			</div>
	        			</div>
	    			</div>
				</div>
        	</div>
		</div>
		<?php }else{ '' ;}?>
		<?php if(!empty($goods3)) { ?>
		<div class="ovbox mod_customWall">
	        <div class="mod_list clearfix">
	            <div class="mod_item w1200">        
	                <div class="custom_wall_box">
	        			<div class="title">
	            			<span class="text_area fl">冬装火爆</span>
	        			</div>
	        			<div class="feedsbox ovbox">
	            			<div class="lists_box clearfix">
	                			<?php if(is_array($goods3)): foreach($goods3 as $key=>$vo): ?><div class="wall_box">
	                                <div class="feed_box" data-feedid="">
	                                    <div class="img_box">
	                                		<a href="/index.php/Home/Detail/index/id/<?php echo ($vo['id']); ?>" target="_blank">
	                                    		<img src="<?php echo ($vo['goodpic']); ?>">
	                                		</a>
	                            		</div>
	                            		<div class="title_box"><?php echo ($vo['goodname']); ?></div>
	                            		<div class="price_box clearfix">
	                                		<span class="yuan">￥</span>
	                                		<span class="num"><?php echo ($vo['nowprice']); ?></span>
	                            		</div>
	                        		</div>
	                            </div><?php endforeach; endif; ?>
	            			</div>
	        			</div>
	    			</div>
				</div>
        	</div>
		</div>
		<?php }else{ '' ;}?>
		<div class="shop-feed" id="shopFeed" data-ptp="_items">
        	<div class="nav">
	            <ul class="clearfix">
	                <li class="first current"><a href="">热门</a></li>
	                <li ><a href="">最新</a></li>
	                <li ><a href="">销量</a></li>
	            </ul>
        	</div>
				<?php if(is_array($goods4)): foreach($goods4 as $key=>$v): ?><div class="list imagewall clearfix" id="J_ShopFeedList">
	        		<div class="item i_w_f youdian" tid="0">
	    				<a href="/index.php/Home/Detail/index/id/<?php echo ($v['id']); ?>" class="img" target="_blank" data-ptp-idx="105"><img width="225" src="<?php echo ($v['goodpic']); ?>"></a>
	        			<div class="favorite">
	        			<a class="favaImg" href="javascript:;"></a>
	    			</div>
	    			<p class="title">
	        			<a href="" target="_blank" data-ptp-idx="107"><?php echo ($v['goodname']); ?></a>
	    			</p>
	    			<div class="goods-info clearfix">
	        			<b class="price"><i>￥</i><?php echo ($v['nowprice']); ?></b>
	                	<span class="fav-num"><?php echo ($v["collect"]); ?></span>
	    			</div>
				</div><?php endforeach; endif; ?>
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

	<script type="text/javascript" src="/Public/Home/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="/Public/Home/js/sort.js"></script>
	<script type="text/javascript">
		$('.shop-flow').click(function(){
			 var uid = "<?php echo ($_SESSION['home']['id']); ?>";
			 var fav = $(this);
             var url = location.href;
             if(uid){
                var id="<?php echo ($shopo["0"]["shopid"]); ?>";
                $.ajax({
                    url:"<?php echo U('Home/Sorts/shoucang');?>",  //请求地址
                    type:"post",        //请求方式
                    data:{id:id,url:url},//发送数据
                    async:true,         
                    dataType:"json",    //响应数据格式
                    success:function(data){ //成功回调函数
                        if(data==1){
                        	fav.html('<a class="J-shop-follow shop-follow fl shop-followed" rel="nofollow" href="javascript:;" data-shopid="14ryk">已收藏</a>');
                        }else{
                            fav.html('<a class="J-shop-follow shop-follow header-icons fl " rel="nofollow" href="javascript:;">收藏</a>');
                        }
                    },
                    error:function(){   //失败回调函数
                        alert("ajax请求失败!");
                    }   
                });
            }else{
                location.href="<?php echo U('Home/User/login');?>"
            }
		});
		var logut = "<?php echo U('Home/Sorts/loginOut');?>";
	</script>

</body>
</html>