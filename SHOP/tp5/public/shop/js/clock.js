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
            document.getElementById(clockid[i]).innerHTML=day+"天"+hour+"时"+minutes+"分"+seconds+"秒"; 
        } 
    } 
} 
setTimeout("clock()", 100);
end[end.length]=new Date("2016/8/5 18:00:00"); 
//设定倒计时显示地址(数组元素) 
clockid[clockid.length]="word" 
end[end.length]=new Date("2016/8/10 17:45:45")
clockid[clockid.length]="word1" 
end[end.length]=new Date("2016/8/15 21:59:59")
clockid[clockid.length]="word2" 
