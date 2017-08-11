<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model\Admin;

class Index extends Controller
{
	
	public function index()
	{
		
	
		return $this ->fetch();
	}
	public function check(Admin $admin)
	{
		if($admin ->where(['username'=>input('post.username'),'password'=>input('post.password')])->select()){
			session('username',input('post.username'));
			session('password',input('post.password'));
			
			$this ->success('登录成功','/admin/user/user','5','1');
		}elseif($admin ->where(['username'=>input('post.username')])->select()){
			$this ->error('密码输入错误！');
		}else{
			$this ->error('用户名输入错误！');
		}
	}
}