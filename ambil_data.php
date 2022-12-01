<?php
require "connect.php";
$id_alat=$_GET['ID_ALAT'];

$sql = "SELECT p3k.ID_SAKLAR,p3k.WAKTU,p3k.STATUS_P3KBOX1 FROM p3k WHERE `ID_p3k`='$id_alat'";
$result= mysqli_query($conn,$sql) or die('Errorquery:'.mysqli_error($conn));
while($baris=mysqli_fetch_assoc($result)) 
  {
    $rows = $baris;
  }  
echo json_encode($rows);
?>