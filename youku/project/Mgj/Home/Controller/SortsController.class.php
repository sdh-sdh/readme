<?php
namespace Home\Controller;

class SortsController extends MaintainController
{

	/**
		店铺首页
	**/
	public function index()
	{
		$asortid = intval($_GET['asortid']);
		$id = intval($_GET['uid']);
		$good = M('goods');
		$shop = M('store_shop');
		$col = $shop->where('uid='.$id)->find();
		if(!$col){
			echo '<script>alert("无该店铺");window.location.href="/";</script>';
			die;
		}
		$shops = $shop->alias('a')->field('a.*,b.*')->join('left join feiyue_user_detail b on a.uid = b.userid')->where('uid='.$id)->select();
		$where = array('audit'=>1,'state'=>1,'storeid'=>$shops[0]['uid'],'asortid'=>$asortid,'storeid'=>$id);
		$where1 = array('audit'=>1,'state'=>2,'storeid'=>$shops[0]['uid'],'asortid'=>$asortid,'storeid'=>$id);
		$where2 = array('audit'=>1,'state'=>3,'storeid'=>$shops[0]['uid'],'asortid'=>$asortid,'storeid'=>$id);
		$where3 = array('audit'=>1,'state'=>4,'storeid'=>$shops[0]['uid'],'asortid'=>$asortid,'storeid'=>$id);
		$where4 = array('audit'=>1,'storeid'=>$shops[0]['uid'],'asortid'=>$asortid,'storeid'=>$id);
		if ($asortid) {
			$goods = $good->where($where)->limit(12)->select();
		}else{
			$goods = $good->where('audit=1 and state=1 and storeid='.$shops[0]['uid'])->limit(12)->select();
		}
		if ($asortid) {
			$goods1 = $good->where($where1)->limit(12)->select();
		}else{
			$goods1 = $good->where('audit=1 and state=2 and storeid='.$shops[0]['uid'])->limit(12)->select();
		}
		if ($asortid) {
			$goods2 = $good->where($where2)->limit(12)->select();
		}else{
			$goods2 = $good->where('audit=1 and state=3 and storeid='.$shops[0]['uid'])->limit(12)->select();
		}
		if ($asortid){
			$goods3 = $good->where($where3)->limit(12)->select();
		}else{
			$goods3 = $good->where('audit=1 and state=4 and storeid='.$shops[0]['uid'])->limit(12)->select();
		}
		if ($asortid){
			$goods4 = $good->where($where4)->limit(12)->select();
		}else{
			$goods4 = $good->where('audit=1 and storeid='.$shops[0]['uid'])->select();
		}
		$shopo = $shop->alias('x')->field('x.*,b.*')->join('left join feiyue_store b on x.uid=b.uid')->where('x.uid='.$id)->select();
		foreach ($shopo as $key => $v) {
			$shopo[$key]['url'] = U('Home/Sorts/index', array('uid'=>$id,'asortid'=> $v['asortid']));
		}
		if($_SESSION['home']['id']){
			$w = array('r.userid'=>$_SESSION['home']['id'],'w.uid'=>$id);
			$c = $shop->alias('w')->field('w.*,e.*,r.*')->join('left join feiyue_goods e on w.uid=e.storeid')->join('left join feiyue_collect r on w.shopid=r.goodid')->where($w)->select();
			$this->c = $c;
			$count = $good->where('storeid='.$shops[0]['uid'])->select();
			$con = count($count);
			if($_SESSION['home']['id']){
				$userid = M('user_detail');
				$ud = $userid->where('userid='.$_SESSION['home']['id'])->find();
				$this->ud = $ud;
			}else{

			}
			$this->con = $con;
		}else{
			'';
		}
		$this->goods = $goods;
		$this->goods1 = $goods1;
		$this->goods2 = $goods2;
		$this->goods3 = $goods3;
		$this->goods4 = $goods4;
		$this->shops = $shops;
		$this->shopo = $shopo;
		$this->display();
	}
	public function Sortlogin(){
		$this->display();
	}

	/**
		店铺新用户注册
	**/
	public function register()
	{
		$this->display();
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
			$data['store'] = $_POST['store'];
			//调用验证规则，过滤数据
			if($detail -> validate($rule) -> create($data)){
				//获取新注册用户的ID
				$userAdd = $detail -> add();
				if($userAdd){
					session('home', array('id' => $id)); //session中存取用户新注册的id
					$this -> redirect("Home/Sort/control");
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

	public function login(){
		$this->display();
	}

	/**
		商家用户登录验证
	**/
	public function logins(){
		//调用登录验证方法
		if($_POST['sub']){
    		$tiaozhuan = R('User/checklogin');
	    	if($tiaozhuan){
	    		redirect(U('Home/Sort/control'));
			}else{
				$this->error('登录失败');
			}

		}else{
			redirect(U('Home/Sorts/login'));
		}
		$this -> display();
	}
	/**
	用户注销
	**/
    public function loginOut(){
    	$url= I('post.url');
    	unset($_SESSION['home']);
		if(empty($_SESSION['home'])){
			echo 1;
		}else{
			echo 2;
		}
	}
	/**
	店铺注销
	**/
    public function log(){

    	unset($_SESSION['home']);
    	redirect(U('Home/Sort/control'));
	}

	/**
		店铺收藏
	*/
	public function shoucang()
	{
		$collect = M("collect");	
		$goods=M("store_shop");        
		$map["goodid"] = $_POST['id'];
        $map["userid"] = $_SESSION['home']['id'];
        if(!($id = $collect->where($map)->find()['id'])){
        		$con = $goods->find($_POST['id']);
        		$map['pic'] = $con['shoplogo'];
        		$map['time'] = time();
        		$map['goodname'] = $con['shopname'];
        		$map['state'] = 2;
        		$map['url'] = $_POST['url'];
                if($collect->add($map)){
                    echo 1;
            	}
        }else{
        	if($collect->delete($id)){
            	echo 2;
        	}
        }
	}
}