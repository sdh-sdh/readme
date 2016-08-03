<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        // echo 'ceshoi ';
	    // dump(send_email('1608524936@qq.com','邮件标题','邮件内容'));
	    // 如果群发邮件 则传入数组即可
	    // // $emails=array('b1@baijunyao.com','b2@baijunyao.com');
	    // send_email('$emails','邮件标题','邮件内容');
	    $this->display();
    }

//短信发送  
  //   public function sms(){

  //   	if(!empty($_GET['sms'])){
		// 	$num = $_GET['num'];
		// 	$message = $_GET['message'];
		// 	set_phone($num,$message);
		// }
  //   }

    /*

	短信发送
  //   */
  //   public function sms(){
  //   	session_start();
  //   	// dump($_POST);
		// $curl = curl_init();
		// curl_setopt($curl, CURLOPT_URL, $_POST['mobile']);
		// curl_setopt($curl, CURLOPT_HEADER, false);
		// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($curl, CURLOPT_NOBODY, true);
		// curl_setopt($curl, CURLOPT_POST, true);
		// curl_setopt($curl, CURLOPT_POSTFIELDS, $_POST['send_code']);
		// $return_str = curl_exec($curl);
		// curl_close($curl);
		// dump($return_str);
  //   }
}