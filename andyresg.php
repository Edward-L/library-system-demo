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

$stuNumber = $_POST['stuNumber'];
$stuName = $_POST['stuName'];
$stuPassword = $_POST['stuPassword'];
$maxNumber = $_POST['maxNumber'];
	if($stuNumber && $stuName && $stuPassword && $maxNumber)
	{
		$query = mysqli_query($db,"insert into student values('$stuNumber','$stuName',md5('$stuPassword'),'$maxNumber',0)")
			or die("请验证你的输入信息");
		return 1;
	}
	else
	{
		return 2;
	}
?>
</html>
