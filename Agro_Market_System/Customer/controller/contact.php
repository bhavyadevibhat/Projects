<?php
include '../../config.php';
$admin= new Admin();
if(isset($_POST['sub'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $msg=$_POST['msg'];
    
    $stmt=$admin->cud("INSERT INTO `contact`(`co_name`,`co_email`,`co_message`)VALUES('$name','$email','$msg')","Inserted");
    echo"<script>alert('Message Sent Sucessfull');window.location.href='../index.php';</script>";

}
?>