<?php
	namespace Home\Controller;

	class AdressController extends CommonController
	{
		public function adress_sheng()
		{
			//	查询三级联动的省
			$area = M('think_area');
			$list = $area->where('level=1')->select();
			return $list;
		}

		/**
		 * 		地址的三级联动 方法
		 */
		public function adress_area ()
		{
			$upid = I('get.upid');
			$area = M('think_area');
			$list = $area->where('upid='.$upid)->select();
			$this->ajaxReturn($list);
		}

		/**
		 * @param $num	int  传入要查询的条数 默认0  0为全部查询出来
		 *
		 * @return mixed
		 */
		public function get_adr($num = 0)
		{
			$adr = M('user_address');
			if ($num){
				$adrInfo = $adr->where('userid='.$this->UserID.' and state=0')->order('`default` desc')->limit($num)->select();
			}else {
				$adrInfo = $adr->where('userid='.$this->UserID.' and state=0')->order('`default` desc')->select();
			}
			return $adrInfo;
		}

		/**
		 * 	添加收货地址
		 *
		 */
		public function add_adr()
		{
			if (IS_AJAX)
			{
				//	接收 ajax 传来的值 $_POST['adrInfo']
				$arr = [];
				foreach ($_POST['adrInfo'] as $v)
				{
					$arr[$v['name']] = $v['value'];
				}
				$area = M('think_area');
				$str = $arr['sheng'].','.$arr['shi'].','.$arr['xian'];
				$brr['id'] = ['in', $str];
				$a = $area->where($brr)->select();

				$s = '';
				foreach ($a as $vo)
				{
					$s .= $vo['name'];
				}
				$arr['address'] = $s.$arr['jiedao'];
				$arr['userid']  = $this->UserID;

				$adr = M('user_address');
				$adr->create($arr);

				echo $adr->add();
			}
		}
	}