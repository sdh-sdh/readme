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
                
<div class="main-content">
            <script type="text/javascript">
                try
                {
                    ace.settings.check('breadcrumbs', 'fixed')
                } catch (e)
                {
                }
                $(function(){
	                $('.delOrder').click(function(){

			            var url = $(this).attr('data-url');
			            var id  = $(this).attr('data-id');

			            $.post(url, {id: id}, function(msg){

			                if (msg == 1) {
			                    alert('删除成功');
			                    location.href = location.href;
			                }else if (msg == 2) {
			                    alert('删除失败');
			                }else{
			                    alert('未做删除');
			                }

			            }, 'json');

			        });
	            });
            </script>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    订单管理
                    <small>
                        <i class="icon-double-angle-right"></i>
                        订单列表
                    </small>
                </h1>
            </div>
            <!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="table-responsive">
                                            <table style="text-align:center;" class="table table-striped table-bordered table-hover" id="sample-table-1">
                                                <thead>
                                                <tr>
                                                    <th class="center">订单号</th>
                                                    <th class="center">订单时间</th>
                                                    <th class="center">商品名</th>
                                                    <th class="center">发货地址</th>
                                                    <th class="center">订单总价</th>
                                                    <th class="center">商品状态</th>
                                                    <th class="center">操作</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php if(is_array($orders)): foreach($orders as $key=>$vo): ?><tr>
                                                        <td><?php echo ($vo['ordernum']); ?></td>
                                                        <td><?php echo ($vo['ordertime']); ?></td>
                                                        <td>
                                                            <?php if(is_array($vo['skuid'])): foreach($vo['skuid'] as $key=>$v): echo ($v['goodname']); ?><br>
                                                                <?php if(is_array($v['att'])): foreach($v['att'] as $k=>$a): echo ($k); ?> : <?php echo ($a); ?>　数量：<?php echo ($nums[$key][$k]); endforeach; endif; ?>
                                                                <br><?php endforeach; endif; ?>

                                                        </td>
                                                        <td>
                                                            收货人:<?php echo ($vo['adrid']['name']); ?><br>
                                                            地址:<?php echo ($vo['adrid']['adr']); ?><br>
                                                            电话:<?php echo ($vo['adrid']['phone']); ?><br>
                                                            邮编:<?php echo ($vo['adrid']['postcode']); ?>
                                                        </td>
                                                        <td><?php echo ($vo['orderprice']); ?></td>
                                                        <td>
                                                            <?php echo orderState($vo['state']);?>
                                                        </td>
                                                        <td>
                                                            <div class="center">

                                                                <a class="btn btn-xs btn-info" href="<?php echo U('Home/Sort/orderDetails', array('id'=>$vo['id']));?>">
                                                                    详细
                                                                </a>

                                                                <button type="button" class="btn btn-xs btn-danger delOrder" data-id="<?php echo ($vo['id']); ?>" data-url="<?php echo U('Admin/Order/delOrder');?>">
                                                                    删除
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr><?php endforeach; endif; ?>
                                                </tbody>
                                            </table>
                                    </div><!-- /.table-responsive -->
                                </div><!-- /span -->
                            </div><!-- /row -->

                        </div>
                        <!-- /span -->
                    </div>

                    <!-- PAGE CONTENT ENDS -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.page-content -->
    </div>

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