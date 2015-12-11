<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
	session_start();
	if(!isset($_SESSION['stuName']))
	{
		echo "请登陆！";
		header('Location:index.html');
		exit;
	}

	require_once('config.php');

$bookNumber = $_POST['bookNumber'];
$stuNumber = $_POST['stuNumber'];
if($bookNumber	&& $stuNumber )
{
	$query0 = mysqli_query($db,"select renewtimes from lend  where stuNumber = '$stuNumber' and lendNumber = '$bookNumber'");
	$row = mysqli_fetch_array($query0);
	if ($row[0]>0)
	{
			$todaytime = time();
			$returntime = time()+864000;
			$query = mysqli_query($db,"update lend set deadline = '$returntime',renewtimes = renewtimes - 1 where stuNumber = '$stuNumber' and lendNumber = '$bookNumber'")
				or die("请验证你的输入信息");
			echo "续借成功";
	}
	else
	{
		echo "请验证你的输入信息";
	}
}
else
{
	echo "请验证你的输入信息";
}
?>
</html>
