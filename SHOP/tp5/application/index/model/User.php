<?php

namespace app\index\model;

use think\Model;
use traits\model\SoftDelete;

class User extends Model
{
	use SoftDelete;
	protected static $deleteTime = 'delete_time';
	 protected $auto = ['create_ip', 'password'];
    protected $insert = ['status' => 1];  
    protected $update = [];  
	
	public function setCreateipAttr()
	{
		return request() ->ip();
	}
	public function setPasswordAttr($value)
	{
		return md5($value);
	}
	

}