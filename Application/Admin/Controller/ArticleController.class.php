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
    public function add()
    {
    	$id = I('get.id',0,'int');
    	$articleModel = D('article');
    	$categoryModel = D('category');
    	if($id)
    	{
    		//新增
    		$data = $articleModel->getOne($id);
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
		$id = I('post.id',0,'int');
		$data['title'] = I('post.title');
		$data['c_id'] = I('post.c_id',0,'int');
		$data['is_use'] = I('post.is_use',0,'int');
		$data['keyword'] = I('post.keyword');
		$data['desc'] = I('post.desc');
		$data['content'] = I('post.content');
		$data['picurl'] = I('post.picurl');
		$data['is_top'] = I('post.is_top');
		$data['createtime'] = NOW_TIME;
		//生成缩略图
		if($data['picurl']) {
			$image = new \Think\Image();
			$image->open($_SERVER['DOCUMENT_ROOT'].$data['picurl']);
			$path = dirname($data['picurl']).'/thumb/';
			
			if(!file_exists($_SERVER['DOCUMENT_ROOT'].$path)) {
				mkdir($_SERVER['DOCUMENT_ROOT'].$path);
			}
			$data['s_picurl'] = $path.basename($data['picurl']);
			$image->thumb(100,100)->save($_SERVER['DOCUMENT_ROOT'].$data['s_picurl']);
		} else {
			unset($data['picurl']);
		}
		
		$ArticleModel = D('article');
		if ($id) {
			$result = $ArticleModel->setOne($id,$data);
			if(false === $result) {
				$this->showerror('未知错误');
			}
			$this->showok('更新成功',true);
		} else {
			$result = $ArticleModel->addOne($data);
			if(false === $result) {
				$this->showerror('未知错误');
			}
			$this->showok('新建成功',true);
		}
	}  
	public function picajax()
	{
		$data = array(
				'message' => 'ok',
				'status' =>	'200',
		);
		$upload = new \Think\Upload();// 实例化上传类
		$upload->savePath ='Uploads/article/'; 
		$upload->rootPath = './';
		
		if(!$info = $upload->upload()) {
			$data['message'] = $upload->getError();
		} else {
			$data['filename'] = '/'.$info['file']['savepath'].$info['file']['savename'];
		}
		
		$this->ajaxReturn($data);
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