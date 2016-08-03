<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller
{
	protected $UserID = null;

	public function _initialize()
	{
		if (empty($_SESSION['home']['id']))
		{
			//	, 5, '页面跳转中...'
			$this->redirect('Home/User/login');

		}else
		{
			$this->UserID = $_SESSION['home']['id'];
		}
	}
    

    
    
}