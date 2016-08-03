<?php
	namespace Home\Controller;

	class CollectController extends CommonController
	{
		public function index()
		{
			$colll = M('collect');
			$goods = M('goods');
			$good = $colll->alias('a')->field('a.*,b.userpic,c.*')->join('left join feiyue_store_shop c on a.goodid=c.shopid')->join('left join feiyue_user_detail b on b.userid=c.uid')->where('a.state=2 and a.userid='.$_SESSION['home']['id'])->order('a.time asc')->select();
			$datas = array();
			foreach ($good as $key => $v) {
				$uid = $v['uid'];
				$goodsd = $goods->field('count(id) as num,goodtime')->where('storeid='.$uid.' and goodtime >'.$v['time'])->order('goodtime desc')->select();
				$good[$key]['num'] = $goodsd[0]['num'];
				$good[$key]['goodtime'] = $goodsd[0]['goodtime'];
				$datas[$key]['goodtime'] = $goodsd[0]['goodtime'];
				$datas[$key]['name'] = $v['shopname'];
				$datas[$key]['data'] = $goods->where('storeid='.$uid.' and goodtime >'.$v['time'])->order('goodtime desc')->select();
			}
			$shops = $colll->alias('a')->field('a.*,b.*')->join('left join feiyue_goods b on b.id=a.goodid')->where('a.state=1 and a.userid='.$_SESSION['home']['id'])->select();

			$track = M('goods_track');
			$time = strtotime("-1 month");
			$trk = $track->where('audit=1 and uid='.$_SESSION['home']['id'].' and goodtime>'.$time)->order('goodtime desc')->select();
			$arr = array();
			foreach($trk as $r) {
			    $arr[$r['time']][] = $r;
			}

			Krsort($arr);
			$this->arr = $arr;
			$this->shops = $shops;
			$this->datas = $datas;
			$this->sort = R('Sort/users');
			$this->good = $good;
			$this->display();
		}

		public function qixiao()
		{
			$collect = M("collect");
			$id = $_POST['id'];
	        if($collect->delete($id)){
	        	echo 1;
	        }else{
	        	echo 2;
	        }
		}
		public function quxiao()
		{
			$id = I('post.id');
			$collect = M("collect");
			$goods = M('goods');
			$col = $collect->where('goodid='.$id)->find();
			if($collect->delete($col['id'])){
				$goodsnews=$goods->where('id='.$_POST['id'])->field("collect")->find();
				$num=$goodsnews['collect'];
                $data['collect']=$num-1;
                $goods->where('id='.$id)->save($data);
				echo 1;
			}else{
				echo 2;
			}
		}
	}