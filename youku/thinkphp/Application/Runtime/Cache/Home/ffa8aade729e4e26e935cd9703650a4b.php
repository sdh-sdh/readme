<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title><?php echo ($title); ?></title>
<link rel="stylesheet" href="/Public/Home/css/bootstrap.min.css">
<link rel="stylesheet" href="/Public/Home/css/index.css">
<style>
.list-group-item {
	border: 0;
}
</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse"
						id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="<?php echo U('Home/User/login');?>">客服在线</a></li>
							<li><a href="#">常见问题</a></li>
							<li><a href="#">支付管理</a></li>
						</ul>
					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container-fluid -->
			</nav>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">我的订单</h2>
					</div>
					<div class="panel-body" style="padding: 0;">
						<ul class="list-group" style="border: 0;">
							<li class="list-group-item">金 额： <span id="money"
								class="color-red"><?php echo ($money); ?></span> 元
							</li>
							<li class="list-group-item">收 款 方： <span id="company"
								data-id="<?php echo ($company['uid']); ?>" class="color-red"><?php echo ($company['name']); ?></span>
							</li>
							<li class="list-group-item">日 期： <?php echo ($time); ?></li>
							<li class="list-group-item">订单号： <?php echo ($order); ?></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-md-9">
				<?php if($paid == 1): ?><div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">已支付</h2>
					</div>
					<div class="panel-body">
						<div class="row" style="height: 28px;"></div>
						<div class="row">
							<h1 class="text-center">账单已支付完成!</h1>
						</div>
					</div>
				</div>
					
				<?php else: ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">卡密支付</h2>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-3 col-md-offset-2">1. 填写您的账号信息</div>

							<div class="col-md-1">
								<span class="glyphicon glyphicon-chevron-right"></span>
							</div>
							<div class="col-md-3">2. 支付成功</div>
						</div>
						<div class="row" style="height: 28px;"></div>

						<div class="row">
							<form class="form-horizontal" role="form" id="payForm">
								<input type="hidden" value="<?php echo ($money); ?>" name="money">
								<input type="hidden" value="<?php echo ($order); ?>" name="order">
								<div class="form-group">
									<label for="phone" class="col-sm-3 control-label">支付账号</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" id="phone"
											name="phone" placeholder="支付账号(手机号)">
									</div>
								</div>
								<div class="form-group">
									<label for="payword" class="col-sm-3 control-label">支付密码</label>
									<div class="col-sm-5">
										<input type="password" class="form-control" id="payword"
											name="payword" placeholder="支付密码">
									</div>
								</div>
								<div class="form-group">
									<label for="msgword" class="col-sm-3 control-label">短信验证</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="msgword"
											name="msgword" placeholder="验证码">
									</div>
									<div class="col-sm-2" style="padding: 0;">
										<button id='getPhoneCode' code-url="<?php echo U('Home/Order/PCode');?>"
											type="button" class="btn btn-info">点击获取验证码</button>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-9">
										<button type="button" id="paySub"
											sub-url="<?php echo U('Home/Order/check');?>" class="btn btn-default">提交</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div><?php endif; ?>
                <div id="errorTip">

                </div>
			</div>
		</div>
	</div>


	<script src="/Public/Home/js/jquery-1.11.3.min.js"></script>
	<script src="/Public/Home/js/bootstrap.min.js"></script>
	<script src="/Public/Home/js/order.js"></script>
</body>
</html>