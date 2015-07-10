<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends AuthController 
{
    public function index()
    {

    	$this->display('index');
    }
    
    public function category()
    {
    	$d = D('Category');
    	$category = $d->getAllTree();
    	$this->assign('data',$category);
    	$this->display('category');
    }
    public function addcategory()
    {
    	$this->display('addcategory');
    }
    public function updatecategory()
    {
    	$data['name'] = htmlspecialchars(I('post.name'));
    	$data['sort'] = I('post.sort',0,'int');
    	$data['parent_id'] = I('post.sort',0,'int');
    	$id = I('post.id',0,'int');
    	if(empty($data['name'])){
    		$this->showerror('分类名称不能为空');
    	}
    	$data['createtime'] = NOW_TIME;
    	$categoryModel = D('category');
    	if ($id){
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
    public function delcategory()
    {
    	$id = I('get.id',0,'int');
    	if(empty($id))
    	{
    		$this->showerror('出现错误，请稍后再试');
    	}
    	$categoryModel = D('category');
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
    public function test()
    {
    	$d = D('Category');
    	$category = $d->getAllTree();
    	print_r($category);
    }    
    
}