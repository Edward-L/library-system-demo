
<?php
	// session_start();
	// 	if(!isset($_SESSION['stuName']))
	// 			{
	// 								exit;
	// 			}
			
require_once('config.php');

$findcontent = $_POST['findcontent'];
$rdo = $_POST['rdo'];

if($rdo=="bookNumber"){
	$sql = "select * from bookinfo where $rdo= $findcontent";
}
else{
	$sql = "select * from bookinfo where $rdo= '$findcontent'";
}

$stmt = $db->prepare($sql);
$stmt->execute();
$stmt->bind_result($bookNumber,$bookName,$bookAuthor,$bookPublishing,$bookCategory,$bookState);


while($stmt->fetch())
	{
		if($bookState == 1)
		{
			$state = "借出";
		}
		else
		{
			$state = "可借";
		}
	$s = array(
	 	'bookNumber'=>$bookNumber,
	 	'bookName'=>$bookName,
	 	'bookAuthor'=>$bookAuthor,
	 	'bookPublishing'=>$bookPublishing,
	 	'bookCategory'=>$bookCategory,
	 	'state'=>$state);
	echo  json_encode($s);
	}	
?>
