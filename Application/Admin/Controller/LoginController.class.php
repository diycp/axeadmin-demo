<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller 
{
    public function index()
    {
    	$this->display('login');
    }
    
    public function login()
    {
    	$name = I('post.name');
    	$password = I('post.password','','MD5');
    	$model = D('admin');
    	$result =  $model->Login($name,$password);
    	if($result)
    	{
    		session('id',$result);
    		$this->redirect('Index/index');
    	} else {
    		$this->redirect('Login/index');
    	}
    }
}