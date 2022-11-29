<?php
require "connect.php";
$sql = "SELECT * FROM `saklar` WHERE 1";
$result= mysqli_query($conn,$sql) or die('Errorquery:  '.mysqli_error($conn));
$rows =array();
while($baris=mysqli_fetch_assoc($result)) 
  {
    $rows[] = $baris;
  }
//$js['amount_of_data']=count(rows);
//$js['data']=$rows;
print json_encode($rows);
//$res = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
//echo json_encode($res, true);
?>
