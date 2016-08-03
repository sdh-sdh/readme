<?php
	namespace Admin\Controller;

	class IndexController extends CommonController
	{
		public function index ()
		{

			$admin = M('user');

			$id = $_SESSION['admin']['id'];

			$managerInfo = $admin->find($id);

			$this->assign('managerInfo', $managerInfo);
			//	加载 后台首页
			$this->display();

		}

	}