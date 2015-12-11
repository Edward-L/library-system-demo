<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
	require_once('config.php');

	$stuNum = $_POST['stuNu'];
	$password = $_POST['password'];

	$query = mysqli_query($db, "select stuName from student where stuNumber = '$stuNum' and stuPassword = md5('$password')");
	
	if($row = mysqli_fetch_array($query))
	{
		session_start();
		header("Location: student.php");	
		$_SESSION['stuNu'] = $stuNum;
		$_SESSION['stuName'] = $row['stuName'];
	}
	else
	{
		echo "登陆失败";
	//	header("Location:index.html");
	}
	


?>
</html>
