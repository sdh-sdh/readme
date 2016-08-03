<?php
	namespace Admin\Controller;

	class NoticeController extends CommonController
	{
		/**
			商铺公告展示页面
		**/
		public function index(){
			//获取参数
			$num = I('get.num');
			$num = !empty($num) ? $num : 3;
			$keyword = I('get.keyword');
			//检测条件是否存在
			if(!empty($keyword)){
				$where['storetitle'] = array('LIKE', '%'.$keyword.'%');
			}
			$where['isdelete'] = array('EQ',0);
			//实例化
			$notice = M('store_notice');
			//获取总数
			$count = $notice->where($where)->count();
			//创建分页对象.
			$page = new \Think\Page($count, $num);
			//获得limit参数
			$limit = $page->firstRow.','.$page->listRows;

			//数据库查询
			$data = $notice->order('id desc')->where($where)->limit($limit)->select();
			//获取页码字符串
			$pages = $page->show();
			//分配变量
			$this->pages = $pages;
			$this->num = $num;
			$this->keyword = $keyword;
			$this->assign('data',$data);
			//解析模板
			$this->display();
		}

		/**
			商铺公告设置页面
		**/
		public function add(){
			$this->display();
		}

		/**
			商铺公告的添加
		**/
		public function insert(){
			//设置分布公告日期
			$_POST['storetime'] = time();
			//实例化
			$notice = M('store_notice');
			//数据库添加(过滤)
			if($notice->create()){
				if($notice->add()){
					$this->redirect("Notice/index");
				}else{
					$this->error('商铺公告添加失败','index',3);
				}
			}else{
				$this->error('商铺公告添加失败','index',3);
			}
		}

		/**
			商铺公告编辑
		**/
		public function edit(){
			//获取id
			$id = $_GET['id'];
			//实例化
			$notice = M('store_notice');
			//查询
			$data = $notice->find($id);
			//分配变量
			$this->assign('data',$data);
			//解析模板
			$this->display();
		}

		/**
			商铺公告修改
		**/
		public function update(){
			//获取id
			$id = $_POST['id'];
			//实例化
			$notice = M('store_notice');
			//数据库修改(过滤)
			if($notice->create()){
				if($notice->where("id=".$id)->save()){
					$this->redirect("Notice/index");
				}else{
					$this->error('商铺公告修改失败','index',3);
				}
			}else{
				$this->error('商铺公告修改失败','index',3);
			}
		}

		/**
			商铺公告删除
		**/
		public function delete(){
			//获取id
			$id = $_GET['id'];
			//实例化
			$notice = M('store_notice');
			//数据库删除
			$arr = array("isdelete"=>1,'id'=>$id);
			$res = $notice->save($arr);
			if($res){
				redirect(U('Admin/Notice/index'));
			}else{
				$this->error('删除失败');
			}
		}
	}