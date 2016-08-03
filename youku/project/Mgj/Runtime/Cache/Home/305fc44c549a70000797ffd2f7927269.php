<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>后台首页 - 小店管理后台</title>
    <link rel="stylesheet" href="/Public/Home/css/control.css">
    
    
    <link rel="stylesheet" href="/Public/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/Admin/assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/Public/admin/assets/css/ace.min.css" />
    <link rel="stylesheet" href="/Public/admin/assets/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="/Public/admin/assets/css/ace-skins.min.css" />
	<script src="/Public/Home/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="/Public/Home/js/sort.js"></script>
	<script src="/Public/Home/js/bootstrap.min.js"></script>
    <style type="text/css">
        .xd-manage-body .xd-manage-slide .box li a {
              color: #333;
              font-size: 14px;
              padding-left: 25px;
              display: block;
        }

        ul, ol {
          margin: 0;
          padding: 0;
        }
    </style>
</head>
<body class=" pace-done" style="background:#e7e8eb">
	<div id="J_ManageNav" class="xd-manage-nav">
	    <div class="content xd-fm1200 clearfix">
	        <a href="<?php echo U('Home/Sort/control');?>" class="logo fl">小店|管理后台</a>
	        <div class="menu fl">
	            <a href="" target="_blank">商家社区</a>
	            <a href="" target="_blank">商家培训</a>
	            <a href="" target="_blank">入驻市场</a>
	            <a href="" target="_blank">帮助中心</a>
	        </div>
	        
	        <div id="J_UserInfo">
	        	<div class="login fr" data-reactid=".0">
	        		<a href="" class="face fl" data-reactid=".0.0"><img src="/<?php echo ($asort['userpic']); ?>" width="40" data-reactid=".0.0.0"></a>
	        		<div class="info fl" data-reactid=".0.1">
	        			<p data-reactid=".0.1.0"><a href="" class="msg" target="_blank" data-reactid=".0.1.0.0"></a></p>
	        			<p data-reactid=".0.1.1"><a href="<?php echo U('Home/Userinfo/userinfo');?>" data-reactid=".0.1.1.0"><?php echo ($asort['nickname']); ?></a><span data-reactid=".0.1.1.1"> </span><span class="split" data-reactid=".0.1.1.2">|</span><span data-reactid=".0.1.1.3"> </span><a href="<?php echo U('Home/Sorts/log');?>" data-reactid=".0.1.1.4">退出</a></p>
	        		</div>
	        	</div>
	        </div>
	        
	    </div>
	</div>
    <div id="J_ManageBody" class="xd-manage-body">
        <div class="content xd-fm1200 clearfix">
            <div id="J_Page" class="xd-manage-content fl">
                
    <div class="main-content" style="width:1200px;float:right;margin:100px -290px;">
        <div class="page-content">
            <div class="row">
                <div class="col-xs-10">
                    <div class="row">
                        <div class="col-xs-10">
                            <div class="table-responsive">
                                <form action="<?php echo U('Home/Sort/argedit');?>" method="post" enctype="multipart/form-data">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <tbody>
                                        <?php if($ass == 1): ?><input type="hidden" name="goodsid" value="<?php echo ($args["goodsid"]); ?>">
                                        <?php elseif($ass == 0): ?>
                                        <input type="hidden" name="goodsid" value="<?php echo ($id); ?>"><?php endif; ?>
                                        <tr>
                                            <td><input type="text" name="num1" id="form-field-1" class="col-xs-10 col-sm-5" value="<?php echo ($args["num1"]); ?>" /><div class="col-xs-1"></div><input type="text" name="num2" id="form-field-1" class="col-xs-10 col-sm-5" value="<?php echo ($args["num2"]); ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="num3" id="form-field-1" class="col-xs-10 col-sm-5" value="<?php echo ($args["num3"]); ?>" /><div class="col-xs-1"></div><input type="text" name="num4" id="form-field-1" class="col-xs-10 col-sm-5" value="<?php echo ($args["num4"]); ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="num5" id="form-field-1" class="col-xs-10 col-sm-5" value="<?php echo ($args["num5"]); ?>" /><div class="col-xs-1"></div><input type="text" name="num6" id="form-field-1" class="col-xs-10 col-sm-5" value="<?php echo ($args["num6"]); ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="num7" id="form-field-1" class="col-xs-10 col-sm-5" value="<?php echo ($args["num7"]); ?>" /><div class="col-xs-1"></div><input type="text" name="num8" id="form-field-1" class="col-xs-10 col-sm-5" value="<?php echo ($args["num8"]); ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="num9" id="form-field-1" class="col-xs-10 col-sm-5" value="<?php echo ($args["num9"]); ?>" /><div class="col-xs-1"></div><input type="text" name="num10" id="form-field-1" class="col-xs-10 col-sm-5" value="<?php echo ($args["num10"]); ?>" /></td>
                                        <tr>
                                            <td><input type="text" name="num11" id="form-field-1" class="col-xs-10 col-sm-5" value="<?php echo ($args["num11"]); ?>" /><div class="col-xs-1"></div><input type="text" name="num12" id="form-field-1" class="col-xs-10 col-sm-5" value="<?php echo ($args["num12"]); ?>" /></td>
                                        </tr>
                                        <tr>

                                            <td><div class="col-xs-4"></div><input type="submit" class="btn no-border" name="sub1" value="提交">　　　<input type="reset" class="btn no-border" value="重置"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- <input type="hidden" name="id" value="<?php echo ($user['id']); ?>"> -->
                                </form>
                            </div><!-- /.table-responsive -->
                        </div><!-- /span -->
                    </div><!-- /row -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
    <!-- /.main-content -->

            </div>
            
				<div id="J_ManageSlide" class="xd-manage-slide fl">
                    <div class="box">
                    	<h1>信息总览</h1>
                		<ul>
                            <li><a href="<?php echo U('Home/Sort/control');?>"  style="color:#333;">后台首页</a></li>
            			</ul>
                	</div>
                    <div class="box">
                    	<h1>交易管理</h1>
            			<ul>
                            <li><a href="<?php echo U('Home/Sort/order');?>">订单管理</a></li>
	                        <li><a href="<?php echo U('Home/Sort/comment');?>">评论管理</a></li>
                        </ul>
                	</div>
                    <div class="box">
                    	<h1>商品管理</h1>
                    	<ul>
	                        <li><a href="<?php echo U('Home/Sort/sell');?>">出售中</a></li>
	                        <li><a href="<?php echo U('Home/Sort/entrepot');?>">仓库中</a></li>
	                        <li><a href="<?php echo U('Home/Sort/audit');?>">审核中的商品</a></li>
	                        <li><a href="<?php echo U('Home/Sort/fail');?>">审核未通过</a></li>
	                        <li><a href="<?php echo U('Home/Sort/asort');?>">商品分类设置</a></li>
                            <li><a href="<?php echo U('Home/Sort/store');?>">商品分类列表</a></li>
                   		</ul>
                	</div>
    			</div>
                
        	</div>
            <div id="J_ManageFooter" class="xd-manage-footer">
                <div class="content xd-fm1200">
                    <div class="footer-top-line clearfix">
                        <div class="footer-download-app fl">
                            <div class="footer-app-icon clearfix">
                                <span class="app-icon"></span>
                                <span class="app-title">手机轻松管理店铺</span>
                            </div>
                            <p class="through-line"></p>
                            <p class="footer-app-tips">下载小店APP</p>
                        </div>
                        <div class="footer-barcode-link fl">
                            <div class="clearfix">
                                <div class="footer-barcode fl"></div>
                                <div class="footer-app-link fl">
                                    <a class="app-link" href="" target="_blank">
                                        iPhone 下载
                                    </a>
                                    <a class="apk-link" href="" target="_blank">
                                        Android下载
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="footer-wechat-service fl">
                            <div class="clearfix">
                                <div class="footer-sj-qrcode fl"></div>
                                <div class="footer-app-link fl">
                                    <p>商家服务微信公众号</p>
                                    <p>搜索微信号：mogujieSJ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-bottom-line clearfix">
                        <div class="footer-bottom-link fl">
                            <div class="bottom-link-detail clearfix">
                                <a class="bottom-link1 fl" href="" target="_blank">关于小店</a><a class="bottom-link2 fl" href="" target="_blank">用户协议</a><a class="bottom-link3 fl" href="" target="_blank">意见反馈</a><a class="bottom-link4 fl" href="" target="_blank">帮助中心</a>
                            </div>
                            <div class="bottom-link-title">
                                ©2014-2015 Mogujie.com 杭州卷瓜网络有限公司
                            </div>
                        </div>
                        <div class="footer-certify fr">
                            营业执照注册号：330106000129004 | 增值电信业务经营许可证：浙B2-2011034 | ICP备案号：浙ICP备10044327号-3
                        </div>
                    </div>
                </div>
            </div>
    	</div>
    </div>
</body>
</html>