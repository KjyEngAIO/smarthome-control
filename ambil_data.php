<?php
require "connect.php";
$id_alat=$_GET['ID_ALAT'];

$sql = "SELECT saklar.ID_SAKLAR,saklar.WAKTU,saklar.STATUS FROM saklar WHERE `ID_SAKLAR`='$id_alat'";
$result= mysqli_query($conn,$sql) or die('Errorquery:'.mysqli_error($conn));
while($baris=mysqli_fetch_assoc($result)) 
  {
    $rows = $baris;
  }  
echo json_encode($rows);
?>