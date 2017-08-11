<?php
namespace Controller;

use \Model\ArticleModel;
use \Framework\Page;
use \Framework\Upload;
use \Model\replayModel;

class ArticleController extends Controller
{
	
	public function __construct()
	{
		parent::__construct();
		
		
		
	}
	public function delreplay()
	{
		$replay = new replayModel;
		$rid = $_GET['rid'];
		$data['del'] = 1;
		$replay ->where("rid = '$rid'")->update($data);	
		
		$this ->success('回收成功');
	}
	public function del()
	{
		$article = new ArticleModel();
		$aid = $_GET['aid'];
		$data['del'] = 1;	
		$article ->where("aid = '$aid'")->update($data);	
		
		$this ->success('回收成功');
	}
	public function huifu()
	{
		$article = new ArticleModel();
		$aid = $_GET['aid'];
		$data['del'] = 0;	
		$article ->where("aid = '$aid'")->update($data);	
		
		$this ->success('恢复成功');
	}
	public function replayhuifu()
	{
		$replay = new replayModel;
		$rid = $_GET['rid'];
		$data['del'] = 0;
		$replay ->where("rid = '$rid'")->update($data);	
		
		$this ->success('恢复成功');
	}
	public function index()
	{
		$article = new ArticleModel();
		
		$total = $article->count();
		
		$page = new Page($total);
		
		$current =  $page->limit();
		
		
		$data = $article->fields('*')->where('aid>0')->limit($current)->order('aid desc')->select();
		
		
		$this->assign('page',$page->render());
		$this->assign('articles',$data);
		$this->display(null,true,$_SERVER['REQUEST_URI']);
		
	}
	
	public function add()
	{
		if($_SESSION['uid']){
			$this->display();
		}else{
			$this ->error('请先登录','index.php');
		}
	}
	
	public function details()
	{
		$aid = $_GET['aid'];
		$article1 = new ArticleModel();
		//统计文章浏览数
		$data = $article1 ->fields('*') ->where("aid='$aid'")->select();
		$hit['hit'] = $data[0]['hit'] + 1;
		$article1 ->where("aid='$aid'")->update($hit);
		$replay = new replayModel();
		$count = $replay ->count('rid');
		$page = new Page($count,10);
		$limit = $page ->limit();
		
		
		
		
		$redata = $replay ->fields('*')->where("aid='$aid'")->order(' rid desc ')->limit($limit)->select();
	
		
		
		
		$this->assign('data',$data);
		$this ->assign('redata',$redata);
		$this ->display('Article/details.html');
	}
	public function reinsert()
	{
		
	}
	public function insert()
	{
		$article = new ArticleModel();
		$_POST['title'] = $_POST['title'];
		$_POST['createtime'] = time();
		$_POST['article'] = $_POST['editorValue'];
		$upload = new Upload();
		//var_dump($upload);
		
		$path = $upload ->uploadFile('f');



		$_POST['path'] = $path;

		unset($_POST['editorValue']);

		$id = $article->add($_POST);

		if ($id) {
			$this->success('发表成功','index.php');
		} else {
			$this->error('发表失败');
		}
	}
	
}
