<?php
namespace Controller;

use \Model\UserModel;
use \Framework\Verify;

class UserController extends Controller
{
	protected $user;
	
	public function __construct()
	{
		parent::__construct();
		$this->user = new UserModel();
	}
	
	public function register()
	{
		
		$this->display();
		
	}
	
	
	public function logout()
	{
		unset($_SESSION);
		session_destroy();
        $url = $_SERVER['HTTP_REFERER'];
        header('location:'.$url);
	}
	
	public function checkLogin()
	{
		$username = $_POST['username'];
		$data = $this->user->getByUsername($_POST['username']);
		
		
		if ($data[0]['password'] != trim($_POST['password'])) {
			$this->error('密码错误');
		}
		
		$_SESSION['uid'] = $data[0]['uid'];
		$_SESSION['username'] = $data[0]['username'];
		header('location:/index.php');
		
	}
	
	
	public function  login()
	{
		
		$this->display();
	}
	public function aboutme()
	{
		$this->display('User/about.html');
	}
	public function music()
    {
        $this ->display('User/music.html');
    }
	public function check()
	{
		if (strcmp($_POST['password'],$_POST['repassword'])) {
			$this->error('两次密码不一致');
		}
		
		if(strcasecmp($_POST['verify'],$_SESSION['verify'])) {
			$this->error('验证码不正确');
		}
		
		$_POST['createtime'] = time();
		unset($_POST['repassword']);
		unset($_POST['verify']);
		
		
		$insert_id = $user->add($_POST);
		if ($insert_id) {
			$this->success('注册成功');
		}
		
	}
	
	public function verify()
	{
		$verify = new Verify();
		$verify->outImg();
		$_SESSION['verify'] = $verify->verifyCode;
	}
	
	public function insert()
	{
		if(strtolower($_SESSION['verify']) != strtolower($_POST['verify']) ){
			$this ->error('验证码不正确');
		};
		if($_POST['password'] != $_POST['repassword'] || empty($_POST['password'])){
			$this ->error('前后密码不一致或者为空');
		}
		
		$_POST['createtime'] = time();
		
		unset($_POST['repassword']);
		unset($_POST['verify']);
	
		$id =$this ->user ->add($_POST);
		if($id){
			$this->success('新增成功');
		}else{
			$this->error('新增失败');
		}
	}
	public  function changePwd()
	{
		$uid = $_SESSION['uid'];
		$data = $this->user->fields('*')->where("uid=$uid")->select();
		if(strlen($_POST['newpassword']) <  6  ||  ($_POST['newpassword'] != $_POST['repassword'])) {
			$this ->error('密码长度不够或者前后密码不正确！！！');
		}
		$_POST['password'] = $_POST['newpassword'];
		unset($_POST['password']);
		unset($_POST['repassword']);
		unset($_POST['newpassword']);
		
		$result = $this ->user->where("uid=$uid")->update($_POST);
		if($result){
			$this ->logout();
			$this ->success('修改成功','index.php');
		}else{
			$this ->error('修改失败');
		}
	}
	
}