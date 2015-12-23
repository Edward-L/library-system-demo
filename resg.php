<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>借书证办理</title>

    <!-- Bootstrap core CSS -->
    <link href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</html>


<?php
	session_start();
	if(!isset($_SESSION['stuName']))
	{
		printf("<div class='col-lg-4 col-lg-offset-4'>
			<div class='alert alert-success' role='alert'>
        <strong>Warning!</strong>请登录.
      </div>
      </div>");
		header('Location:index.html');
		exit;
	}

	require_once('config.php');

$stuNumber = $_POST['stuNumber'];
$stuName = $_POST['stuName'];
$stuPassword = $_POST['stuPassword'];
$maxNumber = $_POST['maxNumber'];
	if($stuNumber && $stuName && $stuPassword && $maxNumber)
	{
		$query = mysqli_query($db,"insert into student values('$stuNumber','$stuName',md5('$stuPassword'),'$maxNumber',0)")
			or die("<div class='col-lg-4 col-lg-offset-4'>
					<div class='alert alert-success' role='alert'>
       				<strong>Warning!</strong> 请验证你的输入信息.
      				</div>
      				</div>");
		printf("<div class='col-lg-4 col-lg-offset-4'>
				<div class='alert alert-success' role='alert'>
        		<strong>Well done!</strong> 办理成功.
      			</div>
      			</div>"); 
	}
	else
	{
		printf("<div class='col-lg-4 col-lg-offset-4'>
			<div class='alert alert-success' role='alert'>
        <strong>Warning!</strong> 请验证你的输入信息.
      </div>
      </div>"); 
	}
?>

