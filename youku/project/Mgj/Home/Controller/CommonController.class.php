<?php
	namespace Home\Controller;

	class CommonController extends MaintainController
	{
		//	接收用户id
		protected $UserID = 0;

		public function _initialize()
		{
			parent::_initialize();
			if (empty($_SESSION['home']['id']))
			{
				$_SESSION['backUrl'] = $_SERVER['REQUEST_URI'];
				redirect(U('Home/User/login'));
			} else {
				$this->UserID = $_SESSION['home']['id'];
			}
		}

	}
