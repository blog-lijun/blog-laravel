$(function(){
	function lunBo(id,dataUrl){		
		this.bigBox = document.getElementById(id);
		this.innerBox = this.bigBox.querySelector(".inner-box");
		this.left = this.bigBox.querySelector(".left");
		this.right = this.bigBox.querySelector(".right");
		this.ul = this.bigBox.querySelector(".controls ul");
		this.currentIndex = 1;
		this.itemCount;
		this.isContinue = true;
		this.timer;
		this.dataUrl = dataUrl;
		this.yXing();
	}
	lunBo.prototype = {
		yXing:function(){
			this.aJax();
			this.leftAndRight();
			this.auto();
			this.shuBiao();
			
		},
		aJax:function(){//获取数据
			var that = this;
			$.ajax({
				type:"get",
				url:this.dataUrl,
				async:true,
				success:function(data){
					var arr = data.datas;
					that.itemCount = arr.length;
					that.addDivAndLi(arr);
				},
				error:function(mes){
					
				}
			});
		},
		addDivAndLi:function(arr){
			var that = this;
			for(var i=0;i<arr.length;i++){
				if(i==0){
					var div ='<div class="box-item"><a href="'+arr[arr.length-1].target+'"><img src="'+arr[arr.length-1].imgSrc+'"/></a></div>';
					console.log(div);
					$(this.innerBox).prepend(div)
					this.itemCount++;
				}
				var div ='<div class="box-item"><a href="'+arr[i].target+'"><img src="'+arr[i].imgSrc+'"/></a></div>';
				$(this.innerBox).append(div)
//				$(div).appendTo(this.innerBox);
				if(i==arr.length-1){
					var div ='<div class="box-item"><a href="'+arr[0].target+'"><img src="'+arr[0].imgSrc+'"/></a></div>';
					$(div).appendTo(this.innerBox);
					this.itemCount++;
				}
				
				if(i==0){
					$("<li></li>").appendTo(this.ul).addClass("active");
				}else{
					$("<li></li>").appendTo(this.ul);
				}
				var w = $(this.bigBox).width() * that.itemCount + "px";
				var l = -1*$(this.bigBox).width() + "px";
				console.log(l);
				$(this.innerBox).css("width",w);
				$(this.innerBox).css("left",l);
				
				this.lis = this.ul.getElementsByTagName("li");
							
			}
			$("li").click(function(){

					that.currentIndex = $(this).index()+1;
					
//					console.log(that.currentIndex);
					that.changLi();
					that.dianJi();
					that.lunBo();
				})	
		},
		changLi:function(){
			var liIndex = this.currentIndex;
			if(this.currentIndex==0){
				liIndex = this.itemCount -2;						
			}
			if(this.currentIndex==this.itemCount-1){
				liIndex = 1;
			}
			
			$(this.lis).eq(liIndex-1).addClass("active").siblings().removeClass("active"); 
		},
		dianJi:function(){
			var that = this;
			var x = -1*this.currentIndex*$(this.bigBox).width();
			if(this.currentIndex==this.itemCount-1){
				$(this.innerBox).animate({left:x},300,function(){
						that.isContinue = true;
						$(that.innerBox).css("left",-1*$(that.bigBox).width()+'px') 
						that.currentIndex = 1;
						
				})
				}else if(this.currentIndex==0){	
					$(this.innerBox).animate({left:x},300,function(){
						that.isContinue = true;
						$(that.innerBox).css("left",-1*$(that.bigBox).width()*(that.itemCount-2)+'px')
						that.currentIndex = that.itemCount - 2;
						
				})
						
				}else{
					$(this.innerBox).animate({left:x},300)
					that.isContinue = true;
				}
				this.changLi();
				
		},
		leftAndRight:function(){
			var that = this;
			$(this.left).click(function(){
				if(that.isContinue){
					that.currentIndex--;
					that.isContinue = false;
					that.dianJi();
				}

			}) 
			$(this.right).click(function(){
				if(that.isContinue){
					that.currentIndex++;
					that.isContinue = false;
					that.currentIndex%=that.itemCount;
					that.dianJi();
				}
			})
			
		},
		auto:function(){
			var that = this;
			this.timer = setInterval(function(){
				$(that.right).click();
			},3000)
		},
			
			//鼠标事件
		shuBiao:function(){
			var that = this;
			$(this.bigBox).mouseenter(function(){
				$('.left,.right').fadeIn(200);
				clearInterval(that.timer);
			}) 
			$(this.bigBox).mouseleave(function(){
				$('.left,.right').fadeOut(200);
				that.auto();
			}) 
		}
		
		
		
	}
	var lunbo1 = new lunBo("block","json/data.json")
	
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
		$(".b1").mouseenter(function(){
			$(".b1").css({ opacity:0.8});
		})
		$(".b1").mouseleave(function(){
			$(".b1").css({ opacity:1});
		})
		$(".b2").mouseenter(function(){
			$(".b2").css({ opacity:0.8});
		})
		$(".b2").mouseleave(function(){
			$(".b2").css({ opacity:1});
		})
		$(".b3").mouseenter(function(){
			$(".b3").css({ opacity:0.8});
		})
		$(".b3").mouseleave(function(){
			$(".b3").css({ opacity:1});
		})
		$(".b4").mouseenter(function(){
			$(".b4").css({ opacity:0.8});
		})
		$(".b4").mouseleave(function(){
			$(".b4").css({ opacity:1});
		})
		$(".b5").mouseenter(function(){
			$(".b5").css({ opacity:0.8});
		})
		$(".b5").mouseleave(function(){
			$(".b5").css({ opacity:1});
		})

	$(".datadljs1").mouseenter(function(){
		$(".msq1").css({"background":"#FF464E","color":"#fff","border-radius":"3px"})
		$(".datadljs1").css("border","1px solid #ddd")
	})
	$(".datadljs1").mouseleave(function(){
		$(".msq1").css({"background":"","color":""})
		$(".datadljs1").css("border","1px solid #fff")
	})
	$(".datadljs2").mouseenter(function(){
		$(".msq2").css({"background":"#FF464E","color":"#fff","border-radius":"3px"})
		$(".datadljs2").css("border","1px solid #ddd")
	})
	$(".datadljs2").mouseleave(function(){
		$(".msq2").css({"background":"","color":""})
		$(".datadljs2").css("border","1px solid #fff")
	})
	$(".datadljs3").mouseenter(function(){
		$(".msq3").css({"background":"#FF464E","color":"#fff","border-radius":"3px"})
		$(".datadljs3").css("border","1px solid #ddd")
	})
	$(".datadljs3").mouseleave(function(){
		$(".msq3").css({"background":"","color":""})
		$(".datadljs3").css("border","1px solid #fff")
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