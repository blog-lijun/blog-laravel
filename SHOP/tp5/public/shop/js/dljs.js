$(function(){
	$("#firstdltxt").keyup(function(){
		if($("#firstdltxt").val().length>=3){
			$(".cha").css("display","block")
		}else if($("#firstdltxt").val().length==0){
			$(".cha").css("display","none")
		}
	})
	$(".cha").click(function(){
		$("#firstdltxt").val("");
		$(".cha").css("display","none")
	})
	$("#seconddltxt").keyup(function(){
		if($("#seconddltxt").val().length>=3){
			$(".cha1").css("display","block")
		}else if($("#seconddltxt").val().length==0){
			$(".cha1").css("display","none")
		}
	})
	$(".cha1").click(function(){
		$("#seconddltxt").val("");
		$(".cha1").css("display","none")
	})
		var v;
		var u;				
		$("#firstdltxt").blur(function(){						
		v = $("#firstdltxt").val();
	
			
	})
		$("#seconddltxt").blur(function(){
					
					u = $("#seconddltxt").val();
						
				})
		$(".txt3").focus(function(){
			$(".txt3").css("border","1px solid #666")
			$(".span0").html("")
		})
		$(".txt3").blur(function(){
			if(v==""){
				$(".txt3").css("border","1px solid #f00")
				$(".span0").html("账号不能为空").css("color","#FF0000")
			}else{
				$(".txt3").css("border","1px solid #ccc")
			}
			
		})
		$(".txt2").focus(function(){
			$(".txt2").css("border","1px solid #666")
			$(".span1").html("")
		})
		$(".txt2").blur(function(){
			if(u==""){
				$(".txt2").css("border","1px solid #f00")
				$(".span1").html("密码不能为空").css("color","#FF0000")
			}else{
				$(".txt2").css("border","1px solid #ccc")
			}
			
		})
		$("#dlbutton").click(function(){
			if(v==localStorage[phoneNumber]&&u==localStorage[phonePwd]||v==localStorage[Email]&&u==localStorage[phonePwd]){
						alert("登陆成功！")
						window.location.href = "index.html";
						var islogin = 1;
						localStorage[isLogin] = "true";
						return true;
			}else if(v==""){
				$(".txt3").css("border","1px solid #f00")
				$(".span0").html("账号不能为空").css("color","#FF0000")
			}
			else if(u==""){
				$(".txt2").css("border","1px solid #f00")
				$(".span1").html("密码不能为空").css("color","#FF0000")
			}
			else{
				$(".txt2").css("border","1px solid #f00")
				$(".span1").html("密码错误").css("color","#FF0000")
				return flase;
			}			
		})
	
	
})
