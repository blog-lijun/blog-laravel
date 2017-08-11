<?php
namespace Controller;
use \Model\UserModel;
use \Model\ArticleModel;
use \Model\replayModel;
use \Framework\Page;

class ManageController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	
	}
	
	public function index()
	{
		
		if(empty($_SESSION['uid'])){
			$this ->error('您不是管理员','index.php');
		}
		
		$user = new UserModel();
		$data = $user ->fields('*')->where('uid>1')->select();
		
		
		$article = new ArticleModel();
		$count = $article ->count('aid');
		
		$page = new Page($count,10);
		$limit  = $page ->limit();
		$render = $page ->render();
		$atdata = $article ->fields('*') ->where('aid>0 and del = 0')->order('aid desc')->limit($limit)->select();
		$atdata1 = $article ->fields('*') ->where('aid>0 and del = 1')->order('aid desc')->limit($limit)->select();
		
		$replay = new replayModel;
		$redata = $replay ->fields('*') ->where('aid>0 and del = 0')->order('aid desc')->limit($limit)->select();
		$redata1 = $replay ->fields('*') ->where('aid>0 and del = 1')->order('aid desc')->limit($limit)->select();
		
		
		$del = $_GET['del'];

		$num = empty($_GET['num'])? 1 : $_GET['num'];
		$this ->assign('atdata',$atdata);
		$this ->assign('redata',$redata);
		$this ->assign('atdata1',$atdata1);
		$this ->assign('redata1',$redata1);
		$this ->assign('data',$data);
		$this ->assign('num',$num);
		$this ->assign('del',$del);
		$this ->assign('render',$render);
		$this->display();
	}
}