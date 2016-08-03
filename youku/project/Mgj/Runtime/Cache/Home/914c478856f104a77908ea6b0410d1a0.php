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
                <img src="/<?php echo ($data[0]['userpic']); ?>" alt="">
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
        <!-- 主体信息修改信息页面 -->
        <div class="info_right">
            <div class="right_main">
                <!-- 个人基本资料 -->
                <div class="right_title">
                    <span>基本资料</span>
                </div>
                <form action="/index.php/Home/Userinfo/uplodededit" method="post" enctype="multipart/form-data">
                <div id="setting_form" class="right_basic">
                <dl>
                    <dd>当前头像：</dd>
                        <dt class="">
                            <img src="/<?php echo ($data[0]['userpic']); ?>" alt="" width="260">
                        </dt>
                        <dd><p style="margin-right:10px;">上传新头像:</p></dd>
                        <dt style="position:relative;">
                            <div id="up" style="line-height:35px;">
                                <div id="filelist"></div>
                                <!-- <a id="pickfiles" href="javascript:;">浏览图片</a>  -->
                                <button id="bc" class="btn btn-info btn-sm">浏览图片</button>
                                <a id="uploadfiles" href="javascript:;">点击上传大图</a>
                                <div id="imgs"></div>
                                <!-- <div id="console"></div> -->
                            </div>
                            <script type="text/javascript" src="/Public/Home/plupload/js/plupload.full.min.js"></script>

                            <script type="text/javascript" src="/Public/Home/plupload/js/jquery-1.8.3.min.js"></script>

                            <script type="text/javascript">
                                //创建上传对象
                                var uploader = new plupload.Uploader({
                                    runtimes : 'html5,flash,silverlight,html4',//默认
                                    browse_button : 'bc', // 设置浏览文件的框体
                                    url : "<?php echo U('Home/Userinfo/uploadImg');?>",//设置上传的脚本路径
                                    //初始化
                                    init: {
                                        PostInit: function() {
                                            //清空列表
                                            document.getElementById('filelist').innerHTML = '';
                                            //绑定单击事件开始上传
                                            document.getElementById('uploadfiles').onclick = function() {
                                                uploader.start();
                                                return false;
                                            };
                                        },
                                        //添加元素之后的代码执行   创建显示的文件列表
                                        FilesAdded: function(up, files) {
                                            plupload.each(files, function(file) {
                                                document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                                            });
                                        },
                                        //添加上传过程中的代码执行  显示文件上传的百分比
                                        UploadProgress: function(up, file) {
                                            document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
                                        },
                                        //错误执行程序  在console.log位置显示错误信息和代号
                                        Error: function(up, err) {
                                            document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
                                        },
                                        //文件上传成功之后的代码执行  res接收服务器返回的数据
                                        FileUploaded : function(up, file, res){
                                            //获取服务器返回的数据
                                            var result = res.response;
                                            //创建数据
                                            var res = $.parseJSON(res.response);
                                            //创建图片
                                            //隐藏域传原图地址
                                            var input = $('<input type="hidden" name="userpic" value="'+res.datas+'" readonly="readonly" style="line-height:20px;border:1px solid #ddd" />');

                                            //隐藏域传缩略图地址
                                            // var thumb_path = $('<input type="hidden" name="smallpic[]" value="'+res.thumb_data+'" />');
                                            //
                                            var img = $('<img id="pic" src="'+res.datas+'" width="150" style="margin:10px 10px;" />');
                                            var img1 = $('<img id="pic" src="'+res.datas+'" width="120" style="margin:10px 10px;" />');
                                            var img2 = $('<img id="pic" src="'+res.datas+'" width="90" style="margin:10px 10px;" />');
                                            var img3 = $('<img id="pic" src="'+res.datas+'" width="50" style="margin:10px 10px;"/>');
                                            $('#up').append(input);
                                            //缩略图追加
                                            // $('#up').append(thumb_path);
                                            $('#up').append(img);
                                            $('#up').append(img1);
                                            $('#up').append(img2);
                                            $('#up').append(img3);


                                        }
                                    }
                                });
                                uploader.init();

                            </script>

                        </dt>

                        <dd class="avartar_confirm">&nbsp;</dd>
                        <dt class="avartar_confirm">
                        <input type="submit" value="确定" class="green_button">
                        </dt>
                </dl>
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

<script src="/Public/Home/js/userinfo.js"></script>
<!-- <script src=""></script> -->

</body>
</html>