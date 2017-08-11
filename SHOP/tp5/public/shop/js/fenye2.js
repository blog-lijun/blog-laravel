			var pageSize = 82; //每页的数据量
			var totalSize = 0; //总数据量
			var flag = true;
			getData(1);
	function getData(p){
	$.ajax({
		type:"get",
		url:"json/splb.json",
		async:true,
		success:function(data){
			var arr=data.datas;
			totalSize = arr.length;
				      		//每个页面 2条数据
				      		//数量量  pageSize = 3;
				      		//1.  1 2 3
				      		//2.  4 5 6
				      		//3.  7 8 9
				      		//..
				      		//当前页码     数据量 2个
				      		//start     end
				      		var end = p*pageSize; 
				      		end=end>totalSize?totalSize:end;
				      		var start=p*pageSize - (pageSize-1);
				      		$(".box-big").empty();
					for(var i = start;i<=end;i++){
						var currentObj = data.datas[i-1];
						$(
							'<dl class="gooddl" pid="'+currentObj.pid+'">'+
								'<dt>'+'<img src="img/'+currentObj.jimg+'"/>'+'</dt>'+
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
										'<a class="none" href="javascript:void(0)">'+'购物袋'+'</a>'+
										'<a class="sc" href="#">'+'</a>'+
									'</p>'+
								'</dd>'+
							'</dl>'
						).appendTo($(".box-big"))
						$(".none").each(function(i,e){
							$(e).click(function(){
								console.log($(".goodsnum").text())
								//var kn=parseInt((".goodsnum").text());
								//$(".goodsnum").text(kn+1);
							})
						})
		
					}
					var pageCount = Math.ceil(totalSize/pageSize);
							if(flag){
								flag = false;
								createPaeBar(pageCount)
							}
						
					shoucang();
					gwc();
				
			
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
		$(".qiangguangle").mouseenter(function(){
			$(this).find(".sc").css({"display":"none","position":"absolute","bottom":"0","z-index":"15"})
		})
		
	}

function gwc(){
				$(".none").click(function(){
					confirm("亲，确定加入购物袋吗？")
					var productsStr = localStorage["products"];
					if(!productsStr){ //表示目前本地当中还没有创建 数据的容器
						localStorage["products"] = '[]';
					}
					//在添加数据之前必须保证本地有能管理数据的 容器
					//如果容器当中有存在过的该种类的产品，所要做的是改变该产品的数量。  否则，创建该种类对象存放在容器当中。
					//再获取一次，因为productsStr第一次获取的时候，可能是undefined
					productsStr = localStorage["products"]; //获取字符串的json
					var productsObj = JSON.parse(productsStr);
					//[{},{},{}]  //数组对象
				  //li jquery对象
					var li = $(this).parent().parent().parent(); 
					console.log(li)
					var dd = $(this).parent().parent(); //li jquery对象
					var pid = li.attr("pid");  //产品的编号
					//循环遍历容器中的数据，判断是否已经存在该商品，若存在，改变商品的数量。否则，添加一条相关该产品的数据（对象{}）
					for(var i = 0;i<productsObj.length;i++){
						//表示当前的正则遍历的产品对象
						var currentObj = productsObj[i];
						if(currentObj.pid==pid){//已经存在该商品
							//改变该商品的数量
							productsObj[i].pCount = parseInt(productsObj[i].pCount) + 1;
							//把改变后的数组的对象转换成 字符串Json存在在本地当中
							localStorage["products"] = JSON.stringify(productsObj);
							return;
						}
					}
					//图片路径
					var pImgSrc = li.find("dt").eq(0).find("img").eq(0).attr("src");
					//产品名称
					var pName = dd.find("p").eq(0).find("a").eq(0).text();
					//产品价格
					var prcie = dd.find("p").eq(1).find("b").eq(0).text();
					//产品描述
					var pyj = dd.find("p").eq(1).find("strong").eq(0).text();
					//组织好改产品数据
					var pObj = {pid:pid,pImgSrc:pImgSrc,pName:pName,prcie:prcie,pyj:pyj,pCount:1};
					productsObj.push(pObj);
					//把改变后的数组的对象转换成 字符串Json存在在本地当中
					localStorage["products"] = JSON.stringify(productsObj);
					
					
					
				})
			}
