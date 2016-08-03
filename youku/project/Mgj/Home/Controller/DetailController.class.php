<?php
namespace Home\Controller;

class DetailController extends MaintainController
{
	//	需要显示的商品id
	protected $goodsId = 0;

	/**
	 *
	 * @param $id string
	 *
	 */
	public function _initialize()
	{
		if (is_numeric($_GET['id'])) {
			$this->goodsId = I('get.id');
		}elseif (is_numeric($_POST['id'])) {
			$this->goodsId = I('post.id');
		}else {
			die('需传入商品id');
		}
	}

	/**
	 * 详情页 显示
	 */
	public function index()
	{
		$this->attr = $this->goodsAttr();
		$id = $_GET['id'];
		$goods = M('goods');
		$g = $goods->where('id=' . $id)->find();
		if (! $g) {
			echo '<script>alert("无该数据");window.location.href="/";</script>';
			die();
		}
		//浏览足迹
		if($_SESSION['home']['id']){
			$track = M('goods_track');
			$trk = $track->where('goodid='.$id.' and uid='.$_SESSION['home']['id'])->find();
			if(!$trk && !empty($_SESSION['home']['id'])){
				$time = date('Y-m-d',time());
				$goodtime = time();
				$uid = $_SESSION['home']['id'];
				$where = array('goodid'=>$g['id'],'uid'=>$uid,'goodtime'=>$goodtime,'goodname'=>$g['goodname'],'time'=>$time,'price'=>$g['nowprice'],'pic'=>$g['goodpic'],'collect'=>$g['collect'],'audit'=>$g['audit']);
				$track->create();
				$tracks = $track->add($where);
			}
		}
		$goodspic = M('goods_pic');
		$goodInfo = $goods->find($this->goodsId);
		$goodPic = $goodspic->field('goodspic')
			->where('goodsid = ' . $this->goodsId)
			->select();

		$arg = $goods->alias('a')
			->field('a.describe,b.*,c.dresspic')
			->join('left join feiyue_goods_argument b on a.id=b.goodsid')
			->join('left join feiyue_goods_dress c on a.id=c.goodsid')
			->where('a.id = ' . $this->goodsId)
			->select();
		$this->ginfo = $goodInfo;
		$this->goodPic = $goodPic;
		$this->sort = R('Index/parentUrl');
		$this->arg = $arg;
		$this->assign('config', R('Index/webConfig'));
		$this->assign('flink', R('Index/freindLink'));
		$gd = $goods->find($id);
		$count = $goods->where('storeid=' . $gd['storeid'])->select();
		$con = count($count);
		$gid = intval($gd['storeid']);
		$sku = M('goods_sku');
		$skus = $sku->where('gid=' . $id)->find()['price'];
		$this->skus = $skus;

		//	评论数量
		$this->commentNum = $this->getCommentNum();

		$this->comment = $this->getCommont();

		if ($goodInfo['storeid'] == 0) {
			$this->display();
		}else {
			$shop = M('store_shop');
			$shops = $shop->alias('a')
				->field('a.*,b.*')
				->join('left join feiyue_user_detail b on a.uid = b.userid')
				->where('a.uid=' . $gd['storeid'])
				->select();
			$shopo = $shop->alias('x')
				->field('x.*,b.*')
				->join('left join feiyue_store b on x.uid=b.uid')
				->where('x.uid=' . $gd['storeid'])
				->select();
			foreach ($shopo as $key => $v) {
				$shopo[$key]['url'] = U('Home/Sorts/index/', array('uid' => $gid,'asortid' => $v['asortid']));
			}
			if ($_SESSION['home']['id']) {
				$userid = M('user_detail');
				$ud = $userid->where('userid=' . $_SESSION['home']['id'])->find();
				$this->ud = $ud;
			}else {}
			$w = array('r.userid' => $_SESSION['home']['id'],'w.uid' => $gid);
			$c = $shop->alias('w')
				->field('w.*,e.*,r.*')
				->join('left join feiyue_goods e on w.uid=e.storeid')
				->join('left join feiyue_collect r on w.shopid=r.goodid')
				->where($w)
				->select();
			$this->c = $c;
			$this->shops = $shops;
			$this->shopo = $shopo;
			$this->con = $con;

			$this->display('sanFang');
		}
	}

	/**
	 * 获取商品属性
	 */
	public function goodsAttr()
	{
		//	实例 商品属性详情表
		$detail = M('goods_sku');
		//	实例 属性表
		$attrName = M('goods_attr');
		//	实例 属性值表
		$attrValue = M('goods_attr_values');

		$info = $detail->where('gid=' . $this->goodsId)->select();

		foreach ($info as $v) {
			$arr[] = (array) json_decode($v['attr']);
		}

		//	接收整理后的信息的数组
		$data = [];
		//	属性值
		$value = [];

		foreach ($arr as $k => $v) {
			foreach ($v as $key => $vo) {
				if (array_key_exists($key, $value)) {
					array_push($value[$key], $vo);
				}else {
					$value[$key] = [$vo];
				}
			}
		}
		foreach ($value as $k => $v) {
			$id['id'] = ['in',$v];
			//	$k 属性名id		$v	属性值id
			$name = $attrName->find($k);
			$abc['value'] = $attrValue->where($id)->select();
			$data[] = array_merge($name, $abc);
		}
		return $data;
	}

	/**
	 * 获取评论数量
	 */
	protected function getCommentNum()
	{
		$comment = M('goods_comment');
		$num = $comment->where('gid=' . $this->goodsId)->count();
		return $num;
	}

	/**
	 * 评论 查询
	 */
	public function getCommont()
	{
		$comment = M('goods_comment');
		if (empty($this->commentNum)) {
			$this->commentNum = $this->getCommentNum();
		}

		//	获取分页信息
		$pageData = R('Index/dataPage', [$this->commentNum,5]);
		//	获取数据
		$comInfo = $comment->where('gid=' . $this->goodsId)
			->order('id desc')
			->limit($pageData['limit'])
			->select();

		foreach ($comInfo as $key => $value) {
			$comInfo[$key]['ctime'] = date('Y年m月d日', $value['ctime']);
		}

		$comInfo['page'] = $pageData['show'];

		if (IS_AJAX) {
			//	ajax 请求评论
			$c = new \Home\Widget\CateWidget();
			$c->details_commont($comInfo);
			die();
		}
		return $comInfo;
	}

	/**
	 * 获取商品库存与不同属性的商品的价格
	 */
	public function ajaxStock()
	{
		if (IS_AJAX) {
			unset($_POST['gid']);
			unset($_POST['num']);
			$str = json_encode($_POST);
			$sku = M('goods_sku');
			$s = $sku->where('gid=' . $this->goodsId . ' and attr=\'' . $str . '\'')->find();
			if (isset($s)) {
				$this->ajaxReturn($s);
			}else {
				$this->ajaxReturn('0');
			}
		}
	}

	/**
	 * 收藏商品
	 */
	public function shoucang()
	{
		$collect = M("collect");
		$goods = M("Goods");
		$map["goodid"] = $_POST['id'];
		$map["userid"] = $_SESSION['home']['id'];
		if (! ($id = $collect->where($map)->find()['id'])) {
			$con = $goods->find($_POST['id']);
			$map['pic'] = $con['goodpic'];
			$map['time'] = time();
			$map['goodname'] = $con['goodname'];
			$map['state'] = 1;
			$map['url'] = $_POST['url'];
			if ($collect->add($map)) {
				$goodsnews = $goods->where('id=' . $_POST['id'])
					->field("collect")
					->find();
				$num = $goodsnews['collect'];
				$data['collect'] = $num + 1;
				$goods->where('id=' . $_POST['id'])->save($data);
				echo 1;
			}
		}else {
			if ($collect->delete($id)) {
				$goodsnews = $goods->where('id=' . $_POST['id'])
					->field("collect")
					->find();
				$num = $goodsnews['collect'];
				$data['collect'] = $num - 1;
				$goods->where('id=' . $_POST['id'])->save($data);
				echo 2;
			}
		}
	}

	/**
	 * 收藏店铺
	 */
	public function shou()
	{
		$collect = M("collect");
		$goods = M("store_shop");
		$map["goodid"] = $_POST['id'];
		$map["userid"] = $_SESSION['home']['id'];
		if (! ($id = $collect->where($map)->find()['id'])) {
			$con = $goods->find($_POST['id']);
			$map['pic'] = $con['shoplogo'];
			$map['time'] = time();
			$map['goodname'] = $con['shopname'];
			$map['state'] = 2;
			$map['url'] = "index.php/Home/Sorts/index/uid/{$con['uid']}";
			if ($collect->add($map)) {
				echo 1;
			}
		}else {
			if ($collect->delete($id)) {
				echo 2;
			}
		}
	}
}