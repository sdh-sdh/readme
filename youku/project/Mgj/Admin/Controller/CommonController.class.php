<?php
	namespace Admin\Controller;
	use Think\Controller;

	class CommonController extends Controller
	{
		public function _initialize()
		{
			if (empty($_SESSION['admin']['login']))
			{
				redirect(U('Admin/Manager/login'));
			}
			/* else {
				  if (!IS_AJAX) {
					$this->display('Common/index');
				  }
			} */

			$AUTH = new \Think\Auth();
			//类库位置应该位于ThinkPHP\Library\Think\
			if(!$AUTH->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME, session('admin.id'))){
			    // $this->error('没有权限',U('Index/index'),2);
			    $this->error('没有权限');
			}


		}
	}