<?php
	namespace Admin\Controller;
	use Think\Controller;

	class ManagerController extends Controller
	{

		public function login ()
		{
			$this->display();
		}

		public function checkLogin()
		{
			$Admin = M('user');
			$arr['username'] = I('post.username');
			$arr['password'] = md5(I('post.password'));

			$manager = $Admin->where($arr)->find();

			$Verify = new \Think\Verify();

			$verifyCode = $Verify->check(I('checkCode'));

			if ($manager && $verifyCode) {

				session('admin', array('id' => $manager['id'], 'login' => 1));

				redirect(U('Admin/Index/index'));
				return;
			} elseif (!$verifyCode){
				$this->error('验证码错误','login',3);
			} else {
				$this->error('密码错误','login',3);
			}
		}


		/**
		 *	生成验证码
		 */
		public function verify() {
			$Verify = new \Think\Verify();

			$Verify->entry();
		}

		/**
		 *	ajax 验证用户名
		 */
		public function ajaxCheckName()
		{
			if (IS_AJAX)
			{
				$Admin = M('user');

				$count = $Admin->where($_POST)->count();

				if ($count) {
					$this->ajaxReturn(1);
				} else{
					$this->ajaxReturn(0);
				}
			}
		}


		/**
		 *		注销
		 *
		 */
		public function lyout ()
		{
			unset($_SESSION['admin']);
			redirect(U('Admin/Manager/login'));
		}

	}