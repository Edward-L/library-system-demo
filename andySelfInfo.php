<?php
    require_once('config.php');
    $stuNum = $_POST['stuNu'];
    $sql = "select lend.lendNumber as lendNumber, lend.lendDate as lendDate, lend.deadline as deadline, lend.renewtimes as renewtimes, bookinfo.bookName as bookName from lend join (bookinfo) on (lend.lendNumber = bookinfo.bookNumber) where lend.stuNumber = '$stuNum'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($lendNumber,$lendDate,$deadline,$renewtimes,$bookName);
    while($stmt->fetch())
    {
      $s = array(
      'lendNumber'=>$lendNumber,
      'lendDate'=>$lendDate,
      'deadline'=>$deadline,
      'renewtimes'=>$renewtimes,
      'bookName'=>$bookName);
       echo  json_encode($s); 
    }

    
?>
