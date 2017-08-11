$(function(){
				//读取本地数据
				var i;
				var productsStr = localStorage["products"];
				if(!productsStr){
					localStorage["products"] = '[]';
				}
				productsStr = localStorage["products"];
				//转换成数组对象
				var productsObj = JSON.parse(productsStr);
				//productsObj []
				if(productsObj.length==0){
					$(".null").css("display","block");
					
				}else{
					$(".jiesuan").addClass("duidui");
					for(var i = 0;i<productsObj.length;i++){
						var currentObj = productsObj[i];
						$(".add0").click(function(){
						currentObj.pCount = parseInt(currentObj.pCount) + 1;
						localStorage["products"] = JSON.stringify(productsObj);
						return;
					
					})
						
						$(".shopping").css("display","block")
						$('<div class="shopgood">'+
						'<div class="addshop">'+
							'<img src="'+currentObj.pImgSrc+'"/>'+
							'<ul class="shopgoodsnews">'+
								'<li class="goodname">'+'<a href="#">'+currentObj.pName+'</a></li>'+
								'<li>颜色分类：白色</li>'+
								'<li>尺码：L（大码）</li>'+
							'</ul>'+
							'<p class="goodsmoney">'+
								'<span class="gmoney">¥'+currentObj.prcie+'</span>'+'</br>'+
								'<span class="goodsyj">'+currentObj.pyj+'</span>'+
							'</p>'+
							'<div class="goodssl">'+
								
								'<span class="num">'+currentObj.pCount+'</span>'+
								
							'</div>'+
							'<p class="xjbox">'+
								'<span class="xjmoney">'+'¥'+'<i class="spzh">'+currentObj.pCount*currentObj.prcie+'</i>'+'</span>'+
							'</p>'+
							
						'</div>'+
					'</div>').appendTo($(".shopping1"))

					}
				}
				
			
			$(".num").each(function(i,e){
				
				$(".add0").eq(i).click(function(){
				
				var va=parseInt($(e).html())+1
				$(e).html(va);
				var val=productsObj[i].prcie;
				var zj=val*va
				
				productsObj[i].pCount = va;
				localStorage["products"] = JSON.stringify(productsObj);
				$(".spzh").eq(i).html(zj)
				$(".jian").eq(i).removeClass("jian1")
			if($(e).html()>5){
				$(".tishi").eq(i).css("display","block")
				$(e).html(5);
				var zj=val*5
				$(".spzh").eq(i).html(zj)
				productsObj[i].pCount = 5;
				localStorage["products"] = JSON.stringify(productsObj);
				$(".add").eq(i).addClass("jian1")
			}
			var sum=0;
					$(".xjmoney").each(function(i,e){
					var a = parseFloat($(".spzh").eq(i).text())
					sum+=a;
					$(".zj").text(sum)
				})
		})
			$(".jian0").eq(i).click(function(){
					
					var va=parseInt($(e).html())-1
					$(e).html(va);
					var val=productsObj[i].prcie;
					var zj=val*va
					$(".spzh").eq(i).html(zj)
					productsObj[i].pCount = va;
					localStorage["products"] = JSON.stringify(productsObj);
					$(".add0").eq(i).removeClass("jian1")
				if($(e).html()<5){
					$(".tishi").eq(i).css("display","none")
			
				}
				if($(e).html()<1){
					$(".jian").eq(i).addClass("jian1")
					$(e).html(1);
					var zj=val*1
					$(".spzh").eq(i).html(zj)
					productsObj[i].pCount = 1;
					localStorage["products"] = JSON.stringify(productsObj);
				}
				var sum=0;
					$(".xjmoney").each(function(i,e){
					var a = parseFloat($(".spzh").eq(i).text())
					sum+=a;
					$(".zj").text(sum)
				})
			})
			
		})
			
		
			$(".shopgood").each(function(i,e){
				$(".delete").eq(i).click(function(){
					var index=this.index;
					$(e).remove()
					var productsObj = JSON.parse(productsStr);
					productsObj.splice(index-1,1);
					localStorage["products"] = JSON.stringify(productsObj);
					var sum=0;
					$(".xjmoney").each(function(i,e){
					var a = parseFloat($(".spzh").eq(i).text())
					sum+=a;
					$(".zj").text(sum)
				})
				
				})
				
			})
			
					var sum=0;
					$(".xjmoney").each(function(i,e){
					var a = parseFloat($(".spzh").eq(i).text())
					sum+=a;
					$(".zj").text(sum)
				})
				})
			$(".xinzengdizhi").click(function(){
				$(".zfusernews").addClass("displayblock")
			})
			$(".qx").click(function(){
				$(".zfusernews").removeClass("displayblock")
			})
			/*----------获取收货信息----------*/
			var username;
			var usernumber ;
			var userplace;
			$(".bc").click(function(){
				username = $("#shouhuoren").val();
				usernumber = $("#tel").val();
				userplace = $(".sf").val()+"  "+$(".cs").val()+"  "+$(".qy").val()+"  "+$(".jddz").val();
				localStorage.setItem(userName,username);
				localStorage.setItem(userNumber,usernumber);
				localStorage.setItem(userPlace,userplace);
				if($(".szmrzd")[0].checked){
					$(".mrdz").before($(
					'<div class="mrdz0">'+
						'<p class="zfname">'+localStorage[userName]+'<span class="shou">收</span></p>'+
						'<p class="zfplace">'+localStorage[userPlace]+'</p>'+
						'<p class="zfphonenum">'+localStorage[userNumber]+'<span class="xg">修改</span></p>'+
						'<p class="merendizhi">默认地址</p>'+
						'<p class="duihao"></p>'+
					'</div>'
				))
					$(".mrdz").addClass("mrdz1");
					$(".mrdz").find(".merendizhi").css("display","none");
					$(".mrdz").find(".duihao").css("display","none");
				}else{
					$(".mrdz").after($(
					'<div class="mrdz1">'+
						'<p class="zfname">'+localStorage[userName]+'<span class="shou">收</span></p>'+
						'<p class="zfplace">'+localStorage[userPlace]+'</p>'+
						'<p class="zfphonenum">'+localStorage[userNumber]+'<span class="xg">修改</span></p>'+
						'<p class="duihao dhnone"></p>'+
					'</div>'
				))
					color();
				}
				$(".zfusernews").removeClass("displayblock")
			})
		function color(){
			$(".mrdz1").click(function(){
				alert(1)
				$(".dhnone").css("display","block")
				$(".duihao1").css("display","none")
			})
		}
		

$(function(){
	$(".qjs").click(function(){
		$(".motaikuang").css({"display":"block"})
		$(".kqtx").css({"display":"block"})
	})
	
})
$(".mmqr").click(function(){
if($(".shurumima").val()==localStorage[phonePwd]){
	
		window.location.href = "zhifuchenggong.html";
	
}else{

		$(".mmerror").css("visibility","visible")
		$(".shurumima").css("border","1px solid #f00")
}
})
	$(".shurumima").focus(function(){
	      $(".mmerror").css("visibility","hidden")
	      $(".shurumima").css("border","1px solid #ccc")
	})

$(".mmqx").click(function(){
	$(".shurumima").val()==""
	$(".motaikuang").css({"display":"none"})
	$(".mmerror").css("visibility","hidden")
	$(".shurumima").css("border","1px solid #ccc")
	
})
