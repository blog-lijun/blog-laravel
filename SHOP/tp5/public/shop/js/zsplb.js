$(function(){
	//商家中心
		$(".heart").mouseenter(function(){
			$(".kuang1").css("display","block");
			$(".kuang2").css("display","none");
			$(".kuang3").css("display","none");
			$(".list").css({"backgroundColor":"","box-shadow":""})
			$(".heart").css("background","")
		})
		$(".top1").mouseleave(function(){
			$(".kuang1").css("display","none");
		})
		//客户服务
		$(".khfw").mouseenter(function(){
			$(".kuang2").css("display","block");
			$(".kuang1").css("display","none");
		})
		$(".top1").mouseleave(function(){
			$(".kuang2").css("display","none");
		})
		$(".list").mouseenter(function(){
			$(".list").css({"backgroundColor":"#fff","box-shadow":"1px 0 #eee"})
			$(".kuang3").css("display","block");
			$(".heart").css("background","none")
			$(".kuang1").css("display","none");
		})
		$(".top1").mouseleave(function(){
			$(".list").css({"backgroundColor":"","box-shadow":""})
			$(".kuang3").css("display","none");
			$(".heart").css("background","")
		})
		$(".border").mouseenter(function(){
			$(".kuang3").css("display","none");
			$(".list").css({"backgroundColor":"","box-shadow":""})
			$(".heart").css("background","")
		})
		$(".phone").mouseenter(function(){
			$(".erweima").css("display","block");
		})
		$(".phone").mouseleave(function(){
			$(".erweima").css("display","none");
		})
		$(".qiandao").mouseenter(function(){
			$(".qdk").css("display","block");
		})
		$(".qiandao").mouseleave(function(){
			$(".qdk").css("display","none");
		})
		$(".khhead").mouseenter(function(){
		$(".khhead").css("background","#FF464E")
		$(".akhhead").css("background","url(img/tu25.png) -26px top")
		$(".khbox").css({"display":"block"}).stop().animate({
			right:35+'px'
		});
	})
	$(".khhead").mouseleave(function(){
		$(".khhead").css("background","")
		$(".akhhead").css("background","")
		$(".khbox").css({"display":"none"}).stop().animate({
			right:90+'px'
		});
	})
	$(".khbox").mouseenter(function(){
		$(this).css({"display":"block"}).stop().animate({
			right:35+'px'
		});
	})
	$(".khbox").mouseleave(function(){
		$(this).css({"display":"none"}).stop().animate({
			right:70+'px'
		});
	})
	$(".rightcha").click(function(){
		$(".khbox").css({"display":"none"});
	})
	$(".shop0").mouseenter(function(){
		$(".shop0").css("background","#FF464E")
		$(".shop1").css("background","url(img/tu25.png) -26px -20px")
		$(".list1 span").css({"background":"#FFFFFF","color":"#FF464E"})
	})
	$(".shop0").mouseleave(function(){
		$(".shop0").css("background","")
		$(".shop1").css("background","")
		$(".list1 span").css({"background":"","color":""})
	})
	$(".lovesc").mouseenter(function(){
		$(".lovesc").css("background","#FF464E")
		$(".lovesc1").css("background","url(img/tu25.png) -26px -110px")
		$(".mysc").css({"display":"block"}).stop().animate({
			right:35+'px'
		});
	})
	$(".lovesc").mouseleave(function(){
		$(".lovesc").css("background","")
		$(".lovesc1").css("background","")
		$(".mysc").css({"display":"none"}).stop().animate({
			right:70+'px'
		});
	})
	$(".myyhq").mouseenter(function(){
		$(".myyhq").css("background","#FF464E")
		$(".myyhq1").css("background","url(img/tu25.png) -26px -135px")
		$(".myyhq2").css({"display":"block"}).stop().animate({
			right:35+'px'
		});
	})
	$(".myyhq").mouseleave(function(){
		$(".myyhq").css("background","")
		$(".myyhq1").css("background","")
		$(".myyhq2").css({"display":"none"}).stop().animate({
			right:70+'px'
		});
	})
	$(".yjfk").mouseenter(function(){
		$(".yjfk").css("background","#FF464E")
		$(".yjfk1").css("background","url(img/tu25.png) -26px -208px")
		$(".yjfk2").css({"display":"block"}).stop().animate({
			right:35+'px'
		});
	})
	$(".yjfk").mouseleave(function(){
		$(".yjfk").css("background","")
		$(".yjfk1").css("background","")
		$(".yjfk2").css({"display":"none"}).stop().animate({
			right:70+'px'
		});
	})
	$(".rightewm").mouseenter(function(){
		$(".rightewm").css("background","#FF464E")
		$(".rightewm1").css("background","url(img/tu25.png) -26px -159px")
		$(".rightewm2").css({"display":"block"}).stop().animate({
			right:35+'px'
		});
	})
	$(".rightewm").mouseleave(function(){
		$(".rightewm").css("background","")
		$(".rightewm1").css("background","")
		$(".rightewm2").css({"display":"none"}).stop().animate({
			right:70+'px'
		});
	})
	$(".breaktop").mouseenter(function(){
		$(".breaktop").css("background","#FF464E")
		$(".breaktop1").css("background","url(img/tu25.png) -26px -188px")
		$(".breaktop2").css({"display":"block"}).stop().animate({
			right:35+'px'
		});
	})
	$(".breaktop").mouseleave(function(){
		$(".breaktop").css("background","")
		$(".breaktop1").css("background","")
		$(".breaktop2").css({"display":"none"}).stop().animate({
			right:70+'px'
		});
	})
	$(window).scroll(function(){
		var h = $(window).scrollTop();
		if(h>0){
			$(".breaktop").css("display","block");
		}else{
			$(".breaktop").css("display","none");
		}
	
	})
	$(".breaktop").click(function () {
	        $('body,html').animate({ scrollTop: 0 }, 300);
	        return false;
 		});
	
})
//文字无缝轮播
$(document).ready(function(){
			var index = 0;
			var autoTimer = 0;//全局变量 目的实现左右点击同步
			var clickEndFlag = true;//设置每条走完才能再点击

			var oInner = $(".font-inner");
			var oLi = $(".font-inner li");

			//克隆第一个放到最后（实现无缝）
			oLi.eq(0).clone(true).appendTo(oInner);


			var liHeight = $(".scroll-txt").height();//获取视口的高度
			var totalHeight = (oLi.length * oLi.eq(0).height());//获取li的总高度

			//给ul赋值高度
			oInner.height(totalHeight);
			function tab(){
				oInner.stop().animate({
					top: -index * liHeight
				},400,function(){
					clickEndFlag = true;//上一条走完才为true
					if(index == oLi.length) {
						oInner.css({top: 0});
						index = 0;
					}
				})
			}
			function next() {
				index++;
				if(index > oLi.length) {
					index = 0;
				}
				tab();
			}
			function prev() {
				index--;
				if(index < 0) {
					index = oLi.size() -1;//因为index的0 == 第一个Li，减1也就是_index = Li的长度减1
					oInner.css("top",- oLi.size() * liHeight);//当_index为-1时执行这条，也就是走到li的最后一个
				}
				tab();
			}
			
			//自动轮播
			autoTimer = setInterval(next,3000);
			$(".font-inner a").hover(function(){
				clearInterval(autoTimer);
			},function() {
				autoTimer = setInterval(next,3000);
			});
			
		});