<?php
include '../../config.php';
$admin= new Admin();
if(isset($_POST['add'])){
    $name=$_POST['title'];
    $high=$_POST['highlight'];
    $details1=$_POST['about1'];
    $details2=$_POST['about2'];
    $id=$_POST['bid'];
    $target="upload/";
    $image=$target.basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'],$image);
    $stmt=$admin->cud("UPDATE `blog` SET `b_id`='$id',`b_name`='$name',`b_image`='$image',`b_highlight`='$high',`b_details1`='$details1',`b_details2`='$details2' WHERE `b_id`='$id' ","Update");
       echo"<script>alert('Data Updated succesfully');window.location.href='../viewblog.php';</script>";

}
?>