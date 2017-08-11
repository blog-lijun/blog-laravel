<?php

namespace app\index\validate;

use think\Validate;

class Xiugaizz extends Validate
{
	protected  $rule = [
	'name|用户名' => 'require',
	'truename|真实姓名' => 'require',
	'nicheng|昵称' => 'require',
	'shengri|生日' => 'require',
	'dizhi|地址' => 'require',
	'captcha|验证码' => 'require|captcha',
	
	];
	
	protected  $message = [
	'username.require' => '用户名不能为空',
	'truename.require' => '真实姓名不能为空',
	'nicheng.require' => '昵称不能为空',
	'shengri.require' => '生日不能为空',
	'dizhi.require' => '地址不能为空',
	'captcha.require' => '请输入验证码',
	'captcha.captcha' => '验证码不正确',
	];
}
