<?php
namespace Admin\Model;

use Think\Model;

class CategoryModel extends Model
{
		
	public function __construct()
	{
		$this->m = M('category');
	}
	
	public function getAllTree()
	{
		$result = $this->m->order('sort asc')->select();

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
}