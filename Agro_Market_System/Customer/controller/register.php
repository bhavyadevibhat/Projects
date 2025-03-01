<?php
include '../../config.php';
$admin= new Admin();
if(isset($_POST['submit'])){
    $name=$_POST['c_name'];
    $email=$_POST['c_email'];
    $password=$_POST['c_password'];
    $address=$_POST['c_address'];
    $phone=$_POST['c_phone'];
    $stmt=$admin->cud("INSERT INTO `customer`(`c_name`,`c_email`,`c_password`,`c_address`,`c_phone`)VALUES('$name','$email','$password','$address','$phone')","Inserted");
     echo"<script>alert('Registration Sucessfull');window.location.href='../index.php';</script>";

}
?>