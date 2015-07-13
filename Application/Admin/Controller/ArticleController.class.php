<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends AuthController 
{

    public function index()
    {
		$parent_id = I('post.parent_id',0,'int');
		$title = I('post.title');
		
		$page['size'] = $this->pagesize();
		$pageCurrent = I('post.pageCurrent',1,'int');
		//获取文章列表
		$articleModel = D('article');
		$where = '1 ';
		if($parent_id)
		{
			$where .= ' AND a.c_id = '.$parent_id;
		}
		if($title)
		{
			$where .= " AND a.title like '%$title%' ";
		}
		$pages = $pageCurrent.','.$page['size'];
		$article = $articleModel->lists($where,$pages);
    	$page['count'] = $article['count'];
    	//获取所有的分类
		$category = $this->getCategory();
		//收集查询条件
		$search['parent_id'] = $parent_id;
		$search['title'] = $title;
		
		$this->assign('search',$search);
		$this->assign('category',$category);
		$this->assign('article',$article);
		$this->assign('page',$page);
		$this->display();
    }    
    
    public function delajax()
    {
    	$id = I('get.id',0,'int');
    	if(empty($id))
    	{
    		$this->showerror('出现错误，请稍后再试');
    	}
    	$articleModel = D('article');

    	//判断是否有对应文章
    
    	$result = $articleModel->del($id);
    	if(false === $result)
    	{
    		$this->showerror('出现错误，请稍后再试');
    	}
    	else
    	{
    		$this->showok('删除成功');
    	}
    } 

    /**
     * 获取所有分类
     */
    private function getCategory()
    {
    	//获取所有分类
    	$d = D('Category');
    	$category = $d->getAllTree();
    	Vendor('AXE.tree.tree');
    	$tree = New \Tree($category);
    	$category = $tree->getArray();
    	return $category;
    }
}