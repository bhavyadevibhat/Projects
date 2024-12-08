<?php include '../../config.php';
$admin=new Admin();
$fid=$_GET['fid'];
$stmt=$admin->cud("DELETE FROM `farmer` WHERE `f_id`='$fid'","delete");
 echo "<script>alert('Data deleted successfully');window.location.href='../farmer.php';</script>";