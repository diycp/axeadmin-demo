<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends AuthController 
{
	public function index()
	{
		$d = D('Category');
		$category = $d->getAllTree();
		Vendor('AXE.tree.tree');
		$tree = New \Tree($category);
		$category = $tree->getArray();
		$this->assign('data',$category);
		$this->display('index');
	}
	public function add()
	{
		$id = I('get.id',0,'int');
		$categoryModel = D('category');
		if($id)
		{
			//新增
			$data = $categoryModel->getOne($id);
			$this->assign('data',$data);
		}
		//所有文类
		$Allcategory = $categoryModel->getAllTree();
		Vendor('AXE.tree.tree');
		$tree = New \Tree($Allcategory);
		$Allcategory = $tree->getArray();
		$this->assign('allcategory',$Allcategory);
		$this->display('add');
	}
	public function saveajax()
	{
		$data['name'] = htmlspecialchars(I('post.name'));
		$data['sort'] = I('post.sort',0,'int');
		$data['is_use'] = I('post.is_use',0,'int');
		$data['parent_id'] = I('post.parent_id',0,'int');
		$id = I('post.id',0,'int');
		if(empty($data['name']))
		{
			$this->showerror('分类名称不能为空');
		}
		$data['createtime'] = NOW_TIME;
		$categoryModel = D('category');
		if ($id)
		{
			$result = $categoryModel->setCategory($id,$data);
			if(false === $result)
			{
				$this->showerror('未知错误');
			}
			$this->showok('更新成功');
		} else {
			$result = $categoryModel->addCategory($data);
			if(false === $result)
			{
				$this->showerror('未知错误');
			}
			$this->showok('新增分类成功');
		}
	}
	public function delajax()
	{
		$id = I('get.id',0,'int');
		if(empty($id))
		{
			$this->showerror('出现错误，请稍后再试');
		}
		$categoryModel = D('category');
		//判断是否有子分类
		if($categoryModel->haveChild($id))
		{
			$this->showerror('有下属分类，不能删除');
		}
		//判断是否有对应文章
		
		$result = $categoryModel->del($id);
		if(false === $result)
		{
			$this->showerror('出现错误，请稍后再试');
		}
		else
		{
			$this->showok('删除成功');
		}
	}
}