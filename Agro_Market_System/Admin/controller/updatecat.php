<?php
include '../../config.php';
$admin= new Admin();
if(isset($_POST['add'])){
    $name=$_POST['ca_name'];
    $id=$_POST['caname'];

    $stmt=$admin->cud("UPDATE `category` SET `ca_id`='$id',`ca_name`='$name' WHERE `ca_id`='$id' ","Update");
      echo"<script>alert('Data Updated succesfully');window.location.href='../category.php';</script>";

}
?>