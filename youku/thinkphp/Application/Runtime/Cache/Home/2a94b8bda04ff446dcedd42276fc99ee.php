<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title><?php echo ($title); ?></title>
<link rel="stylesheet" href="/Public/Home/css/bootstrap.min.css">
<link rel="stylesheet" href="/Public/Home/css/index.css">
    <style type="text/css">
        .pages a, .pages span {
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

        .pages span {
            background-color: #337ab7;
            border-color: #337ab7;
            color: #fff;
            cursor: pointer;
            z-index: 2;
        }
    </style>
</head>
<body>

	<div class="container">
		<div class="row">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<div class="collapse navbar-collapse"
						id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="<?php echo U('Home/User/layout');?>">注销</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-xs-3" style="padding-left: 0">
				<div class="panel-group" id="accordion" role="tablist">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion"
									href="#collapseOne"> 账户信息 </a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in"
							role="tabpanel">
							<div class="panel-body">
								<ul class="list-group">
									<li class="list-group-item" style="border: 0">卡号：<b><?php echo ($info['kahao']); ?></b></li>
									<li class="list-group-item" style="border: 0">余额：<b><?php echo ($info['account']); ?></b>元</li>
                                    <?php if(!empty($level)): ?><li class="list-group-item" style="border: 0">名称：<b><?php echo ($level['name']); ?></b></li>
                                        <li class="list-group-item" style="border: 0">接收支付结果的url：<br>
                                            <b style="word-wrap: break-word;"><?php echo ($level['resulturl']); ?></b>
                                        </li>
                                        <li class="list-group-item" style="border: 0"><a href="<?php echo U('Home/Index/download');?>">点击下载支付接口</a></li><?php endif; ?>
								</ul>
							</div>
						</div>
					</div>
                    <?php if(empty($level)): ?><div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse"
                                        data-parent="#accordion" href="#collapseTwo"> 商户申请 </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse"
                                role="tabpanel">
                                <div class="panel-body">
                                    <ul class="list-group">
                                        <li id="apply" class="list-group-item" data-toggle="modal" data-target="#applyForm" style="border: 0">
                                            <a href="javascript:;">立即申请</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><?php endif; ?>
				</div>
			</div>

			<div class="col-xs-9" style="padding: 0">
				<div class="panel panel-default">
					<div class="panel-heading">
                        <ul id="myTab" class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">转出</a></li>
                            <li class=""><a href="#profile" data-toggle="tab">转入</a></li>
                        </ul>
					</div>
					<div class="panel-body">
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" id="home">
                                <?php if(empty($orderInfo)): ?><h1 class="text-center">暂无信息可查</h1>
                                    <?php else: ?>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="col-md-2">账单号</th>
                                            <th class="col-md-2">金额</th>
                                            <th class="col-md-3">日期</th>
                                            <th class="col-md-5">收款账号</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(is_array($orderInfo)): foreach($orderInfo as $key=>$vo): ?><tr>
                                                <td><?php echo ($vo['id']); ?></td>
                                                <td><?php echo ($vo['money']); ?></td>
                                                <td><?php echo ($vo['time']); ?></td>
                                                <td><?php echo ($vo['gather']); ?></td>
                                            </tr><?php endforeach; endif; ?>
                                        </tbody>
                                    </table>
                                    <div class="col-md-6 col-md-offset-6 pages"><?php echo ($OutPage); ?></div><?php endif; ?>
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <?php if(empty($outInfo)): ?><h1 class="text-center">暂无信息可查</h1>
                                    <?php else: ?>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="col-md-2">账单号</th>
                                            <th class="col-md-2">金额</th>
                                            <th class="col-md-3">日期</th>
                                            <th class="col-md-5">付款账号</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(is_array($outInfo)): foreach($outInfo as $key=>$vo): ?><tr>
                                                <td><?php echo ($vo['id']); ?></td>
                                                <td><?php echo ($vo['money']); ?></td>
                                                <td><?php echo ($vo['time']); ?></td>
                                                <td><?php echo ($vo['source']); ?></td>
                                            </tr><?php endforeach; endif; ?>
                                        </tbody>
                                    </table>
                                    <div class="col-md-6 col-md-offset-6 pages"><?php echo ($InPage); ?></div><?php endif; ?>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="applyForm" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" id="myModalLabel">商户申请</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" role="form" id="appForm">
						<div class="form-group">
							<label for="name" class="col-sm-4 control-label">贵公司大名</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="name" id="name"
									placeholder="贵公司大名">
							</div>
						</div>
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">接收支付结果的URL</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="resulturl" id="resultUrl"
                                       placeholder="接收支付结果的URL">
                            </div>
                        </div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" id="appFormSub" class="btn btn-primary">确定</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<script src="/Public/Home/js/jquery-1.11.3.min.js"></script>
	<script src="/Public/Home/js/bootstrap.min.js"></script>
	<script>
		$(function() {
			//	分页
			$('#page').addClass('text-center').find('ul')
					.addClass('pagination').css('margin', '0');

			$('#appFormSub').click(function() {
				
				var data = $('#appForm').serialize();
				var url = "<?php echo U('Home/Index/apply');?>";
				$.post(url, data, function (msg) {
					
					if (msg != 0) {
						setTimeout("$('#applyForm').modal('hide')", 500);
						$('#applyForm').on('hidden.bs.modal', function () {
							location.href = location.href;
						});
					}
				}, 'json');
			});

            $('#modifyUrl').click();
		});
	</script>
</body>
</html>