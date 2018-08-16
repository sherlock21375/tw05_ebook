<?php
	require_once('./connect_admin.php');
	//把传递过来的信息入库，在入库之前对所有的信息进行校验。
	//print_r($_POST);
 
	if(!isset($_POST['title']) || empty($_POST['title']) || !isset($_POST['name']) || empty($_POST['name'])) {
		echo "<script>alert('内容不能为空'); window.history.go(-1);</script>";
		mysql_close($con);
		exit;
	}

	$id_before = $_POST['id_before'];
	$id = $_POST['id'];
	$title = $_POST['title'];
	$name = $_POST['name'];
	$article = $_POST['article'];
 
	$updatesql = "update article set id = '$id',title = '$title',name = '$name',article = '$article' where id=$id_before";
	//echo $updatesql;
	
	if(mysql_query($updatesql) && mysql_affected_rows($con)) {
		echo "<script>alert('修改文章成功'); window.location.href='article.manage.php'</script>";	
	} else {
		echo "<script>alert('修改文章失败'); window.location.href='article.manage.php'</script>";
	}
 
	mysql_close($con);
?>
