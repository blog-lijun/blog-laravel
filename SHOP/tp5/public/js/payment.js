$(function(){
	var goodsStr = localStorage["products"];  //获取本地当中存储的产品信息     字符串对象
	//alert(goodsStr);    
	var goodsObj = JSON.parse(goodsStr);   //将本地中获取的字符串信息转化为产品对象
	
	var proImg = goodsObj.goodImg;   //产品图
	var itemDesc = goodsObj.goodDesc;  //产品描述
	var itemCord = goodsObj.goodId;   //产品编码
	var itemPrice = goodsObj.goodPrice;  //产品单价
	var itemCount = goodsObj.goodCount;  //产品数量
	var totalPrice = itemPrice*itemCount;  //总价
	
	//改变总价格
		totalPrice = itemPrice*itemCount;
		$(".items li>b i").html(totalPrice);
		
		//改变.price当中的内容
		$(".price .p1 span").html(itemCount);
		$(".price .p2 span").html(totalPrice);
		var fee = $(".price .p3 span").html();
		var finalcost = Number(totalPrice) + Number(fee);
		$(".price .p4 span").html(finalcost);
	
		//拼接产品信息，追加到购物车
		$('<li>'+
			'<div class="imgcon"><img src="'+ proImg +'"></div>'+
			'<div class="desc">'+
				'<p>'+ itemDesc +'</p>'+
				'<p>'+ itemCord + '</p>'+
			'</div>'+
			'<span>¥<b>'+ itemPrice +'</b></span>'+
			'<p><em>-</em><input type="text" value="'+ itemCount +'" /><i>+</i></p>'+
			'<b>¥<i>'+ totalPrice +'</i></b>'+
			'<div class="delete">删除</div>'+
		'</li>').appendTo($(".mk2 .product-info .items"));
			

	//点击“-”号，商品数量减少，总价变化
	$(".items li>p em").click(function(){
		//alert(1);
		itemCount = $(this).next().val()
		itemCount--;
		if(itemCount<1){
			itemCount = 1;
		}
		//更新输入框的值
		$(".items li p input").val(itemCount); 
		
		var goodsStr = localStorage["products"];  //重新获取本地当中存储的产品信息     字符串对象   
		//console.log(goodsStr)
		//将数据转换为对象
		var goods = JSON.parse(goodsStr);
		//修改当前对象的数量
		goods.goodCount = itemCount;
		//console.log(goods)
		localStorage["products"] = JSON.stringify(goods);  //重新将产品数据存储到本地
		
		//改变总价格
		totalPrice = itemPrice*itemCount;
		$(".items li>b i").html(totalPrice);
		
		//改变.price当中的内容
		$(".price .p1 span").html(itemCount);
		$(".price .p2 span").html(totalPrice);
		var fee = $(".price .p3 span").html();
		var finalcost = Number(totalPrice) + Number(fee);
		$(".price .p4 span").html(finalcost);
	});
	
	//点击“+”号，商品数量增加,总价变化
	$(".items li>p i").click(function(){
		//alert(1);
		itemCount++;
		//更新输入框的值
		$(".items li>p input").val(itemCount);
		//获取localStorage当中的信息，然后转化为对象，再改变对象的属性值
		var goodsStr = localStorage["products"];   //获取
		var goods = JSON.parse(goodsStr);  //转化为对象
		goods.goodCount = itemCount;   //修改当前对象的goodCount
		localStorage['products'] = JSON.stringify(goods);  //重新将修改过的数据存到本地
		
		//改变总价格
		totalPrice = itemPrice*itemCount;
		$(".items li>b i").html(totalPrice);
		
		//改变.price当中的内容
		$(".price .p1 span").html(itemCount);
		$(".price .p2 span").html(totalPrice);
		var fee = $(".price .p3 span").html();
		var finalcost = Number(totalPrice) + Number(fee);
		$(".price .p4 span").html(finalcost);
	});
	
	
	//点击“删除”，删除商品
	$(".delete").click(function(){
		$(this).parents("li").css("display","none");
	});
	
	//点击“使用新地址”，出现模态框
	$("#newAddress").on("click",function(){
		//alert(1);
		$("#mtk").addClass("active");
		$(".mtkcons").addClass("show");
	})
	
	$(".commit").on("click",function(){
		//alert(1);
		$("#mtk").removeClass("active");
		$(".mtkcons").removeClass("show");
		var province = $("#selectedpro").text();  //省
		var city = $("#selectedcity").text(); //市
		var county = $("#selectedcounty").text(); //县
		var street = $(".street").val();   //街道
		var receiver = $(".receiver").val();   //收件人
		var address = {
			province:province,
			city:city,
			county:county,
			street:street	
		}
		//将对象转化为字符串，存到本地
		var addressStr = JSON.stringify(address);
		localStorage.setItem("address",addressStr);
		
		
		
	})
	
	

})