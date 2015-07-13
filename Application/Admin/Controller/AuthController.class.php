<?php
namespace Admin\Controller;
use Think\Controller;
class AuthController extends Controller 
{
    public function __construct()
    {
    	parent::__construct();
    	trace($_GET,'GET');
    	trace($_POST,'POST');
    	trace($_COOKIE,'COOKIE');
    }
    
    protected function showerror($message,$id = 300)
    {
    	$data['statusCode'] = $id;
    	$data['message'] = $message;
    	$this->ajaxReturn($data);
    }
    
    protected function showok($message,$closeCurrent=false,$id=200)
    {
    	$data['statusCode'] = $id;
    	$data['message'] = $message;
    	$data['closeCurrent'] = $closeCurrent;
    	$this->ajaxReturn($data);
    }
    
    /**
     * 获取列表页显示的条数
     */
    protected function pagesize()
    {
    	//优先级  POST> COOKIE > config
    	$pagesize = I('post.pageSize');
    	if(empty($pagesize))
    	{
    		$pagesize = cookie('pagesize');
    		if(empty($pagesize))
    		{
    			$pagesize = C('ARTICLE_NUM');
    		}
    	}
    	cookie('pagesize',$pagesize);
    	return $pagesize;
    }
}