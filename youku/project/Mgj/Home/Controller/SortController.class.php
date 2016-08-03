<?php
namespace Home\Controller;

class SortController extends ComonController
{

	/**
	 * 店铺后台管理
	 */
	public function control()
	{
		$notice = M('store_notice');
		$noc = $notice->where('isdelete=0')
			->limit(5)
			->select();
		$this->noc = $noc;
		$asort = $this->users();
		$this->asort = $asort;
		$this->display();
	}

	/**
	 * 店铺分类管理
	 */
	public function asort()
	{
		$sort = M('goods_attr');
		$asorts = $sort->select();
		$this->asorts = $asorts;
		$asort = $this->users();
		$this->asort = $asort;
		$this->display();
	}

	/**
	 * 店铺分类浏览页面
	 */
	public function store()
	{
		$uid = $_SESSION['home']['id'];
		$asort = M('store');
		$sort = $asort->where('isdelete=1 and uid=' . $uid)->select();
		$this->sort = $sort;
		$asort = $this->users();
		$this->asort = $asort;
		$this->display();
	}

	/**
	 * 店铺商品分类添加
	 */
	public function add()
	{
		$user = M('user_detail');
		$users = $user->where('userid=' . $_SESSION['home']['id'])->select();
		if ($users[0]['store'] != 2) {
			echo '<script>alert("添加失败，请先通过审核在操作");window.location.href="asort"</script>';
		}else {
			$aname = $_POST['aname'];
			//创建对象
			$Sort = M('store');
			//获取parent
			$parent = I('post.parent');
			if ($_POST['aname'] == '') {
				echo '<script>alert("添加失败，请选择商品分类");window.location.href="asort"</script>';
			}
			//顶级分类
			if ($parent == 0) {
				$_POST['path'] = 0;
			}else {
				//获取元素的父级元素
				$parents = $Sort->find($parent);
				$_POST['path'] = $parents['path'] . ',' . $parents['asortid'];
			}
			$anames = array();
			foreach ($aname as $k => $v) {
				if (empty($v)) {
					continue;
				}
				$anames[] = array('aname' => $v,'parent' => $parent,'path' => $_POST['path'],'uid' => $_POST['uid']);
			}
			$Sort->create();
			foreach ($anames as $val) {
				$arr = array();
				$asid = $Sort->add($val);
				$attr = M('attr_sort');
				$arr[] = array('attrid' => $_POST['颜色'],'sortid' => $asid);
				$arr[] = array('attrid' => $_POST['尺码'],'sortid' => $asid);
				$attr->addAll($arr);
			}
			redirect(U('Home/Sort/store'));
		}
	}

	/**
	 * 店铺分类修改页面
	 */
	public function edit()
	{
		//读取分类信息
		$id = I('get.asortid');
		$info = M('store')->find($id);
		//分配变量
		$asort = $this->users();
		$this->asort = $asort;
		$this->assign('info', $info);
		$this->display();
	}

	/**
	 * 修改更新操作
	 */
	public function update()
	{
		//创建对象
		$Sort = M('store');
		//处理path字段
		$parent = I('post.parent');
		if ($parent == 0) {
			$_POST['path'] = 0;
		}else {
			$info = $Sort->find($parent);
			$_POST['path'] = $info['path'] . ',' . $info['asortid'];
		}
		$Sort->create();
		if ($Sort->save()) {
			$this->success('更新成功', U('Home/Sort/store'), 3);
		}else {
			$this->error('更新失败');
		}
	}

	/**
	 * 分类删除操作
	 */
	public function delete()
	{
		//获取id
		$id = I('get.asortid');
		//删除子分类
		$Sort = M('store');
		//读取path
		$info = $Sort->find($id);
		$arr = array("asortid" => $id,"isdelete" => 0);
		$res = $Sort->save($arr);
		if ($res) {
			redirect(U('Home/Sort/store'));
		}else {
			$this->error('删除失败', U('Home/Sort/store'), 3);
		}
	}

	/**
	 * 店铺仓库
	 */
	public function entrepot()
	{
		$asort = $this->users();
		$this->asort = $asort;
		$uid = $_SESSION['home']['id'];
		$asort = M('store');
		$sort = $asort->where('isdelete=0 and uid=' . $uid)->select();
		$this->sort = $sort;
		$this->display();
	}

	/**
	 * 仓库恢复商品
	 */
	public function entedit()
	{
		//获取id
		$id = I('get.asortid');
		//删除子分类
		$Sort = M('store');
		//读取path
		$info = $Sort->find($id);
		$arr = array("asortid" => $id,"isdelete" => 1);
		$res = $Sort->save($arr);
		if ($res) {
			redirect(U('Home/Sort/store'));
		}else {
			$this->error('删除失败', U('Home/Sort/store'), 3);
		}
	}

	/**
	 * 商品添加页面
	 */
	public function goods()
	{
		$breed = M('goods_breed');
		$br = $breed->select();
		$this->br = $br;
		$id = I('get.asortid');
		$asort = M('store');
		$asorts = $asort->select();
		$this->id = $id;
		$this->asorts = $asorts;
		$asort = $this->users();
		$this->asort = $asort;
		$this->display();
	}

	/**
	 * 执行商品添加
	 */
	public function insert()
	{
		if ($_FILES['goodpic']['name'] == '' || $_POST == '') {
			$this->error('插入失败,数据不全');
		}
		$_POST['goodpic'] = $this->picUpload();
		//创建对象
		$_POST['goodtime'] = time();
		$goods = M('goods');
		//创建数据
		$goods->create();
		//插入
		if ($goods->add()) {
			$this->success('插入成功');
		}else {
			$this->error('插入失败');
		}
	}

	/**
	 * 商品审核页面
	 */
	public function audit()
	{
		$audit = M('goods');
		//获取总数
		$count = $audit->where('audit=0 and storeid=' . $_SESSION['home']['id'])->count();
		//创建分页对象
		$page = new \Think\Page($count, 5);
		//获得limit参数
		$limit = $page->firstRow . ',' . $page->listRows;
		$asort = $this->users();
		$this->asort = $asort;
		$au = $audit->alias('a')
			->field('a.*,b.aname')
			->join('left join feiyue_store b on a.asortid=b.asortid')
			->where('a.audit=0 and a.storeid=' . $_SESSION['home']['id'])
			->limit($limit)
			->select();
		$this->au = $au;
		//获取页码字符串
		$pages = $page->show();
		//分配
		$this->pages = $pages;
		$this->display();
	}

	/**
	 * 商品审核未通过
	 */
	public function fail()
	{
		$audit = M('goods');
		//获取总数
		$count = $audit->where('audit=2 and storeid=' . $_SESSION['home']['id'])->count();
		//创建分页对象
		$page = new \Think\Page($count, 5);
		//获得limit参数
		$limit = $page->firstRow . ',' . $page->listRows;
		$asort = $this->users();
		$this->asort = $asort;
		$au = $audit->alias('a')
			->field('a.*,b.aname')
			->join('left join feiyue_store b on a.asortid=b.asortid')
			->where('a.audit=2 and a.storeid=' . $_SESSION['home']['id'])
			->limit($limit)
			->select();
		$this->au = $au;
		//获取页码字符串
		$pages = $page->show();
		//分配
		$this->pages = $pages;
		$this->display();
	}

	/**
	 * 商品通过审核出售中
	 */
	public function sell()
	{
		$audit = M('goods');
		//获取总数
		$count = $audit->where('audit=1 and storeid=' . $_SESSION['home']['id'])->count();
		//创建分页对象
		$page = new \Think\Page($count, 5);
		//获得limit参数
		$limit = $page->firstRow . ',' . $page->listRows;
		$asort = $this->users();
		$this->asort = $asort;
		$au = $audit->alias('a')
			->field('a.*,b.aname')
			->join('left join feiyue_store b on a.asortid=b.asortid')
			->where('a.audit=1 and a.storeid=' . $_SESSION['home']['id'])
			->limit($limit)
			->order('a.id desc')
			->select();
		$this->au = $au;
		//获取页码字符串
		$pages = $page->show();
		//分配
		$this->pages = $pages;
		$this->display();
	}

	/**
	 * 修改商品页面
	 */
	public function goodedit()
	{
		$goods = M('goods');
		$good = $goods->find($_GET['id']);
		$this->good = $good;
		$asort = M('store');
		$asorts = $asort->select();
		$breed = M('goods_breed');
		$br = $breed->select();
		$this->asorts = $asorts;
		$this->br = $br;
		$asort = $this->users();
		$this->asort = $asort;
		$this->display();
	}

	/**
	 * 更新修改操作
	 */
	public function goodupdate()
	{
		$good = M('goods');
		//处理图片上传
		if ($_FILES['goodpic']['error'] == 0) {

			$_POST['goodpic'] = $this->picUpload();
			//删除原来的图片
			$this->deleteGoodpic(I('post.id'));
		}
		//创建数据
		$good->create();
		//执行更新
		$good->save();
		redirect(U('Home/Sort/sell'));
	}

	/**
	 * 商品属性添加页面
	 */
	public function set()
	{
		//获取参数
		$value = M('goods_sku');
		$id = $_GET['id'];
		$num = I('get.num');
		$num = ! empty($num) ? $num : 5;
		//获取总数
		$count = $value->where('gid=' . $id)->count();
		//创建分页对象.
		$page = new \Think\Page($count, $num);
		//获得limit参数
		$limit = $page->firstRow . ',' . $page->listRows;
		$value = M('goods_sku');
		$sku = M('goods_attr_values');
		$val = $value->where('gid=' . $id)
			->limit($limit)
			->select();
		foreach ($val as $key => $v) {

			$s = json_decode($v['attr'], true);
			$vs[] = $sku->where('id=' . $s['6'] . ' or id=' . $s['5'])->select();
		}
		$asort = $this->users();
		$this->asort = $asort;
		//读取分类信息
		$info = M('goods')->find($id);
		//分配变量
		//获取页码字符串
		$pages = $page->show();
		//分配
		$this->pages = $pages;
		$this->num = $num;
		$this->val = $val;
		$this->vs = $vs;
		$this->assign('info', $info);
		$this->display();
	}

	/**
	 * 添加商品属性
	 */
	public function tag()
	{
		$id = $_POST['goodsid'];
		$value = M('goods_attr_values');
		$where1 = array('value' => $_POST['5'],'goodsid' => $id);
		$where2 = array('value' => $_POST['6'],'goodsid' => $id);
		$val1 = $value->where($where1)->find();
		$val2 = $value->where($where2)->find();

		if ($val1) {
			$id5 = $val1['id'];
		}else {
			$w = $_POST['5'];

			//	valus 表中放数据
			$v = array('attrid' => 5,'value' => $w,'goodsid' => $id);
			$id5 = $value->add($v);
		}

		if ($val2) {
			$id6 = $val2['id'];
		}else {
			$l = $_POST['6'];

			$att = array('attrid' => 6,'value' => $l,'goodsid' => $id);
			$id6 = $value->add($att);
		}

		$sku = M('goods_sku');

		$data[5] = $id5;
		$data[6] = $id6;
		$str = json_encode($data);
		$strs = array('attr' => $str,'gid' => $id,'stock' => $_POST['stock'],'price' => $_POST['price']);
		$sku->add($strs);
		$good = M('goods');
		$goods = $good->where('id=' . $id)->setInc('stock', $_POST['stock']);
		$this->success('添加成功');
	}

	/**
	 * 修改商品sku
	 */
	public function sku()
	{
		$id = $_POST['id'];
		$sku = M('goods_sku');
		$sku->create();
		$res = $sku->where('id=' . $id)->save();
		$good = M('goods');
		$goods = $good->where('id=' . $_POST['goodsid'])->setDec('stock', $_POST['stock']);
		$this->success('修改成功');
	}

	/**
	 * 商品参数操作
	 */
	public function argument()
	{
		$id = I('get.id');
		$arg = M('goods_argument');
		$args = $arg->where('goodsid=' . $id)->find();
		if ($args != null) {
			$this->args = $args;
			$ass = 1;
			$this->assign('ass', $ass);
		}else {
			$this->assign('id', $id);
			$this->ass = 0;
		}
		$asort = $this->users();
		$this->asort = $asort;
		$this->display();
	}

	/**
	 * 商品参数管理 修改与添加
	 */
	public function argedit()
	{
		//接收post
		$id = I('post.goodsid');
		$arg = I('post.');
		//创建模型
		$args = M('goods_argument');
		//查询post传过来的id库里是否存在
		$argu = $args->where('goodsid=' . $id)->find();
		//判断
		if ($argu != null) {
			$args->create();
			//如果不为null执行修改操作否则执行添加操作
			$res = $args->where('goodsid=' . $id)->save();
		}else {
			$args->create();
			$args->add();
		}
		redirect(U('Home/Sort/sell'));
	}

	/**
	 * 商品多图片上传
	 */
	public function det()
	{
		$id = I('get.id');
		//读取分类信息
		$info = M('goods')->find($id);
		//分配变量
		$this->assign('info', $info);
		$asort = $this->users();
		$this->asort = $asort;
		$this->display();
	}

	/**
	 * 执行多图片上传
	 */
	public function multifile()
	{
		$pics = M('goods_pic');
		$info = $this->uppics();
		$in = $this->rootPath = "/Public";
		//遍历多文件上传
		foreach ($info as $v) {
			$picList[] = array('goodsid' => $_POST['goodsid'],'goodspic' => $in . $v['savepath'] . $v['savename']);
		}
		if ($pics->addAll($picList)) {
			$this->success('上传成功');
		}else {
			$this->error('上传失败');
		}
	}

	/**
	 * 穿着效果
	 */
	public function dress()
	{
		$pics = M('goods_dress');
		$info = $this->uppics();
		$in = $this->rootPath = "/Public";
		//遍历多文件上传
		foreach ($info as $v) {
			$picList[] = array('goodsid' => $_POST['goodsid'],'dresspic' => $in . $v['savepath'] . $v['savename']);
		}
		if ($pics->addAll($picList) > 0) {
			$this->success('上传成功');
		}else {
			$this->error('上传失败');
		}
	}

	/**
	 * 图片上传方法
	 */
	public function picUpload()
	{
		$field = array_keys($_FILES);

		$upload = new \Think\Upload();
		// 实例化上传类
		$upload->maxSize = 3145728;
		// 设置附件上传大小
		$upload->exts = array('jpg','gif','png','jpeg');
		// 设置附件上传类型
		$upload->savePath = '/Uploads/';
		// 设置附件上传目录
		$upload->rootPath = './Public';
		// 上传文件
		$info = $upload->upload();
		//拼接图片的路径
		$path = trim($upload->rootPath, '.') . $info[$field[0]]['savepath'] . $info[$field[0]]['savename'];
		return $path;
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
		return '.' . $info['goodpic'];
	}

	/**
	 * 用户昵称方法
	 */
	public function users()
	{
		$id = $_SESSION['home']['id'];
		$user = M('user_detail');
		$users = $user->where('userid=' . $id)->find();
		return $users;
	}

	private function upload($pic)
	{
		$config = array("maxSize" => '102400000',"exts" => array('jpeg','jpg','png','gif'),"rootPath" => "./Public","savePath" => "/Uploads/");
		$upload = new \Think\Upload($config);
		return $upload->uploadOne($pic);
	}

	private function uppics()
	{
		$config = array("maxSize" => '102400000',"exts" => array('jpeg','jpg','png','gif'),"rootPath" => "./Public","savePath" => "/Uploads/");
		$upload = new \Think\Upload($config);
		return $upload->upload();
	}

	/**
	 * 店铺订单
	 */
	public function order()
	{
		$asort = $this->users();
		$this->asort = $asort;
		$getord = $this->getOrderInfo();
		foreach ($getord as $k => $v) {
			foreach ($v['skuid'] as $key => $val) {
				if ($val['goodname'] == null) {
					unset($getord[$k]);
				}
			}
		}
		$this->orders = $getord;
		$this->display();
	}

	protected function getOrderInfo()
	{
		$o = M('goods_order');
		$info = $o->where('isdelete=0')
			->order('id desc')
			->select();
		foreach ($info as $key => $value) {
			$info[$key]['ordertime'] = date('Y-m-d H:i:s', $value['ordertime']);
			$info[$key]['skuid'] = $this->getGoods($info[$key]['skuid']);
			$info[$key]['adrid'] = $this->getOrderAddress($info[$key]['adrid']);
			$this->nums = json_decode($value['number']);
		}

		return $info;
	}

	protected function getGoods($sid)
	{
		$id['id'] = ['in',(array) json_decode($sid)];

		$sku = M('goods_sku');

		$ginfo = $sku->where($id)->select();
		foreach ($ginfo as $key => $value) {
			$where = array('id' => $value['gid'],'storeid' => $_SESSION['home']['id']);
			$goods = M('goods');
			$ginfo[$key]['goodname'] = $goods->field('goodname')
				->where($where)
				->find()['goodname'];
			if ($ginfo[$key]['goodname'] == null) {
				continue;
			}
			$arr_attr = (array) json_decode($ginfo[$key]['attr']);
			$attr = M('goods_attr');
			$attr_v = M('goods_attr_values');
			foreach ($arr_attr as $k => $v) {
				$n = $attr->field('attrname')
					->where('id=' . $k)
					->find();
				$a_v = $attr_v->field('value')
					->where('id=' . $v)
					->find();

				$ginfo[$key]['att'][$n['attrname']] = $a_v['value'];
			}
		}
		return $ginfo;
	}

	public function getOrderAddress($id)
	{
		$adr = M('user_address');

		$info = $adr->find($id);
		$data['name'] = $info['name'];
		$data['adr'] = $info['sheng'] . $info['shi'] . $info['xian'] . $info['address'];
		$data['phone'] = $info['phone'];
		$data['postcode'] = $info['postcode'];
		return $data;
	}

	/**
	 * 订单详情
	 */
	public function orderDetails()
	{
		$o = M('goods_order');

		$this->state = $o->find(I('get.id'))['state'];

		$this->display();
	}

	/**
	 * 店铺订单状态修改
	 */
	public function modifyState()
	{
		$o = M('goods_order');

		$res = $o->where('id=' . I('post.orderid'))->setField('state', I('post.stat'));

		if ($res === 'false') {
			//	更新失败
			$this->ajaxReturn(2);
		}elseif ($res > 0) {
			//	修改成功
			$this->ajaxReturn(1);
		}else {
			//	未做修改
			$this->ajaxReturn(0);
		}
	}

	/**
	 * 删除订单
	 */
	public function delOrder()
	{
		$o = M('goods_order');

		$res = $o->where('id=' . I('post.id'))->setField('isdelete', 1);

		if ($res === 'false') {
			//	删除失败
			$this->ajaxReturn(2);
		}elseif ($res > 0) {
			//	成功
			$this->ajaxReturn(1);
		}else {
			//	未做修改
			$this->ajaxReturn(0);
		}
	}

	/**
	 * 店铺评论管理
	 */
	public function comment()
	{
		$comment = M('goods_comment');
		//获取参数
		$num = I('get.num');
		$num = ! empty($num) ? $num : 5;
		$comment = M("goods_comment");
		//获取总数
		$count = $comment->alias('a')
			->field('a.*,b.goodname')
			->join('left join feiyue_goods b on a.gid=b.id')
			->limit($limit)
			->where('b.storeid=' . $_SESSION['home']['id'])
			->count();
		//创建分页对象.
		$page = new \Think\Page($count, $num);
		//获得limit参数
		$limit = $page->firstRow . ',' . $page->listRows;
		$com = $comment->alias('a')
			->field('a.*,b.goodname')
			->join('left join feiyue_goods b on a.gid=b.id')
			->limit($limit)
			->where('b.storeid=' . $_SESSION['home']['id'])
			->order('a.ctime desc')
			->select();
		$this->com = $com;
		$asort = $this->users();
		$this->asort = $asort;
		//获取页码字符串
		$pages = $page->show();
		//分配
		$this->pages = $pages;
		$this->num = $num;
		$this->display();
	}

	/**
	 * 商品评论删除
	 */
	public function comdel()
	{
		$id = I('get.id');
		$comment = M('goods_comment');
		if ($comment->delete($id)) {
			redirect(U('Home/Sort/comment'));
		}else {
			$this->error('删除失败');
		}
	}

	/**
	 * 公告管理
	 */
	public function notice()
	{
		$notice = M('store_notice');
		$not = $notice->where('id=' . $_GET['id'])->find();
		$this->not = $not;
		$asort = $this->users();
		$this->asort = $asort;
		$this->display();
	}

	public function message()
	{
		$notice = M('store_notice');
		//获取参数
		$num = I('get.num');
		$num = ! empty($num) ? $num : 10;
		//获取总数
		$count = $notice->count();
		//创建分页对象.
		$page = new \Think\Page($count, $num);
		//获得limit参数
		$limit = $page->firstRow . ',' . $page->listRows;
		$not = $notice->limit($limit)->select();
		$asort = $this->users();
		$this->asort = $asort;
		$this->not = $not;
		//获取页码字符串
		$pages = $page->show();
		//分配
		$this->pages = $pages;
		$this->num = $num;
		$this->display();
	}
}