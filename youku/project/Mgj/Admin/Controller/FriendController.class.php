<?php
	namespace Admin\Controller;

	class FriendController extends CommonController
	{
		//友情链接注册
		public function add(){

			$this->display();
		}

		//友情链接添加
		public function insert(){
			$friend = M('friendlink');
			//调用文件上传($info是一个对象)
			$info = $this->uppic();
			$data = $info->upload();
			$_POST['linklogo'] = trim($info->rootPath,'.').$data['linklogo']['savepath'].$data['linklogo']['savename'];

			if($friend->create()){
				if($friend->add()){
					redirect(U('Admin/Friend/index'));
				}else{
					redirect(U('Admin/Friend/add'));
				}
			}else{
				redirect(U('Admin/Friend/add'));
			}
		}

		//图片上传
		public function uppic(){

			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize = 3145728 ;	//设置附件上传大小
			$upload->exts = array('jpg','png','gif','jpeg');	//设置附件上传类型
			$upload->savePath = '/Uploads/';	//设置附件上传目录
			$upload->rootPath = './Public';
			return $upload;		//(返回一个对象)
		}

		//友情链接信息显示
		public function index(){
			//实例化对象
			$friend = M('friendlink');
			$data = $friend->where("isdelete=0")->select();
			$this->assign('data',$data);
			$this->display();
		}

		//友情链接信息编辑
		public function edit(){
			$id = I('get.id');

			//实例化对象
			$friend = M('friendlink');
			$data = $friend->find($id);
			$this->assign('data',$data);
			$this->display();
		}

		//友情链接信息修改
		public function update(){
			$id = $_POST['id'];

			//实例化对象
			$friend = M('friendlink');
			//获取原来的图片地址
			$res = $friend->find($id);
			//图片上传
			//调用文件上传($info是一个对象)
			$info = $this->uppic();
			$data = $info->upload();
			//判断LOGO是否有文件上传，如果没有则用原来的图片
			if($_FILES['linklogo']['error'] == 4){
				$_POST['linklogo'] = $res['linklogo'];
			}else{
				//有头部LOGO文件上传，调用上传函数
				$info = $this -> uppic($_FILES['linklogo']);
				$_POST['linklogo'] = trim($info->rootPath,'.').$data['linklogo']['savepath'].$data['linklogo']['savename'];
				$linklogo = '.'.$res['linklogo'];
				unlink($linklogo);
			}

			if($friend->create()){
				if($friend->save()){
					redirect(U('Admin/Friend/index'));
				}else{

					$this->error('修改失败!');
				}
			}else{
				$this->error('修改失败!');
			}

		}

		//友情链接信息删除
		public function delete(){
			$id = $_GET['id'];
			//实例化对象
			$friend = M('friendlink');
			$arr = array("id"=>$id,"isdelete"=>1);
			$res = $friend->save($arr);
			if($res){
				redirect(U('Admin/Friend/index'));
			}else{
				redirect(U('Admin/Friend/index'));
			}
		}

	}