/*鍏抽棴寮规*/
function hideModal(id,type){
	if(type == 1){
		$(id).remove();
		return;
	}
	$(id).removeClass('curr');
}

/*鎵撳紑寮规*/
function showModal(id){
	$(id).addClass('curr');
}

$(function(){
	$("#audio-btn1").click(function () {
		if ($(this).attr("class") == 'on') {
			$(this).attr("class", "off");
			$("#music").removeClass("active");
			document.getElementById("media").pause();
			return;
		} else {
			$(this).attr("class", "on");
			$("#music").addClass("active")
			document.getElementById("media").play();
			return;
		}
	});
	$("#audio-btn").click(function () {
		if ($(this).hasClass("on")) {
			$(this).removeClass("on");
			$(this).find('img').attr('src','images/pause.png');
			document.getElementById("media").pause();
			clearTimeout(audioPlay);
			return;
		}else{			
			$(this).addClass("on");
			var _this = $(this);
			document.getElementById("media").play();
			document.getElementById("media").onended = function() {
				_this.find('img').attr('src','images/pause.png');
				_this.removeClass("on");
				mi = 0;
				$('.music-warp .line .in').css('width','0px');
				$('.music-warp .currTime').text('00:00');
			};
			$(this).find('img').attr('src','images/play.png');
			musicAnmate();
			return;
		}
	});
	$(".line").click(function(e){
		var x = e.offsetX;
		var wh = $('.music-warp .line').width();
		if($("#audio-btn").hasClass("on")){
			mi = x;
			var bb = x/wh;
			var currtt = parseInt(document.getElementById("media").duration*bb);
			document.getElementById("media").currentTime = currtt;	
		}
	});
});

var audioPlay;
var mi = 0;
function musicAnmate(){
var f,m;
var time = parseInt(document.getElementById("media").duration);
var currtime = parseInt(document.getElementById("media").currentTime);
var wh = $('.music-warp .line').width();
var wh2 = wh/time;
mi+=wh2;
if(mi >= wh){
return;
}
f = parseInt(currtime/60);
m = currtime%60;
if(f < 10){
f = '0' + f;
}
if(m < 10){
m = '0' + m;
}
$('.currTime').text(f+':'+m);
$('.music-warp .line .in').css('width',''+mi+'px');
//console.log(currtime);

audioPlay = setTimeout(function(){musicAnmate()},1000);
}

function audioAutoPlay(id){
	var audio = document.getElementById(id);
	audio.playbackRate=1;
	audio.play();
	document.addEventListener("WeixinJSBridgeReady", function () {
		audio.play();
	}, false);
}