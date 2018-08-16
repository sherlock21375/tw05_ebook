<?php
	require_once('./connect_admin.php');
	//把传递过来的信息入库，在入库之前对所有的信息进行校验。
	//print_r($_POST);
 
	if(!isset($_POST['title']) || empty($_POST['title']) || !isset($_POST['name']) || empty($_POST['name'])) {
		echo "<script>alert('内容不能为空'); window.location.href='article.add.php'</script>";
	}
 
	$title = $_POST['title'];
	$name = $_POST['name'];
	$article = $_POST['article'];
 
	$insertsql = "insert into article(title,name,article) values('$title','$name','$article')";
	//echo $insertsql;
	if(mysql_query($insertsql)) {
		echo "<script>alert('发布文章成功'); window.location.href='article.manage.php'</script>";	
	} else {
		die(mysql_error());
		echo "<script>alert('发布文章失败');
		window.location.href='article.manage.php'</script>";
	}
 
	mysql_close($con);
?>
