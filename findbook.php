<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>书籍详情</title>

    <!-- Bootstrap -->
   <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
  </head>

<body>
 


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
								//echo "欢迎".$_SESSION['stuName']."登陆";
            echo
          "<nav class='navbar navbar-inverse'>
        <div class='container'>
          <div class='navbar-header'>
            
            <a class='navbar-brand'><strong>BookInformation</strong></a>
      </div>
      <div class='navbar-collapse collapse'>
            <ul class='nav navbar-nav'>
              <li class='active'><a href='#'>welcome " .$_SESSION['stuName']."</a></li>
              </ul>
    </div>
   </nav>


      ";

								

					}
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

?>
	

          </div>
          </div>
      </nav>



<div class="col-lg-10 col-lg-offset-1">
  <div class="table-responsive">
    <table  class="table table-striped">   
      <thead>

                <tr>

                  <th>书号</th>
                  <th>书名</th>
                  <th>作者</th>
                  <th>出版社</th>
                  <th>分类</th>
                  <th>状态</th>
                </tr>
      </thead>
      <tbody>
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


      </tbody>


    </table>
  </div>

</div>
	
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>