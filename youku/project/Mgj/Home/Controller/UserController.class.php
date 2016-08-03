<?php
namespace Home\Controller;

class UserController extends MaintainController
{
	/**
		用户注册
	**/
    public function register()
	{
		$this -> display();
    }

    /**
    	注册验证
    **/
	public function checkRegistr ()
	{
		$user = M('user');
		$detail = M("user_detail");
		//定义验证规则
		$rule = array(
			array("tel","require","手机号码不能为空"),
			array("tel","11","电话号码必须是11位的！",1,'length',1),
			array("tel","/^\d{11}$/","电话号码必须是11位数字！",1,'regex',1),
			array("password","require","密码必须填写！"),
		);

		//验证码判断
		if($this -> checkCode()){
			$data = $_POST;
			$data['password'] = md5($_POST['password']);
			$data['username'] = $_POST['tel'];
			//user表添加数据
			$id = $user->add($data);
			$data['userid'] = $id;
			//获取，注册时间
			$data['rtime'] = time();
			//调用验证规则，过滤数据
			if($detail -> validate($rule) -> create($data)){
				//获取新注册用户的ID
				$userAdd = $detail -> add();
				if($userAdd){
					session('home', array('id' => $id)); //session中存取用户新注册的id
					$this -> redirect("Home/Userinfo/userinfo");
				}
			}
		}else{
			$this -> error("验证码不正确！");
			exit;
		}
	}

	/**
    	验证新用户注册的手机号是否已被注册
    **/
    public function getTel(){
		$tel = $_POST['tel'];
		$detail = M("user_detail");
		$count = $detail -> where("tel = {$tel}") -> count();
		if($count){
			$this -> ajaxReturn('1');
		}
	}

	/**
    	设置验证码相关参数的方法
    **/
	public function code(){
		$config = array(
			"length" => 4, // 验证码位数
			"fontSize" => 12, // 验证码字体大小
			"useNoise" => false, // 关闭验证码杂点
			"useImgBg" => true // 开启验证码背景图片功能
		);
		$Verify = new \Think\Verify($config);
        $Verify->entry();
	}

	/**
		验证码检测，check()方法检测验证码的输入是否正确
	**/
	private function checkCode(){
		$Verify = new \Think\Verify();
        $code = $_POST['code'];
        return $Verify -> check($code);
	}

	/**
		用户登录
	**/
    public function login(){
		$this -> display();
    }

	public function aLogin()
	{
		//判断用户名及密码是否都存在
		if($_POST){
			if($this->checklogin()){
				//	session 中的商品放入数据库
				$this->cartToSql();
				if($a = $_SESSION['backUrl']){
					unset($_SESSION['backUrl']);
				}else{
					$a = U('Home/Index/index');
				}
				echo $a;
			}else{
				$this->ajaxReturn(0);
			}
		}
	}

    /**
		登录验证
	 *
    **/
	public function checklogin(){
		$user = M("user");
		//定义验证规则
		$rule1 = array(
			array("username","require","用户名不能为空"),
			array("username","6,20","用户名必须是6-20位的！",1,'length',1),
			array("username","/^\w{6,20}$/","用户名必须是6-20位的！",1,'regex',1),
			array("password","require","密码必须填写！"),
		);
		//调用验证规则，过滤数据

		if($user->validate($rule1)){
			//判断用户是否是使用用户名登录
			$map['username'] = $_POST['username'];
			$map['password'] = md5($_POST['password']);
			$count = $user -> where($map) -> count();
			if($count){
				$rdata = $user -> where($map) -> select();
				$id = $rdata[0]['id'];
				session('home', array('id' => $id));

				return true;
			}else{
				//登录失败
				return false;
			}
		}
		return false;
	}


    /**
    	用户手机登录
    **/
    public function loginp(){
    	//实例化对象
    	$area = M('think_area');
    	$res = $area->where("upid=0")->select();
    	$this->assign('data',$res);
    	$this->display();
    }


    /**
    	手机动态验证(修改密码,手機無密碼登錄)
    **/
    public function codeMessage(){
    	$phone = I('post.phone');
    	//判断数据库是否存在电话
    	$detail = M('user_detail');
    	$res = $detail->where("tel = '{$phone}'")->find();
    	// var_dump($res);die;
    	$aaa = null;
    	//将当前用户的信息存入在session中
    	$_SESSION['home']['id']=$res['userid'];
    	//默认验证码
    	$code = rand(1000,9999);
    	//如果网络畅通的情况下为真,不通的情况下为假
    	if($res){
//     		if(sendMessage($phone,$code)){

//     		}
    		echo $code;

    	} else {
    		echo 0;
    	}
    }


    /**
    	用户注销
    **/
    public function loginOut(){
		unset($_SESSION['home']);
		$this->redirect('Home/Index/index');
	}


	/**
	 * 	登录成功后检查session 购物车 如果有 将商品加如购物车数据库
	 */
	protected function cartToSql ()
	{
		if ($_SESSION['cart'])
		{
			$ids = array_keys($_SESSION['cart']);
			$sid['id'] = ['in', $ids];
			//	获取价格
			$sku = M('goods_sku');
			$p = $sku->field('price')->where($sid)->select();
			$ginfo = array_values($_SESSION['cart']);
			$data = [];
			$o = M('shop_cart');
			foreach ($ids as $k => $v)
			{
				$res = $o->where('userid='.$_SESSION['home']['id'].' and skuid='.$ginfo[$k]['skuid'])->find();
				if ($res)
				{
					$d = [
						'number'	=>	$res['number'] + $ginfo[$k]['num'],
						'all_price'	=>	$p[$k]['price'] * $ginfo[$k]['num'] + $res['all_price']
					];
					$o->where('userid='.$_SESSION['home']['id'].' and skuid='.$ginfo[$k]['skuid'])
						->setInc($d);
					continue;
				}
				$data[$k]['userid'] = $_SESSION['home']['id'];
				$data[$k]['skuid'] = $ginfo[$k]['skuid'];
				$data[$k]['number'] = $ginfo[$k]['num'];
				$data[$k]['price'] = $p[$k]['price'];
				$data[$k]['all_price'] = $ginfo[$k]['num'] * $p[$k]['price'];
			}
			$res = $o->addAll($data);
			if ($res)
			{
				unset($_SESSION['cart']);
			}
		}
	}


	/**
		用户通过短信发送验证码修改密码
	**/
	public function uppwd(){
		// sendMail('460363160@qq.com','欢迎您注册飞跃_蘑菇街网站<a href="http://www.baidu.com">点击激活</a>');
		$this->display();
	}


	/**
		用户验证后密码编辑
	**/
	public function editpwd(){
		//获取传过来的电话
		$tel = $_POST['tel'];
		//实例化对象
		$detail = M('user_detail');
		$res = $detail->where('tel='.$tel)->select();
		$this->assign('res',$res);
		$this->display();
	}

	/**
		用户验证后密码修改
	**/
	public function updatepwd(){
		//获取post
		$tel = $_POST['tel'];
		$_POST['password'] = md5($_POST['password']);
		//实例化
		$detail = M('user_detail');
		//数据库查询
		$data = $detail->where("tel=".$tel)->select();
		$id = $data[0]['userid'];
		//执行数据库修改
		$user = M('user');
		$user->create();
		$res = $user->where("id=".$id)->save();
		if($res){

			$this->success('用户密码修改成功','show',2);
		}else{
			$this->error('用户密码修改失败','uppwd',2);
		}

	}

	/**
		用户修改密码成功,展示页面
	**/
	public function show(){
		$this->display();
	}
}