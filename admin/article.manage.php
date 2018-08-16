<?php
	require_once('./connect_admin.php');
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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理文章</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="文章发布系统——后台管理系统">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<div class="page-header ex-page-header">
			<h1 class="title">文章发布系统<small>  ——后台管理系统</small></h1>
		</div>
		<div class="body-container">
			<div class="row">
					<div class="col-md-2">
						<div class="panel panel-default">
							<div class="panel-heading">
								<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
							</div>
							
								<div class="list-group">
									<a href="article.add.php" class="list-group-item">发布文章</a>
									<a href="article.manage.php" class="list-group-item active">管理文章</a>
									<a class="list-group-item">修改文章</a>
								</div>
						</div>
					</div>
					<div class="col-md-10">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4>文章管理列表</h4>
							</div>
							<div class="panel-body">
								<table class="table table-hover">
									<tr>
										<th>编号</th>
										<th>文件名称</th>
										<th>标题</th>
										<th>操作</th>
									</tr>
									<tbody>
										<?php
											if(!empty($data)) {
												foreach ($data as $value) {
										?>
													<tr>
														<td><?php echo $value['id'];?></td>
														<td><?php echo $value['name'];?></td>
														<td><?php echo $value['title'];?></td>
														<td><a href="article.del.handle.php?id=<?php echo $value['id'];?>">删除</a>
															 <a href="article.modify.php?id=<?php echo $value['id'];?>">修改</a>
														</td>
													</tr>
										<?php
												}
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
 
	<footer class="copyright">
		Copyright &copyright; 1998-2018, sherlock june, All Rights Reserved
	</footer>
</body>
</html>
