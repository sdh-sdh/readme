<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <title>蘑菇街 - 我的买手街！</title>

	<link rel="icon" href="/Public/Home/images/favicon32.ico" type="image/x-icon"/>
    <meta name="copyright" content="<?php echo ($config['content']); ?>"/>
    <link rel="stylesheet" href="/Public/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/Home/css/css.css">
    
<link rel="stylesheet" href="/Public/Home/css/sort.css">
<link rel="stylesheet" href="/Public/Home/css/collect.css">

</head>
<body>

<!-- 头部-->

	<div id="header" class="header_2015">
		<div class="wrap clearfix">
			<a href="<?php echo U('Home/Index/index');?>" class="home fl">蘑菇街首页</a>
			<ul class="header_top" >
            <?php if(empty($_SESSION['home'])): ?><li class="s1 show-nologin has_line"><a rel="nofollow" href="">注册</a></li>
				<li class="s1 show-nologin has_line"><a rel="nofollow" href="" style="padding-left:10px;">登录</a></li>
            <?php else: ?>
                <li class="s1 show-nologin has_line"><a rel="nofollow" href="<?php echo U('Home/Userinfo/userinfo');?>" style="color:red">您好：<?php echo ($sort['nickname']); ?></a></li>
                <li class="s1 show-nologin has_line"><a rel="nofollow" href="<?php echo U('Home/User/loginOut');?>">注销</a></li><?php endif; ?>
				<li class="s1 has_line "><a href="<?php echo U('Home/Userinfo/order');?>" target="_blank" class="text display_u" ref="nofollow" style="padding-left:10px;">我的订单</a></li>
				<li class="s1 has_line has_icon custom_item css">
                	<a rel="nofollow" href="" style="padding-left:10px;" target="_blank">客户服务</a>
                	<i class="icon_delta"></i>
                	<ol class="ext_mode sss" style="display:none;">
                    	<li class="s2"><a target="_blank" rel="nofollow" href="">联系合作</a></li>
                    	<li class="s2"><a rel="nofollow" href="" target="_blank">帮助</a></li>
                	</ol>
            	</li>
            	<li class="s1 has_line myxiaodian"><a href="<?php echo U('Home/Sort/control');?>" ref="nofollow" target="_blank" class="text display_u">我的小店</a>
            </li>
			</ul>
		</div>
	</div>





</div>
<!-- 头部 logo  搜索-->






	



	<div class="wrap">
		<div class="attention_nav">
		    <div class="nav_container clearfix">
		        <span class="attention_logo">我的收藏</span>
		        <ul class="nav_ctrl">
		            <li class="on" data="fav_d"><a href="javascript:;" rel="nofollow">收藏的小店</a></li>
                    <li class="os" data="fav_s"><a href="javascript:;">收藏的商品</a></li>
		            <li class="os" data="fav_z"><a href="javascript:;">浏览足迹</a></li>
		        </ul>
		    </div>
		</div>
        <?php if($_GET['state'] == 1): ?><div class="wrap clearfix was" id="fav_d" style="display:none;">
        <?php elseif($_GET['state'] == 3): ?>
        <div class="wrap clearfix was" id="fav_d" style="display:none;">
        <?php else: ?>
        <div class="wrap clearfix was" id="fav_d"><?php endif; ?>
			<div class="attention_list">
				<div class="fixedbox fixed">
					<div class="result_list">
                    	<ul class="list" style="height:400px;">
                		<?php if(is_array($good)): foreach($good as $key=>$vo): ?><li style="position:relative" class="clearfix coll" data-id="313" data-shopid="14rgy">
                                <a href="/index.php/Home/Sorts/index/uid/<?php echo ($vo["uid"]); ?>" class="hdimg" target="_blank" rel="nofollow" data-ptp-idx="32">
                                	<img src="/<?php echo ($vo['userpic']); ?>" alt="<?php echo ($vo['goodname']); ?>">
                                </a>
                                <div class="detail">
                                    <h4><?php echo ($vo['goodname']); ?></h4>
                                    <p>上新：<span><?php echo ($vo['num']); ?></span></p>
                                     <?php if($vo['num'] != 0): ?><p>最近更新：<?php echo date('Y-m-d',$vo['goodtime']);?></p>
                                <?php else: ?>
                                    <p>最近更新：<?php echo date('Y-m-d',$vo['time']);?></p><?php endif; ?>
                                </div>
                                <a class="cancel" href="javascript:;" rel="nofollow" data-id="<?php echo ($vo['id']); ?>">取消收藏</a>
                            </li><?php endforeach; endif; ?>
                        </ul>
                	</div>
				</div>
			</div>
            <div class="imagewall_wrap" style="min-height: 407px;">
                <div id="imagewall_good" class="shop_show">
                    <div style="height:20px;"></div>
                <?php if(is_array($datas)): foreach($datas as $key=>$vo): if($vo['goodtime'] != null): ?><div class="shop_item"> 
                        <div class="shop_msg clearfix">
                            <h4 class="shop_name"><?php echo ($vo["name"]); ?></h4>
                            <span>最近更新：<?php echo date('Y-m-d',$vo['goodtime']);?></span> 
                        </div> 
                        <div class="image_wall clearfix"> 

                        <?php if(is_array($vo["data"])): foreach($vo["data"] as $key=>$v): ?><div class="iwf"> 
                                <a href="<?php echo U('Home/Detail/index',array('id'=>$v['id']));?>" rel="nofollow" class="img" target="_blank">
                                    <img class="fade-in" alt="优质版小香风针织长袖毛衣+印花包臀裙套装" src="<?php echo ($v["goodpic"]); ?>">
                                </a>
                                <p class="title"><?php echo ($v["goodname"]); ?></p> 
                                <div class="goods_info"> 
                                    <b class="price_info"><i>￥</i><?php echo ($v["nowprice"]); ?></b> 
                                    <span class="update_date"><?php echo date('Y-m-d',$v['goodtime']);?>更新</span> 
                                </div> 
                            </div><?php endforeach; endif; ?> 
                        </div> 
                        <div class="icon"></div>
                    </div>
                    <?php else: endif; endforeach; endif; ?>
                </div>  
            </div>
		</div>
    <?php if($_GET['state'] == 2): ?><div class="my_like_wrap" style="display:none" id="fav_s">
    <?php elseif($_GET['state'] == 3): ?>
        <div class="my_like_wrap" style="display:none" id="fav_s">
    <?php elseif(empty($_GET['state'])): ?>
        <div class="my_like_wrap" style="display:none" id="fav_s">
    <?php else: ?>
        <div class="my_like_wrap" id="fav_s"><?php endif; ?>
            <ul class="my_like_filter clearfix">
                <li><a class="on" href="/active/favs" rel="nofollow"><span>全部商品</span></a></li>
            </ul>
            <div class="my_like_content">
                <div class="my_like_sections clearfix">
                <?php if(is_array($shops)): foreach($shops as $key=>$v): ?><div class="my_like_section" style="min-height:370px;">
                        <a href="/index.php/Home/Detail/index/id/<?php echo ($v["id"]); ?>" class="img" target="_blank" rel="nofollow">
                            <img class="lazy" data-original="http://s18.mogucdn.com/p1/151119/18v7bj_ifrtcnbzge4gcnlggqzdambqhayde_640x960.jpg_225x999.jpg" alt="<?php echo ($v["goodname"]); ?>" src="<?php echo ($v["pic"]); ?>" style="display: inline;">
                        </a>
                        <div class="info_wrap">
                            <p class="base_info clearfix">
                                <a class="title" href="" target="_blank"><?php echo ($v["goodname"]); ?></a>
                            </p>
                            <p class="price_info clearfix">
                                <span class="n_p">￥<?php echo ($v["nowprice"]); ?></span>
                            </p>
                            <span class="fav_num" data-tradeitemid="18ghcv6" data-id="<?php echo ($v['id']); ?>" data-faved="true"><i class="faved"></i><?php echo ($v["collect"]); ?></span>
                        </div>
                    </div><?php endforeach; endif; ?>
                </div>
                <div class="pagination pb30"></div>
            </div>
        </div>
    <?php if($_GET['state'] == 2): ?><div class="my_like_wrap" style="display:none" id="fav_z">
    <?php elseif($_GET['state'] == 1): ?>
        <div class="my_like_wrap" style="display:none" id="fav_z">
    <?php elseif(empty($_GET['state'])): ?>
        <div class="my_like_wrap" style="display:none" id="fav_z">
    <?php else: ?>
        <div class="my_like_wrap" id="fav_z"><?php endif; ?>
            <ul class="my_like_filter clearfix">
                <li><a class="on" href="/active/favs" rel="nofollow"><span>全部商品</span></a></li>
            </ul>
             
            <div class="his_wrap">
                <div class="his_section">
                <?php if(is_array($arr)): foreach($arr as $k=>$v): if($k == date('Y-m-d')): ?><h3 class="section_title first_title clearfix"><b>今天</b><span>
                        共浏览<?php echo count($v);?> 件商品</span></h3>
                    <?php else: ?>
                        <h3 class="section_title first_title clearfix"><b><?php echo ($k); ?></b><span>共浏览<?php echo count($v);?> 件商品</span></h3><?php endif; ?>
                    <div class="my_like_content">
                        <div class="my_like_sections clearfix">
                            <?php if(is_array($v)): foreach($v as $key=>$vo): ?><div class="my_like_section" style="min-height:370px;">
                                    <a href="/index.php/Home/Detail/index/id/<?php echo ($vo["goodid"]); ?>" class="img" target="_blank" rel="nofollow">
                                        <img class="lazy" data-original="http://s18.mogucdn.com/p1/151119/18v7bj_ifrtcnbzge4gcnlggqzdambqhayde_640x960.jpg_225x999.jpg" alt="<?php echo ($vo["goodname"]); ?>" src="<?php echo ($vo["pic"]); ?>" style="display: inline;">
                                    </a>
                                    <div class="info_wrap">
                                        <p class="base_info clearfix">
                                            <a class="title" href="" target="_blank"><?php echo ($vo["goodname"]); ?></a>
                                        </p>
                                        <p class="price_info clearfix">
                                            <span class="n_p">￥<?php echo ($vo["price"]); ?></span>
                                        </p>
                                        <span class="fav_num1" data-tradeitemid="18ghcv6" data-id="<?php echo ($v['id']); ?>" data-faved="true"><i class="faved1"></i><?php echo ($vo["collect"]); ?></span>
                                    </div>
                                </div><?php endforeach; endif; ?>
                        </div>
                    </div><?php endforeach; endif; ?>
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

	<script type="text/javascript" src="/Public/Home/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="/Public/Home/js/sort.js"></script>

	<script type="text/javascript">
        //取消收藏店铺
		$('.cancel').click(function(){
			 var uid = "<?php echo ($_SESSION['home']['id']); ?>";
			 var fav = $(this);
             if(uid){
                var id=fav.attr('data-id');
                $.ajax({
                    url:"<?php echo U('Home/Collect/qixiao');?>",  //请求地址
                    type:"post",        //请求方式
                    data:{id:id},//发送数据
                    async:true,         
                    dataType:"json",    //响应数据格式
                    success:function(data){ //成功回调函数
                        if(data==1){
                        	fav.parent().remove();
                            window.location.reload();
                        }else{
                            alert('取消失败');
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
        //收藏选项卡
        $('.nav_ctrl').find('li').click(function(){
            var dta = $(this).attr('data');
            if(dta=='fav_s'){
                $('#fav_d').hide();
                $('#fav_z').hide();
                $('#fav_s').show();
            }else if(dta=='fav_d'){
                $('#fav_d').show();
                $('#fav_s').hide();
                $('#fav_z').hide();
            }else{
                $('#fav_z').show();
                $('#fav_d').hide();
                $('#fav_s').hide();
            }
            $(this).addClass('on').siblings().removeClass('on');
        });

        //取消商品收藏
        $('.fav_num').click(function(){
            var uid = "<?php echo ($_SESSION['home']['id']); ?>";
            var fav = $(this);
            if(uid){
                var id=fav.attr('data-id');
                $.ajax({
                    url:"<?php echo U('Home/Collect/quxiao');?>",  //请求地址
                    type:"post",        //请求方式
                    data:{id:id},//发送数据
                    async:true,         
                    dataType:"json",    //响应数据格式
                    success:function(data){ //成功回调函数
                        if(data==1){
                            fav.parent().parent().remove();
                        }else{
                            alert('取消失败');
                        }
                    },
                    error:function(){   //失败回调函数
                        alert("ajax请求失败!");
                    }   
                });
            }else{
                location.href="<?php echo U('Home/User/login');?>"
            }
        })
	</script>

</body>
</html>