<?php
namespace Admin\Controller;
use Think\Controller;
class AuthController extends Controller 
{
    public function __construct()
    {
    	parent::__construct();
    	trace($_REQUEST,'REQUEST');
    }
    
    protected function showerror($message,$id = 300)
    {
    	$data['statusCode'] = $id;
    	$data['message'] = $message;
    	$this->ajaxReturn($data);
    }
    
    protected function showok($message,$closeCurrent=true,$id=200)
    {
    	$data['statusCode'] = $id;
    	$data['message'] = $message;
    	$data['closeCurrent'] = true;
    	$this->ajaxReturn($data);
    }
}