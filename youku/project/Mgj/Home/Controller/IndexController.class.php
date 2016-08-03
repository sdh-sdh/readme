<?php
namespace Home\Controller;

class IndexController extends MaintainController
{
	public function index()
	{
		$goods = M('goods');
		$goodsInfo = $goods->where('audit=1 and isdelete=0')->order('rand()')->limit(0,8)->select();
		foreach ($goodsInfo as $key => $v) {
			$goodsInfo[$key]['url'] = U('Home/Detail/index', array('id' => $v['id']));
		}
		$goodsInfo1 = $goods->where('audit=1 and isdelete=0')->order('rand()')->limit(9,16)->select();
		foreach ($goodsInfo1 as $key => $v) {
			$goodsInfo1[$key]['url'] = U('Home/Detail/index', array('id' => $v['id']));
		}
		$goodsInfo2 = $goods->where('audit=1 and isdelete=0')->order('rand()')->limit(17,24)->select();
		foreach ($goodsInfo2 as $key => $v) {
			$goodsInfo2[$key]['url'] = U('Home/Detail/index', array('id' => $v['id']));
		}
		$this->assign('goodsInfo', $goodsInfo);
		$this->assign('goodsInfo1', $goodsInfo1);
		$this->assign('goodsInfo2', $goodsInfo2);

		$this->goodslist = $this->goodsList(0);


		$this->lunbo = $this->lunboInfo();
		$this->display();
	}

	public function goodsList($pid)
	{
		$gList= M('assortment');
		$list = $gList->where('isdelete=0 and parent ='.$pid)->select();

		$data = [];
		foreach ($list as $key => $value)
		{
			$value['subcate'] = $this->goodsList($value['asortid']);
			$data[] = $value;
		}

		return $data;
	}

	/**
	 * 首页购物车 链接 内容
	 */

	/**
	 * 商品父级分类 信息 包括url
	 */
	public function parentUrl()
	{
		$sort = M('assortment');
		$sortInfo = $sort->where('parent = 0 and isdelete = 0')
			//->order('asortid desc')
			->select();
		foreach ($sortInfo as $key => $v) {
			$sortInfo[$key]['url'] = U('Home/FzList/index', array('id' => $v['asortid']));
		}

		return $sortInfo;
	}


	public function rightCart()
	{
		W('Cate/indexCart');
	}

	protected function lunboInfo()
	{
		$pic = M('web');
		$info = $pic->order('id desc')->select();
		return $info;
	}


}



