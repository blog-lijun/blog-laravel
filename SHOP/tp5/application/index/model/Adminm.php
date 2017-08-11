<?php

namespace app\index\model;
use think\Model;

class Adminm extends Model{
	public function comments()
	{
		return $this->hasMany('adminb','bid_id');
	}
}