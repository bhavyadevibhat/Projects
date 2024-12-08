<?php
include '../../config.php';
$admin= new Admin();
if(isset($_POST['submit'])){
   
    $email=$_POST['f_email'];
    $uname=$_POST['u_name'];
    $password=$_POST['f_password'];
    $name=$_POST['f_name'];
    $gender=$_POST['f_gender'];
    $city=$_POST['city'];
    $lid=$_POST['loc'];
    $state=$_POST['state'];
    $phone=$_POST['f_phone'];
    $stmt=$admin->cud("INSERT INTO `farmer`(`f_email`,`u_name`,`f_password`,`f_name`,`f_gender`,`f_city`,`l_id`,`f_state`,`f_phone`)VALUES('$email','$uname','$password','$name','$gender','$city','$lid','$state','$phone')","Inserted");
    echo"<script>alert('Registration Sucessfull');window.location.href='../index.php';</script>";

}
?>