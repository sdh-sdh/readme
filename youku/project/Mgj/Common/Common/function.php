<?php

	//短信
	function sendMessage($to, $code){
		//http://www.xiaohigh.com/sendMessage/index.php?to=18311422275&code=5211314&class=117&web=%E5%B0%8Fhigh%E5%8D%9A%E5%AE%A2  ^\d+$
		//使用file_get_contents该函数在采集远程数据的时候一定要加超时时间
		// $res = file_get_contents("http://www.xiaohigh.com/sendMessage/index.php?to=".$to."&code=".$code."&class=117&web=小high博客");
		$curl = new \Org\Util\Curl();
		$res = $curl->get("http://www.xiaohigh.com/sendMessage/index.php?to=".$to."&code=".$code."&class=117&web=飞跃_蘑菇街", 10);
		//解析结果
		$result = json_decode($res);
		//获取状态吗
		$code = $result->resp->respCode;
		//做判断
		if($code == '000000'){
			return true;
		}else{
			return false;
		}
	}


	//发送邮件
	function sendMail($to, $content){

		//创建对象
		$mail=new \Org\Util\PHPMailer();
        $mail->CharSet = "utf-8";  //设置采用utf8中文编码
        $mail->IsSMTP();  //设置采用SMTP方式发送邮件
        $mail->Host = "smtp.163.com";   //设置邮件服务器的地址
        $mail->Port = 25;   //设置邮件服务器的端口，默认为25  如果是gmail的话是443
        $mail->From = "graceladys@163.com";  //设置发件人的邮箱地址
        $mail->FromName = "飞跃_蘑菇街"; //设置发件人的姓名
        $mail->SMTPAuth = true; //设置SMTP是否需要密码验证，true表示需要
        $mail->Username = "graceladys@163.com";
        $mail->Password = "Jhl930717,";
        $mail->Subject = "蘑菇街网站验证邮件";//设置邮件的标题
        $mail->AltBody = "text/html"; // optional, comment out and test
        $mail->Body = $content;
        $mail->IsHTML(true);            //设置内容是否为html类型

        $mail->AddAddress(trim($to), $name);     //设置收件的地址
        if (!$mail->Send()) {                    //发送邮件
            echo '发送失败:'.$mail->ErrorInfo;
        } else {
            echo "发送成功";
        }
	}

	/**
	 *	获取订单的支付状态
	 *
	 *	@param 		$state 		string
	 */
	function orderState ($state)
	{
		switch ($state) {
			case 0:	return '未支付';
			case 1:	return '已支付';
			case 2:	return '已发货';
			case 3:	return '待评价';
			case 4:	return '完成';

			default:return '未知';
		}
	}