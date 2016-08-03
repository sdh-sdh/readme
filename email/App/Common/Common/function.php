<?php
    /**
     * 发送邮件
     * @param  string $address 需要发送的邮箱地址 发送给多个地址需要写成数组形式
     * @param  string $subject 标题
     * @param  string $content 内容
     * @return boolean       是否成功
     */
    function send_email($address,$subject,$content){
        $email_smtp=C('EMAIL_SMTP');
        $email_username=C('EMAIL_USERNAME');
        $email_password=C('EMAIL_PASSWORD');
        $email_from_name=C('EMAIL_FROM_NAME');
        if(empty($email_smtp) || empty($email_username) || empty($email_password) || empty($email_from_name)){
            return array("error"=>1,"message"=>'邮箱配置不完整');
        }
        require './ThinkPHP/Library/Org/Nx/class.phpmailer.php';
        require './ThinkPHP/Library/Org/Nx/class.smtp.php';
        $phpmailer=new \Phpmailer();
        // 设置PHPMailer使用SMTP服务器发送Email
        $phpmailer->IsSMTP();
        // 设置为html格式
        $phpmailer->IsHTML(true);
        // 设置邮件的字符编码'
        $phpmailer->CharSet='UTF-8';
        // 设置SMTP服务器。
        $phpmailer->Host=$email_smtp;
        // 设置为"需要验证"
        $phpmailer->SMTPAuth=true;
        // 设置用户名
        $phpmailer->Username=$email_username;
        // 设置密码
        $phpmailer->Password=$email_password;
        // 设置邮件头的From字段。
        $phpmailer->From=$email_username;
        // 设置发件人名字
        $phpmailer->FromName=$email_from_name;
        // 添加收件人地址，可以多次使用来添加多个收件人
        if(is_array($address)){
            foreach($address as $addressv){
                $phpmailer->AddAddress($addressv);
            }
        }else{
            $phpmailer->AddAddress($address);
        }
        // 设置邮件标题
        $phpmailer->Subject=$subject;
        // 设置邮件正文
        $phpmailer->Body=$content;
        // 发送邮件。
        if(!$phpmailer->Send()) {
            $phpmailererror=$phpmailer->ErrorInfo;
            return array("error"=>1,"message"=>$phpmailererror);
        }else{
            return array("error"=>0);
        }
    }


    /*
        发送短信

    */
    function set_phone($num,$message){
    //header("Content-type: text/html; charset=utf-8");
    date_default_timezone_set('PRC'); //设置默认时区为北京时间
    //短信接口用户名 $uid
    $uid = '';
    //短信接口密码 $passwd
    $passwd = '';
            
            //$num ='136087976876';
            
    $msg = rawurlencode(mb_convert_encoding($message, "gb2312", "utf-8"));
    $gateway = "http://mb345.com:999/ws/Send.aspx?CorpID={$uid}&Pwd={$passwd}&Mobile={$num}&Content={$msg}&Cell=&SendTime=";
    $result = file_get_contents($gateway);
     
    if(  $result >= 0 )
    {
                    echo $gateway;
                    echo $result;
    echo "发送成功! 发送时间".date("Y-m-d H:i:s");
    }
    else
    {
    echo "发送失败, 错误提示代码: ".$result;
    }
    exit;
    }