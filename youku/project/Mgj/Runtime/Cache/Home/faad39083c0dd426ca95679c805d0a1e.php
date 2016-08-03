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
                
<style>
.y_goods_size{float:left; display:inline-block; margin-right:10px; margin-bottom:10px;padding:5px 10px; size:#333; border:1px solid #c4c4c4; background-size:#fff;}
.y_lable_click{border-size:#ff5555; background:url(/Public/admin/images/y_lable.png) no-repeat right bottom; }
</style>
	<div class="main-content" style="width:1200px;float:right;margin:0px -290px;">

		<div class="page-content">
			<div class="row">
				<div class="col-xs-8">
					<div class="row">
						<div class="col-xs-10">
							<div class="table-responsive">
								<form action="<?php echo U('Home/Sort/tag');?>" method="post" enctype="multipart/form-data">
								<table id="sample-table-1" class="table table-striped table-bordered table-hover">
									<tbody>
										<input type="hidden" name="goodsid" value="<?php echo ($info[id]); ?>">
										<tr>
											<td colspan="1" style="text-align:right;">商品名：</td>
											<td colspan="3"><?php echo ($info[goodname]); ?></td>
										</tr>
										<!-- 添加商品 SKU -->
										<tr>
											<td colspan="1" style="text-align:right;">SKU设置：</td>
											<td colspan="3">
											<?php if($info['state'] == 1 || $info['state'] == 2 || $info['state'] == 3): ?><a href="javascript:" class="y_goods_size">S</a>
												<a href="javascript:" class="y_goods_size">M</a>
												<a href="javascript:" class="y_goods_size">L</a>
												<a href="javascript:" class="y_goods_size">XS</a>
												<a href="javascript:" class="y_goods_size">XL</a>
												<a href="javascript:" class="y_goods_size">XXL</a>
												<a href="javascript:" class="y_goods_size">XXXL</a>
												<a href="javascript:" class="y_goods_size">均码</a>
												<?php if($info['state'] == 3): ?><a href="javascript:" class="y_goods_size">26</a>
												<a href="javascript:" class="y_goods_size">27</a>
												<a href="javascript:" class="y_goods_size">28</a>
												<a href="javascript:" class="y_goods_size">29</a>
												<a href="javascript:" class="y_goods_size">30</a>
												<?php else: endif; ?>
												<a href="javascript:" class="y_goods_size">29</a>
											<?php elseif($info['state'] == 5): ?>
												<a href="javascript:" class="y_goods_size">35</a>
												<a href="javascript:" class="y_goods_size">36</a>
												<a href="javascript:" class="y_goods_size">37</a>
												<a href="javascript:" class="y_goods_size">38</a>
												<a href="javascript:" class="y_goods_size">39</a>
												<a href="javascript:" class="y_goods_size">40</a>
												<a href="javascript:" class="y_goods_size">41</a>
												<a href="javascript:" class="y_goods_size">42</a>
												<a href="javascript:" class="y_goods_size">43</a>
												<a href="javascript:" class="y_goods_size">44</a>
                                                <a href="javascript:" class="y_goods_size">45</a>
                                            <?php elseif($info['state'] == 4): ?>
                                                <a href="javascript:" class="y_goods_size">32/70A</a>
                                                <a href="javascript:" class="y_goods_size">32/70B</a>
                                                <a href="javascript:" class="y_goods_size">34/75A</a>
                                                <a href="javascript:" class="y_goods_size">36/80A</a>
                                                <a href="javascript:" class="y_goods_size">36/80B</a>
                                                <?php else: endif; ?>
											</td>
										</tr>
										<tr style="text-align:center;" id="y_size_table">
											<td style="width:25%;">尺码</td>
											<td style="width:25%;">库存</td>
											<td style="width:25%;">价格</td>
											<td style="width:25%;">颜色</td>
										</tr>
										<tr>
											<td style="text-align:right;"><input type="submit" id="good_submit" class="btn no-border" name="sub" value="Submit" style=""></td>
											<td colspan="3" >
												<input class="btn no-border" type="reset" value="Reset">
											</td>
										</tr>
									</tbody>
								</table>
								</form>
							</div>
							<div class="table-responsive">
								<table id="sample-table-1" class="table table-striped table-bordered table-hover">
									<tbody>
										<tr>
											<th>商品ID</th>
											<th>价钱</th>
											<th>库存</th>
											<th>尺码颜色</th>
											<th>操作</th>
										</tr>
										<?php if(is_array($val)): foreach($val as $key=>$v): ?><form action="<?php echo U('Home/Sort/sku');?>" method="post">
										<input type="hidden" name="goodsid" value="<?php echo ($info[id]); ?>">
										<tr>
											<td>
												<span class="rank"><?php echo ($v['id']); ?></span>
											</td>
											<td>
												<div class="cat-name">
													<div class="cat-edit">
														<div class="xd-form-group " >
															<div class="xd-field">
																<input type="text" name="price" value="<?php echo ($v['price']); ?>">
															</div>
														</div>
													</div>
												</div>
											</td>
											<td>
												<div class="cat-name">
													<div class="cat-edit">
														<div class="xd-form-group " >
															<div class="xd-field">
																<input type="text" name="stock" value="<?php echo ($v['stock']); ?>">
															</div>
														</div>
													</div>
												</div>
											</td>

											<td>
											<?php if(is_array($vs[$key])): foreach($vs[$key] as $k=>$vo): ?><div class="cat-name">
													<div class="cat-edit">
														<div class="xd-form-group " >
															<div class="xd-field">
																<?php echo ($vo[value]); ?>
															</div>
														</div>
													</div>
												</div><?php endforeach; endif; ?>
											</td>

											<td>
												<input type="hidden" name="id" value="<?php echo ($v['id']); ?>">
												<button class="btn btn-xs btn-info" type="submit"><i class="icon-edit bigger-120"></i></button>
											</td>
										</tr>
										</form><?php endforeach; endif; ?>
									</tbody>

								</table>
							</div>
						</div><!-- /span -->
					</div>
					</div>
					<div class="row">
					<div class="col-md-5"></div><div id="pages"><?php echo ($pages); ?></div>
					<style type="text/css">
					     #pages a, #pages span{
					        background-color: #fff;
					        border: 1px solid #ddd;
					        color: #337ab7;
					        float: left;
					        line-height: 1.42857;
					        margin-left: -1px;
					        padding: 6px 12px;
					        position: relative;
					        text-decoration: none;
					     }
					     #pages span{
					        background-color: #337ab7;
					        border-color: #337ab7;
					        color: #fff;
					        cursor:pointer;
					        z-index: 2;
					     }
					</style>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div><!-- /.main-content -->
	<script type="text/javascript" src="/Public/admin/js/jquery.js"></script>
	<script type="text/javascript">
		// 定义标签的开始，限制添加标签的个数
		var labelNum = 1;
		$('#y_lable_add').click(function(){
			if(labelNum < 3){
				var html = '<input type="text" name="tagname[]" style="width:120px;margin-left:20px;" class="col-xs-10 col-sm-5" />';
				$(this).siblings('input:last').after(html);
				labelNum++;
			}
		});

		// 定义限制颜色的配套
		var sizeNum = 0;
		$('.y_goods_size').toggle(function(){
			sizeNum++;
			$(this).addClass('y_lable_click');
			var size = $(this).html();
			$('#y_size_table').attr('style','text-align:center;')
			var html = '<tr style="text-align:center;" id="suk'+sizeNum+'"><td >'+size+'</td><td><input type="text" style="width:100px" name="stock"></td><td><input type="text" name="price" style="width:100px;"></td><td><input type="text" name="5" style="width:100px;"><input type="hidden" name="6" value="'+size+'"></td></tr>';
			$(this).attr('suk',sizeNum);
			$(this).parent().parent().siblings(':last').before(html);
		},function(){
			$(this).removeClass('y_lable_click');
			$('#suk'+$(this).attr('suk')).remove();
			sizeNum--;
		});
	</script>

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