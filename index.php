<?php 
require_once('./admin/connect.php'); 
$sql = "select * from article";
	$query = mysql_query($sql);
	if($query && mysql_num_rows($query)) {
		while($row = mysql_fetch_assoc($query)) {
			$data[] = $row;
		}
	} else {
		$data = array();
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
<script src="http://img1.xuetang.cn/h5-video/cyl_ebook_18/js/flexible_css.js"></script>
<style>
@charset "utf-8";html{color:#000;background:#fff;overflow-y:scroll;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}html *{outline:0;-webkit-text-size-adjust:none;-webkit-tap-highlight-color:rgba(0,0,0,0)}html,body{font-family:sans-serif}body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,code,form,fieldset,legend,input,textarea,p,blockquote,th,td,hr,button,article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{margin:0;padding:0}input,select,textarea{font-size:100%}table{border-collapse:collapse;border-spacing:0}fieldset,img{border:0}abbr,acronym{border:0;font-variant:normal}del{text-decoration:line-through}address,caption,cite,code,dfn,em,th,var{font-style:normal;font-weight:500}ol,ul{list-style:none}caption,th{text-align:left}h1,h2,h3,h4,h5,h6{font-size:100%;font-weight:500}q:before,q:after{content:''}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-.5em}sub{bottom:-.25em}a:hover{text-decoration:underline}ins,a{text-decoration:none}
</style>
<script src="js/flexible.js"></script>
<meta name="viewport" content="width=device-width,initial-scale=0.5, maximum-scale=0.5, minimum-scale=0.5, user-scalable=no">
<script src="js/jquery.min.js"></script>
<script src="js/common.js"></script>
<link href="css/all.css" type="text/css" rel="stylesheet">
<link href="css/index.css" type="text/css" rel="stylesheet">
</head>
<body class="bg1" style="font-size: 24px;">
<div id="music" class>
	<div id="audio-btn1" class="on">
		<audio loop src="http://img1.xuetang.cn/h5-video/cyl_ebook_18/images/music.mp3" id="media" preload></audio>
	</div>
</div>
<section class="main-page bg mian current clearfix">
	<img src="images/top_img.png" class="top-img">
	<img src="images/bot_img.png" class="bot-img">
	<img src="images/logo.png" class="logo">
	<img src="images/word.png" class="word">
	<a class="read-btn" href="javascript:void(0);" onclick="readBook();">
	点此阅读
	</a>
</section>
<section class="container clearfix">
		<div class="banner">
			<img src="images/banner.jpg" class="db" style="pointer-events:none; -webkit-touch-callout: none;">
		</div>
		<ul class="news">
			<?php
			if(!empty($data)) {
				foreach ($data as $value) {
			?>
				<li>
					<a href="detail.php?id=<?php echo $value['id'];?>"><?php echo $value['name'];?></a>
				</li>
			<?php
					}
				}
			?>
		
		</ul>
</section>
<script></script>
<script>
$(function(){								
				audioAutoPlay('media');
				document.getElementById('media').onloadstart=function(){
					audioAutoPlay('media');
				};
			})
</script>
<script>
function readBook(){
				$('.mian').addClass('fan');
				setTimeout(function(){
					$('.mian').addClass('hide');
				},2000)
			}
</script>
</body>
</html>