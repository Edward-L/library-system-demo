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
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<?php
		require_once('config.php');
		$stuNum = $_SESSION['stuNu'];
		$sql = "select lend.lendNumber as lendNumber, lend.lendDate as lendDate, lend.deadline as deadline, lend.renewtimes as renewtimes, bookinfo.bookName as bookName from lend join (bookinfo) on (lend.lendNumber = bookinfo.bookNumber) where lend.stuNumber = '$stuNum'";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$stmt->bind_result($lendNumber,$lendDate,$deadline,$renewtimes,$bookName);
		printf("<br>");
?>
	<h1>借阅情况</h1>
	<table border = '1'>
								<tr>
									<td>书号</td><td>书名</td><td>借书日期</td><td>到期时间</td><td>可续借次数</td>
								</tr>
<?php
		while($stmt->fetch())
		{
			printf("
								<tr>
									<td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td>
								</tr>
							",$lendNumber,$bookName,date('Y-m-d',$lendDate),date('Y-m-d',$deadline),$renewtimes);
		}
?>
	</table>

<h1>图书查询</h1>
<form name="findbook" method="post" action="findbook.php">
<table border="0" cellspacing="0" cellpadding="0" align="center" width="100%">
<tr height="30">
</tr>   
<tr height="30" align = "center"><td>查询内容：<input type="text" name="findcontent" size="110" /></td></tr>
<tr height="30" align = "center"><td>
<input name="rdo" type="radio" value="bookNumber" />书号
<input name="rdo" type="radio" value="bookName" checked/>书名
<input name="rdo" type="radio" value="bookAuther" />作者
<input name="rdo" type="radio" value="bookPublishing" />出版社
<input name="rdo" type="radio" value="bookCategory" />分类
</td></tr>
<tr height="50"><td style="font-size:15px;color:#00346D;font-weight:200" align="center">
<input name="submit1" type="submit" value="开始查询" />
<input name="reset1" type="reset" value="重置条件" />
</td></tr>   
</table>
</form>


</html>
