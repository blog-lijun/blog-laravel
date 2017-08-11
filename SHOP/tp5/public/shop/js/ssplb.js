function countdown ()
    {
        var end = new Date ("2016/8/23 11:14:40");
        var now = new Date ();
        var m = Math.round ((end - now) / 1000);
        //var day = parseInt (m / 24 / 3600);
		var day = parseInt(m/60/60/24);  
        var hours = parseInt ((m % (3600 * 24)) / 3600);
        var minutes = parseInt ((m % 3600) / 60);
        var seconds = m % 60;
          
        if (m < 0)
        {
            document.getElementById ("word3").innerHTML = 0 + "天" + 0 + "小" + 0 + "分" + 0 + "秒";
            return;
        }
        document.getElementById ("word3").innerHTML =  "剩余"+day+"天"+ hours +"时" + minutes +"分" + seconds + "秒";
        setTimeout ('countdown()', 1000);
    }
    window.onload = function ()
    {
        countdown ();
    }
$(function(){
	$(".qiangguangle,.buyover,.qiangguangle1,.buyover1").click(function(){
		$(".motaikuang").css({"display":"block"})
		//$("body,html").css("overflow-y","hidden")
		$(".kqtx").css({"display":"block"})
	})
	$(".cuo1").click(function(){
		$(".motaikuang").css("display","none")
		$(".kqtx").css("display","none")
		//$("body,html").css("overflow-y","visible")
	})
})
