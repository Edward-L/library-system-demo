<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>借书办理</title>

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
$stuNumber = $_POST['stuNumber'];
if($bookNumber	&& $stuNumber )//是否都输了
{
	$query0 = mysqli_query($db,"select maxNumber,lendCount from student where stuNumber = '$stuNumber'");
	$e= mysqli_affected_rows($db);
	if($e)//学号有没有
	{
		$query9 = mysqli_query($db,"select bookState from bookinfo where bookNumber = '$bookNumber'");
		$f= mysqli_affected_rows($db);
		if($f)//书号有没有
		{
			$row0 = mysqli_fetch_array($query9);
    		if ($row0[0]!=1)//书被借了没
    		{
    			$row = mysqli_fetch_array($query0);
				if ($row[0]>$row[1])//借书上线到了没？
				{ 
					$query3 = mysqli_query($db,"select bookState from bookinfo where bookNumber = '$bookNumber'");
					$row1 = mysqli_fetch_array($query3);
					if ($row1[0]==0)
					{
						$lendtime = time();
						$returntime = time()+7776000;
						$query = mysqli_query($db,"insert into lend values('$stuNumber','$bookNumber','$lendtime','$returntime',3)")
							or die("<div class='col-lg-4 col-lg-offset-4'>
									<div class='alert alert-success' role='alert'>
       								<strong>Warning!</strong> 请验证你的输入信息.
      								</div>
      								</div>");
						$query1 = mysqli_query($db,"update bookinfo set bookstate = 1 where bookNumber = '$bookNumber'");
						$query2 = mysqli_query($db,"update student set lendCount = lendCount +1 where stuNumber = '$stuNumber'");
						printf("
							<div class='col-lg-4 col-lg-offset-4' >
							<div class='alert alert-success' role='alert' align>
     		 				  <strong>Well done!</strong>借书成功.
     						 </div>
     						 </div>
      						");
					}
				}
				else//借书上线到了
				{
					printf("<div class='col-lg-4 col-lg-offset-4'>
					<div class='alert alert-success' role='alert'>
     			   	<strong>Warning!</strong> 已达借书上限.
    		  		</div>
      				</div>");
				}
   			 }
    		else//书被借了
    		{
    			printf("<div class='col-lg-4 col-lg-offset-4'>
				<div class='alert alert-success' role='alert'>
        		<strong>Warning!</strong> 书还未被归还.
      			</div>
      			</div>");
    		}
	
		}
		else//书号没有
		{
			printf("<div class='col-lg-4 col-lg-offset-4'>
			<div class='alert alert-success' role='alert'>
        	<strong>Warning!</strong> 输入书号有误.
      		</div>
      		</div>");
    	}
	}
	else//学号没有
	{
		printf("<div class='col-lg-4 col-lg-offset-4'>
			<div class='alert alert-success' role='alert'>
        <strong>Warning!</strong> 输入的学号有误！
      </div>
      </div>"); 
	}
}
else//是否都输了
{
	printf("<div class='col-lg-4 col-lg-offset-4'>
			<div class='alert alert-success' role='alert'>
        <strong>Warning!</strong> 请验证你的输入信息.
      </div>
      </div>"); 
}
?>

