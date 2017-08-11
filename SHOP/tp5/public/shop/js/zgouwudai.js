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
								'<a class="jian0 jian jian1" href="#">-</a>'+
								'<span class="num">'+currentObj.pCount+'</span>'+
								'<a  class="add add0">+</a>'+
								'<span class="tishi">限购<i class="number">5</i>件</span>'+
							'</div>'+
							'<p class="xjbox">'+
								'<span class="xjmoney">'+'¥'+'<i class="spzh">'+currentObj.pCount*currentObj.prcie+'</i>'+'</span>'+
							'</p>'+
							'<a  class="delete" href="#"></a>'+
						'</div>'+
					'</div>').appendTo($(".shopping1"))

					}
				}
				
			
			$(".num").each(function(i,e){
				
				$(".add0").eq(i).click(function(){
				zong();
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
					zong();
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
					zong();
				})
				
				})
				
			})
			
					var sum=0;
					$(".xjmoney").each(function(i,e){
						var a = parseFloat($(".spzh").eq(i).text());
						sum+=a;
						$(".zj").text(sum);
					})
			function zong(){
				var zong=0;
					$(".num").each(function(i,e){
						var nn = parseInt($(".num").eq(i).text());
						zong+=nn;
						$(".list1>span").text(zong);
					})
				}
				zong();
			
			
		/*if(localStorage.getItem("pros")){
			var result = localStorage.getItem("pros");
			var data = JSON.parse(result);
//			console.log(data);
//			var len = data.length;
//			console.log(len)
			for(var i in data){
				
				$(".shopping").css("display","block")
						$('<div class="shopgood">'+
						'<div class="addshop">'+
							'<img src="'+data[i].proImg+'"/>'+
							'<ul class="shopgoodsnews">'+
								'<li class="goodname">'+'<a href="#">'+data[i].proName+'</a></li>'+
								'<li>颜色分类：'+data[i].proColor+'</li>'+
								'<li>尺码：'+data[i].proSize+'</li>'+
							'</ul>'+
							'<p class="goodsmoney">'+
								'<span class="gmoney">¥'+data[i].proPrice+'</span>'+'</br>'+
								'<span class="goodsyj">'+data[i].Proyuanjia+'</span>'+
							'</p>'+
							'<div class="goodssl">'+
								'<a class="jian0 jian jian1" goodId="'+i+'" href="#">-</a>'+
								'<span class="num" id="num'+i+'">'+data[i].proNum+'</span>'+
								'<a  class="add add0" goodId="'+i+'">+</a>'+
								'<span class="tishi">限购<i class="number">5</i>件</span>'+
							'</div>'+
							'<p class="xjbox">'+
								'<span class="xjmoney">'+'¥'+'<i class="spzh">'+data[i].proNum*data[i].proPrice+'</i>'+'</span>'+
							'</p>'+
							'<a  class="delete onclick="del('+i+')" href="#"></a>'+
						'</div>'+
					'</div>').appendTo($(".shopping1"))
				
			}
		}*/
				
				/*$("#carData").append('<img src="'+data[i].proImg+'" style="width: 100px;height: auto;"/>'+
					data[i].proName+
					data[i].proColor+
					'￥'+data[i].proPrice+
					'<button goodId="'+i+'" onclick="sub(0,'+i+')">-</button>'+
					'<input type="text" name="" id="num'+i+'" value="'+data[i].proNum+'" readonly/>'+
					'<button  goodId="'+i+'" onclick="sub(1,'+i+')">+</button>'+
					'<span onclick="del('+i+')">删除</span><br>');
			}*/
			
			
			/*function sub(type,id){
				var num = $("#num"+id).html();
//				alert(id)
				switch (type){
					case 0:
						var newNum = num-1;
						if(newNum <1){
							//提醒用户
//							$("#num"+id).val(newNum);
							$("#num"+id).html(1);
						}else{
							$("#num"+id).html(newNum);
						}
						
						updateData(id,newNum);
//						updataTotalPrice();
						break;
					case 1:
						var newNum = num - (-1);
						$("#num"+id).html(newNum);
						updateData(id,newNum);
						break;
					default:
						break;
				}
			}
			
			function updateData(id,newNum){
				var result = localStorage.getItem("pros");
				var data = JSON.parse(result);
				data[id].proNum = newNum;
				console.log(data[1].proNum)
				console.log(data)
				var str = JSON.stringify(data);
				localStorage.setItem("pros",str)
				
			}
			function del(id){
				var result = localStorage.getItem("pros");
				var data = JSON.parse(result);
				data[id] = null;
				var str = JSON.stringify(data);
				localStorage.setItem("pros",str)
			}
			
			
		}/*else{
			$(".null").css("display","block");
		}	
			*/
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		//20分钟倒计时
		$(function(){
		    var m=19;
		    var s=59;
		    setInterval(function(){
		        if(s<10){
		            $('#time').html(m+'分0'+s+'秒');
		        }else{
		            $('#time').html(m+'分'+s+'秒');
		        }
		        s--;
		        if(s<0){
		            s=59;
		            m--;
	        }
    },1000)
})
			
		
	})

































