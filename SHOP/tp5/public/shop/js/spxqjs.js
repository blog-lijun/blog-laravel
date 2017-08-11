$(function(){
	$(".lis").mouseenter(function(){
		var index = $(this).index();
			$(".lis").eq(index).addClass("bordergrap").siblings().removeClass("bordergrap");
			$("img").eq(index+5).addClass("block").siblings().removeClass("block");
	})
	$(".Beijin,.bottomjiao,.place1").mouseenter(function(){
		$(".place1").css("display","block")
	})
	$(".Beijin,.bottomjiao,.place1").mouseleave(function(){
		$(".place1").css("display","none")
	})
	$(".place1").find("a").click(function(){
		var index = $(this).index();
		var place = $(".place1").find("a").eq(index).html()
		$(".beijing").html(place);
		$(".place1").css("display","none");
	})
	$(".col").click(function(){
		$(this).css({"border":"2px solid #FF464E","color":"#FF464E","padding":"0"}).siblings().css({"border":"","color":"","padding":"1"})
		
	})
	$(".cmdx").click(function(){
		$(this).css({"border":"2px solid #FF464E","color":"#FF464E","padding":"0"}).siblings().css({"border":"","color":""})
		
	})

		$(".add").click(function(){
			
				var va=parseInt($(".num").html())+1
				$(".num").html(va);
				$(".jian").removeClass("jian1")
			if($(".num").html()>5){
				$(".tishi").css("display","block")
				$(".num").html(5);
				$(".add").addClass("jian1")
			}
		})
		$(".jian").click(function(){
				
					var va=parseInt($(".num").html())-1
					$(".num").html(va);
					$(".add").removeClass("jian1")
				if($(".num").html()<5){
					$(".tishi").css("display","none")
				}
				if($(".num").html()<1){
					$(".jian").addClass("jian1")
					$(".num").html(1);
				}
			})
	
		$(".xiaobao").mouseenter(function(){
			var i=$(this).index();
			$(this).addClass('xiaobao'+[i-2])//.siblings().removeClass('xiaobao'+[i-2]);
			$(".tu").eq(i-2).addClass("block1").siblings().removeClass("block1");
			
		})
		$(".xiaobao").mouseleave(function(){
			var i=$(this).index();
			$(this).removeClass('xiaobao'+[i-2])	
		})
		//吸顶
		$(window).scroll(function(){
				var hr = $(this).scrollTop();
				if(hr>890){
	            $(".xidinghe").stop(true,true).fadeIn();  
	        }  else {
	            $(".xidinghe").stop(true,true).fadeOut();
	        }	
		})
		$(".news").click(function(){
			var j=$(this).index();
			$(".news").eq(j).addClass("news1").siblings().removeClass("news1")
		})
		$(".news").click(function(){
			var j=$(this).index();
			$(".news").eq(j).addClass("news1").siblings().removeClass("news1")
		})
		$(".news,.xqq").click(function(){
			var j=$(this).index();
			$(".xqq").eq(j).addClass("news1").siblings().removeClass("news1")
		})
		$(".xqq").click(function(){
			var j=$(this).index();
			$(".xqq").eq(j).addClass("news1").siblings().removeClass("news1")
		})
		
})
var proColor = "";
var proSize = "";
var proImg = "img/spxq20.jpg";
$(".ulcolor>li").on("click",function(){
	proColor = $(this).text();
});
$(".size>p").on("click",function(){
	proSize = $(this).text();
});
$(".gwd").on("click",function(){
	
	if(proColor == ""){
		alert("必须选择一种颜色");
		return false;
	}else if(proSize == ""){
		alert("必须选择尺寸大小");
		return false;
	}else{
		var proName = $(".name1").text();
		var proNum = $(".num").text();
		var proPrice = $(".qian").text();
		var proYuanjia = $(".yuanjia").text();
		var pro = new Object();
		pro.proName = proName;
		pro.proImg = proImg;
		pro.proPrice = proPrice;
		pro.proSize = proSize;
		pro.proColor = proColor;
		pro.proNum = proNum;
		var proYuanjia = proYuanjia;
		var proStr = JSON.stringify(pro);
		console.log(proStr);
		
		if(localStorage.getItem("pros")){
			var proData = localStorage.getItem("pros");
			console.log(proData)
		}else{
			localStorage.setItem("pros",proStr);
		}
	}
});