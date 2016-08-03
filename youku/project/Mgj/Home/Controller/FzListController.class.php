<?php
	namespace Home\Controller;

	class FzListController extends MaintainController
	{
		public function index ()
		{
			$this->sort = R('Index/parentUrl');
			$this->fid = $this->url();
			$good = M('goods');
			$goods = $good->alias('a')->field('a.*,b.bid,c.asortid')->join('left join feiyue_goods_breed b on a.state=b.bid and a.isdelete=0')->join('left join feiyue_store c on a.asortid=c.asortid and a.isdelete=0')->select();
			foreach ($goods as $key => $v)
			{
				$goods[$key]['url'] = U('Home/Detail/index', array('id'=> $v['id']));
			}
			$goods1 = $good->where('state=1 and isdelete=0 and audit=1')->select();
			foreach ($goods1 as $key => $v)
			{
				$goods1[$key]['url'] = U('Home/Detail/index', array('id'=> $v['id']));
			}
			$goods2 = $good->where('state=2 and isdelete=0 and audit=1')->select();
			foreach ($goods2 as $key => $v)
			{
				$goods2[$key]['url'] = U('Home/Detail/index', array('id'=> $v['id']));
			}
			$goods3 = $good->where('state=3 and isdelete=0 and audit=1')->select();
			foreach ($goods3 as $key => $v)
			{
				$goods3[$key]['url'] = U('Home/Detail/index', array('id'=> $v['id']));
			}
			$goods4 = $good->where('state=4 and isdelete=0 and audit=1')->select();
			foreach ($goods4 as $key => $v)
			{
				$goods4[$key]['url'] = U('Home/Detail/index', array('id'=> $v['id']));
			}
			$goods5 = $good->where('state=5 and isdelete=0 and audit=1')->select();
			foreach ($goods5 as $key => $v)
			{
				$goods5[$key]['url'] = U('Home/Detail/index', array('id'=> $v['id']));
			}
			$this->goods = $goods;
			$this->goods1 = $goods1;
			$this->goods2 = $goods2;
			$this->goods3 = $goods3;
			$this->goods4 = $goods4;
			$this->goods5 = $goods5;

			$this->assign('config', R('Index/webConfig'));
			$this->assign('flink', R('Index/freindLink'));

			$this->display();
		}

	/**
	 * 	商品state 链接
	 *
	 *	
	 */
		public function url()
		{
			$fid = I('get.id');
			$breed = M('goods_breed');
			$bInfo = $breed->limit(6)->select();

			foreach ($bInfo as $key => $v) {
				$bInfo[$key]['url'] = U('Home/FzList/index', array('id'=> $fid,'state'=> $v['state']));
			}
			return $bInfo;
		}
	}