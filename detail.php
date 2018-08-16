<?php 
require_once('./admin/connect.php');
$id = intval($_GET['id']); 
$sql = "select * from article where id =".$id;
$query = mysql_query($sql);
$data = mysql_fetch_assoc($query);
$sql = "select * from article";
	$query = mysql_query($sql);
	if($query && mysql_num_rows($query)) {
		while($row = mysql_fetch_assoc($query)) {
			$data2[] = $row;
		}
	} else {
		$data2 = array();
	} 
?>
<html data-dpr="2" style="font-size: 72px;">
<head>
<meta charset="utf-8">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="yes" name="apple-touch-fullscreen">
<meta content="telephone=no,email=no" name="format-detection">
<meta name="flexible" content="initial-dpr=2">
<title>
目录
</title>
<script src="js/flexible_css.js"></script>
<style>
@charset "utf-8";html{color:#000;background:#fff;overflow-y:scroll;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}html *{outline:0;-webkit-text-size-adjust:none;-webkit-tap-highlight-color:rgba(0,0,0,0)}html,body{font-family:sans-serif}body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,code,form,fieldset,legend,input,textarea,p,blockquote,th,td,hr,button,article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{margin:0;padding:0}input,select,textarea{font-size:100%}table{border-collapse:collapse;border-spacing:0}fieldset,img{border:0}abbr,acronym{border:0;font-variant:normal}del{text-decoration:line-through}address,caption,cite,code,dfn,em,th,var{font-style:normal;font-weight:500}ol,ul{list-style:none}caption,th{text-align:left}h1,h2,h3,h4,h5,h6{font-size:100%;font-weight:500}q:before,q:after{content:''}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-.5em}sub{bottom:-.25em}a:hover{text-decoration:underline}ins,a{text-decoration:none}
</style>
<script src="js/flexible.js"></script>
<meta name="viewport" content="width=device-width,initial-scale=0.5, maximum-scale=0.5, minimum-scale=0.5, user-scalable=no">
<script src="js/jquery.min.js"></script>
<script src="js/common.js"></script>
<script src="js/comm.mid.js"></script>
<link href="css/all.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="font/iconfont.css">
<link href="css/index.css" type="text/css" rel="stylesheet">
<style>
.jinzhi{overflow:hidden;height:100% !important;}
			.word-box h1{margin-top:1.267rem;margin-bottom: .067rem;}
			h2{font-size: .486rem;text-align:center;}
			h3{font-size: .486rem;text-align:center;}
			h5{font-size: .426rem;text-align:center;font-weight:bold;}
</style>
</head>
<body style="background: rgb(243, 237, 237); height: auto; font-size: 24px;">
	<section class="container clearfix" style="-webkit-overflow-scrolling:touch;overflow: initial">
		<div class="detail-warp">
			<div class="title">
				<p class="name ac">
					<?php
						echo $data['title'];
					?>
					<span style="font-size:.486rem"></span>
				</p>
			</div>
			<div class="word-box size2">
				<?php
					echo $data['article'];
				?>
			</div>
		</div>
	</section>

	<div class="menu">
		<a href="javascript:void(0);" onclick="showModal('.naver');">
		<img src="http://img1.xuetang.cn/h5-video/cyl_ebook_18/images/mulu.png" class="db">
		</a>
		<a href="javascript:void(0);" onclick="bigSm(0);">
		<img src="http://img1.xuetang.cn/h5-video/cyl_ebook_18/images/fangda.png" class="db">
		</a>
		<a href="javascript:void(0);" onclick="bigSm(1);">
		<img src="http://img1.xuetang.cn/h5-video/cyl_ebook_18/images/suoxiao.png" class="db">
		</a>
		<a href="index.php?go_bak=1">
		<img src="http://img1.xuetang.cn/h5-video/cyl_ebook_18/images/back.png" class="db">
		</a>
	</div>
	<!-- <div class="arrow-menu">
		<a class="arrow-a arrow-left" data-type="left" href="javascript:void(0);"></a>
		<a class="arrow-a arrow-right" data-type="right" href="javascript:void(0);"></a>
		<div class="num">
			<span class="fem" id="xh">
			1
			</span>
			/
			<span class="fem" id="zzs">
			11
			</span>
		</div>
		<input type="hidden" value="4" id="zs">
	</div> -->
	<div class="naver" id="naver" style="-webkit-overflow-scrolling:touch;">
		<div class="naver-bg" onclick="hideModal('#naver');"></div>
			<div class="nav-warp">
				<span class="tit">
				目录
				</span>
				<ul class="nav">
					<li class="one-level" >
						<?php
							if(!empty($data2)) {
								foreach ($data2 as $value) {
						?>
							<a class="title" href="detail.php?id=<?php echo $value['id'];?>"><?php echo $value['name'];?></a>
						<?php
								}
							}
						?>
					</li>
				</ul>
			</div>
		</div>
	</div>
<script type="text/javascript">
	var id = "19";
	var size = 2;
	
	$(function(){		
		//位置跳转
		$(".nav .two-level .sun-title").on('click',function(){
			var i = $(this).parent().index() + 1;
			hideModal('#naver');
			var id = $(this).attr('val');
			var top = $(id).position().top;
			$("html,body").animate({scrollTop: top},1);
			$('#xh').text(i)
		});
		//目录展开和收起
		$(".nav .title").on('click',function(){
			if($(this).parent().hasClass('current')){
				$(this).parent().removeClass('current');
			}else{
				$(this).parent().addClass('current');
			}
		});
		//底部箭头切换
		var biaoshi = 0;
		$(".arrow-menu .arrow-a").on('click',function(){
			biaoshi = 1;
			var type = $(this).data('type');
			var xh = $('#xh').text();
			var zs = $('#zs').val();
			var len = $('.nav-warp .one-level:eq('+(zs-1)+') .two-level li').length;
			len = len ? len : 1;
			if(type == 'left'){//上一条
				xh--;
				if(xh == 0){
					xh = 1;
					return;
				}
			}else if(type == 'right'){//下一条
				xh++;
				if(xh == len+1){
					xh = len;
					return;
				}
			}
			$('#xh').text(xh);
			var id = $('.nav-warp .one-level:eq('+(zs-1)+') .two-level li:eq('+(xh-1)+') .sun-title').attr('val');
			var top = $(id).position().top;
			$("html,body").animate({scrollTop: top},1);
			setTimeout(function(){biaoshi = 0},1)
		});
		//滚动条高度
		$(window).scroll(function() {
			if(biaoshi == 1){
				return;
			}
			
			var wTop = $(this).scrollTop();
			if(wTop > 200){
				if($('.share-btn').hasClass('look-s')){
					LookLog();
				}
				$('.share-btn').removeClass('look-s');
			}
			
			var zs = $('#zs').val();
			$('.nav-warp .one-level:eq('+(zs-1)+') .two-level li').each(function(i){
				var id = $(this).find('.sun-title').attr('val');
				var top =  $(id).position().top - 300;
				if($(this).next('li').length > 0){
					var id1 =  $(this).next().find('.sun-title').attr('val');
					var nTop =  $(id1).position().top - 300;
					if(wTop >= top && wTop < nTop){
						$('#xh').text(i+1);
					}	
				}else{
					if(wTop >= top){
						$('#xh').text(i+1);
					}	
				}
				
			});
		});
	})	
	//放大
	function bigSm(type){
		if(type == 0){//放大
			if(size >= 5){
				return;
			}
			size++;
			$('.word-box').removeClass('size0 size1 size2 size3 size4 size5');
			$('.word-box').addClass('size'+size+'');
		}else if(type == 1){//缩小
			if(size <= 0){
				return;
			}
			size--;
			$('.word-box').removeClass('size0 size1 size2 size3 size4 size5');
			$('.word-box').addClass('size'+size+'');
		}
	}
</script>
</body>
</html>