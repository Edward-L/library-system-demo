<?php
	session_start();
	if(!isset($_SESSION['stuName']))
	{
		echo "请登陆！";
		header('Location:index.html');
		exit;
	}
	else
	{
		echo "欢迎".$_SESSION['adminName']."登陆";
	}
?>

<html>
<head>
		<meta http-equiv = "Content-Type" content = "text/html; charset = utf-8" />
	</head>
	<br/>
	<h1>借书证办理</h1>
	<form name = "resg" method = "post" action = "resg.php">
		<div>
			学号：<input type = "text" name = "stuNumber">
			姓名：<input type = "text" name = "stuName">
			密码：<input type = "password" name = "stuPassword">
			借书上限：<input type = "text" name = "maxNumber">
			<input type = "submit" name = "Submit" value = "办理"/>
		</div>
	</form>
	<h1>新进图书录入</h1>	
	<form name = "newbook" method = "post" action = "newbook.php">
		<div>
			书号：<input type = "text" name = "bookNumber">
			书名：<input type = "text" name = "bookName">
			作者：<input type = "text" name = "bookAuthor">
			出版社：<input type = "text" name = "bookPublishing">
			分类：<input type = "text" name = "bookCategory">
			<input type = "submit" name = "Submit" value = "录入"/>
		</div>
	</form>
	<h1>借书</h1>	
	<form name = "lendbook" method = "post" action = "lendbook.php">
		<div>
			学号：<input type = "text" name = "stuNumber">
			书号：<input type = "text" name = "bookNumber">
			<input type = "submit" name = "Submit" value = "借书"/>
		</div>
	</form>
	<h1>续借</h1>	
	<form name = "lendtime" method = "post" action = "lendtime.php">
		<div>
			学号：<input type = "text" name = "stuNumber">
			书号：<input type = "text" name = "bookNumber">
			<input type = "submit" name = "Submit" value = "续借"/>
		</div>
	</form>
	<h1>还书</h1>	
	<form name = "returnbook" method = "post" action = "returnbook.php">
		<div>
			学号：<input type = "text" name = "stuNumber">
			书号：<input type = "text" name = "bookNumber">
			<input type = "submit" name = "Submit" value = "还书"/>
		</div>
	</form>
</html>
