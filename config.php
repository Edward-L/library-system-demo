<?php

	$db_host = 'localhost';
	$db_username = 'root';
	$db_password = '123456';
	$db_database = 'library';

	$db = mysqli_connect($db_host, $db_username, $db_password, $db_database);
	if (mysql_error())
	{
		echo "Connect to database unsuccess.";
		exit;
	}

//@mysql_connect($db_host,$db_username,$db_password)
//or die("数据库连接失败");
//@mysql_select_db($db_database)
//or die("选择数据库失败");


?>
