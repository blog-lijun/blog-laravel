<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\Index as IndexModel;
use app\index\model\Shopcar;
use think\Db;
use app\index\model\Liulan;
use app\index\model\Dingdan;
use app\index\model\Shop;

class Index extends Controller
{
   public function index(Index $user)
    {
		$session = session('username');
		$uid = session('uid');
		$blist = Db::name('admin_b')->where('bid>0')->select();
		$slist = Db::name('admin_s')->where('sid>0')->select();
		$shop = new Shop;
		$hot = $shop->where('sid>0')->order('hot','desc')->select();
	
		$bleixing = Db::table('think_admin_b')->select();
        return view('',compact('session','uid','blist','slist','hot','bleixing'));
    }
	public function shan(Shopcar $shop)
	{
		
		$cid = input('post.cid');
		$c = explode(',',$cid);
		$result = $shop::destroy($c);
		if($result){
			echo json_encode(['back'=>'删除成功']);
		}else{
			echo json_encode(['back'=>'删除失败']);
		}
		
	}
	public function payshan()
	{
		$cid = input('get.cid');
		$result = Db::name('shopcar')->where('cid',$cid)->update(['ispay' =>0]);
		if($result){
			return $this ->success('删除成功');
		}else{
			return $this ->error('删除失败');
		}
	}
public function payment()
	{
		$username = session('username');
		if (!$username) {
			$this->error('请先登录');
		}
		$uid = session('uid');
		$list=input('get.');
		
		$miaoshu = input('get.miaoshu');

		$dingdan = new Dingdan();

		$dan = $dingdan->order('create_time','desc')->limit(1)->select();
		$shop = Db::name('shop')->where('sid',input('get.sid'))->select();

		$maijia = $shop[0]['maijia'];

		$did1 = $dan[0]['did'] + 1;

		$bianhao = date('Ymd',time()) . $did1;

		$data1 = ['bianhao' => $bianhao,'buyjia' => $username ,'maijia' => $maijia,'username' => input('get.miaoshu'),'zhuangtai' => '待付款','shopid' => input('get.sid'),'tupian' => input('get.upload'),'jiage' => input('get.price'),'create_time' => date('Y-m-d H:i:s',time()),'shuliang'=>1];
		$did = $dingdan->insertGetId($data1);

		//查询shopcar如果有这条数据就不创建
		$check = Db::name('shopcar')->where(['ispay'=>1,'miaoshu'=>$miaoshu])->select();
		
		$shangji = $_SERVER['HTTP_REFERER'];
		
		
		if(substr($shangji,0,35) == 'http://tp.com/index/index/shop.html' && !$check){
			$sid = input('get.sid');
			$blei = Db::name('shop')->where('sid',$sid)->value('bleixing');
			$data['sid']= input('get.sid');
			$data['tupian'] = input('get.upload');
			$data['miaoshu'] = input('get.miaoshu');
			$data['price'] = input('get.price');
			$data['bleixing'] = $blei;
			$data['mleixing'] = input('get.mlei');
			$data['uid'] = input('get.uid');
			$data['ispay']= 1;
			
			$getId =Db::name('shopcar')->insertGetId($data);
			
			$paylist = Db::name('shopcar')->where('ispay',1)->select();
			return view('/index/payment',compact('paylist','uid','did'));
			
		}else if($shangji == 'http://tp.com/index/user/shop.html'){
			
		
			$cid = input('post.');
			foreach($cid as $val){
				Db::name('shopcar')->where('cid',$val)->update(['ispay'=>1]);
			}
			$paylist = Db::name('shopcar')->where('ispay',1)->select();
			$uid = session('uid');
			return view('',compact('paylist','uid','did'));
		}else{
		
			$paylist = Db::name('shopcar')->where('ispay',1)->select();
			return view('',compact('paylist','uid','did'));
		}
		
		
	}
	public function shop()
	{
		$uid = session('uid');
		$username = session('username');
		$list = input('get.');
		
		$liulan = new Liulan();
		$user = $liulan->where('sid',input('get.sid'))->where('uid',$uid)->find();
		$use = json_decode($user,true);
		
		if (empty($user)) {
			$liulan->data(['uid' => input('get.uid'),'sid' => input('get.sid')]);
			$liulan->save();
		} else {
			$liulan->save(['update_time' => date('Y-m-d H:i:s',time())],['lid' => 	$use['lid']]);
		}

		$size = Db::name('shopsize')->where('sid',input('get.sid'))->select();
		$color = Db::name('shopcolor')->where('sid',input('get.sid'))->select();
		$mlei = '';
		return view('',compact('list','uid','mlei','username','size','color'));
	}
	public function carnum()
	{
		$uid = input('post.uid');
		$result= Shopcar::where('uid',$uid)->select();
		$connt =count($result);
		echo json_encode(['count' =>$connt]);
	}
	public function xiugaidp()
	{
		$name = input('post.val');
		$uid = session('uid');
		$result = Db::name('user')->where('uid',$uid)->update(['dianpu'=>$name]);
		if($result){
			echo  input('post.val');	
		}else{
			echo 0;	
		}
		
	}
	public function dian()
	{
		$uid = input('post.uid');
		$dian = Db::name('user')->where('uid',$uid)->value('dianpu');
		if($dian){
			echo json_encode(['dian' =>$dian]);
		}else{
			echo json_encode(['dian'=>'加载错误']);
		}
	}
	public function screate()
	{
		$data = [];
		$json = input('post.a');
		$arr = json_decode($json,true);
		
		
		
		$sel = Db::name('shop')->where('sid',$arr['sid'])->select();
		$data['sid']= $arr['sid'];
		$data['tupian'] = $sel[0]['tupian'];
		$data['miaoshu'] = $sel[0]['miaoshu'];
		$data['price'] = $sel[0]['price'];
		$data['bleixing'] = $sel[0]['bleixing'];
		$data['mleixing'] = $sel[0]['mleixing'];
		$data['uid'] = $arr['uid'];
		$data['size'] = $arr['proSize'];
		$data['color'] = $arr['proColor'];
		$data['shuliang'] = $arr['proNum'];
		if($arr['uid']){
			$id = Db::name('shopcar')->insertGetId($data);
			if($id){
				echo json_encode(['success' =>'购物添加成功']);
			}else{
				echo json_encode(['success' =>'购物添加失败']);
			}
		}else{
			
			echo json_encode(['success' =>'请先登录']);
		} 
	}
	public function createcang()
	{
		$uid = input('get.uid');
		$sid = input('get.sid');
		
		$list = Db::name('shop')->where('sid',$sid)->select();
		$data['bleixing'] = $list[0]['bleixing'];
		$data['mleixing'] = $list[0]['mleixing'];
		$data['tupian'] = $list[0]['tupian'];
		$data['price'] = $list[0]['price'];
		$data['miaoshu'] = $list[0]['miaoshu'];
		$data['uid'] = $uid;
		$data['sid'] = $sid;
		$data['create_time'] = date('Y-m-d H:i:s',time());
		$result = Db::name('cang')->where('uid',$uid)->where('sid',$sid)->select();

		if (empty($result)) {
			$id = Db::name('cang')->insertGetID($data);
		} else {
			$id = Db::name('cang')->where('uid',$uid)->where('sid',$sid)->update(['update_time',date('Y-m-d H:i:s',time())]);
			dump($id);
		}
		
		if($id){

			echo json_encode([1 =>'收藏成功']);
		}else{
			echo json_encode([1 =>'收收藏失败']);
		}
		
	}
	public function out()
	{
		$session = session(null);
		$this ->redirect('index/index');
	}
	
	public function details()
	{
		return $this->fetch();
	}
	public function zhifu()
	{
		$uid = input('post.uid');
		$cid = input('post.sid');
		$cid = explode(',',$cid);
		$zong = input('post.zong');
		$qian = Db::name('user')->where('uid',$uid)->value('qian');
		echo $qian;
		
	}
	//模糊搜索方法
	public function search()
	{
		$uid = session('uid');
		$username = session('username');
		$like = input('post.like');
		$map['miaoshu']  = ['like','%'.$like.'%'];
		
		$list = Shopcar::where($map)->select();
		
		echo Db::getLastSql();
		$num = count($list);
		return view('user/shop',compact('list','uid','username','num'));
	}
	public function checkpass()
	{
		
		$password = input('post.password');
		$uid = session('uid');
		$zong = input('post.zong');
		$cid = input('post.cid');
		$cid = explode(',',$cid);
		
		$result = Db::name('user')->where(['payword'=>$password,'uid'=>$uid])->select();
		if($result){
			foreach($cid as $val){
				Db::name('shopcar')->where('cid',$val) ->update(['ispay' => 2]);
			}
			$qian = $result[0]['qian'];
			$qian1 = $qian - $zong;
			Db::name('user') ->where('uid',$uid)->update(['qian'=>null]);
			$result1 = Db::name('user') ->where('uid',$uid)->update(['qian'=>$qian1]);
				if($result1){
					Db::name('dingdan')->where('did',input('post.did'))->update(['zhuangtai' => '待发货']);
					return $this ->success('支付成功','/index/index/index');
				}
			
			}else{
				return $this ->error('支付密码不正确');
			}

	}
	public function dou()
	{
		$uid = session('uid');
		$dou = Db::name('user')->where('uid',$uid)->value('dou');
		$data = date('Y-m-d',time());
		$qiandao = Db::name('user')->where('uid',$uid)->value('qiandao');
		$shijian = substr($qiandao,0,10);
		
		if($data == $shijian){
			echo json_encode(['dou'=>$dou,'date'=>$data,'success'=>1]);
		}else{
			echo json_encode(['success'=>0]);
		}
		
	}
	public function buy()
	{
		dump(input('post.'));
	}
	public function abc()
	{
		$session = session('username');
		$uid = session('uid');
		$blist = Db::name('admin_b')->where('bid>0')->select();
		$slist = Db::name('admin_s')->where('sid>0')->select();
		$hot = Db::table('think_shop')->where('sid>0')->select();
	
		$bleixing = Db::table('think_admin_b')->select();
		//下面搜索
		
		$content = input('post.content');
		$cont = '';
		for($i=0;$i<mb_strlen($content);$i++){
			$cont .= mb_substr($content,$i,1) . '%'; 
		}
		$cont = '%'.$cont;
		
		$shopList = Db::name('shop')->where('miaoshu','like',$cont)->select();
	
		
		
		return view('index/index',compact('session','uid','blist','slist','hot','bleixing','shopList','content'));
	}
}
