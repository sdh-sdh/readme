<?php
	namespace Admin\Controller;

	class CommentController extends CommonController
	{
		/**
			商品评论列表
		*/
		public function index()
		{
			//获取参数
			$num = I('get.num');
			$num = !empty($num) ? $num : 10;
			$comment = M("goods_comment");
			//获取总数
			$count = $comment->count();
			//创建分页对象.
			$page = new \Think\Page($count, $num);
			//获得limit参数
			$limit = $page->firstRow.','.$page->listRows;
			$com = $comment->alias('a')->field('a.*,b.goodname')->join('left join feiyue_goods b on a.gid=b.id')->limit($limit)->order('a.ctime desc')->select();
			$this->com = $com;
			//获取页码字符串
			$pages = $page->show();
			//分配
			$this->pages = $pages;
			$this->num = $num;
			$this->display();
		}

		/**
			商品评论删除
		*/
		public function delete()
		{
			$id = I('get.id');
			$comment = M('goods_comment');
			if($comment->delete($id)){
				redirect(U('Admin/Comment/index'));
			}else{
				$this->error('删除失败');
			}
		}
	}