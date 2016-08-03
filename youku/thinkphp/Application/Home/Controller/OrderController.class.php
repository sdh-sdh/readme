<?php
	namespace Home\Controller;
	use Think\Controller;
	class OrderController extends Controller
	{
		//	付款人
		protected $payUID;

		public function _initialize()
		{
			//	访问控制
		}

		public function index()
		{
			if (!empty($_POST['test'])) {
				return;
			}

			$this->getOrderInfo();
			//	判断账单是否已支付
			if ($this->getOrderState()) {
				$this->paid = 0;
			} else
			{
				$this->paid = 1;
			}

			$this->display();
		}

		protected function getOrderInfo() {
			$this->money = I('get.money');
			$this->order = I('get.order');

			$user = M('user');
			$company = M('company');
			$companyID = $user->field('id')->where('phone='.I('get.phone').' and password=\''.I('get.mima').'\'')->find();

			$_SESSION['gatherUID'] = $companyID['id'];
			$companyInfo = $company->where('uid='.$companyID['id'])->find();
			$this->company = $companyInfo;
			$this->time = date('Y-m-d H:i:s', time());
		}



		public function PCode()
		{
			$code = mt_rand(1000, 9999);
			$_SESSION['PCode'] = $code;

			$user = M('user');
			$res = $user->where('phone='.I('post.phone'))->find();
			$r = false;
			if ($res) {
				$r = R('User/phoneCode', [I('post.phone'), $code]);
			}

			if ($r)
			{
				echo 0;
			} else {
				$this->ajaxReturn($code);
			}
		}

		public function check() {

			if ($_SESSION['PCode'] != I('post.msgword')) {
				$this->ajaxReturn('验证码错误');
				return;
			}

			$pwd = md5(I('post.payword'));

			$user = M('user');
			$res = $user->where('phone='.I('post.phone').' and password=\''.$pwd.'\'')->find();

			if ($res) {
				$this->payUID = $res['id'];
				$this->payTheBill();
			} else {
				$this->ajaxReturn('没有该用户或密码错误');
			}
		}

		/**
		 * 	划账
		 *
		 */
		protected function payTheBill()
		{
			$a = M('user_details');
			$o = M('order');
			//	开启事务
			$a->startTrans();

			$res1 = $a->where('uid='.$this->payUID)->setDec('account', I('post.money'));
			$res2 = $a->where('uid='.$_SESSION['gatherUID'])->setInc('account', I('post.money'));

			$data['source'] = $this->payUID;
			$data['gather']     = $_SESSION['gatherUID'];
			$data['time']   = time();
			$data['money']  = I('post.money');
			$data['ordernum']  = I('post.order');

			$o->create($data);
			$lastID = $o->add();

			if ($res1 && $res2 && $lastID)
			{
				$a->commit();
				$this->returnResult(I('post.order'));
				echo 1;
			}else
			{
				$a->rollback();
				$this->ajaxReturn('划账失败');
			}
		}

		/**
		 * 	查询账单是否已支付
		 *
		 */
		protected function getOrderState()
		{
			$o = M('order');
			$res = $o->where('gather='.$_SESSION['gatherUID'].' and ordernum='.I('get.order'))->find();
			if ($res) {
				//	已支付
				return false;
			}else{
				return true;
			}

		}

		protected function returnResult($order)
		{
			$c = M('company');
			$url = $c->field('resulturl')->where('uid='.$_SESSION['gatherUID'])->find();

			$r= curl_init($url['resulturl']);
			$a = array('result'=>'1', 'order'=>$order);

			curl_setopt($r, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($r, CURLOPT_POSTFIELDS, $a);

			$res = curl_exec($r);
		}
	}