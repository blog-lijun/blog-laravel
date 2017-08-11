<?php

namespace app\index\model;

use think\Model;
use traits\model\SoftDelete;

class Dizhi extends Model
{
	
	use SoftDelete;
    protected static $deleteTime = 'delete_time';
}