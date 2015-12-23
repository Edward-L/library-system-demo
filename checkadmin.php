<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>管理员登录检查</title>

    <!-- Bootstrap core CSS -->
    <link href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

</html>

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
		printf("<div class='col-lg-4 col-lg-offset-4'>
			<div class='alert alert-success' role='alert'>
        <strong>Warning!</strong>登录失败.
      </div>
      </div>");
		header('Location: adminlogin.html');
	}
	


?>
