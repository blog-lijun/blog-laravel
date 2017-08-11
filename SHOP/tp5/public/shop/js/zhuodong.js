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
		//倒计时
		var end=[] 
		var clockid=[] 
		function clock(){ 
		    setTimeout("clock()", 1000); 
		for (var i=0,j=end.length;i<j;i++){ 
		    time=end[i]-new Date();
			
			var m = Math.round (time / 1000);  
		    var day = parseInt(m/60/60/24);    
		    hour= parseInt ((m % (3600 * 24)) / 3600) 
		    minutes=parseInt ((m % 3600) / 60) 
		    seconds=m % 60; 
		    if (m<0) { 
		        document.getElementById(clockid[i]).innerHTML="活动已结束"; 
		    } else { 
		            document.getElementById(clockid[i]).innerHTML="剩余"+day+"天"+hour+"时"+minutes+"分"+seconds+"秒"; 
		        } 
		    } 
		} 
		setTimeout("clock()", 100);
		end[end.length]=new Date("2016/8/9 18:00:00"); 
		clockid[clockid.length]="jsq" 
		end[end.length]=new Date("2016/8/15 19:30:00"); 
		clockid[clockid.length]="jsq1" 
		end[end.length]=new Date("2016/8/23 21:59:59"); 
		clockid[clockid.length]="jsq2" 
		end[end.length]=new Date("2016/8/19 18:00:00"); 
		clockid[clockid.length]="jsq3" 
		end[end.length]=new Date("2016/8/11 19:30:00"); 
		clockid[clockid.length]="jsq4" 
		end[end.length]=new Date("2016/8/20 21:59:59"); 
		clockid[clockid.length]="jsq5" 
		end[end.length]=new Date("2016/8/8 19:30:00"); 
		clockid[clockid.length]="jsq6" 
		end[end.length]=new Date("2016/8/17 21:59:59"); 
		clockid[clockid.length]="jsq7" 
		//分页
		var pageSize = 7; //每页的数据量
			var totalSize = 0; //总数据量
			var flag = true;
			getData(1);
	function getData(p){
	$.ajax({
		type:"get",
		url:"json/huodong.json",
		async:true,
		success:function(data){
			var arr=data.datas;
			totalSize = arr.length;
				      		//每个页面 40条数据
				      		//数量量  pageSize = 6;
				      		//1.  1 2 3...40
				      		//2.  41 42...80
				      		//3.  80......120
				      		//..
				      		//当前页码     数据量 2个
				      		//start     end
				      		var end = p*pageSize; 
				      		end=end>totalSize?totalSize:end;
				      		var start=p*pageSize - (pageSize-1);
				      		//$(".box-big").empty();
					for(var i = start;i<=end;i++){
						var currentObj = data.datas[i-1];
						$(
							'<dl class="gooddl">'+
								'<dt>'+'<img src="img/'+currentObj.img+'"/>'+'</dt>'+
								'<dd>'+
									'<p class="ming">'+
										'<span class="by">'+'[包邮]'+'</span>'+
										'<a href="#" class="goodname">'+currentObj.name+'</a>'+
										'<b class="sx">'+'上新'+'</b>'+
									'</p>'+
									'<p class="jia">'+
										'<span class="yuan">'+'¥'+'</span>'+
										'<b class="qian">'+currentObj.money+'</b>'+
										'<strong class="yuanjia">'+currentObj.yuanmoney+'</strong>'+
										'<i class="zhe">'+currentObj.zhekou+'</i>'+
										'<a class="gopinpai" href="#">'+'品牌'+'</a>'+
										'<a class="none" href="shangpinxiangqing.html">'+'逛品牌'+'</a>'+
										'<a class="sc" href="#">'+'</a>'+
									'</p>'+
								'</dd>'+
							'</dl>'
						).appendTo($(".box-big"))
					}
					var pageCount = Math.ceil(totalSize/pageSize);
							if(flag){
								flag = false;
								createPaeBar(pageCount)
							}
						
					shoucang();
			
		},
		error:function(mes){
			alert("mes")
		}
	})
}
	function createPaeBar(pageCount){
				//后端会给你返回，总页数，起始页，终止页
				$("#pagination").createPage({
						pageCount:pageCount, //总页数	        
						current:1,  //当前页码
						backFn:function(p){  //回调函数 ，点击当前页的回调函数
							getData(p)
						}
				});
				      		//console.log(data)
			}
	function shoucang(){
		
		$(".gooddl").mouseenter(function(){
 				$(this).css("border","1px solid #ddd")
 				$(this).find(".none").css("display","block")
 				$(this).find(".sc").css("display","block")
 				
 })
		$(".gooddl").mouseleave(function(){
 				$(this).css("border","1px solid #f6f6f6")
 				$(this).find(".none").css("display","none")
 				$(this).find(".sc").css("display","none")
 	
 })
		
	}
	$(".first").mouseenter(function(){
		$(this).css({ opacity:0.7});
	})
	$(".first").mouseleave(function(){
		$(this).css({ opacity:1});
	})
	$(window).scroll(function(){
		if($(this).scrollTop()>157){
			$(".cd").stop(true,true).fadeIn();
		}else{
			$(".cd").stop(true,true).fadeOut();
		}
	})
	
