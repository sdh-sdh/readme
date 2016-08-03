<?php
namespace Admin\Controller;
class SortController extends CommonController
{
	//添加分类页面
	public function add()
	{
		$asort = $this->sort();
		$Sorts = $this->getSortList();
		$this->asort = $asort;
		$this->Sorts = $Sorts;
		$this->display();
	}
	//执行添加
	public function insert()
	{
		//创建对象
		$Sort = M('assortment');
		//获取parent
		$parent = I('post.parent');
		if ($_POST['aname'] == '') {
			echo '<script>alert("添加失败，请选择商品分类");window.location.href="add"</script>';
			die;
		}
		//顶级分类
		if($parent == 0){
			$_POST['path'] = 0;
		}else{
			//获取元素的父级元素 
			$parents = $Sort->find($parent);
			$_POST['path'] = $parents['path'].','.$parents['asortid'];
		}
		$attr = M('attr_sort');
		//插入数据库
		$Sort->create();
		$asid = $Sort->add();
		$arr[] = array('attrid'=>$_POST['颜色'],'sortid'=>$asid);
		$arr[] = array('attrid'=>$_POST['尺码'],'sortid'=>$asid);
		if($attr->addAll($arr)){
			redirect(U('Admin/Sort/add'));
		}else{
			$this->error('插入失败', U('Admin/Sort/index'), 3);
		}	
	}
	//查看
	public function index()
	{
		//获取参数
		$num = I('get.num');
		$num = empty($num) ? 10 : $num;
		$keyword = I('get.keyword');
		//检查是否存在
		if (!empty($keyword)) {
			$where['a.aname'] = array('Like','%'.$keyword.'%');
		}
		$where['a.isdelete'] = array('EQ',0);
		//获取模型
		$Sort = M('assortment');
		//获取总数
		$count = $Sort->alias('a')->where($where)->count();
		//获取分页对象
		$page = new \Think\Page($count, $num);
		//获取limit参数
		$limit = $page->firstRow.','.$page->listRows;
		$Sorts = $Sort->alias('a')->field('a.*,b.aname as bname,concat(a.path,",",a.asortid) as paths')->join('left join feiyue_assortment b on a.parent=b.asortid')->limit($limit)->order('paths')->where($where)->select();
		foreach ($Sorts as $key => $value) {
			$count = count(explode(',', $value['path']))-1;
			$Sorts[$key]['aname'] = str_repeat('|_--', $count).$value['aname'];
		}
		//分配变量
		$this->Sorts = $Sorts;
		//获取页码字符串
		$pages = $page->show();
		//分配
		$this->pages = $pages;
		$this->num = $num;
		$this->keyword = $keyword;
		//解析模板
		$this->display();
	}
	public function getSortList()
	{
		//创建模型
		$Sort = M('assortment');
		//读取
		$Sorts = $Sort->field('asortid,aname,parent,path,concat(path,",",asortid) as paths')->order('paths')->select();
		//遍历
		foreach ($Sorts as $key => &$value) {
			//分隔数组
			$num = count(explode(',',$value['path']))-1;
			//修改title
			$value['aname'] = str_repeat('|_--', $num).$value['aname'];
		}
		return $Sorts;
	}
	//修改页面
	public function edit()
	{
		//读取表中所有的分类
		$this->Sorts = $this->getSortList();
		//获取分类id
		$id = I('get.id');
		//读取分类信息
		$info = M('assortment')->find($id);
		//分配变量
		$this->assign('info', $info);
		//解析模板
		$this->display();
	}
	//更新操作
	public function update()
	{
		//创建对象
		$Sort = M('assortment');
		//处理path字段
		$parent = I('post.parent');
		if($parent == 0){
			$_POST['path'] = 0;
		}else{
			$info = $Sort->find($parent);
			$_POST['path'] = $info['path'].','.$info['asortid'];
		}
		$Sort->create();
		if($Sort->save()){
			$this->success('更新成功',U('Admin/Sort/index'),3);
		}else{
			$this->error('更新失败',U('Admin/Sort/index'),3);
		}
	}
	//删除操作
	public function delete()
	{
		//获取id
		$id = I('get.id');
		//删除子分类
		$Sort = M('assortment');
		//读取path
		$info = $Sort->find($id);
		// $path = $info['path'].','.$info['id'];
		//删除
		// $Sort->where("path like '{$path}%'")->delete();
		$sorts = $Sort->where('parent='.$id)->select();
		if($sorts){
			$this->error('删除失败,该ID下有子分类',U('Admin/Sort/index'),3);
		}else{
			//删除当前分类
			$arr = array("asortid"=>$id,"isdelete"=>1);
			$res = $Sort->save($arr);
			if($res){
				redirect(U('Admin/Sort/index'));
			}else{
				$this->error('删除失败',U('Admin/Sort/index'),3);
			}
		}
	}

	public function sort()
	{
		$sort = M('goods_attr');
		$asort = $sort->select();
		return $asort;
	}
}