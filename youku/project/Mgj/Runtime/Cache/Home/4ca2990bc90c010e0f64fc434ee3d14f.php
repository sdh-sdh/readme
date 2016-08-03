<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <title><?php echo ($config['title']); ?></title>
    <meta name="keywords" content="<?php echo ($config['keywords']); ?>"/>
    <meta name="description" content="<?php echo ($config['description']); ?>"/>

	<link rel="icon" href="/zhangdi/youku/project/Public/Home/images/favicon32.ico" type="image/x-icon"/>
    <meta name="copyright" content="<?php echo ($config['content']); ?>"/>
    <link rel="stylesheet" href="/zhangdi/youku/project/Public/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/zhangdi/youku/project/Public/Home/css/css.css">
    
    <link rel="stylesheet" href="/zhangdi/youku/project/Public/Home/css/info.css">

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
                    <img src="/zhangdi/youku/project<?php echo ($config['headlogo']); ?>">
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
                <img src="/zhangdi/youku/project/<?php echo ($data[0]['userpic']); ?>" alt="">
                <p><?php echo ($data[0]['nickname']); ?></p>

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

        <!-- <block name="right"> -->
        <!-- 主体信息修改信息页面 -->
        <div class="info_right">
            <div class="right_main">
            <!-- <block name="right"> -->
                <!-- 个人基本资料 -->
                <div class="right_title">
                    <span>基本资料</span>
                </div>
                <form action="/zhangdi/youku/project/index.php/Home/Userinfo/userInfoUpdate" method="post">
                    <div id="setting_form" class="right_basic">
                        <dl>
                            <dd>昵称：</dd>
                                <dt class="unick">
                                    <input class="r3" type="text" value="<?php echo ($data[0]['nickname']); ?>" name="nickname" id="unick">
                                    <div class="iner"></div>
                                </dt>
                            <dd>性别：</dd>
                                <dt class="sex" style="line-height:30px;">
                                    <input id="" type="radio" style="margin-right:5px" value="0" name="sex" <?php if($data[0]['sex'] == 0): ?>checked<?php endif; ?> />
                                    女
                                    <input id="" type="radio" value="1" name="sex" <?php if($data[0]['sex'] == 1): ?>checked<?php endif; ?> />
                                    男
                                     <input id="" type="radio" value="2" name="sex" <?php if($data[0]['sex'] == 2): ?>checked<?php endif; ?> />保密
                                </dt>
                            <dd>个人博客：</dd>
                                <dt class="weibo">
                                    <input class="r3" type="text" name="email" value="<?php echo ($data[0]['email']); ?>">
                                </dt>
                            <dd>所在地：</dd>
                                <dt class="location">
                                    <select name="privence" id="sheng">
                                        <option value="">省份</option>
                                    <?php if(is_array($res)): foreach($res as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
                                    </select>
                                    <select name="city" id="shi">
                                        <option value="">地级市</option>
                                    </select>
                                </dt>
                            <dd>生日：</dd>
                                <dt class="birthday">
                                    <select name="born[]">
                                    <option>--年份--</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    </select>
                                    &nbsp;年&nbsp;
                                    <select id="month" name="born[]">
                                    <option>--月份--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    </select>
                                    &nbsp;月&nbsp;
                                    <select id="day" name="born[]">
                                    <option>--日期--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    </select>
                                    &nbsp;日&nbsp;
                                </dt>
                            <dd>星座：</dd>
                                <dt class="constellation">
                                    <select id="constellation" name="constellation">
                                        <option id="xingzuo_name"></option>
                                        <option value="0" <?php if($data[0]['constellation'] == 0): ?>selected<?php endif; ?>>水瓶座</option>
                                        <option value="1" <?php if($data[0]['constellation'] == 1): ?>selected<?php endif; ?>>双鱼座</option>
                                        <option value="2" <?php if($data[0]['constellation'] == 2): ?>selected<?php endif; ?>>白羊座</option>
                                        <option value="3" <?php if($data[0]['constellation'] == 3): ?>selected<?php endif; ?>>金牛座</option>2
                                        <option value="4" <?php if($data[0]['constellation'] == 4): ?>selected<?php endif; ?>>双子座</option>
                                        <option value="5" <?php if($data[0]['constellation'] == 5): ?>selected<?php endif; ?>>巨蟹座</option>
                                        <option value="6" <?php if($data[0]['constellation'] == 6): ?>selected<?php endif; ?>>狮子座</option>
                                        <option value="7" <?php if($data[0]['constellation'] == 7): ?>selected<?php endif; ?>>处女座</option>
                                        <option value="8" <?php if($data[0]['constellation'] == 8): ?>selected<?php endif; ?>>天秤座</option>
                                        <option value="9" <?php if($data[0]['constellation'] == 9): ?>selected<?php endif; ?>>天蝎座</option>
                                        <option value="10" <?php if($data[0]['constellation'] == 10): ?>selected<?php endif; ?>>射手座</option>
                                        <option value="11" <?php if($data[0]['constellation'] == 11): ?>selected<?php endif; ?>>摩羯座</option>
                                    </select>
                                </dt>
                            <dd>职业：</dd>
                                <dt class="profession">
                                    <select id="profession" name="career">
                                        <option></option>
                                        <option value="0" <?php if($data[0]['career'] == 0): ?>selected<?php endif; ?>>白领</option>
                                        <option value="1" <?php if($data[0]['career'] == 1): ?>selected<?php endif; ?>>学生</option>
                                        <option value="2" <?php if($data[0]['career'] == 2): ?>selected<?php endif; ?>>时尚妈咪</option>
                                        <option value="3" <?php if($data[0]['career'] == 3): ?>selected<?php endif; ?>>模特</option>
                                        <option value="4" <?php if($data[0]['career'] == 4): ?>selected<?php endif; ?>>时尚店主</option>
                                        <option value="5" <?php if($data[0]['career'] == 5): ?>selected<?php endif; ?>>传媒</option>
                                        <option value="6" <?php if($data[0]['career'] == 6): ?>selected<?php endif; ?>>艺术</option>
                                        <option value="7" <?php if($data[0]['career'] == 7): ?>selected<?php endif; ?>>其他</option>
                                    </select>
                                </dt>
                        </dl>
                    </div>
                    <!-- 身材信息 -->
                    <div class="right_title">
                        <span>身材信息</span>
                        <span style="font-weight:normal;font-size:12px;padding-left:10px;">^_^ 用心填写这几项信息，会帮助蘑菇街给你推荐合适的衣服和鞋子哦~</span>
                    </div>
                    <div class="right_basic">
                        <dl>
                           <dd>身高：</dd>
                           <dt class="posr">
                               <input name="height" class="gray_text r3" type="text" value="<?php echo ($data[0]['height']); ?>" style="width:80px">cm
                           </dt>
                           <dd>体重：</dd>
                           <dt class="posr">
                               <input name="weight" class="gray_text r3" type="text" value="<?php echo ($data[0]['weight']); ?>" style="width:80px">kg
                           </dt>
                           <dd>三围：</dd>
                           <dt class="posr">
                               <input name="bwhB" class="gray_text r3" type="text" value="" placeholder="胸围" style="width:45px">cm
                               <input name="bwhW" class="gray_text r3" type="text" value="" placeholder="腰围" style="width:45px">cm
                               <input name="bwhH" class="gray_text r3 " type="text" value="" placeholder="臀围" style="width:45px">cm
                           </dt>
                           <dd>肤质：</dd>
                           <dt class="posr">
                               <select name="skin">
                                    <option selected>请选择</option>
                                    <option value="0" <?php if($data[0]['skin'] == 0): ?>selected<?php endif; ?>>中性肤质</option>
                                    <option value="1" <?php if($data[0]['skin'] == 1): ?>selected<?php endif; ?>>干性肤质</option>
                                    <option value="2" <?php if($data[0]['skin'] == 2): ?>selected<?php endif; ?>>油性肤质</option>
                                    <option value="3" <?php if($data[0]['skin'] == 3): ?>selected<?php endif; ?>>混合性肤质</option>
                                    <option value="4" <?php if($data[0]['skin'] == 4): ?>selected<?php endif; ?>>敏感性肤质</option>
                               </select>
                            </dt>
                            <dd>衣服尺寸：</dd>
                            <dt class="posr">
                                <select name="cloth">
                                    <option selected>-请选择-</option>
                                    <option value="0" <?php if($data[0]['cloth'] == 0): ?>selected<?php endif; ?>>S</option>
                                    <option value="1" <?php if($data[0]['cloth'] == 1): ?>selected<?php endif; ?>>M</option>
                                    <option value="2" <?php if($data[0]['cloth'] == 2): ?>selected<?php endif; ?>>L</option>
                                    <option value="3" <?php if($data[0]['cloth'] == 3): ?>selected<?php endif; ?>>XL</option>
                                </select>
                            </dt>
                            <dd>裤子尺寸：</dd>
                            <dt class="posr">
                                <select name="trousers">
                                    <option selected>-请选择-</option>
                                    <option value="21" <?php if($data[0]['trousers'] == 21): ?>selected<?php endif; ?>>21</option>
                                    <option value="22" <?php if($data[0]['trousers'] == 22): ?>selected<?php endif; ?>>22</option>
                                    <option value="23" <?php if($data[0]['trousers'] == 23): ?>selected<?php endif; ?>>23</option>
                                    <option value="24" <?php if($data[0]['trousers'] == 24): ?>selected<?php endif; ?>>24</option>
                                    <option value="25" <?php if($data[0]['trousers'] == 25): ?>selected<?php endif; ?>>25</option>
                                    <option value="26" <?php if($data[0]['trousers'] == 26): ?>selected<?php endif; ?>>26</option>
                                    <option value="27" <?php if($data[0]['trousers'] == 27): ?>selected<?php endif; ?>>27</option>
                                </select>
                            </dt>
                            <dd>鞋码尺寸：</dd>
                            <dt class="posr" style="margin-bottom:30px;">
                                <select name="shoes">
                                    <option selected>-请选择-</option>
                                    <option value="34" <?php if($data[0]['shoes'] == 34): ?>selected<?php endif; ?>>34</option>
                                    <option value="35" <?php if($data[0]['shoes'] == 35): ?>selected<?php endif; ?>>35</option>
                                    <option value="36" <?php if($data[0]['shoes'] == 36): ?>selected<?php endif; ?>>36</option>
                                    <option value="37" <?php if($data[0]['shoes'] == 37): ?>selected<?php endif; ?>>37</option>
                                    <option value="38" <?php if($data[0]['shoes'] == 38): ?>selected<?php endif; ?>>38</option>
                                    <option value="39" <?php if($data[0]['shoes'] == 39): ?>selected<?php endif; ?>>39</option>
                                    <option value="40" <?php if($data[0]['shoes'] == 40): ?>selected<?php endif; ?>>40</option>
                                </select>
                            </dt>
                        </dl>
                    </div>
                    <!-- 购买信息设置 -->
                    <div class="right_title">
                        <span>购买信息设置</span>
                    </div>
                    <div class="right_basic">
                        <h5>把自己的购物信息展示给商家，能帮你更好的买到适合的衣服哦。</h5>
                        <dl>
                           <dd>设置：</dd>
                           <dt class="posr">
                               <select name="">
                                    <option selected>--信息展示--</option>
                                    <option>展示给商家</option>
                                    <option>对商家隐藏</option>
                               </select>
                            </dt>
                        </dl>
                    </div>

                    <!-- 其他信息 -->
                    <div class="right_title">
                        <span>其它信息</span>
                    </div>
                    <div class="right_basic" style="margin-boyyom:20px;">
                        <dl>
                            <dd>个人标签：</dd>
                            <dt class="d_list">
                                <input autocomplete="off" style="color:#999;width:300px;" id="user_style" name="tag" class="gray_text pstyle r3" type="text" value="<?php echo ($data[0]["tag"]); ?>" placeholder="多个标签之间请用逗号隔开">
                                <div class="fashion_list">
                                    <span class="tag">
                                        <a href="javascript:" style="color:#ff7878;font-size:14px;">小公举</a>
                                        <a style="color:#ff683f;font-size:16px;">你是猪吗</a>
                                        <a style="color:#ff3998;font-size:14px;">娘娘至上</a>
                                        <a style="color:#327aff;font-size:16px;">闷骚</a>
                                        <a style="color:#ff683f;font-size:12px;">阳光</a>
                                        <a style="color:#327aff;font-size:12px;">光棍棍</a>
                                        <a style="color:#76ad00;font-size:14px;">时尚</a>
                                        <a style="color:#76ad00;font-size:14px;">what are you 弄啥类</a>
                                        <a style="color:#84a9f4;font-size:12px;">小甜美</a>
                                        <a style="color:#ff683f;font-size:12px;">女汉子</a>
                                        <a style="color:#ff3998;font-size:14px;">也是没谁了</a>
                                        <a style="color:#84a9f4;font-size:12px;">混搭</a>
                                        <a style="color:#76ad00;font-size:12px;">小清新</a>
                                        <a style="color:#76ad00;font-size:12px;">还有谁,说还有谁</a>
                                        <a style="color:#ff3998;font-size:14px;">忒尴尬了</a>
                                        <a style="color:#84a9f4;font-size:12px;">吃货</a>
                                        <a style="color:#ff683f;font-size:12px;">颜值爆表</a>
                                        <a style="color:#ff683f;font-size:16px;">手指控</a>
                                        <a style="color:#327aff;font-size:16px;">长腿控</a>
                                        <a style="color:#76ad00;font-size:12px;">盗版水货</a>
                                    </span>
                                </div>
                            </dt>
                            <dd>自我介绍：</dd>
                            <dt>
                                <textarea name="resume" id="d_text_int" rows="10" cols="70" class="r3" placeholder="随便写点什么,让别人了解你吧"><?php echo ($data[0]['resume']); ?></textarea>
                            </dt>
                            <dd>&nbsp;&nbsp;</dd>
                            <dt><input class="green_button r3" type="submit" name="sub" value="确认修改"></dt>
                        </dl>
                    </div>
                    <!-- </div> -->
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
                        <img src="/zhangdi/youku/project/Public/Home/images/ma.jpg" alt="蘑菇街服务号二维码">
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





<script src="/zhangdi/youku/project/Public/Home/js/jquery-1.11.3.min.js"></script>
<script src="/zhangdi/youku/project/Public/Home/js/bootstrap.min.js"></script>
<script src="/zhangdi/youku/project/Public/Home/js/move.js"></script>
<script src="/zhangdi/youku/project/Public/Home/js/indexs.js"></script>

<script src="/zhangdi/youku/project/Public/Home/js/userinfo.js"></script>

</body>
</html>