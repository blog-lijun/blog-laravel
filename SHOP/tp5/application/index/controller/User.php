<?php

namespace app\index\controller;

use think\Controller;
use app\index\model\User as UserModel;
use think\Loader;
use think\Db;
use app\index\model\Dingdan;
use app\index\model\Dizhi;
use app\index\model\Shop;

class User extends Controller
{
	public function user(UserModel $user)
	{
		$user = new UserModel;
		$list = $user ->order('uid desc')->paginate(5);
		$page = $list ->render();
		
		return view('',compact('list','page'));
	}
	public function list(UserModel $user)
	{
		
		return $this ->fetch();
	}
	public function login()
	{
        echo 111;
        exit;
		return $this ->fetch();
	}
	public function sindex($zt)
	{

		$username = session('username');
		if (!$username) {
			$this->error('请先登录');
		}

		
		$nian = date('Y年m',time());
		$tian = date('d',time());
		$this->assign('username',$username);
		$this->assign('nian',$nian);
		$this->assign('tian',$tian);

		$result = Db::name('user')->where('username',$username)->select();

		$qiandao = $result[0]['qiandao'];
		$q1 = substr($qiandao,0,4).substr($qiandao,5,2).substr($qiandao,8,2);
	
		if ($q1 != date('Ymd',time())) {
			$qd = true;
		} else {
			$qd = false;
		}



		$qian = $result[0]['qian'];
		$dou = $result[0]['dou'];
		$uid = $result[0]['uid'];

		switch ($zt) {
			case 1:
				$zt1 = '待付款';
				break;
			case 2:
				$zt1 = '待发货';
				break;
			case 3:
				$zt1 = '确认收货';
				break;
			case 4:
				$zt1 = '待评价';
				break;
			case 5:
				$zt1 = '退款中';
				break;
			default:
				$zt1 = '';
				break;
		}

		if (empty($zt1)) {
			$dingdan = Db::name('dingdan')->where('buyjia',$username)->select();

		} else {
			$dingdan = Db::name('dingdan')->where('buyjia',$username)->where('zhuangtai',$zt1)->select();
		}

		$fahuo = Db::name('dingdan')->where('buyjia',$username)->where('zhuangtai','待发货')->count();
		$fukuan = Db::name('dingdan')->where('buyjia',$username)->where('zhuangtai','待付款')->count();
		$shouhuo = Db::name('dingdan')->where('buyjia',$username)->where('zhuangtai','确认收货')->count();
		$pingjia = Db::name('dingdan')->where('buyjia',$username)->where('zhuangtai','待评价')->count();
		$tuikuan = Db::name('dingdan')->where('buyjia',$username)->where('zhuangtai','退款中')->count();
		
		$youhui = $result[0]['youhui'];

		$shopcar = Db::name('shopcar')->where('uid',$result[0]['uid'])->select();
		$shopcar1 = Db::name('shopcar')->where('uid',$result[0]['uid'])->limit(2)->select();
		$shopcarnum = Db::name('shopcar')->where('uid',$result[0]['uid'])->count();
		$touxiang = $result[0]['touxiang'];

		$cang = Db::name('cang')->where('uid',$uid)->order('create_time','desc')->limit(2)->select();
		$zuji = Db::name('liulan')->where('l.uid',$uid)->order('l.create_time','desc')->limit(2)->alias('l')->join('think_shop s','l.sid=s.sid')->select();

		$this->assign('shopcar1',$shopcar1);
		$this->assign('zuji',$zuji);
		$this->assign('cang',$cang);
		$this->assign('touxiang',$touxiang);
		$this->assign('shopcar',$shopcar);
		$this->assign('shopcarnum',$shopcarnum);
		$this->assign('youhui',$youhui);		
		$this->assign('tuikuan',$tuikuan);
		$this->assign('fahuo',$fahuo);
		$this->assign('fukuan',$fukuan);
		$this->assign('shouhuo',$shouhuo);
		$this->assign('pingjia',$pingjia);
		$this->assign('dingdan',$dingdan);
		
		$this->assign('uid',$uid);
		$this->assign('qd',$qd);
		$this->assign('qian',$qian);
		$this->assign('dou',$dou);
		return $this ->fetch();
	}
	public function setting()
	{
		$username = session('username');
		if (!$username) {
			$this->error('请先登录');
		}

		$result = Db::name('user')->where('username',$username)->select();
		$uid = $result[0]['uid'];
		$this->assign('username',$username);
		$this->assign('uid',$uid);
		return $this ->fetch();
	}
	public function info()
	{
		$username = session('username');
		$result = Db::name('user')->where('username',$username)->select();
		$uid = $result[0]['uid'];
		$this->assign('username',$username);
		$this->assign('uid',$uid);
		return $this ->fetch();
	}
	public function dingd($zhuangtai)
	{
		
		$username = session('username');
		if (!$username) {
			$this->error('请先登录');
		}

		$result = Db::name('user')->where('username',$username)->select();
		$uid = $result[0]['uid'];

		if ($zhuangtai === '0'){
			$dingdan = Db::name('dingdan')->where('buyjia',$username)->where('zhuangtai', '>' ,'已评价' )->select();
		} elseif ($zhuangtai === '-1'){
			$dingdan = Db::name('dingdan')->where('bianhao',input('post.sousuo'))->select();
			if (empty($dingdan)) {
				
				$neirong = input('post.sousuo');
				$data = [];
				for($i = 0;$i<mb_strlen($neirong);$i++){
					$data[] = mb_substr($neirong, $i,1);
				}
		
				$str = implode('%', $data);
				$string = '%' . $str . '%';
				$dingdan = Db::name('dingdan')->where('buyjia',$username)->where('username','like',$string)->select();
			}


		} else {
			$dingdan = Db::name('dingdan')->where('buyjia',$username)->where('zhuangtai','!=','已评价' )->where('zhuangtai',$zhuangtai)->select();
		}
		
		$this->assign('dingdan',$dingdan);
		$this->assign('username',$username);
		$this->assign('uid',$uid);
		return $this ->fetch();
	}

	public function tuidingdan($did)
	{		
		$result = Db::name('dingdan')->where('did',$did)->update(['yuanyin' => input('post.yuanyin')]);
		echo $result;
	}

	public function tousu($did)
	{
		
		$result = Db::name('dingdan')->where('did',$did)->select();
	
		$maijia = $result[0]['maijia'];

		$dianpu = Db::name('user')->where('username',$maijia)->select();
	
		$num = $dianpu[0]['tousu'] + 1;
		
		Db::name('dingdan')->where('did',$did)->update(['tousu' => 1,'neirong'=>input('post.neirong')]);
		$dianpu = Db::name('user')->where('username',$maijia)->update(['tousu' => $num]);
		echo $dianpu;
		
		

	}

	public function tuiyun($did)
	{

		$result = Db::name('dingdan')->where('did',$did)->update(['yunxian' => 0]);
		echo $result;
	}

	public function zhifumima($did)
	{
		$username = session('username');
		$result = Db::name('user')->where('username',$username)->select();
		
		if (input('post.zhifumima') == $result[0]['payword']) {
			$dingdan = Db::name('dingdan')->where('did',$did)->select();
			$maijia = $dingdan[0]['maijia'];
			$qian = $dingdan[0]['jiage'];
			Db::name('user')->where('username',$maijia)->setInc('qian',$qian);
			dump($dingdan[0]['shopid']);
			Db::name('shop')->where('sid',$dingdan[0]['shopid'])->setInc('xiaoliang',1);
			Db::name('dingdan')->where('did',$did)->update(['zhuangtai' => '待评价']);
			//echo '待评价';
		} else {
			echo 0;
		}

	}

	public function pingjia($did)
	{

		$username = session('username');
		if (!$username) {
			$this->error('请先登录');
		}
		
		dump(input('post.'));

		$result = Db::name('dingdan')->where('did',$did)->select();
		
		
		$sid = $result[0]['shopid'];
		$maijia = $result[0]['maijia'];
		$dianpu = Db::name('user')->where('username',$maijia)->select();
		$dianpuid = $dianpu[0]['uid'];
		$data = ['neirong' => input('post.pingjianeirong'),'sid' => $sid,'uname' => $username,'dianpudid' => $dianpuid,'hao' => input('post.value')];
		$ping = Db::name('pingjia')->insert($data);
		if ($ping) {
			Db::name('dingdan')->where('did',$did)->update(['zhuangtai' => '已评价']);
		}
	}

	public function cang()
	{
		$username = session('username');
		if (!$username) {
			$this->error('请先登录');
		}
		$page = input('get.page');
		
		$result = Db::name('user')->where('username',$username)->select();
		$uid = $result[0]['uid'];
		$list = Db::name('cang')->where('uid',$uid)->select();
		$num = count($list);
		$nanlist =  Db::name('cang')->where(['uid'=>$uid,'bleixing'=>'男装'])->select();
		$totnan = count($nanlist);
		$nvlist =  Db::name('cang')->where(['uid'=>$uid,'bleixing'=>'女装'])->select();
		$totnv = count($nvlist);
		$otlist =  Db::name('cang')->where("uid = '$uid' and  bleixing != '男装' and bleixing !=  '女装'")->select();
	
		$totot = count($otlist);
		//降价的宝贝 
	
		$da = [];
		$plist = [];
		foreach($list as $key=>$value){
			$sid = $value['sid'];
			$price = Db::name('shop')->where('sid',$sid)->value('price');
			if($price < $value['price'] && !empty($price)){
				$da[] = ['sid' =>$sid,'price'=>$price];
				$plist[] = $value;
			}
		}
		$pnum = count($plist);
		//end;
		//失效的宝贝
		$sdata = [];
		$slist = [];
		foreach($list as $key=>$value){
			$x = $value['sid'];
			$y = Db::name('shop')->where('sid',$x)->select();
			if(!$y){
				$sdata[] = ['sid' =>$x,'price'=>'失效的宝贝'];
				$slist[] = $value;
			}
		}
		$snum = count($slist);
		//end
		
		return 	view('',compact('uid','username','list','num','nanlist','nvlist','totnan','otlist','totnv','totot','page','da','plist','sdata','slist','pnum','snum'));
	}
		public function delcang()
	{
		//dump(input('post.'));
		$page = input('get.page');
		$data = input('post.');
		foreach($data as $val){
			Db::name('cang')->where('idcang',$val)->delete();
		}
		$uid = session('uid');
		$username = session('username');
		$list = Db::name('cang')->where('uid',$uid)->select();
		$num = count($list);
		$nanlist =  Db::name('cang')->where(['uid'=>$uid,'bleixing'=>'男装'])->select();
		$totnan = count($nanlist);
		$nvlist =  Db::name('cang')->where(['uid'=>$uid,'bleixing'=>'女装'])->select();
		$totnv = count($nvlist);
		$otlist =  Db::name('cang')->where("uid = '$uid' and  bleixing != '男装' and bleixing !=  '女装'")->select();
	
		$totot = count($otlist);
		//降价的宝贝 
	
		$da = [];
		$plist = [];
		foreach($list as $key=>$value){
			$sid = $value['sid'];
			$price = Db::name('shop')->where('sid',$sid)->value('price');
			if($price < $value['price']){
				$da[] = ['sid' =>$sid,'price'=>$price];
				$plist[] = $value;
			}
		}
		$pnum = count($plist);
		//end;
		//失效的宝贝
		$sdata = [];
		$slist = [];
		foreach($list as $key=>$value){
			$x = $value['sid'];
			$y = Db::name('shop')->where('sid',$sid)->select();
			if(!$y){
				$sdata[] = ['sid' =>$x,'price'=>'失效的宝贝'];
				$slist[] = $value;
			}
		}
		$snum = count($slist);
		dump($sdata);
		dump($slist);
		
		return view('user/cang',compact('uid','username','list','num','nanlist','nvlist','totnan','totnv','totot','page','da','plist','sdata','slist','pnum','snum'));
		
	}
	public function searchcang()
	{
		$page = input('post.page');
		$content = input('post.content');
		$searchlist = Db::name('cang')->where('mleixing|miaoshu','like','%'.$content.'%')->select();
		//搜索结束
		$username = session('username');
		$result = Db::name('user')->where('username',$username)->select();
		$uid = $result[0]['uid'];
		$list = Db::name('cang')->where('uid',$uid)->select();
		$num = count($list);
		$nanlist =  Db::name('cang')->where(['uid'=>$uid,'bleixing'=>'男装'])->select();
		$totnan = count($nanlist);
		$nvlist =  Db::name('cang')->where(['uid'=>$uid,'bleixing'=>'女装'])->select();
		$totnv = count($nvlist);
		$otlist =  Db::name('cang')->where("uid = '$uid' and  bleixing != '男装' and bleixing !=  '女装'")->select();
	
		$totot = count($otlist);
		//降价的宝贝 
	
		$da = [];
		$plist = [];
		foreach($list as $key=>$value){
			$sid = $value['sid'];
			$price = Db::name('shop')->where('sid',$sid)->value('price');
			if($price < $value['price'] && !empty($price)){
				$da[] = ['sid' =>$sid,'price'=>$price];
				$plist[] = $value;
			}
		}
		$pnum = count($plist);
		//end;
		//失效的宝贝
		$sdata = [];
		$slist = [];
		foreach($list as $key=>$value){
			$x = $value['sid'];
			$y = Db::name('shop')->where('sid',$x)->select();
			if(!$y){
				$sdata[] = ['sid' =>$x,'price'=>'失效的宝贝'];
				$slist[] = $value;
			}
		}
		$snum = count($slist);
		//end
		
		return 	view('user/cang',compact('uid','username','list','num','nanlist','nvlist','totnan','otlist','totnv','totot','page','da','plist','sdata','slist','pnum','snum','searchlist'));
	}
	public function dcang()
	{
		$username = session('username');
		$result = Db::name('user')->where('username',$username)->select();
		$uid = $result[0]['uid'];
		$this->assign('username',$username);
		$this->assign('uid',$uid);
		return $this ->fetch();
	}

	public function pingj($ping)
	{

		$username = session('username');
		$result = Db::name('user')->where('username',$username)->select();
		if ($ping == 'mai'){
			$dianpu = Db::name('user')->where('username',$username)->select();
			$did = $dianpu[0]['uid'];
			$pingjia = Db::name('pingjia')->where('dianpudid',$did)->alias('p')->join('think_user d','p.dianpudid=d.uid')->join('think_shop s','s.sid=p.sid')->select();

		
		} else {
			$pingjia = Db::name('pingjia')->where('uname',$username)->alias('p')->join('think_user d','p.dianpudid=d.uid')->join('think_shop s','s.sid=p.sid')->select();
			
		}


		$yizhou = date('Y-m-d H:i:s',time() - 7 * 24 * 60 * 60);
		$yiyue = date('Y-m-d H:i:s',time() - 30 * 24 * 60 * 60);
		$liuyue = date('Y-m-d H:i:s',time() - 6 * 30 *24 * 60 * 60);

		

		$yizhouhaonum = Db::name('pingjia')->where('uname',$username)->where('hao','2')->where('create_time','>',$yizhou)->count();
		$yizhouzhongnum = Db::name('pingjia')->where('uname',$username)->where('hao','1')->where('create_time','>',$yizhou)->count();
		$yizhouchanum = Db::name('pingjia')->where('uname',$username)->where('hao','0')->where('create_time','>',$yizhou)->count();

		$yiyuehaonum = Db::name('pingjia')->where('uname',$username)->where('hao','2')->where('create_time','>',$yiyue)->count();

		$yiyuezhongnum = Db::name('pingjia')->where('uname',$username)->where('hao','1')->where('create_time','>',$yiyue)->count();
		$yiyuechanum = Db::name('pingjia')->where('uname',$username)->where('hao','0')->where('create_time','>',$yiyue)->count();

		$liuyuehaonum = Db::name('pingjia')->where('uname',$username)->where('hao','2')->where('create_time','>',$liuyue)->count();
		$liuyuezhongnum = Db::name('pingjia')->where('uname',$username)->where('hao','1')->where('create_time','>',$liuyue)->count();
		$liuyuechanum = Db::name('pingjia')->where('uname',$username)->where('hao','0')->where('create_time','>',$liuyue)->count();

		$liuyue1haonum = Db::name('pingjia')->where('uname',$username)->where('hao','2')->where('create_time','<',$liuyue)->count();
		$liuyue1zhongnum = Db::name('pingjia')->where('uname',$username)->where('hao','1')->where('create_time','<',$liuyue)->count();
		$liuyue1chanum = Db::name('pingjia')->where('uname',$username)->where('hao','0')->where('create_time','<',$liuyue)->count();

		$this->assign('yizhouhaonum',$yizhouhaonum);
		$this->assign('yizhouzhongnum',$yizhouzhongnum);
		$this->assign('yizhouchanum',$yizhouchanum);
		$this->assign('yiyuehaonum',$yiyuehaonum);
		$this->assign('yiyuezhongnum',$yiyuezhongnum);
		$this->assign('yiyuechanum',$yiyuechanum);
		$this->assign('liuyuehaonum',$liuyuehaonum);
		$this->assign('liuyuezhongnum',$liuyuezhongnum);
		$this->assign('liuyuechanum',$liuyuechanum);
		$this->assign('liuyue1haonum',$liuyue1haonum);
		$this->assign('liuyue1zhongnum',$liuyue1zhongnum);
		$this->assign('liuyue1chanum',$liuyue1chanum);
	
		$uid = $result[0]['uid'];
		
		$this->assign('pingjia',$pingjia);
		$this->assign('username',$username);
		$this->assign('uid',$uid);
		return $this ->fetch();
	}

	public function huifuqueren($pid)
	{
		
		$neirong = input('post.neirong');
		Db::name('pingjia')->where('pid',$pid)->update(['huifu' => input('post.neirong')]);


	}
	public function zuj()
	{
		$username = session('username');
		if (!$username) {
			$this->error('请先登录');
		}
		$result = Db::name('user')->where('username',$username)->select();
		$uid = $result[0]['uid'];
		$liulan = Db::name('liulan')->where('l.uid',$uid)->alias('l')->join('think_shop s','l.sid = s.sid')->select(); 
		$zuire = Db::name('shop')->order('liulancishu desc')->limit(8)->select();

		$this->assign('zuire',$zuire);	
		$this->assign('liulan',$liulan);
		$this->assign('username',$username);
		$this->assign('uid',$uid);
		return $this ->fetch();
	}
	public function paim()
	{
		$username = session('username');
		$result = Db::name('user')->where('username',$username)->select();
		$uid = $result[0]['uid'];
		$this->assign('username',$username);
		$this->assign('uid',$uid);
		return $this ->fetch();
	}
	public function youhuiq()
	{
		$username = session('username');
		$result = Db::name('user')->where('username',$username)->select();
		$uid = $result[0]['uid'];
		$youhui = $result[0]['youhui'];
		$this->assign('youhui',$youhui);

		$this->assign('username',$username);
		$this->assign('uid',$uid);
		return $this ->fetch();
	}
	public function tuij()
	{
		$username = session('username');
		$result = Db::name('user')->where('username',$username)->select();
		$uid = $result[0]['uid'];
		$this->assign('username',$username);
		$this->assign('uid',$uid);
		return $this ->fetch();
	}
	public function qianb()
	{
		$username = session('username');
		$result = Db::name('user')->where('username',$username)->select();
		$uid = $result[0]['uid'];
		$qian = $result[0]['qian'];
		$dingdan = Db::name('dingdan')->where('buyjia',$username)->where('zhuangtai','待评价')->alias('b')->join('think_shop s','s.sid=b.shopid')->select();
		$dingdan1 = Db::name('dingdan')->where('buyjia',$username)->where('zhuangtai','已退款')->alias('b')->join('think_shop s','s.sid=b.shopid')->select();
		$dingdan2 = Db::name('dingdan')->where('buyjia',$username)->where('zhuangtai','已评价')->alias('b')->join('think_shop s','s.sid=b.shopid')->select();
		$dingdan3 = Db::name('dingdan')->where('buyjia',$username)->where('zhuangtai','退款中')->alias('b')->join('think_shop s','s.sid=b.shopid')->select();

		$this->assign('dingdan1',$dingdan1);
		$this->assign('dingdan',$dingdan);
		$this->assign('dingdan2',$dingdan2);
		$this->assign('dingdan3',$dingdan3);
		$this->assign('qian',$qian);
		$this->assign('username',$username);
		$this->assign('uid',$uid);
		return $this ->fetch();
	}
	public function tix()
	{
		$username = session('username');
		$result = Db::name('user')->where('username',$username)->select();
		$uid = $result[0]['uid'];
		$truename = $result[0]['truename'];
		$yinghang = Db::name('yinghang')->where('username',$username)->select();
		
		$this->assign('yinghang',$yinghang);
		$this->assign('truename',$truename);
		$this->assign('username',$username);
		$this->assign('uid',$uid);
		return $this ->fetch();
	}

	public function addyinghang()
	{
		$username = session('username');
		$data = ['username' => $username,'yinghang' => input('post.yinghang'),'kahao' => input('post.kahao'),'sheng' => input('post.sheng'),'shi' => input('post.shi'),'dizhi' => input('post.dizhi')];

		$result = Db::name('yinghang')->insert($data);
		$this->redirect('index/user/tix');
	}

	public function shanchuyinghang($yid)
	{
		Db::name('yinghang')->delete($yid);
		$this->redirect('index/user/tix');
	}

	public function maid()
	{
		$username = session('username');
		$result = Db::name('user')->where('username',$username)->select();
		$uid = $result[0]['uid'];
		$dou = $result[0]['dou'];
		//得到可以兑换的商品
		$shop = Db::name('shop')->where('sid > 0')->limit(0,8)->select();
		return view('',compact('dou','shop','username','uid'));
		
	}
	public function guanl()
	{
		$username = session('username');
		$result = Db::name('user')->where('username',$username)->select();
		$uid = $result[0]['uid'];
		$this->assign('username',$username);
		$this->assign('uid',$uid);
		return $this ->fetch();
	}
	public function tuih()
	{
		$username = session('username');
		$bianhao = input('post.bianhao');

		
		$result = Db::name('user')->where('username',$username)->select();
		$uid = $result[0]['uid'];
		if (empty($bianhao)){
			
			$tui = Db::name('dingdan')->where('buyjia',$username)->where('zhuangtai','退款中')->select();
			$tui1 = Db::name('dingdan')->where('buyjia',$username)->where('zhuangtai','已退款')->select();
		} else {
			
			$tui = Db::name('dingdan')->where('buyjia',$username)->where('zhuangtai','退款中')->where('bianhao',$bianhao)->select();
			$tui1 = Db::name('dingdan')->where('buyjia',$username)->where('zhuangtai','已退款')->where('bianhao',$bianhao)->select();
		}

		$this->assign('tui',$tui);
		$this->assign('tui1',$tui1);
		$this->assign('username',$username);
		$this->assign('uid',$uid);
		return $this ->fetch();
	}
	public function yij()
	{
		$username = session('username');
		$result = Db::name('user')->where('username',$username)->select();
		$num = Db::name('dingdan')->where('buyjia',$username)->where('tousu',1)->count();
		$tousu = Db::name('dingdan')->where('buyjia',$username)->where('tousu',1)->select();
		$uid = $result[0]['uid'];
		$this->assign('tousu',$tousu);
		$this->assign('num',$num);
		$this->assign('username',$username);
		$this->assign('uid',$uid);
		return $this ->fetch();
	}

	public function chexiao($did)
	{
		Db::name('dingdan')->where('did',$did)->update(['tousu' => 0,'neirong' => null]);
		$this->redirect('/index/user/yij');
	}

	public function shop()
	{
		$username = session('username');
		$result = Db::name('user')->where('username',$username)->select();
		$uid = session('uid');
		$list = Db::name('shopcar') ->where('uid',$uid)->select();
		$num = count($list);
		
		return view('',compact('list','num','uid','username'));
	}
	public function delshop()
	{
		$result = Db::name('shopcar')->where('cid',input('get.cid')) ->delete();
		if($result){
			return $this ->success('删除成功');
		}else{
			return $this ->error('删除失败');
		}
	}
	//修改资料的view
	public function xiugaizz()
	{

		$username = session('username');
		if (!$username) {
			$this->error('请先登录');
		}

		
		
		$result = Db::name('user')->where('username',$username)->select();

		$uid = $result[0]['uid'];
		$name= $result[0]['name'];
		$truename = $result[0]['truename'];
		$nicheng = $result[0]['nicheng'];
		$sex = $result[0]['sex'];
		$shengri = $result[0]['shengri'];
		$dizhi = $result[0]['dizhi'];
		$youxiang = $result[0]['youxiang'];
		$touxiang = $result[0]['touxiang'];
		$this->assign('touxiang',$touxiang);
		$this->assign('youxiang',$youxiang);
		$this->assign('name',$name);
		$this->assign('truename',$truename);
		$this->assign('nicheng',$nicheng);
		$this->assign('sex',$sex);
		$this->assign('shengri',$shengri);
		$this->assign('dizhi',$dizhi);
		$this->assign('username',$username);
		$this->assign('uid',$uid);
		return $this ->fetch();
	}

	public function yanzheng()
	{
		$username = session('username');
		if (!$username) {
			$this->error('请先登录');
		}

		$validate = Loader::validate('Xiugaizz');
			dump(input('post.'));

		$file = request()->file('touxiang');
		$tupian = '20161025\a326522704b98da73ef7441f28a66c32.jpg';
		$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');

		 if($info){
    		$tupian =  $info->getSaveName();     	   
   		 }
   		 $touxiang = '/uploads/' . $tupian;

		if(!$validate ->check(input('post.'))){
			$this ->error($validate ->getError());
		}

		

		Db::name('user')->where('username',$username)->update([
				'name' => input('post.name'),
				'nicheng' => input('post.nicheng'),
				'truename' => input('post.truename'),
				'nicheng' => input('post.nicheng'),
				'sex' => input('sex'),
				'shengri' => input('shengri'),
				'dizhi' => input('dizhi'),
				'touxiang' => $touxiang,
			]);
		return $this->redirect('index/user/xiugaizz');
	}

	public function upload()
	{
		 $file = request()->file('image');
  
    $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
    if($info){
      
        echo $info->getExtension();
     
        echo $info->getSaveName();
       
        echo $info->getFilename(); 
    }else{
       
        echo $file->getError();
    }
	}

	public function youxiang()
	{
		$username = session('username');
		
		Db::name('user')->where('username',$username)->update(['youxiang' => input('post.youxiang')]);
		echo input('post.youxiang');
	}

	public function safe()
	{
		$username = session('username');
		if (!$username) {
			$this->error('请先登录');
		}
		$result = Db::name('user')->where('username',$username)->select();
		
		$uid = $result[0]['uid'];
		
		$name = $result[0]['name'];
		$youxiang = $result[0]['youxiang'];

		$zhifumima = $result[0]['payword'];
		$truename  = $result[0]['truename'];

		$yinhang = Db::name('yinghang')->where('username',$username)->count();

		$this->assign('yinhang',$yinhang);
		$this->assign('truename',$truename);
		$this->assign('zhifumima',$zhifumima);
		$this->assign('youxiang',$youxiang);
		$this->assign('name',$name);
		$this->assign('username',$username);
		$this->assign('uid',$uid);
		return $this ->fetch();
	}
	public function mima()
	{
		$username = session('username');

		$result = Db::name('user')->where('username',$username)->select();


		if (md5(input('post.youxiang')) == $result[0]['password']){
			echo 1;
		} else {
			echo 0;
		}

	}

	public function updatemima()
	{
		$username = session('username');
	
		$result = Db::name('user')->where('username',$username)->update(['password' => md5(input('post.youxiang'))]);
		if ($result) {
			echo 1;
		} else {
			echo 0;
		}
	}

	public function updatezhifu()
	{
	
		$username = session('username');
	
		$result = Db::name('user')->where('username',$username)->update(['payword' => input('post.youxiang')]);
		if ($result) {
			echo 1;
		} else {
			echo 0;
		}
	}

	public function bangd()
	{
		$username = session('username');
		if (!$username) {
			$this->error('请先登录');
		}
		$result = Db::name('user')->where('username',$username)->select();
		$uid = $result[0]['uid'];
		$qq = $result[0]['qq'];
		$weixin = $result[0]['weixin'];
		$this->assign('weixin',$weixin);
		$this->assign('qq',$qq);
		$this->assign('username',$username);
		$this->assign('uid',$uid);
		return $this ->fetch();
	}

	public function bangdingqq()
	{
		$username = session('username');
		
		$result = Db::name('user')->where('username',$username)->update(['qq' => input('post.qq')]);
		
		echo input('post.qq');
	}

	public function bangdingweixin()
	{
		$username = session('username');
		
		$result = Db::name('user')->where('username',$username)->update(['weixin' => input('post.weixin')]);
		
		echo input('post.weixin');
	}

	public function diz($did)
	{

		$username = session('username');
		if (!$username) {
			$this->error('请先登录');
		}
		$result = Db::name('user')->where('username',$username)->select();
		$di = new Dizhi();
		$dizhi = $di->where('uname',$username)->select();
		
		$dizhinum = $di->where('uname',$username)->count();
		$dizhishengyv = 20 - $dizhinum;
		$uid = $result[0]['uid'];
		$gai = $di->where('did',$did)->select();
		$this->assign('gai',$gai);
		$this->assign('did',$did);
		$this->assign('dizhishengyv',$dizhishengyv);
		$this->assign('dizhinum',$dizhinum);
		$this->assign('dizhi',$dizhi);
		$this->assign('username',$username);
		$this->assign('uid',$uid);
		return $this ->fetch();
	}

	public function updatedizhi()
	{
		
		$username = session('username');

		if (empty(input('moren'))){
			$moren = 0;
		} else {
			$moren = 1;
		}
		$did = input('post.did');

		if ($did != 0) {
			Db::name('dizhi')->where('did',$did)->update(['diqv' => null,'dizhi' => null,'youbian' => null,'shouji' => null,'dianhua' => null,'moren' => null,'uname' => null,'username'=>null]);
			$result = Db::name('dizhi')->where('did',$did)->update( ['diqv' => input('post.diqv'),'dizhi' => input('post.dizhi'),'youbian' => input('post.youbian'),'shouji' => input('shouji'),'dianhua' => input('post.dianhua') . input('post.dianhua1') . input('post.dianhua2'),'moren' => $moren,'uname' => $username,'username'=>input('post.username')]);
		

		} else {
			
			$data = ['diqv' => input('post.diqv'),'dizhi' => input('post.dizhi'),'youbian' => input('post.youbian'),'shouji' => input('shouji'),'dianhua' => input('post.dianhua') . input('post.dianhua1') . input('post.dianhua2'),'moren' => $moren,'uname' => $username,'username'=>input('post.username')];
			$result = Db::name('dizhi')->insert($data);
			
		}
	
		if ($result) {
			$this->redirect('index/user/diz?did=0');
		} else {
			return $this->getError();
		}
	
	
	}

	public function xiugaidizhi($did)
	{
		$this->redirect('index/user/diz', ['did' => $did]);
	}
	
	public function deldizhi($did)
	{
		
		dump(Dizhi::destroy($did));
		$this->redirect('index/user/diz', ['did' => 0]);

	}
	//修改手机
	public function phone1()
	{
		return $this ->fetch();
	}
	public function phone2()
	{
		return $this ->fetch();
	}
	public function phone3()
	{
		return $this ->fetch();
	}
	//修改邮箱
	public function email1()
	{
		return $this ->fetch();
	}
	public function email2()
	{
		return $this ->fetch();
	}
	public function email3()
	{
		return $this ->fetch();
	}
	//卖家中心
	public function sale()
	{	
		$username = session('username');
		$uid = session('uid');
		$shop = new Shop;
		$shopnum =$shop->where('uid',$uid)->count();


		$dingdan = Db::name('dingdan')->where('maijia',$username)->select();
		
		$zuixin = $shop->where('uid',$uid)->order('create_time','desc')->limit(1)->select();
		$fukuannum = Db::name('dingdan')->where('maijia',$username)->where('zhuangtai','待付款')->count();
		$fahuonum = Db::name('dingdan')->where('maijia',$username)->where('zhuangtai','待发货')->count();
		$pingjianum = Db::name('dingdan')->where('maijia',$username)->where('zhuangtai','待评价')->count();
		$shouhuonum = Db::name('dingdan')->where('maijia',$username)->where('zhuangtai','确认收货')->count();
		$tuikuannum = Db::name('dingdan')->where('maijia',$username)->where('zhuangtai','退款中')->count();

		$slist = Db::name('admin_s')->where('sid>0') ->select();
		$blist = Db::name('admin_b')->where('bid>0') ->select();
		$list = $shop->where('uid',$uid)->select();
	
		return view('',compact('zuixin','dingdan','shopnum','list','slist','blist','username','uid','fukuannum','fahuonum','pingjianum','shouhuonum','tuikuannum','fukuannum','fahuonum','pingjianum','shouhuonum','tuikuannum'));
	}

	public function xiajia($sid)
	{

		$dingdan = Shop::get($sid);
		
		$dingdan->delete();

	}

	public function wuliuxinxi($did)
	{
		Db::name('dingdan')->where('did',$did)->update(['wuliu' => input('post.wuliu')]);
	}

	public function tuikuan($did)
	{
		
		Db::name('dingdan')->where('did',$did)->update(['zhuangtai'=>'已退款']);
	}

	public function fahuo($did)
	{
		Db::name('dingdan')->where('did',$did)->update(['zhuangtai'=>'确认收货']);
	}

	public function shopCreate()
	{	
		//获取图片路径
		$data = [];
		$file = request()->file('f');
		
			$info = $file ->move('upload');
			
	
		if($info){
			$data['tupian'] = $info ->getSaveName();
			
		}else{
			echo $file ->getError();
		}
		$size = explode(',',input('post.size'));

		
	
		$color = explode(',',input('post.color'));

		$bid = Db::name('admin_s')->where('name',input('post.selected')) ->select();
	
		$bid = $bid[0]['bid'];
		$bname = Db::name('admin_b')->where('bid',$bid)->value('name');
	
		$data['bleixing'] = $bname;
		$data['mleixing'] = input('post.selected');
		//$data['tupian'] = input('post.f');
		$data['miaoshu'] = input('post.miaoshu');
		$data['price'] = input('post.price');
		$data['create_time'] = date('Y-m-d H:i:s',time());
		$username = session('username');
		$uid = session('uid');
		$data['uid'] = $uid;
		$data['maijia'] = $username;
		$id = Db::name('shop')->insertGetId($data);
		foreach ($size as $value) {
			Db::name('shopsize')->insert(['size' => $value,'sid' => $id]);
		}
		foreach ($color as $value) {
			Db::name('shopcolor')->insert(['color' => $value,'sid' => $id]);
		}
		if($id){
			$this ->success('新增成功');
		}else{
			$this ->error('新增失败');
		}
	}
	public function checkLogin(UserModel $user)
	{
		$password = md5(input('post.password'));
		if($uid = $user->where([
			'username'=>input('post.username'),
			'password'=>$password])->value('uid')){
			session('username',input('post.username'));
			session('uid',$uid);
		
			$session = session('username');
			
			$this ->redirect('/index/index');
		}elseif($user->where(['username'=>input('post.username')])->select()){
			$this ->error('密码输入错误！');
		}else{
			$this ->error('账号输入错误！');
		}
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
	public function create(UserModel $u)
	{
		$validate = Loader::validate('User');
		if(!$validate ->check(input('post.'))){
			$this ->error($validate ->getError());
		}
		$result = $u->where('username',input('post.username'))->select();
		if($result){
			$this ->error('用户名已存在');
		}
		$data = input('post.');
	
		$u->username = $data['username'];
		$u->password = $data['password'];
		$ui = $u->save();
		$uid = $u->uid;
		
		if($ui){
			
			
			session('username',$uid);
			session('username',input('post.username'));
			$session = session('username');
	
			$this ->redirect('/index/index',['session'=>$session]);
			
		}else{
			$this ->error('注册失败','user/list','1',1);
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


	public function qiandao()
	{
		$dou = input('post.dou') + 5;
		Db::name('user')->where('username',input('post.username'))->update(['dou'=>$dou,'qiandao'=>date('Y-m-d H:m:s',time())]);
		echo $dou;
	}



	public function test(){
		$str = '你2们s好a啊shaiuhus';
		$data = [];
		for($i = 0;$i<mb_strlen($str);$i++){
			$data[] = mb_substr($str, $i,1);
		}
		
		dump($data);
	}
}