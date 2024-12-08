<?php include '../../config.php';
$admin=new Admin();
$lid=$_GET['lid'];
$stmt=$admin->cud("DELETE FROM `location` WHERE `l_id`='$lid'","delete");
 echo "<script>alert('Data deleted successfully');window.location.href='../location.php';</script>";
