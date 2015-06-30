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
		$ALL = $this->m->select();
		$result = array();
		foreach($ALL as $r){
			if ($r['parent_id'] == 0){
				$result[$r['id']] = $r;
			} else {
				$result[$r['parent_id']]['child'][] = $r;
			}	
		}
		return $result;
	}
}