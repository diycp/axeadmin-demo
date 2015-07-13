<?php
namespace Admin\Model;

use Think\Model;

class ArticleModel extends Model
{
	public function __construct()
	{
		$this->m = M('article');
		$this->pre = C('DB_PREFIX');
	}
	
	public function lists($where,$page)
	{
		$return['data'] = $this->m->table($this->pre.'article AS a')
								->field('a.id,a.title,c.name AS cname,a.createtime,a.is_use,a.is_top')
								->join('LEFT JOIN '.$this->pre.'category AS c ON c.id = a.c_id')
								->where($where)
								->page($page)
								->order('id desc')
								->select();
		$return['count'] = $this->m->table($this->pre.'article AS a')
								->join('LEFT JOIN '.$this->pre.'category AS c ON c.id = a.c_id')
								->where($where)
								->count();
		return $return;
	}
	
	public function del($id)
	{
		return $this->m->where("id = {$id}")->delete($id);
	}
}