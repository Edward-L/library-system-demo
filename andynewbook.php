<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
	session_start();
	if(!isset($_SESSION['stuName']))
	{
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
			or die("请验证你的输入信息");
		return 1;
	}
	else
	{
		return 2;
	}
?>
</html>
