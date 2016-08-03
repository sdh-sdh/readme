<?php
	namespace Admin\Controller;

	class OrderController extends CommonController
	{
		//	订单列表首页
		public function index()
		{

			$this->orders = $this->getOrderInfo();
//			echo '<pre>';
//			print_r($this->orders);
//			echo '</pre>';
			$this->display();
		}

		/**
		*	获取订单信息
		*
		*
		*/
		protected function getOrderInfo()
		{
			$o = M('goods_order');

			$count = $o->count();

			$limit = $this->dataPage($count, 4);
			$this->page = $limit['show'];

			$info = $o->where('isdelete=0')->order('id desc')->limit($limit['limit'])->select();

			foreach ($info as $key => $value) {
				$info[$key]['ordertime'] = date('Y-m-d H:i:s', $value['ordertime']);
				$info[$key]['skuid'] = $this->getGoods($info[$key]['skuid']);
				$info[$key]['adrid'] = $this->getOrderAddress($info[$key]['adrid']);

				$this->nums = json_decode($value['number']);

			}

			return $info;
		}

		/**
		 *	通过skuid 查询
		 *
		 *	@param 		string 		$sid 		json 字符串
		 *  @return		array		$ginfo
		 */
		protected function getGoods($sid)
		{
			$id['id'] =['in', (Array)json_decode($sid)];

			$sku = M('goods_sku');

			$ginfo = $sku->where($id)->select();

			foreach ($ginfo as $key => $value) {
				
				$goods = M('goods');
				$ginfo[$key]['goodname'] = $goods->field('goodname')->where('id='.$value['gid'])->find()['goodname'];

				$arr_attr = (Array)json_decode($ginfo[$key]['attr']);
				$attr = M('goods_attr');
				$attr_v = M('goods_attr_values');

				foreach ($arr_attr as $k => $v) {
					$n = $attr->field('attrname')->where('id='.$k)->find();
					$a_v = $attr_v->field('value')->where('id='.$v)->find();

					$ginfo[$key]['att'][$n['attrname']] = $a_v['value'];
				}
			}

			return $ginfo;
		}

		/**
		 * 	获取订单中的数量
		 *
		 */
		protected function getOrderNum ()
		{

		}

		public function getOrderAddress($id)
		{
			$adr = M('user_address');

			$info = $adr->find($id);

			$data['name'] 	  = $info['name'];
			$data['adr']  	  = $info['sheng'].$info['shi'].$info['xian'].$info['address'];
			$data['phone']	  = $info['phone'];
			$data['postcode'] = $info['postcode'];

			return $data;

		}

		/**
		 *	订单详情
		 *
		 *
		 *
		 */
		public function orderDetails()
		{
			$o = M('goods_order');

			$this->state = $o->find(I('get.id'))['state'];

			$this->display();
		}

		/**
		 *	修改订单状态
		 *
		 *
		 *
		 */
		public function modifyState()
		{
			$o = M('goods_order');

			$res = $o->where('id='.I('post.orderid'))->setField('state', I('post.stat'));

			if ($res === 'false') {
				//	更新失败
				$this->ajaxReturn(2);
			} elseif ($res > 0) {
				//	修改成功
				$this->ajaxReturn(1);
			} else {
				//	未做修改
				$this->ajaxReturn(0);
			}
			

		}


		/**
		 *	删除订单
		 *
		 */
		public function delOrder()
		{
			$o = M('goods_order');

			$res = $o->where('id='.I('post.id'))->setField('isdelete', 1);

			if ($res === 'false') {
				//	删除失败
				$this->ajaxReturn(2);
			} elseif ($res > 0) {
				//	成功
				$this->ajaxReturn(1);
			} else {
				//	未做修改
				$this->ajaxReturn(0);
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


	}