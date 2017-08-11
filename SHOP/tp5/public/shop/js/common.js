var Email="email"
var phoneNumber = "phoneNumber";//
var phonePwd = "phonePwd";//
var isLogin = "isLogin";//
var userName = "username";
var userNumber = "usernumber";
var userPlace = "userplace";


$(function(){
	$("#head").load("top.html",function(){
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
		 $(".user").mouseenter(function(){
 			$(".namexll").addClass(" display")
 		})
  		$(".user").mouseleave(function(){
 			$(".namexll").removeClass(" display")
 		})

		var pnumber = localStorage[phoneNumber];
		var islogin = localStorage[isLogin];
		if(islogin){
			if(islogin=="true"){
				if(!localStorage[Email]){
					$(".username").html(localStorage[phoneNumber]);
					$(".mmd").html("您好，"+'<a class="rightdl">'+localStorage[phoneNumber]+'</a>');
					
				}else{
					$(".username").html(localStorage[Email]);
					$(".mmd").html("您好，"+'<a class="rightdl">'+localStorage[Email]+'</a>');
				}
				
				$(".top").css({display:"none"});
				$(".topcopy").css({display:"block"});	
			}
			$(".tc").click(function(){
				localStorage[isLogin] = "false";
				$(".top").css({display:"block"});
				$(".topcopy").css({display:"none"});
				$(".mmd").html('快来'+'<a class="rightdl" href="denglu.html">'+'登录'+'</a>'+'吧！么么哒!');
			})
		}
	});
});

