<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {


    public function login(){
		$this->display('login');
    }

	public function layout ()
	{
		unset($_SESSION['home']['id']);
		$this->login();
    }

	public function register ()
	{
		$this->display();
	}

	public function checkRegister ()
	{
		$user = M('user');
		$_POST['password'] = md5($_POST['password']);
		$user->create();
		$res = $user->add();
		if ($res){
			$_SESSION['home']['id'] = $res;
			$d = M('user_details');
			$data['uid'] = $res;
			$data['account'] = 1000000;
			$data['level'] = 1;
			$data['kahao'] = mt_rand(10000000, 99999999);
			$d->add($data);
			echo 1;
		}else {
			echo 0;
		}
	}

	public function checkPhone ()
	{
		$name = I('post.phone');
		$user= M('user');
		$res = $user->where('phone=\''.$name.'\'')->find();
		if (empty($res))
		{
			echo '1';
		}else{
			echo '0';
		}
	}

	/**
	 * 	手机验证码 发送过程
	 */
	public function phoneCode ($to, $code)
	{
		$curl = new \Org\Util\Curl();
		$res = $curl->get("http://www.xiaohigh.com/sendMessage/index.php?to=".$to."&code=".$code."&class=117&web=飞跃_蘑菇街", 20);
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


	/**
	 * 	登录部分
	 *
	 */
	public function checkLogin ()
	{
		$user = M('user');

		$_POST['password'] = md5($_POST['password']);

		$res = $user->where($_POST)->find();

		if ($res)
		{
			$_SESSION['home']['id'] = $res['id'];
			redirect('/Home/Index/index', 2, '页面跳转中...');
		} else
		{
			$this->login();
		}
	}

}