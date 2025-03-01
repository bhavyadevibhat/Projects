<?php
include '../../config.php';
$admin= new Admin();
$cid=$_SESSION['c_id'];

if(isset($_POST['send'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pname=$_POST['sub'];
    $oid =$_POST['oid'];
     $image_path="uploader/".basename($_FILES['image']['name']);
     move_uploaded_file($_FILES['image']['tmp_name'],$image_path);
    
     $details=$_POST['details'];
   
    $stmt2=$admin->cud("INSERT INTO `feedback`(`c_id`,`o_id`,`fb_name`,`fb_email`,`fb_sub`,`fb_details`,`fb_image`)VALUES('$cid','$oid','$name',' $email','$pname','$details','$image_path')","Inserted");
       echo"<script>alert('Feedback Sent Succesfully');window.location.href='../status.php';</script>";


}

?>
