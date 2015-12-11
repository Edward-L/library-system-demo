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
			$query = mysqli_query($db,"delete from lend where stuNumber = '$stuNumber' and lendNumber = '$bookNumber'")
				or die("请验证你的输入信息");
			$query1 = mysqli_query($db,"update bookinfo set bookstate = 0 where bookNumber = '$bookNumber'");
			$query2 = mysqli_query($db,"update student set lendCount = lendCount -1 where stuNumber = '$stuNumber'");
			echo "还书成功";
}
else
{
	echo "请验证你的输入信息";
}
?>
</html>
