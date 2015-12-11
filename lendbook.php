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
	$query0 = mysqli_query($db,"select maxNumber,lendCount from student where stuNumber = '$stuNumber'");
	$row = mysqli_fetch_array($query0);
	if ($row[0]>$row[1])
	{
		$query3 = mysqli_query($db,"select bookState from bookinfo where bookNumber = '$bookNumber'")
		$row1 = mysqli_fetch_array($query3);
		if ($row1[0]>0)
		{
			$lendtime = time();
			$returntime = time()+7776000;
			$query = mysqli_query($db,"insert into lend values('$stuNumber','$bookNumber','$lendtime','$returntime',3)")
				or die("请验证你的输入信息");
			$query1 = mysqli_query($db,"update bookinfo set bookstate = 1 where bookNumber = '$bookNumber'");
			$query2 = mysqli_query($db,"update student set lendCount = lendCount +1 where stuNumber = '$stuNumber'");
			echo "借书成功";
		}
	}
	else
	{
		echo " 已到达借书上限";
	}
}
else
{
	echo "请验证你的输入信息";
}
?>
</html>
