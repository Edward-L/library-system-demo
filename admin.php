<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>管理员</title>

    <!-- Bootstrap core CSS -->
    <link href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    
    <!-- Bootstrap theme -->
    <link href="http://cdn.bootcss.com/bootstrap/3.3.5/dist/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">

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
		//echo "欢迎".$_SESSION['adminName']."登陆";
    echo
          "<nav class='navbar navbar-inverse'>
        <div class='container'>
          <div class='navbar-header'>
            
            <a class='navbar-brand'><strong>AdminManage</strong></a>
      </div>
      <div class='navbar-collapse collapse'>
            <ul class='nav navbar-nav'>
              <li class='active'><a href='#'>welcome " .$_SESSION['adminName']."</a></li>
              </ul>
    </div>
   </nav>


      ";
  }
	
?>

</head>
<body >

<div class="container">
<ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#">新进图书录入</a></li>
       
</ul>


</br>
<div class="row">
<form name = "newbook" method = "post" action = "newbook.php">
  <div class="col-md-2"><input type = "text" name = "bookNumber" placeholder="书号" class="form-control"></div>
  <div class="col-md-2"><input type = "text" name = "bookName" placeholder="书名" class="form-control"></div>
  <div class="col-md-2"><input type = "text" name = "bookAuthor" placeholder="作者" class="form-control"></div>
  <div class="col-md-2"><input type = "text" name = "bookPublishing" placeholder="出版社" class="form-control"></div>
  <div class="col-md-2"><input type = "text" name = "bookCategory" placeholder="分类" class="form-control"></div>
  <div class="col-md-1"></div>
  <div class="col-md-1"><button type="submit" class="btn btn-sm btn-primary">录入</button></div>
  </form>
</div>

</br>
<ul class="nav nav-tabs" role="tablist">
       
        <li role="presentation"class="active"><a href="#">借书证管理</a></li>
        
</ul>
</br>
<div class="row">
	<form name = "resg" method = "post" action = "resg.php">
	<div class="col-md-2"><input type = "text" name = "stuNumber" placeholder="学号" class="form-control"></div>
 	<div class="col-md-2"><input type = "text" name = "stuName" placeholder="姓名" class="form-control"></div>
  	<div class="col-md-2"><input type = "password" name = "stuPassword" placeholder="密码" class="form-control"></div>
    <div class="col-md-2"><input type = "text" name = "maxNumber" placeholder="借书上限" class="form-control"></div>
    <div class="col-md-3"></div>
  	<div class="col-md-1"><button type="submit" class="btn btn-sm btn-primary">办理</button></div>
	</form>
</div>
</br>
<ul class="nav nav-tabs" role="tablist">
        
        <li role="presentation"class="active"><a href="#">借书</a></li>	
        
</ul>

</br>
<div class="row">
	<form name = "lendbook" method = "post" action = "lendbook.php">
  <div class="col-md-2"><input type = "text" name = "stuNumber" placeholder="学号" class="form-control"></div>
  <div class="col-md-2"><input type = "text" name = "bookNumber" placeholder="书号" class="form-control"></div>
  <div class="col-md-7"></div>
 
  <div class="col-md-1"><button type="submit" class="btn btn-sm btn-primary">借书</button></div>
</form>
</div>

</br>
<ul class="nav nav-tabs" role="tablist">
       
        <li role="presentation"class="active"><a href="#">续借</a></li>    
        
</ul>
</br>
<div class="row">
	<form name = "lendtime" method = "post" action = "lendtime.php">
  <div class="col-md-2"><input type = "text" name = "stuNumber" placeholder="学号" class="form-control"></div>
  <div class="col-md-2"><input type = "text" name = "bookNumber" placeholder="书号" class="form-control"></div>
  <div class="col-md-7"></div>
  <div class="col-md-1"><button type="submit" class="btn btn-sm btn-primary">续借</button></div>
</form>
</div>

</br>
<ul class="nav nav-tabs" role="tablist">
        
        <li role="presentation"class="active"><a href="#">还书</a></li> 
</ul>
</br>
<div class="row">
	<form name = "returnbook" method = "post" action = "returnbook.php">
  <div class="col-md-2"><input type = "text" name = "stuNumber" placeholder="学号" class="form-control"></div>
  <div class="col-md-2"><input type = "text" name = "bookNumber" placeholder="书号" class="form-control"></div>
  <div class="col-md-7"></div>
   <div class="col-md-1"><button type="submit" class="btn btn-sm btn-primary">还书</button></div>
</form>
</div>


	</div>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>


  </body>
</html>