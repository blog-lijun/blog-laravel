			var pageSize = 40; //每页的数据量
			var totalSize = 0; //总数据量
			var flag = true;
			getData(1);
	function getData(p){
	$.ajax({
		type:"get",
		url:"json/list.json",
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
										'<a class="none" href="http://127.0.0.1:8022/juanpi2/shangpinxiangqing.html">'+'逛品牌'+'</a>'+
										'<a class="sc" href="#">'+'</a>'+
										'<a class="jiaobiao" href="#">'+'</a>'+
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

