<?php
	namespace Home\Controller;

	class ComonController extends MaintainController
	{
		//	接收用户id
		protected $UserID = 0;

		public function _initialize()
		{
			parent::_initialize();
			if (empty($_SESSION['home']['id']))
			{
				redirect(U('Home/Sorts/login'));
			} else {
				$this->UserID = $_SESSION['home']['id'];
			}
		}

	}