<?php

namespace app\admin\model;

use think\Model;

class Admin_s extends Model
{
	public function comments()
    {
        return $this->hasMany('admin_b','bid');
    }
}