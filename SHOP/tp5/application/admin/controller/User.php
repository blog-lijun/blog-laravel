<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model\User as UserModel;
use think\Db;
use app\index\model\Dingdan;
use app\admin\model\Admin_s;

class User extends Controller
{
	
	public function user(UserModel $user)
	{
		if(!session('username') || !session('password') ){
			$this ->error('请先登录','/admin','5','1');
		}
		$list = $user ->select();
		//$page = $list ->render();
		$dingdan = Db::name('dingdan')->select();
		//$dingdan = Dingdan::get();
		//$dingdan = json_encode($dingdan);
		//$dingdan = json_decode($dingdan);
		
		
		$shop = Db::name('shop')->select();
		$leixing = Db::name('admin_b')->select();
		$mleixing = Db::name('admin_s')->select();

	

		return view('',compact('list','dingdan','shop','leixing','mleixing'));
		
	}

	public function leixing()
	{
		
		$dname = input('get.dname');
		$mname = input('get.mname');
		$bid = input('get.bid');
		$sid = input('get.sid');
		$this->assign('sid',$sid);
		$this->assign('dname',$dname);
		$this->assign('mname',$mname);
		$this->assign('bid',$bid);
		return $this->fetch();
		
	}


	public function updateleixing()
	{
		$result1 = db('admin_b')->where('bid',input('post.bid'))->update([
				'name' => input('post.dname'),
			]);
		$result2 = db('admin_s')->where('sid',input('post.sid'))->update([
				'name' => input('post.mname'),
			]);
		dump($result1);
		dump($result2);
		if($result1 ||  $result2) {
			
			$this ->redirect('user/user');
			
		}else {
			$this ->error('修改失败');
		}
	}
	
	public function delleixing()
	{
		
		$sid = input('get.sid');
		$num1 = Db::name('admin_s')->where('sid',$sid)->delete();
		
		if($num1){
			$this ->redirect('user/user');
		}else{
			$this ->error('删除失败');
		}
	}

	public function shop()
	{
		
		$sid = input('get.sid');
		$jiage = input('get.jiage');
		$xiaoliang = input('get.xiaoliang');
		$hot = input('get.hot');

		$this->assign('sid',$sid);
		$this->assign('jiage',$jiage);
		$this->assign('xiaoliang',$xiaoliang);
		$this->assign('hot',$hot);

		return $this->fetch();
	}

	public function updateshop()
	{
		$result = db('shop')->where('sid',input('post.sid'))->update([
				'jiage' => input('post.jiage'),
				'xiaoliang' => input('post.xiaoliang'),
				'hot' => input('post.hot'),
			]);
		if($result) {
			$this ->redirect('user/user');
		}else {
			$this ->error('修改失败');
		}
	}

	public function delshop()
	{
		$sid = input('get.sid');
		dump($sid);
		$num = Db::name('shop')->where('sid',$sid)->delete();
		
		if($num){
			$this ->redirect('user/user');
		}else{
			$this ->error('删除失败');
		}
	}
	
	public function dingdan()
	{
		
		$bianhao = input('get.bianhao');
		$zhuangtai = input('get.zhuangtai');
		$this->assign('bianhao',$bianhao);
		$this->assign('zhuangtai',$zhuangtai);
		return $this->fetch();
	}
	
	public function xiugaidingdan()
	{
		$dingdan = new Dingdan();
		
		$result = $dingdan->save([
			'zhuangtai' => input('post.zhuangtai'),
		],['bianhao' => input('post.bianhao')]);
		if($result) {
			$this ->redirect('user/user');
		}else {
			$this ->error('修改失败');
		}
		
	}
	
	public function deldingdan()
	{
		
		$bianhao = input('get.bianhao');
		$num = Db::name('dingdan')->where('bianhao',$bianhao)->delete();
	
		if($num){
			$this ->redirect('user/user');
		}else{
			$this ->error('删除失败');
		}
	}
	
	public function change(UserModel $user)
	{
		$uid = input('post.uid');
		
		$username = $user ->where('uid',$uid)->value('username');
	
		return view('',compact('username','uid'));
	}
	public function update(UserModel $user)
	{
		$uid  = input('post.uid');
		$u = $user ->get($uid);
		$validate = Loader::validate('User');
		if(!$validate->check(input('post.'))){
			$this ->error($validate ->getError());
		}
		$u ->username = input('post.username');
		$u ->password = input('post.password');
		if($u ->save()){
			$this ->redirect('user/user');
		}else{
			$this ->error('修改失败');
		}
		
	}
	public function del(UserModel $user)
	{
		
		$uid = input('get.uid');
		$list = $user ->get($uid);
		$num = $list ->delete();
	
		if($num){
			$this ->redirect('user/user');
		}else{
			$this ->error('删除失败');
		}
		
	}

	public function add()
	{
		$name = Db::name('admin_b')->select();
		$this->assign('name',$name);
		return $this->fetch();
	}

	public function addBk()
	{
		$data = input('post.select');
	
		$data2 = ['name' => input('post.name'),'bid' => $data];
		$result = Db::name('admin_s')->insert($data2);

		if ($result) {
			$this->redirect('user/user');
		} else {
			$this->error('添加失败');
		}
	}

	public function list()
	{
		return $this->fetch();
	}

	public function addUser()
	{
		
		$data = ['username' => input('post.username'),'password' => md5(input('post.password')),'create_ip' => input('post.ip')];
		$result = Db::table('think_user')->insert($data);

		if ($result) {
			$this->redirect('user/user');
		} else {
			$this->error('添加失败');
		}
	}
}