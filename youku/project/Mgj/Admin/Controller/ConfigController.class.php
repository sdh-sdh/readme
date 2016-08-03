<?php
	namespace Admin\Controller;

	class ConfigController extends CommonController
	{
		//查看操作
		public function add()
		{
			$this->display();
		}

		public function insert(){
			//创建对象
			$config = M('configure');

			if($_POST['title'] == ""){
				echo '<script>alert("添加失败，请填写网站标题");window.location.href="add"</script>';
				die;
			}
			if ($_POST['switch'] == "") {
				$_POST['switch'] = 0;
			}
			if ($_FILES['headlogo']['name'] == '' || $_POST == '') {
				echo '<script>alert("数据不全");window.location.href="add"</script>';
				die;
			}
			//处理头像字段
			$upload = new \Think\Upload();
			// 实例化上传类
			$upload->maxSize   = 3145728 ;
			// 设置附件上传大小
			$upload->exts      = array('jpg', 'gif', 'png', 'jpeg');
			// 设置附件上传类型
			$upload->savePath  =  '/Uploads/';
			// 设置附件上传目录
			$upload->rootPath  = './Public' ;
			// 上传文件
			$info   =   $upload->upload();
			//拼接图片的路径
			$_POST['headlogo'] = trim($upload->rootPath,'.').$info['headlogo']['savepath'].$info['headlogo']['savename'];
			//尾部logo
			$_POST['footlogo'] = trim($upload->rootPath,'.').$info['footlogo']['savepath'].$info['footlogo']['savename'];


			//创建数据
			$config->create();
			//插入
			if($config->add()){
				$this->success('插入成功', U('Admin/Config/index'), 3);
			}else{
				$this->error('插入失败');
			}

			$this->display();
		}

		//配置信息展示
		public function index(){
			//创建对象
			$config = M('configure');
			$res = $config->select();
			$this->assign('data',$res);
			$this->display();
		}

		//配置信息编辑
		public function edit(){
			//创建对象
			$config = M('configure');
			$res = $config->find($_POST['id']);
			$this->assign('data',$res);
			$this->display();
		}

	// 	//配置信息修改
		public function update(){
			$id = $_POST['id'];
			$config = M('configure');
			//判断是否上传新的头像
			$data = $config -> find($id);

			// 上传文件
			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize = 3145728 ;// 设置附件上传大小
			$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath = '/Uploads/'; // 设置附件上传目录
			$upload->rootPath = './Public';
			//生成随机值
			$upload->saveName = array('getFileName','');
			$info = $upload->upload();
			//判断头部LOGO是否有文件上传，如果没有则用原来的图片
			if($_FILES['headlogo']['error'] == 4){
				$_POST['headlogo'] = $data['headlogo'];
			}else{

				$_POST['headlogo'] = trim($upload->rootPath,'.').$info['headlogo']['savepath'].$info['headlogo']['savename'];
				//删除原来的图片
				unlink($data['headlogo']);


			}
			//判断尾部LOGO是否有文件上传,如果没有则用原来的图片
			if($_FILES['footlogo']['error'] == 4){
				$_POST['footlogo'] = $data['footlogo'];
			}else{

				// 上传文件
				$_POST['footlogo'] = trim($upload->rootPath,'.').$info['footlogo']['savepath'].$info['footlogo']['savename'];
				//删除原来的图片
				unlink($data['footlogo']);
			}


			if($config -> create()){
				if($config -> save()){
					$this -> redirect("Config/index");
				}else{
					$this -> error("网站信息修改失败！");
				}
			}else{
				$this -> error("网站信息修改失败!");
			}
		}

		//网站配置的开关
		public function webswitch(){
			$config = M("configure");
			if($_POST['sub']){
				if($config -> create()){
					if($config -> save()){
						$_SESSION['switch'] = $_POST['switch'];
						$this -> redirect("Config/index");
					}
				}
			}
			$data = $config -> select();
			$this -> assign("data",$data);
			$this -> display();
		}
	}