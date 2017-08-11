<?php
namespace Controller;

use \Model\replayModel;
use \Framework\Page;
use \Framework\Upload;

class replayController  extends Controller
{
	public function insert()
	{

		$replay = new replayModel;
		$_POST['createtime'] = time();
		$_POST['article'] = $_POST['editorValue'];
		$aid = $_POST['aid'];
		$_POST['aid'] = $aid;
		$_POST['createid'] = $_SERVER['REMOTE_ADDR'];

		unset($_POST['editorValue']);
        
		$id = $replay ->add($_POST);
		if ($id) {
			$this->success('评论成功');
		} else {
			$this->error('评论失败');
		}
	}
	
}