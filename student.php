<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>学生</title>

    <!-- Bootstrap core CSS -->
    <link href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
    <?php
  session_start();
  if(!isset($_SESSION['stuName']))
  {
    //echo "请登陆！";
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
            
            <a class='navbar-brand'><strong>StudentManage</strong></a>
      </div>
      <div class='navbar-collapse collapse'>
            <ul class='nav navbar-nav'>
              <li class='active'><a href='#'>welcome " .$_SESSION['stuName']."</a></li>
              </ul>
    </div>
   </nav>


      ";
  }
?>


<?php
    require_once('config.php');
    $stuNum = $_SESSION['stuNu'];
    $sql = "select lend.lendNumber as lendNumber, lend.lendDate as lendDate, lend.deadline as deadline, lend.renewtimes as renewtimes, bookinfo.bookName as bookName from lend join (bookinfo) on (lend.lendNumber = bookinfo.bookNumber) where lend.stuNumber = '$stuNum'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($lendNumber,$lendDate,$deadline,$renewtimes,$bookName);
    
?>

</head>

    

  
<body>




<div class="container">
  <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#">图书查询</a></li>
       
</ul>
</br>
<form name="findbook" method="post" action="findbook.php">

<table border="0" cellspacing="0" cellpadding="5"  width="100%">
<tr height="30">
  <td>
<div class="col-md-3 ">
  <select class="form-control" name="rdo">
  <option value="bookNumber">书号</option>
  <option value="bookName" selected>书名</option>
  <option value="bookAuthor">作者</option>
  <option value="bookPublishing">出版社</option>
  <option value="bookCategory">分类</option>
</select>
</div>
<div class="col-md-7 ">

<input type="text" name="findcontent" class="form-control" height="100" placeholder="查询内容" />
</div>
  <div class="col-md-1 "><button type="submit" class="btn btn-sm btn-primary">开始查询</button></div>
  <div class="col-md-1 "><button type="reset" class="btn btn-sm btn-primary">重置条件</button></div>

</td>
</tr>


  


</table>
</form>


</br>
<ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#">借阅情况</a></li>
       
</ul>
  </br>
  <div class="table-responsive">
    <table  class="table table-striped">   

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
    
      <thead>

                <tr>

                  <th>书号</th>
                  <th>书名</th>
                  <th>借书日期</th>
                  <th>到期时间</th>
                  <th>可续借次数</th>
                 
                </tr>
      </thead>
      <tbody>



      </tbody>
  </table>
 
</div>

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->

 
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

</div>
  </body>
</html>
