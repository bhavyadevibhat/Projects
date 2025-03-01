<?php include '../../config.php';
$admin=new Admin();

$oid=$_GET['odid'];

$stmt=$admin->cud("UPDATE `p_order` SET `o_status`='cancelled' WHERE `o_id`='$oid'","Updated");

echo"<script>alert('Order cancelled succesfully');window.location.href='../status.php';</script>";

?>