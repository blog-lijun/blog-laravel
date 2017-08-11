function $(id){
	return document.getElementById(id);
}

var regs = {
	photo:/^(1(([3578][0-9])|(47)))\d{8}$/,
	pwdNumber:/\d/,
	pwdWord:/[a-zA-Z]/,
}
function getPwdLevel(pwd){
	var level = 0;
	var numReg = true;  //是否含有数字标识
	var strReg = true;  //是否含有字母标识
	var tsReg = true; //是否含有特殊标识
	for(var i = 0;i<pwd.length;i++){
		if(regs.numReg.test(pwd[i])&&numReg){
			level+=1;
			numReg = false;
			continue;
		}
		if(regs.strReg.test(pwd[i])&&strReg){
			level+=1;
			strReg = false;
			continue;
		}
		if(!regs.strReg.test(pwd[i])&&tsReg){
			level+=1;
			tsReg = false;
			continue;
		}
	
		
	}
	return level;
}
window.onload = function(){
	
	var mobile = $("mobile");  //电话
	var pwd = $("pwd");//密码
	var pwd2 = $("pwd2");//确认密码
	var btn = $("btn"); //按钮 
	var ck = $("ck"); 
	/*----------手机号码验证----------*/
		mobile.onfocus = mobile.onblur = mobile.onkeyup = function(e){
		ent = window.event||e;
		photoo(ent);
		}
		function photoo(e1){  //e1事件对象
		var type;  //文本框事件类型
		if(e1){
			type =e1.type;
		}
		var v = mobile.value; //文本框的值
			var tp = mobile.parentNode; //文本框容器节点对象tp
			var tip = tp.nextElementSibling;//提示信息容器节点对象
			var span = tip.lastElementChild; //存放提示信息文本的节点对象
			var emd = document.getElementById("emd");
			var emd1 = document.getElementById("emd1");
			var emd2 = document.getElementById("emd2");
		if(type=="focus"){
	
					emd.className = "emd"
					tp.className = "tp";
					//显示图标
					tip.className = "tip";
					//提示信息
					mobile.className = "mobile act1";
				span.innerHTML = "请输入11位手机号码"
				return false;
			
		}
		if(type=="blur"){
			if(v.length==0){
					tp.className = "tp";
					emd.className = "emd cuo"
					tip.className = "tip error";
					mobile.className = "mobile act";
					span.innerHTML = "请输入手机号码"
					return false;
			}else if(!regs.photo.test(v)){
				mobile.className = " mobile act";
					tip.className = "tip error";
					emd.className = "emd cuo"
					span.innerHTML = "请输入正确的手机号码"
					return false;
				}else if(regs.photo.test(v)){
					emd.className = "emd dui"
					mobile.className = "txt";
					tip.className = "tip hide";
				}
			
		}
		
			/*--------其他情况-------*/
			if(v.length==0){  //如果文本框为空
				tp.className = "tp";
				emd.className = "emd cuo"
				tip.className = "tip error";
				mobile.className = "mobile act";
				span.innerHTML = "请输入手机号码";
				return  false;
		}else if(regs.photo.test(v)){
					return true;
		} 
		
	}

		/*-------------创建密码-------------*/
		function gett(pwd){  
		var t = 0;
		var isNumber= true;  //是否含数字
		var isWord = true; //是否含字母
		var isOther = true;//是否含其他字符
		for(var i = 0;i<pwd.length;i++){
			if(regs.pwdNumber.test(pwd[i])){//如果含数字
				if(isNumber){
					t++;
					isNumber = false;
				}
				
			}else if(regs.pwdWord.test(pwd[i])){//如果含字母
				if(isWord){
					t++;
					isWord= false;
				}
				
			}else{
				if(isOther){//如果含其他字符（每执行一个if，t加1）
					t++;
					isOther= false;
				}
				
			}
		}
		return t;
	  }
		pwd.onfocus = pwd.onblur = pwd.onkeyup = function(e){
			var ent = window.event||e; //事件对象
			checkPwd(ent);
		}
		function checkPwd(e1){  //e1事件对象
			var type;  //文本框事件类型
			if(e1){
				type =e1.type;
			}
			var v = pwd.value;  //文本框的值
			var tp = pwd.parentNode; //tp节点对象
			var tip = tp.nextElementSibling; //提示信息节点容器节点对象
			var span = tip.lastElementChild; //提示信息节点对象
			if(type=="focus"){ //onfoucs事件 
				if(v.length<6||v.length>16){
					emd1.className = "emd1"
					tp.className = "tp";
					//显示图标
					tip.className = "tip";
					//提示信息
					pwd.className = "pwd act1";
					span.innerHTML = "6-16个数字、字母或符号，字母区分大小写"
					return false;
				}else{
					emd1.className = "emd1"
					pwd.className = "pwd act1";
				}
			}
			if(type=="blur"){  //onblur
				if(v.length==0){ //空
					tp.className = "tp";
				emd1.className = "emd1 cuo"
				tip.className = "tip error";
				pwd.className = "pwd act";
				span.innerHTML = "请输入密码"
				return false;
				}else{ //如果文本不为空
					if(v.length<6||v.length>16){
						pwd.className = " pwd act";
						tip.className = "tip error";
						emd1.className = "emd1 cuo"
						span.innerHTML = "密码规格不符合范围";
						return false;
					}else{
						var t = gett(v);
						emd1.className = "emd1 dui";
						pwd.className = "txt";
					}
				}
			}
			/*其他情况*/
			if(v.length==0){  //如果文本框为空
				tp.className = "tp";
				emd1.className = "emd1 cuo"
				tip.className = "tip error";
				pwd.className = "pwd act";
				span.innerHTML = "请输入密码";
				return false;
			}else{ //不为空
				if(v.length<6||v.length>16){  //如果长度小于6，大于20，执行以下代码
						
						return false;
				}else{  //长度符合
						var t = gett(v);
						switch(t){
							case 1:    //弱t=1;
								/*span.innerHTML = '<img src=" '+ 'img/ruo.png '+ ' "/>'//弱图标*/
								tip.className = "tip ruo";//中图标
								span.innerHTML = "";
							break;
							case 2://中t=2;
								tip.className = "tip zhong";//中图标
								span.innerHTML = "";
							break;
							case 3://强t=3;
								tip.className = "tip qiang";//强图标
								span.innerHTML = "";
							break;
						}
						
						
						
						return true;
						
				}
			
		}
	}
		/*-------------- 确认密码--------------*/
		pwd2.onfocus = pwd2.onblur = pwd2.onkeyup = function(e){
		ent = window.event||e;
		checkPwd2(ent);
		}
		function checkPwd2(e1){  //e1事件对象
		var type;  //文本框事件类型
		if(e1){
			type =e1.type;
		}
		var v = pwd2.value; //文本框的值
		var v1 = pwd.value; 
		var tp = pwd2.parentNode; //文本框容器节点对象tp
		var tip = tp.nextElementSibling;//提示信息容器节点对象
		var span = tip.lastElementChild; //存放提示信息文本的节点对象
		/*如果是获取焦点事件*/
		if(type=="focus"){
	
					emd2.className = "emd2"
					tp.className = "tp";
					//显示图标
					tip.className = "tip";
					//提示信息
					pwd2.className = "pwd2 act1";
					emd2.className = "emd2"
				span.innerHTML = "请再次输入密码"
				return false;
			
		}
		if(type=="blur"){
			if(v.length==0){
				tp.className = "tp";
					emd2.className = "emd2 cuo"
					tip.className = "tip error";
					pwd2.className = "pwd2 act";
					span.innerHTML = "请输入确认密码"
					return false;
			}else if(v!=v1){
				tp.className = "tp";
				emd2.className = "emd2 cuo"
				tip.className = "tip error";
				pwd2.className = "pwd2 act";
					span.innerHTML = "两次密码输入不一致"
					return false;
				}else if(v==v1){
					pwd2.className = "txt"
					emd2.className = "emd2 dui"
					tip.className = "tip hide";
				}
			
		}
		
			/*--------其他情况-------*/
			if(v.length==0){  //如果文本框为空
				tp.className = "tp";
				emd2.className = "emd2 cuo"
				tip.className = "tip error";
				pwd2.className = "pwd2 act";
				span.innerHTML = "请输入确认密码";
				return  false;
			}else if(v==v1){
					return true;
			}
		
	}
	/*-------------提交------------*/
	btn.onclick = function(){
			var tp = ck.parentNode; //tp节点对象
			var tip = tp.nextElementSibling; //提示信息节点容器节点对象
			var span = tip.lastElementChild; //提示信息节点对象
			if(ck.checked){ //同意
			if(	
				photoo()&&
				checkPwd()&&
				checkPwd2()	
				
			){
				
				//var userName = document.getElementById("userName").value;
				//var userName = $("#userName").val();
				//注册成功之后，把用户名存在本地
				//localStorage["userName"] = userName;
				//session（会话）  后端
				if(confirm("注册成功！")){
					var phonenumber = mobile.value;
					var userpwd = pwd.value;
					localStorage.setItem(phoneNumber,phonenumber);
					localStorage.setItem(phonePwd,userpwd);
					localStorage.setItem(isLogin,"false");
					console.log(localStorage)
					window.location.href = "denglu.html"      //session（会话）  后端	
				}
			
				
				//location.href = "http://127.0.0.1:8022/juanpi/denglu.html"
			
			}	
		}else{
			alert("请选中用户协议！")
		}
	}
	}