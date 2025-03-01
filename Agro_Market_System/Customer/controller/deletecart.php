<?php include '../../config.php';
$admin=new Admin();

$cartid=$_GET['cartid'];

$stmt=$admin->cud("DELETE FROM `cart` WHERE `ct_id`='$cartid'","Deleted");

echo"<script>alert('Item removed from cart succesfully');window.location.href='../cart.php';</script>";

?>