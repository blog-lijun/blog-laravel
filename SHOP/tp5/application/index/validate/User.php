<?php

namespace app\index\validate;

use think\Validate;

class User extends Validate
{
	protected  $rule = [
	'username|用户名' => 'require|number|length:11',
	'password|密码' => 'require|confirm:repassword',
	'captcha|验证码' => 'require|captcha',
	
	];
	
	protected  $message = [
	'username.require' => '用户名必须传',
	'username.number' => '用户名必须为数字类型',
	'username.length' => '长度必须为11位',
	'password.require' => '密码必传',
	'password.confirm' => '两次密码不一致',
	'captcha.require' => '请输入验证码',
	'captcha.captcha' => '验证码不正确',
	];
}