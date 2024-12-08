<?php include '../../config.php';
$admin=new Admin();
$prid=$_GET['prid'];
$stmt=$admin->cud("DELETE FROM `product` WHERE `pr_id`='$prid'","delete");
 echo "<script>alert('Data deleted successfully');window.location.href='../product.php';</script>";
