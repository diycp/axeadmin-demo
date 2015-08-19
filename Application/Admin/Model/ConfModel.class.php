<?php
namespace Admin\Model;

use Think\Model;

class ConfModel extends Model
{
	public function __construct()
	{
		$this->m = M('conf');
	}
	public function getOne($id)
	{
		return $this->m->where("id = {$id}")->find();
	}	
	public function lists()
	{
		return $this->m->select();
	}
	
	public function setOne($id,$data)
	{
		return $this->m->where("id = {$id}")->save($data);
	}
	
	public function addOne($data)
	{
		return $this->m->add($data);
	}
	
	public function delOne($id)
	{
		return $this->m->where("id = {$id}")->delete($id);
	}
}