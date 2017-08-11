<!DOCTYPE html>
<!DOCTYPE html>
<!-- saved from url=(0022)http://www.###/ -->
<html lang="zh-cn">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="mobile-agent" content="format=xhtml;url=http://m.###"/>
	
	<script type="text/javascript" async="" src="public/js/insideText.js">
	</script>
	<title>
		落叶秋凉---个人博客
	</title>
	<link href="public/css/base.css" rel="stylesheet" />
	<link href="public/css/index.css" rel="stylesheet" />
	<script type="text/javascript" async="" src="public/js/ycym">
	</script>
	<script src="public/js/share.js">
	</script>
	<link rel="stylesheet" href="public/css/share_style1_32.css" />
</head>

<body>
	<div id="BAIDU_DUP_fp_wrapper" style="position: absolute; left: -1px; bottom: -1px; z-index: 0; width: 0px; height: 0px; overflow: hidden; visibility: hidden; display: none;">
		<iframe id="BAIDU_DUP_fp_iframe" src="//pos.baidu.com/wh/o.htm?ltr=" style="width: 0px; height: 0px; visibility: hidden; display: none;">
		</iframe>
	</div>
	<!--导航-->
	<header>
		<div id="logo">
			<a href="javascript:;">
				<div style="float:left;font-size:30px;font-weight:bold;margin-top:15px;margin-left:20px;">LOVE</div>
				<div style="float:left;font-size:30px;font-weight:bold;margin-top:20px;margin-left:10px;"><img src="public/images/love.png" /></div>
				<div style="float:left;font-size:30px;font-weight:bold;margin-top:15px;margin-left:10px;">杨<p style="font-size:12px;color:#aaa;padding-bottom:20px;">  &nbsp;&nbsp;&nbsp;____落叶秋凉</p></div>
			</a>
			</div>
		<?php if($_SESSION['uid']): ?>
		<div style="float:right;width:200px;height:30px;margin:50px;">
			
			<a href="index.php?m=User&a=logout" style="float:right;"> &nbsp退出</a>
			<a href="index.php?m=manage&a=index" style="float:right;">&nbsp管理&nbsp| </a>
			<a href="index.php?m=Article&a=add" style="float:right;">发表博文&nbsp| </a>
		</div>
		<?php else : ?>
		<div style="float:right;width:200px;height:30px;margin:50px;">
		
			<a href="index.php?m=User&a=aboutme" style="float:right;">&nbsp;about me </a>
			<a href="index.php?m=User&a=login" style="float:right;">登录&nbsp;|</a>
		</div>
		<?php endif;?>
		<nav class="topnav" id="topnav">
			<a href="javascript:;">
			</a>
			<a href="javascript:;">
			</a>
			<a href="javascript:;">
			</a>
			<a href="javascript:;">
			</a>
			<a href="javascript:;">
			</a>
			<a href="javascript:;">
			</a>
			<a href="javascript:;">
			</a>
		</nav>
	</header>
	<!--banner-->
	<div class="banner">
		<section class="box">
			<ul class="texts">
				<p>
					我们不停的翻弄着回忆
				</p>
				<p>
					却再也找不回那时的自己
				</p>
				<p>
					红尘一梦，不再追寻
				</p>
			</ul>
			<div class="avatar">
				<a href="javascript:;">
				</a>
			</div>
		</section>
	</div>
	<div class="template">
		<div class="box">
			<h3>
				<p>
					<span>
						个人博客 |
					</span>
					PHP MYLOVE
				</p>
			</h3>
			<ul>
				<li>
					<a href="javascript:;" title="个人博客《草根寻梦》—手机版模板">
						<img src="public/images/1.jpg" alt="个人博客《草根寻梦》—手机版模板">
					</a>
					<span>
						个人博客php-1
					</span>
				</li>
				<li>
					<a href="javascript:;" title="婚庆婚纱公司网站模板">
						<img src="public/images/2.jpg" alt="婚庆婚纱公司网站模板">
					</a>
					<span>
						个人博客php-2
					</span>
				</li>
				<li>
					<a href="javascript:;" title="【活动作品】柠檬绿兔小白个人博客模板">
						<img src="public/images/3.jpg" alt="【活动作品】柠檬绿兔小白个人博客模板">
					</a>
					<span>
						个人博客php-3
					</span>
				</li>
				<li>
					<a href="javascript:;" title="企业单页宣传模板">
						<img src="public/images/4.jpg" alt="企业单页宣传模板">
					</a>
					<span>
						个人博客php-4
					</span>
				</li>
				<li>
					<a href="javascript:;" title="情侣博客模板系列之《回忆》Html">
						<img src="public/images/5.jpg" alt="情侣博客模板系列之《回忆》Html">
					</a>
					<span>
						个人博客php-5
					</span>
				</li>
			</ul>
		</div>
	</div>
	<article>
		<h2 class="title_tj">
			<p>
				文章
				<span>
					推荐
				</span>
			</p>
		</h2>
		<?php foreach($data as $key =>$value) :?>
		<div class="bloglist left">
			<h3>
				<a href="javascript:;">
				</a>
			</h3>
			<figure>
				<a href="index.php?m=Article&a=details&aid=<?=$value['aid'];?>">
					<img src="./upload/<?=$value['path'];?>" alt="php精选" width="175" height="130"/>
				</a>
			</figure>
			<ul>
				<p>
					<a href="index.php?m=Article&a=details&aid=<?=$value['aid'];?>"><h1><?=$value['title'];?></h1></a>
					<br />
					<p>
						<?=substr($value['article'],0,400);?>
					</p>
				</p>
				<a href="javascript:;">
				</a>
			</ul>
			<p class="dateview">
				<span>
					<?=date('Y-m-d',$value['createtime']);?>
				</span>
				<span>
					落叶秋凉
				</span>
				<span>
					个人博客：[PHP
					<a href="javascript:;">
					</a>
					]
				</span>
			</p>
			
		</div>
		<?php endforeach;?>
		<div style="width:100%;clear:both;"></div>
		<div style="width:500px;height:40px;font-size:16px;float:right;margin-top:20px;">
			<a href="<?=$render['first'];?>"> 首页&nbsp; </a>
			<a href="<?=$render['prev'];?>"> 上一页&nbsp; </a>
			<a href="<?=$render['next'];?>"> 下一页&nbsp; </a>
			<a href="<?=$render['end'];?>">  尾页 </a>
		</div>
		<div class="right" style="float:right;">
		<aside class="right" style="float:right;position:absolute;top:580px;right:130px;">
			
			<div class="news">
				<h3>
					<p>
						最新
						<span>
							文章
						</span>
					</p>
				</h3>
				
				<ul class="rank">
					<?php foreach($olddata as $value) :?>
					<li>
						<a href="index.php?m=Article&a=details&aid=<?=$value['aid'];?>">
						<?=$value['title'];?>
						</a>
					</li>
					<?php endforeach;?>
					
				</ul>
				
				<h3 class="links">
					<p>
						相关
						<span>
							文章
						</span>
					</p>
				</h3>
				<div style="padding-top:10px;color:blue;">
					<ol class="" style="height:300px;">
						<?php foreach($match as $key =>$value) :?>
						<li style="list-style:disc;margin-top:15px;">
							<a href="<?=$key;?>">
								<?=$value;?>
							</a>
						</li>
						<?php endforeach;?>
					</ol>
				</div>
				<div class="bdsharebuttonbox bdshare-button-style1-32" data-bd-bind="1470903300573">
					<a href="javascript:;">
					</a>
					<a href="javascript:;">
					</a>
					<a href="javascript:;">
					</a>
					<a href="javascript:;">
					</a>
					<a href="javascript:;">
					</a>
					<a href="javascript:;">
					</a>
				</div>
				<script>
					window._bd_share_config = {
						"common": {
							"bdSnsKey": {},
							"bdText": "",
							"bdMini": "2",
							"bdMiniList": false,
							"bdPic": "",
							"bdStyle": "1",
							"bdSize": "32"
						},
						"share": {}
					};
					with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~ ( - new Date() / 36e5)];
				</script>
				<div class="guanzhu">
					扫描二维码关注
					<span>
						落叶秋凉:博客
					</span>
					官方微信账号
				</div>
				<a href="javascript:;"><img src="public/images/weixin.png" width="100" height="100" style="margin-left:90px;" />
				</a>
			</div>
		</aside>
		</div>
	</article>
	<footer>
		<p>
			Design by DanceSmile
			<a href="javascript:;">
			</a>
			<script type="text/javascript">
				var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://": " http://");
				document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Ff655f558c510211e38805f6b586e6b15' type='text/javascript'%3E%3C/script%3E"));
			</script>
			<script src=" http://hm.baidu.com/h.js?f655f558c510211e38805f6b586e6b15"
			type="text/javascript">
			</script>
		</p>
	</footer>
	<script src="/skin/2014/js/silder.js">
	</script>
	<script type="text/javascript">
		/*图 推广-###*/
		var cpro_id = "u1685956";
	</script>
	<script src="http://cpro.baidustatic.com/cpro/ui/i.js" type="text/javascript">
	</script>
	<script type="text/javascript">
		/*yangqq内文- 创建于 2014-11-27*/
		var cpro_id = "u1831141";
	</script>
	<script src="http://cpro.baidustatic.com/cpro/ui/cnw.js" type="text/javascript">
	</script>
	<div id="BAIDU_SSP__wrapper_u1831141_0">
		<script id="ScriptIdu1831141_0" src="http://pos.baidu.com/rcfm?rdid=1831141&amp;dc=2&amp;exps=113007&amp;di=u1831141&amp;dri=0&amp;dis=0&amp;dai=1&amp;ps=1937x0&amp;dcb=BAIDU_NEW_DUP_INSIDE&amp;dtm=STATIC_JSONP&amp;dvi=0.0&amp;dci=-1&amp;dpt=none&amp;tsr=0&amp;tpr=1470903300449&amp;ti=%E6%9D%A8%E9%9D%92%E4%B8%AA%E4%BA%BA%E5%8D%9A%E5%AE%A2%20-%20%E4%B8%80%E4%B8%AA%E7%AB%99%E5%9C%A8web%E5%89%8D%E7%AB%AF%E8%AE%BE%E8%AE%A1%E4%B9%8B%E8%B7%AF%E7%9A%84%E5%A5%B3%E6%8A%80%E6%9C%AF%E5%91%98%E4%B8%AA%E4%BA%BA%E5%8D%9A%E5%AE%A2%E7%BD%91%E7%AB%99&amp;ari=2&amp;dbv=2&amp;drs=1&amp;pcs=1425x256&amp;pss=1425x1937&amp;cfv=0&amp;cpl=4&amp;chi=2&amp;cce=true&amp;cec=utf-8&amp;tlm=1435901059&amp;rw=320&amp;ltu=http%3A%2F%2Fwww.###%2F&amp;ltr=http%3A%2F%2Fwww.###%2F&amp;ecd=1&amp;psr=1440x900&amp;par=1440x815&amp;pis=-1x-1&amp;ccd=24&amp;cja=false&amp;cmi=6&amp;col=zh-CN&amp;cdo=-1&amp;tcn=1470903300&amp;qn=244973e8a71746dc&amp;tt=1470903300412.42.43.202"
		charset="utf-8">
		</script>
	</div>
</body>

</html>