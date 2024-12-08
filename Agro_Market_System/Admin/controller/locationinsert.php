<?php
include '../../config.php';
$admin= new Admin();
if(isset($_POST['add'])){
    $name=$_POST['l_name'];
    $stmt=$admin->cud("INSERT INTO `location`(`l_name`)VALUES('$name')","Inserted");
     echo"<script>alert('Data inserted succesfully');window.location.href='../location.php';</script>";

}
?>