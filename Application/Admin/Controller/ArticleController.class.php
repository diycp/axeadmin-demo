<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends AuthController 
{
    public function index()
    {

    	$this->display('index');
    }
    public function test()
    {
    	$d = D('Category');
    	$category = $d->getAllTree();
    	print_r($category);
    }    
    
}