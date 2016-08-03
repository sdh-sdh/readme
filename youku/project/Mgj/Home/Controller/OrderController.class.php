<?php
	namespace Home\Controller;

	class OrderController extends CommonController
	{
		public function index()
		{
			$adress = A('Adress');
			//	查询三级联动的省
			$this->shenglist = $adress->adress_sheng();

			//	分配 收货地址信息  有地址则隐藏填写地址的表单
			$this->adrInfo = $adress->get_adr(4);
			if (empty($this->adrInfo)){
				$this->newadr = 0;
			} else {
				$this->newadr = 1;
			}

			$this->cartGoods = $this->getOrderInfo();
			$this->display();
		}

		public function getOrderInfo ()
		{
			if (empty($_POST))
			{
				$want = $_SESSION['want'];
			} else
			{
				$want = $_POST;
			}

			$sku = array_keys($want);
			$info = R('Cart/sqlCart');

			$skuid = [];
			foreach ($info as $k => $v)
			{
				if (in_array($v['skuid'], $sku))
				{
					$skuid[] = $v['skuid'];
					$info[$k]['num'] = $want['num'][$k];
					$info[$k]['Price'] = $want['price'][$k];
				} else {
					unset($info[$k]);
				}
			}
			if (!empty($skuid))
			{
				$_SESSION['home']['order'] = $skuid;
			}

			return $info;
		}

		/**
		 * 	产生订单
		 *
		 */
		public function makeOrder ()
		{
			$data['userid'] = $this->UserID;
			$data['skuid'] = json_encode(I('post.sku'));
			$data['ordertime'] = time();
			$data['orderprice'] = I('post.orderprice');
			$data['number'] = json_encode(I('post.num'));
			$data['adrid'] = I('post.adrid');
			//	订单号产生
			$data['ordernum'] = time().mt_rand(1000, 9999);

			$order = M('goods_order');
			$order->create($data);
			$data['id'] = $order->add();
			$this->ajaxReturn($data['id']);
			unset($_SESSION['want']);
		}

		/**
		 * 	支付
		 */
		public function pay ()
		{
			$id = I('post.orderid');
			if ($_SESSION['home']['order'])
			{	//	通过购物车页面进入支付时 删除购物车中将要支付的商品
				$cart = A('Cart');
				$cart->delSqlCart($_SESSION['home']['order']);
				unset($_SESSION['home']['order']);
			} else
			{
				//	通过其他方式进入支付  如: 我的订单
			}

			$order = M('goods_order');
			$this->info = $order->find($id);
			$this->display();
		}

		/**
		 * 	进行支付
		 */
		public function payAction()
		{
			$o = M('goods_order');
			$info = $o->where('ordernum='.I('get.ordernum'))->find();

			//	调用支付接口
			$this->bankPay($info['ordernum'], $info['orderprice']);
		}

		/**
		 * 请求第三方支付
		 *
		 * @param $order	string		订单号
		 * @param $money	string		金额
		 */
		public function bankPay($order, $money)
		{
			$pay = new \Org\Util\bankPay();

			$pay->setParam(['order'=>$order, 'money'=>$money]);

			$pay->createPay();
		}
	}