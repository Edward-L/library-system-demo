<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
	require_once('config.php');

	$adminNum = $_POST['adminNu'];
	$password = $_POST['password'];


	$query = mysqli_query($db,"select adminName from admin where adminNumber = '$adminNum' and adminPassword = md5('$password')") 
		or die("sql error");
	if($row = mysqli_fetch_array($query))
	{
		session_start();
		header("Location:admin.php");	
		$_SESSION['adminNu'] = $adminNum;
		$_SESSION['adminName'] = $row['adminName'];
	}
	else
	{
		echo "登陆失败";
		header('Location:adminlogin.html');
	}
	


?>
</html>
