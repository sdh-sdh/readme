<?php
namespace Home\Controller;

class UserinfoController extends CommonController {
	/**
		用户信息编辑展示
	**/
	public function userinfo(){
		//判断session中是否有值,用户是否登录
		if(!$_SESSION['home']['id']){
			echo "<script>alert('您还没有登录，请先登录或注册！');</script>";
			$this->redirect("Home/User/login");
			die();
		}
		//实例化对象
		$area = M('think_area');
		$detail = M("user_detail");
		$result = $area->where('level=1')->select();
		$url = U('Home/User/login');
		if(!$_SESSION['home']['id']){
			// echo "<script>alert('请先登录或注册');</script>";
			redirect($url);
			die();
		}
		//查出用户表中的数据
		$res = $detail -> where("userid = {$_SESSION['home']['id']}") -> select();
		//把用户表中的数据分配给模板显示
		$this->assign('res',$result);
		$this -> assign('data',$res);
		$this -> display();
	}

	/**
		用户信息修改
	**/
	public function userInfoUpdate(){

		$detail = M("user_detail");
		//判断session中是否有值,用户是否登录
		if(!$_SESSION['home']['id']){
			$this->redirect("Home/User/login");
			die();
		}

		if($_POST['sub']){
			//判断用户ID在详情表中是否存在，如果存在则执行修改操作，如果不存在则执行插入操作
			$count = $detail -> where("userid = {$_SESSION['home']['id']}") -> count();
			// $_POST['userid'] = $_SESSION['home']['id'];
			if($count){
				if($detail -> create()){
					$res = $detail -> where("userid = {$_SESSION['home']['id']}") -> save();
				}
			}else{
				if($detail -> create()){
					$result = $detail -> add();
				}
			}
			if(isset($res) || isset($result)){
				echo "<script>alert('用户修改成功');</script>";
				$this -> redirect("Userinfo/userinfo");
			}else{
				$this -> error("用户修改失败!!！");
			}
		}
	}
	/**
		判断所在地Ajax传过来的值(市)
	**/
	public function infoAjax(){
		$area = M('think_area');
		//获取ajax传过来的值
		$id = I('get.id');
		$data = $area->where('upid='.$id)->select();
		$this->ajaxReturn($data);

	}
	/**
		判断所在地Ajax传过来的值(县区)
	**/
	public function addressAjax(){
		$area = M('think_area');
		//获取ajax传过来的值
		$id = I('post.id');
		$res = $area->where('upid='.$id)->select();
		$this->ajaxReturn($res);

	}
	/**
		处理ajax请求，判断用户名是否已经存在
	**/
	public function getNickname(){
		//接收Ajax传过来的用户名
		$nickname = $_POST['nickname'];
		$detail = M("user_detail");
		$count = $detail ->  field('userid') ->where("nickname = '{$nickname}'") -> count();
		if($count){
			$this -> ajaxReturn('3');
		}
	}

	/******************************************************************************************/

	/**
		执行文件上传的方法
	**/
	public function uploadImg(){
		// 实例化上传类
		$upload = new \Think\Upload();
		// 设置附件上传大小     PHP配置文件限定(upload_max_filesize = 2M)
		$upload->maxSize = 3145728 ;
		// 设置附件上传类型
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');
		// 设置附件上传目录
		$upload->savePath = '/Uploads/';
		//文件上传保存的根路径 (必写)
		$upload->rootPath = './Public';
		// 执行上传文件
		$info = $upload->upload();

		// var_dump($info);die;
		//获取文件名
		// var_dump($_FILES);die;
		$fileName = trim($upload->rootPath,'.').$info['file']['savepath'].$info['file']['savename'];
		//制作缩略图
	    // $image = new \Think\Image();

		//打开缩略图的地址
	    // $image->open('.'.$fileName);
	    // $thumb_path = $upload->rootPath.$info['file']['savepath'].'thumb_'.$info['file']['savename'];
	    // 生成一个缩放后填充大小300*200的缩略图并保存为thumb_xxx.jpg
	    // $image->thumb(200, 200,\Think\Image::IMAGE_THUMB_CENTER)->save($thumb_path);

	    // $thumb_path = trim($thumb_path, '.');// 缩略图的路径

		// $res = array('status'=>1,'datas'=>$fileName,'thumb_data'=>$thumb_path);
		$res = array('status'=>1,'datas'=>$fileName);
		$this->ajaxReturn($res);
	}

	/**
		用户头像编辑
	**/
	public function uploded(){
		//判断session中是否有值,用户是否登录
		if(!$_SESSION['home']['id']){
			$this->redirect("Home/User/login");
			die();
		}
		//实例化对象
		$detail = M('user_detail');
		$data = $detail->where("userid={$_SESSION['home']['id']}")->select();
		$this->assign('data',$data);
		$this->display();
	}

	/**
		用户头像修改
	**/
	public function uplodededit(){

		//实例化对象
		$detail = M('user_detail');

		//判断是否上传新的头像
		if (!empty($_POST['userpic'])){

			$_POST['userpic'] = ltrim($_POST['userpic'],'/');
			$detail->create();
			$res = $detail->where("userid={$_SESSION['home']['id']}")->save();
			if($res){

				$this->success('用户头像修改成功','uploded',3);
			}else{
				$this->error('用户头像修改失败','uploded',3);
			}

			//删除原来的图片
			$this->deleteUserpic($_SESSION['home']['id']);
		}
	}
	/**
		图片删除
	**/
	private function deleteUserpic($userid)
	{
		//获取图片路径
		$path = $this->getUserpic($userid);
		//删除
		unlink($path);
	}
	/**
		封装方法 获得用户的图片路径
	**/
	private function getUserpic($userid)
	{
		$detail = M('user_detail');
		//读取
		$info = $detail->where("userid=".$userid)->find();
		return '.'.$info['userpic'];
	}
	/******************************************************************************************/
	/**
		用户收货地址
	**/
	public function address()
	{

		//获取城市级联的市
		$area = M('think_area');
		$result = $area->where("level=1")->select();
		$url = U('Home/User/login');
		if(!$_SESSION['home']['id']){
			redirect($url);
			die();
		}
		$userid = $_SESSION['home']['id'];
		//分配变量
		$this->assign('res',$result);
		$address = M('user_address');
		//查询条件(state,isdelete)
		$data = $address->where('state=0 AND isdelete=0 AND userid='.$userid)->select();
		$this->data = $data;

		//查询退货地址
		//查询条件(state,isdelete)
		$info = $address->where('state=1 AND isdelete=0 AND userid='.$userid)->select();
		$this->info = $info;
		//查询用户的详情信息
		$detail = M('user_detail');
		$userid = $_SESSION['home']['id'];
		$d = $detail->where("userid=".$userid)->find();
		//分配变量
		$this->assign('detail',$d);
		$this->display();
	}
	/**
		收货地址的添加
	**/
	public function adddizhi()
    {
        //实例化
        $address = M('user_address');
        //将POST传地址改为汉字
        $area = M('think_area');
        // $data = $_POST;
        $id = $_POST['sheng'];
        $idd = $_POST['shi'];
        $iddd = $_POST['xian'];
        $sheng = $area->find($id);
        $shi = $area->find($idd);
        $xian = $area->find($iddd);
        //拼接字符串
        $data['sheng'] = $sheng['name'];
        $data['shi'] = $shi['name'];
        $data['xian'] = $xian['name'];
        $data['address'] = $_POST['address'];
        $data['postcode'] = $_POST['postcode'];
        $data['phone'] = $_POST['phone'];
        $data['name'] = $_POST['name'];
        //判断如果获取的id为空,就执行添加操作
        if($_POST['id']== ''){
            $data['userid'] = $_SESSION['home']['id'];
            $area->create();
            if($address->add($data)){
                redirect("address");
            }
        }else{
            //执行修改操作
            $d = $_POST['id'];
            $data['userid'] = $_SESSION['home']['id'];
            //创建数据对象(根据表单提交的post数据创建数据对象)
            if($address->create()){
            	$res = $address->where("id={$d}")->save($data);
            	if($res){
                	redirect("address");
            	}else{
            		$this->error("修改失败","address",2);
            	}
            }else{
                $this->error("修改失败","address",2);
            }
        }
    }
	/**
		设置默认值
	**/
	public function defaultress(){
		$id = $_GET['id'];
		//实例化
		$adr = M('user_address');
		$def['default'] = 0;
		$uid = session('home.id');
		$res = $adr->where("userid=".$uid." AND state = 0")->save($def);
		$data['default'] = 1;
		$result = $adr->where("id=".$id." AND state = 0")->save($data);
		if($res){
			echo 1;
		}
	}

	/**
		删除地址
	**/
	public function delress(){
		$id = $_GET['id'];
		//实例化对象
		$address = M('user_address');
		//执行删除操作
		$res = $address->where("id=".$id)->setField('isdelete','1');
		if($res){
			echo 1;
		}
	}

	/******************************************************************************************/

	/**
		退货地址的添加
	**/
	public function tuidizhi()
    {
        //实例化
        $address = M('user_address');
        //将POST传地址改为汉字
        $area = M('think_area');
        $id = $_POST['sheng'];
        $idd = $_POST['shi'];
        $iddd = $_POST['xian'];
        $sheng = $area->find($id);
        $shi = $area->find($idd);
        $xian = $area->find($iddd);
        //拼接字符串
        $data['sheng'] = $sheng['name'];
        $data['shi'] = $shi['name'];
        $data['xian'] = $xian['name'];
        $data['address'] = $_POST['address'];
        $data['postcode'] = $_POST['postcode'];
        $data['phone'] = $_POST['phone'];
        $data['name'] = $_POST['name'];
        //判断如果获取的id为空,就执行添加操作
        if($_POST['id']== ''){
            $data['userid'] = $_SESSION['home']['id'];
            $data['state'] = 1;
            $area->create();
            if($address->add($data)){
                redirect("address");
            }
        }else{
            //执行修改操作
            $d = $_POST['id'];
            $data['userid'] = $_SESSION['home']['id'];
            //创建数据对象(根据表单提交的post数据创建数据对象)
            if($address->create()){
            	$res = $address->where("id={$d}")->save($data);
            	echo $address->_sql();
            	if($res){
                	redirect("address");
            	}else{
            		$this->error("修改失败","address",2);
            	}
            }else{
                $this->error("修改失败","address",2);
            }
        }
    }
    /**
		设置默认值(退货)
	**/
	public function tdefaultress(){
		$id = $_GET['id'];
		//实例化
		$adr = M('user_address');
		$def['default'] = 0;
		$uid = $_SESSION['home']['id'];
		$res = $adr->where("userid=".$uid)->save($def);//id=10and status=1
		$data['default'] = 1;
		$result = $adr->where("id=".$id)->save($data);
		if($res){
			echo 1;
		}
	}

	/******************************************************************************************/
	/**
		用户订单
	**/
	public function order(){

		//查询当前用户的信息
		$detail = M('user_detail');
		$u = $detail->where("userid=".$this->UserID)->find();
		$this->assign('u',$u);
		//获取商品订单信息
		$order = M('goods_order');
		if($_GET['state']){
			$where['o.state'] = $_GET['state']-1;
		}
		$where['o.isdelete'] = 0;
		/*******页面分页*******/
		//获取总数
		$count = $order->alias('o')->join('feiyue_user_address ad on o.adrid=ad.id')->join('feiyue_user_detail d on o.userid =d.userid and d.userid='.$this->UserID)->field('ad.*,o.*,d.')->where($where)->count();	//查询满足要求的总记录数
		//创建分页对象
		$page = new \Think\Page($count,3);
		//获得limit参数
		$limit = $page->firstRow.','.$page->listRows;
		$show = $page->show();

		//第一步:获取订单状态及用户信息
		$data = $order->alias('o')->join('feiyue_user_address ad on o.adrid=ad.id')->join('feiyue_user_detail d on o.userid =d.userid and d.userid='.$this->UserID)->field('ad.*,o.*')->where($where)->order('o.id desc')->limit($limit)->select();
		$gsku = M('goods_sku');
		$attr = M('goods_attr');
		$attrval = M('goods_attr_values');

		//三天的时间戳
		$three = 3*24*60*60;
		$time = time();

		foreach ($data as $key => $value) {

			$arr = json_decode($value['skuid'],true);
			$err = [];
			foreach ($arr as $kk => $val) {
				$brr = $gsku->alias('s')->join('feiyue_goods g on s.gid=g.id')->join('feiyue_store_shop gs on g.storeid=gs.uid')->where('s.id='.$val)->find();
				$crr = json_decode($brr['attr'],true);
				$nrr = (Array)json_decode($data[$key]['number']);

				$drr = [];
				foreach ($crr as $k => $v) {

					$a = $attr->find($k)['attrname'];
					$b = $attrval->find($v)['value'];
					$drr[] = $a.' : '.$b;

				}
				$drr[] = '数量 ：'.$nrr[$kk];
				$err[] = $drr;
			}
			$brr['myattr'] = $err;
			$data[$key]['mygoods'][] = $brr;

			//当前时间减去下订单时间
			$sheng = $time-$value['ordertime'];
			//如果剩余时间大于三天时间,说明已经过期
			if($sheng<$three){
				$data[$key]['time'] = $three - $sheng;
			}else{
				$del['isdelete'] = 1;
				$order->where('id='.$value['id'])->save($del);
			}
		}

		$this->assign('order',$data);
		$this->assign('page',$show);

		$this->display();
	}

	/**
		订单详情
	**/
	public function orderDetail(){
		//判断session中是否有值,用户是否登录
		if(!$_SESSION['home']['id']){
			$this->redirect("Home/User/login");
			die();
		}
		$userid = $_SESSION['home']['id'];
		//获取订单/商品/地址信息
		$id = $_GET['id'];
		//通过当前id查询对应订单
		$order = M('goods_order');
		$data = $order->alias('o')->join('feiyue_user_address ad on o.adrid = ad.id')->join('feiyue_user_detail d on o.userid =d.userid and d.userid='.$userid)->where('o.id='.$id.' and o.isdelete = 0')->field('o.*,ad.name,ad.address,ad.sheng,ad.shi,ad.xian,ad.postcode,ad.phone')->find();
		// var_dump($data);
		//实例化订单商品表
		$gsku = M('goods_sku');
		//商品对应属性表
		$attr = M('goods_attr');
		//商品对应属性值表
		$attrval = M('goods_attr_values');
		//获取商品skuid属性
		$arr = json_decode($data['skuid'],true);
		$nrr = json_decode($data['number'],true);
		// var_dump($arr);
		//遍历属性对应属性值表
		foreach ($arr as $k => $v){
			//进行数据库查询(商品)
			$brr = $gsku->alias('s')->join('feiyue_goods g on s.gid = g.id')->where('s.id='.$v)->find();

			$crr = json_decode($brr['attr'],true);

			//遍历属性对应值
			foreach ($crr as $kk => $vv){
				$a = $attr->find($kk)['attrname'];
				$b = $attrval->find($vv)['value'];

				$drr = $a .' : '.$b;

				$brr['attr_v'][] = $drr;
			}

			$brr['attr_v'][] = '数量：'.$nrr[$k];
			$data['myattr'][] = $brr;
		}
		//分配变量
		$this->assign('order',$data);

		$this->display();
	}

	/**
		删除订单
	**/
	public function delOrder(){
		//接受post传值
		$id = $_POST['id'];
		//实例化订单表对象
		$order = M('goods_order');
		$data['isdelete'] = 1;
		$res = $order->where('id='.$id)->save($data);
		//判断删除结果
		if($res){
			echo 1;
		}
	}

	/**
		订单回收站
	**/
	public function orderRecycle(){
		//判断session中是否有值,用户是否登录
		if(!$_SESSION['home']['id']){
			$this->redirect("Home/User/login");
			die();
		}
		$userid = $_SESSION['home']['id'];
		//查询当前用户的信息
		$detail = M('user_detail');
		$u = $detail->where("userid=".$userid)->find();
		$this->assign('u',$u);
		//获取商品订单信息
		$order = M('goods_order');
		$where['o.isdelete'] = 1;
		/*******页面分页*******/
		//获取总数
		$count = $order->alias('o')->join('feiyue_user_address ad on o.adrid=ad.id')->join('feiyue_user_detail d on o.userid =d.userid and d.userid='.$userid)->field('ad.*,o.*')->where($where)->count();	//查询满足要求的总记录数
		//创建分页对象
		$page = new \Think\Page($count,3);
		//获得limit参数
		$limit = $page->firstRow.','.$page->listRows;
		$show = $page->show();

		//第一步:获取订单状态及用户信息
		$data = $order->alias('o')->join('feiyue_user_address ad on o.adrid=ad.id')->join('feiyue_user_detail d on o.userid =d.userid and d.userid='.$userid)->field('ad.*,o.*')->where($where)->limit($limit)->order('o.id desc')->select();
		// var_dump($data);die;
		$gsku = M('goods_sku');
		$attr = M('goods_attr');
		$attrval = M('goods_attr_values');
		foreach ($data as $key => $value) {
			$arr = json_decode($value['skuid'],true);
			$err = [];
			foreach ($arr as $kk => $val) {
				$brr = $gsku->alias('s')->join('feiyue_goods g on s.gid=g.id')->join('feiyue_store_shop gs on g.storeid=gs.uid')->where('s.id='.$val)->find();
				$crr = json_decode($brr['attr'],true);
				$nrr = (Array)json_decode($data[$key]['number']);
				$drr = [];
				foreach ($crr as $k => $v) {

					$a = $attr->find($k)['attrname'];
					$b = $attrval->find($v)['value'];
					$drr[] = $a.' : '.$b;
				}
				$drr[] = '数量 ：'.$nrr[$kk];
				$err[] = $drr;
			}
			$brr['myattr'] = $err;
			$data[$key]['mygoods'][] = $brr;
		}
		$this->assign('order',$data);
		$this->assign('page',$show);
		$this->display();
	}

	/**
		订单评价
	**/
	public function orderComment(){
		$id = $_GET['id'];

		$userid = $_SESSION['home']['id'];
		//获取订单/商品/地址信息
		$id = $_GET['id'];
		//通过当前id查询对应订单
		$order = M('goods_order');
		$data = $order->alias('o')->field('o.*,d.userpic,d.nickname')->join('feiyue_user_detail d on o.userid =d.userid and d.userid='.$userid)->where('o.id='.$id.' and o.isdelete=0')->find();
		// var_dump($data);
		//实例化订单商品表
		$gsku = M('goods_sku');
		//商品对应属性表
		$attr = M('goods_attr');
		//商品对应属性值表
		$attrval = M('goods_attr_values');
		//获取商品skuid属性
		$arr = json_decode($data['skuid'],true);
		$nrr = json_decode($data['number'],true);
		//遍历属性对应属性值表
		$err = [];
		foreach ($arr as $k => $v){
			//进行数据库查询(商品)
			$brr = $gsku->alias('s')->join('feiyue_goods g on s.gid = g.id')->where('s.id='.$v)->find();
			$crr = json_decode($brr['attr'],true);
			//遍历属性对应值
			$frr = [];
			foreach ($crr as $kk => $vv){
				$a = $attr->find($kk)['attrname'];
				$b = $attrval->find($vv)['value'];
				$drr = $a .' : '.$b;
				$brr['attr_v'][] = $drr;
			}
			$brr['attr_v'][] = '数量：'.$nrr[$k];
			$data['myattr'][] = $brr;
		}
		//分配变量
		$this->assign('order',$data);

		$this->display();
	}


	/**
		添加订单评价
	**/
	public function insertComment(){
		//判断session中是否有值,用户是否登录

		//接受提交评论
		$_POST['userid'] = $_SESSION['home']['id'];
		$_POST['ctime'] = time();
		$_POST['cip'] = $_SERVER["REMOTE_ADDR"];
		//实例化评论表
		$comment = M('goods_comment');
		if($comment->create()){
			$result = $comment->add();
			if($result){
				//修改订单state字段
				$order = M('goods_order');
				// $data['isdelete'] = 1;
				$data['state'] = 3;
				$res = $order->where('id='.$_POST['orderid'])->save($data);
				$this->redirect('order');
			}else{
				$this->redirect('order');
			}
		}
	}

	/**
		订单追加评价
	**/
	public function orderReview(){
		//判断session中是否有值,用户是否登录
		$id = $_GET['id'];

		$userid = $_SESSION['home']['id'];
		//通过当前id查询对应订单
		$order = M('goods_order');
		$data = $order->alias('o')->field('o.*,d.userpic,d.nickname')->join('feiyue_user_detail d on o.userid =d.userid and d.userid='.$userid)->where('o.id='.$id.' and o.isdelete=0')->find();
		// var_dump($data);
		//实例化订单商品表
		$gsku = M('goods_sku');
		//商品对应属性表
		$attr = M('goods_attr');
		//商品对应属性值表
		$attrval = M('goods_attr_values');
		//获取商品skuid属性
		$arr = json_decode($data['skuid'],true);
		$nrr = json_decode($data['number'],true);
		//遍历属性对应属性值表
		$err = [];
		foreach ($arr as $k => $v){
			//进行数据库查询(商品)
			$brr = $gsku->alias('s')->join('feiyue_goods g on s.gid = g.id')->where('s.id='.$v)->find();
			$crr = json_decode($brr['attr'],true);
			//遍历属性对应值
			$frr = [];
			foreach ($crr as $kk => $vv){
				$a = $attr->find($kk)['attrname'];
				$b = $attrval->find($vv)['value'];
				$drr = $a .' : '.$b;
				$brr['attr_v'][] = $drr;
			}
			$brr['attr_v'][] = '数量：'.$nrr[$k];
			$data['myattr'][] = $brr;
		}
		//分配变量
		$this->assign('order',$data);
		$this->display();
	}

	/**
		追加评论后订单显示关闭
	**/
	public function addComment(){

		$id = $_POST['orderid'];
		//实例化
		$order = M('goods_order');
		//修改当前id的状态
		$data['isdelete'] = 1;
		$res = $order->where('id='.$id)->save($data);
		if($res){
			$this->redirect('order');
		}else{
			$this->redirect('order');
		}
	}

	/**
		确认收货
	**/
	public function orderShou(){

		//实例化评论表
		$comment = M('goods_comment');
		$id = $_GET['id'];
		$order = M('goods_order');
		$data['state'] = 2;
		$res = $order->where('id='.$id)->save($data);
		if($res){
			$this->redirect('order');
		}else{
			$this->redirect('order');
		}
	}


}