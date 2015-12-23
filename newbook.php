<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>新书录入</title>

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

$bookNumber = $_POST['bookNumber'];
$bookName = $_POST['bookName'];
$bookAuthor = $_POST['bookAuthor'];
$bookPublishing = $_POST['bookPublishing'];
$bookCategory = $_POST['bookCategory'];
if($bookNumber	&& $bookName && $bookAuthor && $bookPublishing)
	{
		$query = mysqli_query($db,"insert into bookinfo values('$bookNumber','$bookName','$bookAuthor','$bookPublishing','$bookCategory','0')")
			or die("<div class='col-lg-4 col-lg-offset-4'>
      <div class='alert alert-success' role='alert'>
        <strong>Warning!</strong>请验证你的输入信息.
      </div>
      </div>");
		printf("<div class='col-lg-4 col-lg-offset-4'>
			<div class='alert alert-success' role='alert'>
        <strong>Well done!</strong>录入成功.
      </div>
      </div>"); 
	}
	else
	{
		printf("<div class='col-lg-4 col-lg-offset-4'>
			<div class='alert alert-success' role='alert'>
        <strong>Warning!</strong>请验证你的输入信息.
      </div>
      </div>");
	}
?>

