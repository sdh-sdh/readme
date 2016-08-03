<?php
	namespace Home\Controller;

	class CartController extends MaintainController
	{
		public function index ()
		{
			//	查询商品信息
			if (empty($_SESSION['home']['id']))
			{
				//	没有登录时查询 session
				$cartGoods = $this->sessionCart();

			} else
			{
				//	登录后查询 购物车表
				$cartGoods = $this->sqlCart();
			}

			foreach ($cartGoods as $k=>$v)
			{
				if ($v['storeid'] == 0)
				{
					$cartGoods[$k]['storeid'] = '自营';
				}else
				{
					$cartGoods[$k]['storeid'] = $this->getGoodSort($v['storeid'])['shopname'];
				}
			}

			$this->cartGoods = $cartGoods;
			$this->display();
		}

		/**
		 * 首页购物车添加商品 信息保存到 session
		 *        可以将最小商品单位 id 放入session
		 */
		public function addCart ()
		{
			if ($_SESSION['home']['id'])
			{
				$this->addSqlCart();
				return;
			}

			$num = I('post.num');
			$a = $num;
			unset($_POST['gid']);
			unset($_POST['num']);

			$sku = M('goods_sku');
			$str = json_encode($_POST);
			$s = $sku->where('attr=\''.$str.'\'')->find();

			if (array_key_exists($s['id'], $_SESSION['cart']))
			{
				//	购物车中已经添加的商品  只增加数量
				$num = $_SESSION['cart'][$s['id']]['num'] + $num;
				$_SESSION['cart'][$s['id']]['num'] = $num;
			} else
			{
				$_SESSION['cart'][$s['id']]['skuid'] = $s['id'];
				$_SESSION['cart'][$s['id']]['num'] = $num;
			}
			if (IS_AJAX){
				echo $a;
			}
		}

		/**
		 * 首页购物车添加商品 信息保存到 数据库
		 */
		public function addSqlCart ()
		{
			$gid = I('post.gid');
			unset($_POST['gid']);
			$num = I('post.num');
			$abc = $num;
			unset($_POST['num']);

			$a = json_encode($_POST);
			$sku = M('goods_sku');
			$cart = M('shop_cart');
			$s = $sku->where('gid='.$gid.' and attr=\''.$a.'\'')->find();
			//	判断购物车表中是否有了 添加的商品
			$b = $cart->where('userid='.$_SESSION['home']['id'])
				->where('skuid='.$s['id'])->find();
			if ($b)
			{	//	有记录时 增加数量
				$data['number'] = $b['number'] + $num;
				$data['all_price'] = $data['number'] * $b['price'];
				$cart->where('cartid='.$b['cartid'])->save($data);
				if (IS_AJAX)
				{
					echo $abc;
				}
				return;
			}
			$g['skuid'] = $s['id'];
			$g['userid'] = $_SESSION['home']['id'];
			$g['number'] = $num;
			$g['price'] = $s['price'];
			$g['all_price'] = $num * $s['price'];
			$res = $cart->data($g)->add();
			if ($res && IS_AJAX)
			{
				echo $abc;
			}
		}

		/**
		 * 首页购物车删除商品 (未登录时)
		 *
		 */
		public function delCart()
		{
			if (IS_AJAX)
			{
				if(empty($_SESSION['home']['id']))
				{
					$skuid = I('get.skuid');
					unset($_SESSION['cart'][$skuid]);
					$len = count($_SESSION['cart']);
					if ($len == 0) {
						unset($_SESSION['cart']);
					}
					echo 1;
				}else {
					$this->ajaxReturn($this->delSqlCart(I('get.skuid')));
				}
			}
		}

		/**
		 * 	登陆后的  delCart() 方法
		 * 	@param	  $sku		mixed		要删除的商品skuid
		 *  @return		array
		 */
		public function delSqlCart($sku)
		{
			$cart = M('shop_cart');
			$res = null;
			if (is_array($sku))
			{
				foreach ($sku as $v)
				{
					$res = $cart->where('userid='.$_SESSION['home']['id'].' and skuid='.$v)->delete();
				}
			}else if(is_string($sku)) {
				$s = $sku;
				$res = $cart->where('userid='.$_SESSION['home']['id'].' and skuid='.$s)->delete();
			}

			return $res;
		}


		/**
		 * 	mysql 购物车表中获取商品
		 *
		 */
		public function sqlCart ()
		{
			$sqlCart = M('shop_cart');
			$g = $sqlCart->where('userid='.$_SESSION['home']['id'])->select();
			if (empty($g))
			{
				return false;
			}
			$goods_sku = M('goods_sku');
			$goods = M('goods');
			$attr = M('goods_attr');
			$attr_vo = M('goods_attr_values');
			$info = [];
			foreach ($g as $k => $v)
			{
				$a = $goods_sku->where('id='.$v['skuid'])->find();
				$b = $goods->where('id='.$a['gid'])->find();
				$info[$k] = $b;

				$c = (Array)json_decode($a['attr']);
				foreach ($c as $key => $vo)
				{
					$att = $attr->field('attrname')->find($key);
					$att_vo = $attr_vo->field('value')->find($vo);
					$info[$k][$att['attrname']] = $att_vo['value'];

				}
				$info[$k]['sprice'] = $a['price'];
				$info[$k]['num'] 	= $g[$k]['number'];
				$info[$k]['Price']  = $g[$k]['all_price'];
				$info[$k]['skuid']  = $a['id'];
			}
			return $info;
		}

		/**
		 * 	session 中查询购物车中的商品
		 *
		 */
		public function sessionCart()
		{
			//	当session 中没有商品时
			if (empty($_SESSION['cart']))
			{
				return false;
			}
			$goodInfo = [];
			//	有商品时 查询数据库 获得商品信息
			//	获取id
			//$skuID = array_keys($_SESSION['cart']);
			$skuID['id'] = ['in', array_keys($_SESSION['cart'])];
			$arr = array_values($_SESSION['cart']);

			$sku = M('goods_sku');
			$g = M('goods');
			$s = $sku->where($skuID)->select();
			$attr = M('goods_attr');
			$attr_vo = M('goods_attr_values');

			foreach ($s as $k=>$v)
			{
				$goodInfo[$k] = $g->where('id='.$v['gid'])->find();
				$goodInfo[$k]['num'] = $arr[$k]['num'];
				$goodInfo[$k]['sprice'] = $v['price'];
				$goodInfo[$k]['Price'] = $v['price']*$arr[$k]['num'];
				$brr = (Array)json_decode($v['attr']);

				foreach ($brr as $key=>$value)
				{
					$att = $attr->field('attrname')->find($key);
					$att_vo = $attr_vo->field('value')->find($value);
					$goodInfo[$k][$att['attrname']] = $att_vo['value'];
				}
				$goodInfo[$k]['skuid'] = $arr[$k]['skuid'];
			}
			return $goodInfo;
		}

		/**
		 *
		 */
		public function ajaxRequestCart ()
		{
			//	ajax 请求购物车
			$c = new \Home\Widget\CateWidget();
			$c->cart();
		}

		/**
		 * 	接收三方支付结果
		 *
		 */
		public function getResult()
		{
			if (I('post.result'))
			{
				$order = M('goods_order');
				$res = $order->where('ordernum='.I('post.order'))->setField('state', 1);
				if ($res)
				{
					$oInfo = $order->where('ordernum='.I('post.order'))->find();
					$sID = (Array)json_decode($oInfo['skuid']);
					$snum = (Array)json_decode($oInfo['number']);
					$s = M('goods_sku');

					foreach ($sID as $k =>$v)
					{
						$s->where('id='.$v)->setDec('stock', $snum[$k]);
					}
				}
			}
		}

		/**
		 * 	获取商品店铺
		 *	@param		$sid	int		商铺所有者id
		 *  @return		array
		 */
		protected function getGoodSort($sid)
		{
			$sort = M('store_shop');
			$info = $sort->field('shopname')->where('uid='.$sid)->find();

			return $info;
		}

		/**
		 *
		 */
		public function toS (){

			$_SESSION['want'] = $_POST;
			echo 1;
		}
	}