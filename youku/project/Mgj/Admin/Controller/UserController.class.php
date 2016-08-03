<?php
	namespace Admin\Controller;

	class UserController extends CommonController
	{
		/**
			用户信息注册
		**/
		public function add(){

			$this->display();
		}

		/**
			关联两表添加
		**/
		public function insert(){

			$detail = M('user_detail');
			//判断输入密码是否为空
			if(!empty($_POST['username'])){
				if(I('password') == I('repassword')){
					//密码加密
					$_POST['password'] = md5($_POST['password']);
					$data = $_POST;
				}else{
					$this -> error("两次密码不一致");
				}
			}else{
				$this -> error("用户名不能为空");
			}

			//创建对象
			$user = M("user");
			$data['rtime'] = time();
			//create()创建数据对象，把提交来的数组中的值放入对象的成员属性data中，但数据的下标与表字段名相同的才会放入，默认是得到POST中的值
			if($user -> create($data)){
				//像数据库中添加数据
				if($user -> add()){
					$userid = $user->getlastInsID();
					$d['userid'] = $userid;
					// var_dump($userid);
					// die;
					if($_FILES['pic']['error'] == 4){
						$d['pic'] = "Public/Uploads/default.jpg";
					}else{
						$upload = new \Think\Upload();// 实例化上传类
						$upload->maxSize = 3145728 ;// 设置附件上传大小
						$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
						$upload->savePath = '/Uploads/'; // 设置附件上传目录
						$upload->rootPath = './Public';
						$info = $upload->upload();
						$d['pic'] = trim($upload->rootPath,'.').$info['pic']['savepath'].$info['pic']['savename'];
					}
					$rtime = time();
					$d['rtime'] = $rtime;
					if($detail -> create($d)){
						//像数据库中添加数据
						$detail -> add();

					}else{
						$this->error('添加失败');
					}
					//redirect()重定向
					$this -> redirect("User/index");

				}else{
					$this->error('添加失败');
				}
			}
		}

		/**
			用户的信息展示(两表关联查询)
		**/
		public function index()
		{
			$user = M('user');
			$detail = M('user_detail');
			//获取分页框需要显示的数量
			$num = I('get.num');
			$num = !empty($num) ? $num : 5;
			$keyword = I('get.keyword');
			if(!empty($keyword)){
				$where['a.username']=array('LIKE','%'.$keyword .'%');
			}
			$where['a.isdelete']=array('eq',0);
			//获取总数
			$count = $user->alias('a')->where($where)->count();	//查询满足要求的总记录数
			//创建分页对象
			$page = new \Think\Page($count,$num);
			//获得limit参数
			$limit = $page->firstRow.','.$page->listRows;
			$show = $page->show();
			//获取当前页码下的数据
			$res = $user->alias('a')->field('a.*,b.*,c.*')->join('left join feiyue_user_detail b on a.id=b.userid')->join('left join feiyue_user_auth_group c on c.id=b.groupid')->order('b.userid desc')->where($where)->limit($limit)->select();

			$this->assign('page',$show);

			$this->assign('data',$res);
			$this->assign('num',$num);
			$this->assign('keyword',$keyword);
			$this->display();
		}

		/**
			用户详情的编辑
		**/
		public function edit(){
			$user = M('user');
			$id = $_GET['id'];
			// $res = $user->find($id);
			$res = $user->alias('a')->field('a.*,b.*')->join('left join feiyue_user_detail b on a.id=b.userid')->find($id);
			//实例化组
			$group = M('user_auth_group');
			$result = $group->select();
			$this->assign('info',$res);
			$this->assign('data',$result);
			$this->display();
		}

		/**
			用户详情的修改
		**/
		public function update(){
			//传参
			// $_POST['userid'] = $_POST['id'];
			//实例化对象
			$detail = M('user_detail');
			$userid = $_POST['id'];
			$result = $detail->where("userid=".$userid)->find();
			//实例化用户组
			$group = M('user_auth_group');
			$g = $group->where("id=".$result['groupid'])->find();
			//实例化用户组对应表
			$access = M("user_auth_group_access");
			$r = $access->where('uid='.$userid)->find();
			if(!$r){
				$arr = array("uid"=>$userid,"group_id"=>$_POST['groupid']);
				$access->add($arr);
			}else{
				$arr = array("group_id"=>$_POST['groupid']);
				$access->where('uid='.$userid)->save($arr);
			}

			//判断是否上传新的头像
			if ($_FILES['userpic']['error'] == 0){
				$upload = new \Think\Upload();// 实例化上传类
				$upload->maxSize = 3145728 ;// 设置附件上传大小
				$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
				$upload->savePath = '/Uploads/'; // 设置附件上传目录
				$upload->rootPath = './Public';
				$info = $upload->upload();
				$_POST['userpic'] = trim($upload->rootPath,'.').$info['userpic']['savepath'].$info['userpic']['savename'];
				//删除原来的图片
				$this->deleteUserpic($userid);
			}

			$detail->create();
			$res = $detail->where("userid=".I('post.id'))->save();
			if($res){

				$this->success('用户信息修改成功','index');
			}else{
				$this->error('用户信息修改失败','index');
			}
		}

		/**
			用户详情的删除
		**/
		public function delete(){
			$id = $_GET['id'];
			$userid = $id;
			$user = M('user');
			// $detail = M('user_detail');
			// $result = $detail->find($userid);
			// $newpath = '.'.$result['userpic'];
			// @unlink($newpath);
			$arr = array("id"=>$id,"isdelete"=>1);
			$res = $user->save($arr);
			if($res){
				redirect(U('Admin/User/index'));
				// echo 1;
			}else{
				redirect(U('Admin/User/index'));
				// echo 0;
			}
		}

		/**
			用户头像调用方法
		**/
		private function deleteUserpic($userid)
		{
			//获取图片路径
			$path = $this->getUserpic($userid);
			//删除
			unlink($path);
		}
		/**
			封装方法 获得用户的图片路径
		**/
		private function getUserpic($userid)
		{
			$detail = M('user_detail');
			//读取
			$info = $detail->find($userid);
			return '.'.$info['userpic'];
		}

	}