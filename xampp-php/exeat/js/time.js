$('#js').hover(function(){
	$(this).css("font-size","16pt");
});
$('#js').mouseleave(function(){
	$(this).css("font-size","16pt");
});
var give=document.getElementById('js');
	var interval=window.setInterval(timer, 1000);
	var time=new Date();
	var second=time.getSeconds();
	var minute=time.getMinutes();
	var hour=time.getHours();
	js.innerHTML=hour+" : "+minute+" : "+second;
	function timer(){
		second++;
		js.innerHTML=hour+" : "+minute+" : "+second;
		if(second>=59){
			second=-1;
			minute++;
			js.innerHTMLhour+" : "+minute+" : "+second;
			if(minute>=60){
				minute=-1;
				minute++;
				hour++;
				js.innerHTMLhour+" : "+minute+" : "+second;
				if(hour>=24){
					hour=-1;
					hour++;
					js.innerHTMLhour+" : "+minute+" : "+second;
			}
			}
		}
		
	}