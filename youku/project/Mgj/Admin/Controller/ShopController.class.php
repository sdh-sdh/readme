<?php
namespace Admin\Controller;
class ShopController extends CommonController
{
	/**
		后台商铺浏览页面
	*/
	public function index()
	{
		//获取参数
		$num = I('get.num');
		$num = !empty($num) ? $num : 10;
		$keyword = I('get.keyword');
		//检测条件是否存在
		if(!empty($keyword)){
			$where['a.shopname'] = array('LIKE', '%'.$keyword.'%');
		}
		$where['a.isdelete'] = array('EQ',0);
		$shop = M('store_shop');
		//获取总数
		$count = $shop->alias('a')->where($where)->count();
		//创建分页对象.
		$page = new \Think\Page($count, $num);
		//获得limit参数
		$limit = $page->firstRow.','.$page->listRows;
		//获得当前页码下的用户的数据
		$shops = $shop->alias('a')->field('a.*,b.shopname')->join('left join feiyue_store_shop b on a.shopid=b.shopid')->limit($limit)->order('a.shopid desc')->where($where)->select();
		//分配变量
		//获取页码字符串
		$pages = $page->show();
		//分配
		$this->pages = $pages;
		$this->num = $num;
		$this->keyword = $keyword;
		$this->shops = $shops;
		$this->display();
	}
	/**
		商铺添加页面
	*/
	public function add()
	{
		$color = M('store_color');
		$col = $color->select();
		$this->col = $col;
		$this->display();
	}
	/**
		执行添加
	*/
	public function insert()
	{
		//创建对象
		$shop = M('store_shop');
		$u = $shop->where('uid='.$_POST['uid'])->find();
		if($u){
			echo '<script>alert("一个用户只能注册一个店铺,谢谢合作");window.location.href="index"</script>';
			die;
		}
		if($_POST['shopname'] == '' || $_FILES['shoplogo']['name'] == ''){
			echo '<script>alert("数据不全");window.location.href="add"</script>';
			die;
		}
		//处理头像字段
		$upload = new \Think\Upload();
		// 实例化上传类
		$upload->maxSize   = 3145728 ;
		// 设置附件上传大小
		$upload->exts      = array('jpg', 'gif', 'png', 'jpeg');
		// 设置附件上传类型
		$upload->savePath  =  '/Uploads/';
		// 设置附件上传目录
		$upload->rootPath  = './Public' ;
		// 上传文件
		$info   =   $upload->upload();
		//拼接图片的路径
		$_POST['shoplogo'] = trim($upload->rootPath,'.').$info['shoplogo']['savepath'].$info['shoplogo']['savename'];
		
		//创建数据
		$_POST['shoptime'] = time();
		$shop->create();
		//插入
		if($shop->add()){
			$this->success('插入成功', U('Admin/Shop/index'), 3);
		}else{
			$this->error('插入失败');
		}
	}

	/**
		商铺修改页面
	*/
	public function mod()
	{
		$good = M('store_shop');
		$goods = $good->find($_GET['id']);
		if($_SESSION['admin']['id'] != $goods['uid']){
			$this->error('你没有权限操作此ID',U('Admin/Shop/index'), 3);
		}
		$shop = M('store_shop');
		$color = M('store_color')->select();
		$this->color = $color;
		$shops = $shop->find($_GET['id']);
		$this->shops = $shops;
		$this->display();
	}
	/**
		更新操作
	*/
	public function update()
	{
		$good = M('store_shop');
		//处理图片上传
		if($_FILES['shoplogo']['error'] == 0){
			//处理头像字段
			$upload = new \Think\Upload();
			// 实例化上传类
			$upload->maxSize   = 3145728 ;//3M
			// 设置附件上传大小
			$upload->exts      = array('jpg', 'gif', 'png', 'jpeg');
			// 设置附件上传类型
			$upload->savePath  =  '/Uploads/';
			// 设置附件上传目录
			$upload->rootPath  = './Public' ;
			// 上传文件
			$info   =   $upload->upload();
			//拼接图片路径
			$_POST['shoplogo'] = trim($upload->rootPath,'.').$info['shoplogo']['savepath'].$info['shoplogo']['savename'];
			//删除原来的图片
			$this->deleteGoodpic(I('post.shopid'));
		}
		//创建数据
		$good->create();
		//执行更新
		if($good->save() > 0){
			redirect(U('Admin/Shop/index'));
		}else{
			$this->error('更新失败');
		}
	}

	private function deleteGoodpic($id)
	{
		//获取图片路径
		$path = $this->getGoodpic($id);
		//删除
		unlink($path);
	}
	//封装方法 获得用户的图片路径
	private function getGoodpic($id)
	{
		$good = M('store_shop');
		$info = $good->find($id);
		return '.'.$info['shoplogo'];
	}

	/**
		商铺删除操作
	*/
	public function delete()
	{
		$good = M('store_shop');
		$goods = $good->find($_GET['id']);
		if($_SESSION['admin']['id'] != $goods['uid']){
			$this->error('你没有权限操作此ID',U('Admin/Shop/index'), 3);
		}
		//获取id
		$id = I('get.id');
		//创建模型
		$goods = M('store_shop');
		$info = $goods->find($id);
		$arr = array("shopid"=>$id,"isdelete"=>1);
		$res = $goods->save($arr);
		//删除
		if($res){
			redirect(U('Admin/Shop/index'));
		}else{
			$this->error('删除失败');
		}
	}	
}