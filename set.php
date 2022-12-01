<?php
require "connect.php";
date_default_timezone_set('Asia/Jakarta');

$id = $_POST['id'];
$state = ($_POST['state']);
$waktu = date('Y-m-d H:i:s');
$sql = "INSERT INTO `p3k` VALUE('$id','$state', '$waktu')";
$result= mysqli_query($conn,$sql) or die('Errorquery:  '.mysqli_error($conn));
echo "$waktu"
//$rows =array();
//if ($conn->query($sql)) echo "$waktu";
?>