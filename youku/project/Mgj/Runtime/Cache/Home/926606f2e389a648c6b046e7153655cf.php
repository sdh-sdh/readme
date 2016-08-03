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
                
	<div id="J_ManageBody" class="xd-manage-body">
        <div class="content xd-fm1200 clearfix">
            <div id="J_Page" class="xd-manage-content fl">
            	<div class="xd-message-detail xd-page" data-reactid=".1" style="margin:0px;">
            		<div class="xd-header" data-reactid=".1.0">
            			<h1 class="xd-title" data-reactid=".1.0.0"><?php echo ($not['storetitle']); ?></h1>
            			<p data-reactid=".1.0.1"><?php echo date('Y-m-d H:i:s',$not['storetime']);?></p>
            		</div>
            		<div class="message-content" data-reactid=".1.1">
            			<div style="margin: 0px; padding: 0px; word-wrap: break-word; color: #444444; font-family: 'Microsoft Yahei', Simsun; font-size: 14px; line-height: 21px;">
            				<font style="margin: 0px; padding: 0px; word-wrap: break-word;" face="微软雅黑" size="3">各位商家：</font>
            			</div>
						<font style="margin: 0px; padding: 0px; word-wrap: break-word; color: #444444;" face="微软雅黑" size="3">
							<br style="margin: 0px; padding: 0px; word-wrap: break-word;">
						</font>
						<div style="margin: 0px; padding: 0px; word-wrap: break-word; color: #444444; font-family: 'Microsoft Yahei', Simsun; font-size: 14px; line-height: 21px;">
							<font style="margin: 0px; padding: 0px; word-wrap: break-word;" face="微软雅黑" size="3">&nbsp; &nbsp; &nbsp; &nbsp; <?php echo ($not['storecontent']); ?></font>
						</div>
						<font style="margin: 0px; padding: 0px; word-wrap: break-word; color: #444444;" face="微软雅黑" size="3">
							<br style="margin: 0px; padding: 0px; word-wrap: break-word;">
						</font>
						<div style="margin: 0px; padding: 0px; word-wrap: break-word; color: #444444; font-family: 'Microsoft Yahei', Simsun; font-size: 14px; line-height: 21px; text-align: right;">
							<font style="margin: 0px; padding: 0px; word-wrap: break-word;" face="微软雅黑" size="3">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<?php echo ($not['storeauthor']); ?></font>
						</div>
						<div style="margin: 0px; padding: 0px; word-wrap: break-word; color: #444444; font-family: 'Microsoft Yahei', Simsun; font-size: 14px; line-height: 21px; text-align: right;">
							<font style="margin: 0px; padding: 0px; word-wrap: break-word;" face="微软雅黑" size="3">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<?php echo date('Y年m月d日',$not['storetime']);?></font>
						</div>
						<br>
					</div>
				</div>
			</div>
        </div>
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