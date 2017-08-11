<?php
namespace Controller;
use \Model\ArticleModel;
use \Framework\Page;

class IndexController extends Controller
{
	
	public function index()
	{
		//抓phpxy
		$url = 'https://www.phpxy.com/';
		$content = file_get_contents($url);
		$pattern = '/<div class="article-list">(.+)<div class="text-center">/ims';
		preg_match($pattern,$content,$matches);
		$titlepattern = '/<a class="title" href="(.+?)" target="_blank">(.+?)<\/a>/';
		preg_match_all($titlepattern,$matches[1],$match);
		$match = array_combine($match[1],$match[0]);
		
		
		//
		$index = new ArticleModel;
		$count = $index ->count('aid');
		$page = new Page($count,8);
		$limit = $page ->limit();
		$render = $page ->render();

		$data = $index ->fields('*') ->where('aid>0 and del=0')->order('aid desc')->limit($limit) ->select();

		$olddata = $index ->fields('*') ->where('aid>0')->limit(0,5) ->select();
		$this ->assign('match',$match);
		$this ->assign('olddata',$olddata);
		$this ->assign('render',$render);
		$this ->assign('data',$data);
		$this->assign('title','你的博客');
		$this->display();
	}
	
	public function edit()
	{
		echo 222;
	}
	
}