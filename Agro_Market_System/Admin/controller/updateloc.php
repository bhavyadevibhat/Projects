<?php
include '../../config.php';
$admin= new Admin();
if(isset($_POST['add'])){
    $name=$_POST['l_name'];
    $id=$_POST['laname'];

    $stmt=$admin->cud("UPDATE `location` SET `l_id`='$id',`l_name`='$name' WHERE `l_id`='$id' ","Update");
      echo"<script>alert('Data Updated succesfully');window.location.href='../location.php';</script>";

}
?>