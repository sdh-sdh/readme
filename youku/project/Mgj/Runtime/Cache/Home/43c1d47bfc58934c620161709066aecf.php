<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>后台首页 - 小店管理后台</title>
    <link rel="stylesheet" href="/Public/Home/css/control.css">
    
	<link rel="stylesheet" href="/Public/Home/css/sortreg.css">
	<script src="/Public/Home/js/jquery-1.11.3.min.js"></script>


    <link rel="stylesheet" href="/Public/Home/css/bootstrap.min.css">
	<script src="/Public/Home/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="/Public/Home/js/sort.js"></script>
	<script src="/Public/Home/js/bootstrap.min.js"></script>
</head>
<body class=" pace-done" style="background:#e7e8eb">
	<div id="J_ManageNav" class="xd-manage-nav">
	    <div class="content xd-fm1200 clearfix">
	        <a href="" class="logo fl">小店|管理后台</a>
	        <div class="menu fl">
	            <a href="" target="_blank">商家社区</a>
	            <a href="" target="_blank">商家培训</a>
	            <a href="" target="_blank">入驻市场</a>
	            <a href="" target="_blank">帮助中心</a>
	        </div>
	        

	    </div>
	</div>
    <div id="J_ManageBody" class="xd-manage-body">
        <div class="content xd-fm1200 clearfix">
            <div id="J_Page" class="xd-manage-content fl">
            
	<!-- 主体内容 -->
	<div class="zc_main">
		<!-- 大图片logo -->
		<div class="zc_img">
			<img src="/Public/Home/image/xiaodian.png" alt="">
		</div>
		<!-- 用户注册填写 -->
		<div class="zc_fk">
			<!-- 表单题目 -->
			<div class="zc_fk_lab">
				<h3>新用户注册</h3>
			</div>
			<div class="clear"></div>
			<!-- 表单提交 -->
			<div class="zc_form">
				<form action="<?php echo U('Home/Sorts/checkRegistr');?>" method="post">
					<div class="zc_form_inp">
						<p>
							<select name="" class="zc_form_sel">
								<option>中国</option>
								<option>美国</option>
								<option>英国</option>
								<option>意大利</option>
							</select>
							<input type="text" style="width:164px;" placeholder="手机号码" name="tel" maxlength="32"><span></span>
						</p>
						<p>
							<input id="code" type="text" style="width:164px; float:left;" placeholder="验证码" name="code">
							<img id="imgid" src="/Public/Home/images/zc_yzm.jpg">
						</p>
						<p>
							<input type="password" placeholder="请设置密码(6-20位)" name="password">
						</p>
					</div>
					<div class="zc_form_sub">
						<input type="submit" value="立即注册" name="sub">
					</div>
					<div class="zc_ty">
						<input id="d_regs" type="checkbox" checked name="store" value="1">
						<label for="zc_regs">
							我已阅读并且同意
							<a target="_blank" href="#">《小店入驻协议》</a>
						</label>
					</div>
				</form>
				<div class="zc_zh">
				<!-- 链接登陆页面 -->
					<a href="<?php echo U('Home/Sorts/login');?>">已有账号</a>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		//点击获取验证码
		$("#imgid").click(function(){
			var s = 'code?rand=' + Math.random();
			$(this).attr('src', s);

		})

		//验证电话号码是否正确
		$("input:first").blur(function(){
				var that = $(this);
				if(!$(this).val().match(/^\d{11}$/)){
					alert("电话号码不正确，请重新输入！");
					that.val('');
				}
				//验证新用户注册的手机号是否已被注册
				var uname = $("input:first").val();

				$.ajax({
						"type" : "post",
						"data" : {"tel":uname},
						"url" : "/index.php/Home/Sorts/getTel",
						"success" : function(d){
							if(d == '1'){
								alert("该手机号已存在，请重新输入！");
								that.val('');
							}
						},
						"dataType" : "json"
				});
		})


		//验证密码
		$("input:password").blur(function(){
			if($(this).val().length < 6 || $(this).val().length >20){
				alert("请输入6-20位的密码");
			}
		})

		//验证复选框(是否同意协议)
		$("input:checkbox").change(function(){
			if(!($(this).attr("checked") == "checked")){
				$("input:submit").attr("disabled",true);
			}
		})

		//验证点击提交后的信息
		$("input:submit").click(function(){
			if($("input:first").val() == ""){
				alert("电话号码不能为空！");
				return false;
			}
			if($("#code").val() == ""){
				return false;
			}
			if($("input:password").val() == ""){
				return false;
			}
		})
	</script>

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
                            <a class="app-link" target="_blank">iPhone下载</a>
                            <a class="apk-link" href="" target="_blank">Android下载</a>
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
</body>
</html>