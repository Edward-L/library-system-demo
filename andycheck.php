
<?php
//	header('Content-type: text/json');
	require_once('config.php');

	$stuNum = $_POST['stuNu'];
	$password = $_POST['password'];

	$query = mysqli_query($db, "select stuName,stuNumber from student where stuNumber = '$stuNum' and stuPassword = md5('$password')");
	
	if($row = mysqli_fetch_array($query))
	{
		$s =  array(
			'check' => '1',
			'stuName' => $row[0],
			'stuNumber' => $row[1]
		);
		echo  json_encode($s);
	}
	else
	{
		echo  0;
	//	header("Location:index.html");
	}
	


?>
