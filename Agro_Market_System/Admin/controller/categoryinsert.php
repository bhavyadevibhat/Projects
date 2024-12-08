<?php
include '../../config.php';
$admin= new Admin();
if(isset($_POST['add'])){
    $name=$_POST['ca_name'];
    $stmt=$admin->cud("INSERT INTO `category`(`ca_name`)VALUES('$name')","Inserted");
     echo"<script>alert('Data inserted succesfully');window.location.href='../category.php';</script>";

}
?>