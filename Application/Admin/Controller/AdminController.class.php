<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends AuthController 
{

	public function test()
	{
		echo dirname('/Uploads/article/2015-08-19/55d4359d48c48.jpg');
	}
}