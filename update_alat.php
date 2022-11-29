<?php
  require "connect.php";
  date_default_timezone_set('Asia/Jakarta');
  $id_alat=$_GET['ID_ALAT'];
  $status_led=$_GET['STATUS'];
  $waktu = date('Y-m-d H:i:s');
  
  
  // $query="INSERT INTO `saklar` VALUES( $status_led, '$waktu',  '$id_alat') ";
  // $result = mysqli_query($conn,$query) or die('Errorquery:  '.mysqli_error($conn)); 
   
  if ($status_led == '0'){	  
  $query="INSERT INTO `saklar` VALUES (  'SWITCH_1', '$waktu',0 ) ";
  $result = mysqli_query($conn,$query) or die('Errorquery:  '.mysqli_error($conn)); 
  }
  
  if ($status_led == '1'){	  
  $query="INSERT INTO `saklar` VALUES (  'SWITCH_1', '$waktu',1 )";
  $result = mysqli_query($conn,$query) or die('Errorquery:  '.mysqli_error($conn));  
  }
     
  
  // $query1="SELECT `STATUS` FROM `saklar` WHERE `ID_SAKLAR` ='$id_alat'";
  // $result1 = mysqli_query($conn,$query1) or die('Errorquery:  '.mysqli_error($conn));
  // $rows =array();
  // while($baris=mysqli_fetch_row($result1)) 
  // {
  //   $rows[] = $baris;
  // }
  // print json_encode($rows);
  
?>

