<?php
	namespace Admin\Controller;

	class GoodsController extends CommonController
	{
		//查看操作
		public function index()
		{
			//获取参数
			$num = I('get.num');
			$num = !empty($num) ? $num : 10;
			$keyword = I('get.keyword');
			//检测条件是否存在
			if(!empty($keyword)){
				$where['goodname'] = array('LIKE', '%'.$keyword.'%');
			}
			$where['a.isdelete'] = array('EQ',0);
			//创建用户模型
			$good = M('goods');
			//获取总数
			$count = $good->alias('a')->where($where)->count();
			//创建分页对象.
			$page = new \Think\Page($count, $num);
			//获得limit参数
			$limit = $page->firstRow.','.$page->listRows;
			//获得当前页码下的用户的数据
			$goods = $good->alias('a')->field('a.*,b.aname')->join('left join feiyue_assortment b on a.asortid=b.asortid')->limit($limit)->where($where)->order('a.id desc')->select();

			//	获取库存并分配
			foreach ($goods as $v)
			{
				$ids[] = $v['id'];
			}
			$this->goodsStock = $this->getStock($ids);

			//分配变量
			$this->goods = $goods;

			//获取页码字符串
			$pages = $page->show();
			//分配
			$this->pages = $pages;
			$this->num = $num;
			$this->keyword = $keyword;
			//解析模板
			$this->display();
		}
		//添加页面操作
		public function add()
		{
			$breed = M('goods_breed');
			$br = $breed->select();
			$this->br = $br;
			$Sort = $this->getSortList();
			$this->Sort = $Sort;
			$this->display();
		}
		//执行添加
		public function insert()
		{
			if($_POST['asortid'] == 0){
				echo '<script>alert("添加失败，请选择商品分类");window.location.href="add"</script>';
				die;
			}
			if ($_POST['state'] == "") {
				$_POST['state'] = 1;
			}
			if ($_FILES['goodpic']['name'] == '' || $_POST == '') {
				echo '<script>alert("数据不全");window.location.href="add"</script>';
				die;
			}

			$path = R('WebFirst/picUpload');

			//拼接图片的路径
			$_POST['goodpic'] = $path;
			$_POST['goodtime'] = time();
			//创建对象
			$goods = M('goods');
			//创建数据
			$goods->create();
			//插入
			if($goods->add()){
				$this->success('插入成功', U('Admin/Goods/index'), 3);
			}else{
				$this->error('插入失败');
			}
		}
		public function getSortList()
		{
			//创建模型
			$Sort = M('assortment');
			//读取
			$Sorts = $Sort->field('asortid,aname,parent,path,concat(path,",",asortid) as paths')->order('paths')->select();
			//遍历
			foreach ($Sorts as $key => &$value) {
				//分隔数组
				$num = count(explode(',',$value['path']))-1;
				//修改title
				$value['aname'] = str_repeat('　|--', $num).$value['aname'];
			}
			return $Sorts;
		}
		//修改页面
		public function edit()
		{
			$id = I('get.id');
			//读取分类信息
			$info = M('goods')->find($id);
			//分配变量
			$this->assign('info', $info);
			$this->display();
		}
		//更新操作
		public function update()
		{
			$good = M('goods');
			//处理图片上传
			if($_FILES['goodpic']['error'] == 0){

				$path = R('WebFirst/picUpload');
				//拼接图片的路径
				$_POST['goodpic'] = $path;
				//删除原来的图片
				$this->deleteGoodpic(I('post.id'));
			}
			//创建数据
			$good->create();
			//执行更新
			if($good->save() > 0){
				$this->success('更新成功', U('Admin/Goods/index'), 3);
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
			$good = M('goods');
			$info = $good->find($id);
			return '.'.$info['goodpic'];
		}
		public function delete()
		{
			//获取id
			$id = I('get.id');
			//创建模型
			$goods = M('goods');
			$info = $goods->find($id);
			$arr = array("id"=>$id,"isdelete"=>1);
			$res = $goods->save($arr);
			//删除
			if($res){
				redirect(U('Admin/Goods/index'));
			}else{
				$this->error('删除失败');
			}
		}
		public function detail()
		{
			$id = I('get.id');
			//读取分类信息
			$info = M('goods')->find($id);
			//分配变量
			$this->assign('info', $info);
			$this->display();
		}
		public function det()
		{
			if($_POST['sub']){
				$pics = M('goods_pic');
				$info = $this->uppics();
				$in = $this->rootPath = "/Public";
				//遍历多文件上传
				foreach($info as $v){
					$picList[] = array('goodsid' => $_POST['goodsid'],
										'goodspic' =>$in.$v['savepath'].$v['savename']
										);
				}
				if($pics -> addAll($picList)){
					$this->success('添加成功', U('Admin/Goods/index'), 3);

				}else{
					$this->error('添加失败');
				}
			}
        }
        public function dress()
		{
			if($_POST['sub1']){
				$pics = M('goods_dress');
				$info = $this->uppics();
				$in = $this->rootPath = "/Public";
				//遍历多文件上传
				foreach($info as $v){
					$picList[] = array('goodsid' => $_POST['goodsid'],
										'dresspic' =>$in.$v['savepath'].$v['savename']
										);
				}
				if($pics -> addAll($picList)){
					$this->success('添加成功', U('Admin/Goods/index'), 3);

				}else{
					$this->error('添加失败');
				}
			}
		}
		public function set()
		{
			$id = $_GET['id'];
			$value = M('goods_sku');
			$sku = M('goods_attr_values');
			$val = $value->where('gid='.$id)->select();
			foreach ($val as $key => $v) {

				$s = json_decode($v['attr'],true);
				$vs[] = $sku->where('id='.$s['6'])->select();
			}
			//读取分类信息
			$info = M('goods')->find($id);
			//分配变量
			$this->val = $val;
			$this->vs = $vs;
			$this->assign('info', $info);
			$this->display();
		}
		//添加商品属性
		public function tag(){
			$value = M('goods_attr_values');
			$sku = M('goods_sku');
			$id = $_POST['goodsid'];
			$w = $_POST['5'];
			$l = $_POST['6'];
			$v = array('attrid'=>5,'value'=>$w,'goodsid'=>$id);
			$att  = array('attrid'=>6,'value'=>$l,'goodsid'=>$id);
			$id1 = $value->add($v);
			$id2 = $value->add($att);
			$data[5] = $id1;
			$data[6] = $id2;
			$str = json_encode($data);
			$strs = array('attr'=>$str,'gid'=>$id,'stock'=>$_POST['stock'],'price'=>$_POST['price']);
			if($sku->add($strs)){
				redirect(U('Admin/Goods/index'));
			}else{
				$this->error('添加失败',U('Admin/Goods/index'),3);
			}
		}
		private function upload($pic)
		{
			$config = array("maxSize" => '102400000',
					  "exts" => array('jpeg','jpg','png','gif'),
					  "rootPath" => "./Public",
					  "savePath" => "/Uploads/",
			);
			$upload = new \Think\Upload($config);
			return $upload -> uploadOne($pic);
		}
		private function uppics()
		{
			$config = array("maxSize" => '102400000',
					  "exts" => array('jpeg','jpg','png','gif'),
					  "rootPath" => "./Public",
					  "savePath" => "/Uploads/",
			);
			$upload = new \Think\Upload($config);
			return $upload -> upload();
		}

		//商品参数操作
		public function argument()
		{
			$id = I('get.id');
			$arg = M('goods_argument');
			$args = $arg->where('goodsid='.$id)->find();
			if($args != null){
				$this->args = $args;
				$ass = 1;
				$this->assign('ass',$ass);
			}else{
				$this->assign('id',$id);
				$this->ass=0;
			}
			$this->display();
		}
		//商品参数管理 修改与添加
		public function argedit(){
			//接收post
			$id = I('post.goodsid');
			$arg = I('post.');
			//创建模型
			$args = M('goods_argument');
			//查询post传过来的id库里是否存在
			$argu = $args->where('goodsid='.$id)->find();
			//判断
			if($argu != null){
				$args->create();
				//如果不为null执行修改操作否则执行添加操作
				$res = $args->where('goodsid='.$id)->save();
				if($res){
					$this->success('修改成功', U('Admin/Goods/index'), 3);
				}else{
					$this->error('修改失败');
				}
			}else{
				$args->create();
				if($args->add()){
					$this->success('添加成功', U('Admin/Goods/index'), 3);
				}else{
					$this->error('添加失败');
				}
			}
		}

		/**
		 *    获取商品库存
		 *
		 * @param    $gids    array    要查询的所有商品ID
		 *
		 * @return int $num            商品库存
		 */
		public function getStock ($gids)
		{
			$s = M('goods_sku');
			$ids['gid'] = ['in', $gids];
			$stock = $s->where($ids)->select();
			$num = [];
			foreach ($stock as $v)
			{
				if (array_key_exists($v['gid'], $num))
				{
					$num[$v['gid']] += $v['stock'];
				}else
				{
					$num[$v['gid']] = $v['stock'];
				}
			}
			return $num;
		}







	}
