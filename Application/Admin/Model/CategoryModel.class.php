<?php
namespace Admin\Model;

use Think\Model;

class CategoryModel extends Model
{
		
	public function __construct()
	{
		$this->m = M('category');
	}
	public function getOne($id)
	{
		return $this->m->where("id = {$id}")->find();
	}
	public function getAllTree()
	{
		$result = $this->m->order('parent_id asc,id asc')->select();

		return $result;
	}
	
	public function setCategory($id,$data)
	{
		return $this->m->where("id = {$id}")->save($data);
	}
	
	public function addCategory($data)
	{
		return $this->m->add($data);
	}
	public function del($id)
	{
		return $this->m->where("id = {$id}")->delete($id);
	}
	
	public function haveChild($id)
	{
		$result = $this->m->field('id')->where("parent_id = {$id}")->find();
		if($result)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}