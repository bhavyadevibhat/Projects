<?php include '../../config.php';
$admin=new Admin();
$cid=$_GET['cid'];
$stmt=$admin->cud("DELETE FROM `customer` WHERE `c_id`='$cid'","delete");
 echo "<script>alert('Data deleted successfully');window.location.href='../customer.php';</script>";