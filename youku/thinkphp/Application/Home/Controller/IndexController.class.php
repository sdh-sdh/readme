<?php
namespace Home\Controller;

class IndexController extends CommonController
{
    public function index()
	{
		//	分配账户信息
		$this->info = $this->getAccountInfo();

		//	转出账单信息
		$this->orderInfo = $this->getOrderOut();

		//	转入账单信息
		$this->outInfo = $this->getOrderIn();

		$this->display();
    }

	/**
	 * 	账户查询
	 */
	public function getAccountInfo ()
	{
		$account = M('user');
		$info = $account->alias('u')
			->join('bank_user_details d on u.id=d.uid and u.id='.$_SESSION['home']['id'])
			->find();
		$info['account'] = number_format($info['account']);
		if ($info['level'] == '1')
		{
			$company = M('company');
			$this->level = $company->where('uid='.$info['id'])->find();
		}
		return $info;
	}

	/**
	 * 	转出账单查询
	 *
	 */
	public function getOrderOut()
	{
		$order = M('order');
		$company = M('company');

		//	统计数量  分页显示
		$count = $order->where('source='.$_SESSION['home']['id'])->count();
		$page = $this->dataPage($count, 10);

		//	数据查询
		$info = $order->where('source='.$_SESSION['home']['id'])->order('id desc')
			->limit($page['limit'])->select();

		foreach ($info as $k =>$v)
		{
			$info[$k]['time'] = date('Y-m-d H:i:s', $v['time']);
			$info[$k]['gather'] = $company->field('name')->where('uid='.$v['gather'])->find()['name'];

		}
		$this->OutPage = $page['show'];

		//	判断是否有订单
		if ($info) {
			return $info;
		}else {
			return false;
		}
	}

	/**
	 * 	转出账单查询
	 *
	 */
	public function getOrderIn()
	{
		$order = M('order');
		$details = M('user_details');

		//	统计数量  分页显示
		$count = $order->where('gather='.$_SESSION['home']['id'])->count();
		$page = $this->dataPage($count, 10);

		//	数据查询
		$info = $order->where('gather='.$_SESSION['home']['id'])->order('id desc')
			->limit($page['limit'])->select();

		foreach ($info as $k =>$v)
		{
			$info[$k]['time'] = date('Y-m-d H:i:s', $v['time']);
			$info[$k]['source'] = $details->field('kahao')->where('uid='.$v['source'])->find()['kahao'];

		}
		$this->InPage = $page['show'];

		//	判断是否有订单
		if ($info) {
			return $info;
		}else {
			return false;
		}
	}

	/**
	 * 数据分页
	 */
	public function dataPage($count, $num)
	{
		$Page = new \Think\Page($count, $num);

		$data['show'] = $Page->show();
		$data['limit'] = $Page->firstRow.','.$Page->listRows;

		return $data;
	}

	/**
	 * 	商户申请
	 */
	public function apply()
	{
		$c = M('company');
		$_POST['uid'] = $_SESSION['home']['id'];
		$c->create();
		$res = $c->add();

		if ($res)
		{
			$d = M('user_details');
			$d->where('uid='.$_SESSION['home']['id'])->setField('level',1);
		}

		echo $res;
	}

	/**
	 * 	接口下载
	 *
	 */
	public function download()
	{
		$filename = './Public/Download/bankPay.class.php';
		header('Content-Type:text/plain'); //指定下载文件类型
		header('Content-Disposition: attachment; filename="bankPay.class.php"'); //指定下载文件的描述
		header('Content-Length:'.filesize($filename)); //指定下载文件的大小

		//将文件内容读取出来并直接输出，以便下载
		readfile($filename);
	}




}