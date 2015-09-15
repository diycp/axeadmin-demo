<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends AuthController 
{

	public function index()
	{
		$this->setting();
	}
	
	public function setting()
	{
		$confModel = D('Conf');
		$data['data'] = $confModel->lists();
		$this->assign('data',$data);
		$this->display();
	}
	
	public function saveajax()
	{
		$id = I('post.id',0,'int');
		$data['name'] = I('post.name');
		$data['value'] = I('post.value');
		$data['desc'] = I('post.desc');
		$confModel = D('conf');
		if($id) {
			$result = $confModel->setOne($id,$data);
		} else {
			$result = $confModel->addOne($data);
		}
		if($result === false) {
			$this->showerror('服务器出错',true);
		}
		$this->showok('',true);
	}
	
	public function admin()
	{
		$confModel = D('admin');
		$data['data'] = $confModel->lists();
		$this->assign('data',$data);
		$this->display();
	}
	
	public function saveadminajax()
	{
		$id = I('post.id',0,'int');
		$data['name'] = I('post.name');
		$data['password'] = I('post.password','','md5');
		$data['desc'] = I('post.desc');
		$confModel = D('Admin');
		if($id) {
			$result = $confModel->setOne($id,$data);
		} else {
			$result = $confModel->addOne($data);
		}
		if($result === false) {
			$this->showerror('服务器出错',true);
		}
		$this->showok('',true);
	}
}