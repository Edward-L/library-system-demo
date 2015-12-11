<html>

<?php
	session_start();
		if(!isset($_SESSION['stuName']))
				{
							echo "请登陆！";
									header('Location:index.html');
									exit;
				}
			else
					{
								echo "欢迎".$_SESSION['stuName']."登陆";
					}
require_once('config.php');

$findcontent = $_POST['findcontent'];
$rdo = $_POST['rdo'];

$sql = "select * from bookinfo where $rdo = '$findcontent' ";
$stmt = $db->prepare($sql);
$stmt->execute();
$stmt->bind_result($bookNumber,$bookName,$bookAuthor,$bookPublishing,$bookCategory,$bookState);

?>
	<table border = '1'>
								<tr>
									<td>书号</td><td>书名</td><td>作者</td><td>出版社</td><td>分类</td><td>状态</td>
								</tr>
<?php
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
									printf("
								<tr>
									<td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td>
								</tr>
							",$bookNumber,$bookName,$bookAuthor,$bookPublishing,$bookCategory,$state);
		}
?>
	</table>
<html>
