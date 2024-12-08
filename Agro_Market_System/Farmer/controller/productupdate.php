<?php
include '../../config.php';
$admin= new Admin();
if(isset($_POST['add'])){
  $id=$_POST['prid'];
    $caname=$_POST['ca_name'];
    $name=$_POST['pr_name'];
    $prkg=$_POST['pr_kg'];
    $prdetails=$_POST['pr_details'];
    $prquantity=$_POST['pr_quantity'];
    $image_path="uploader/".basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'],$image_path);
    
    $stmt=$admin->cud("UPDATE `product` SET ca_id='$caname',`pr_name`='$name',`pr_kg`='$prkg',`pr_details`='$prdetails',`pr_quantity`='$prquantity',`pr_image`='$image_path' WHERE `pr_id`='$id' ","Update");
       echo"<script>alert('Data Updated succesfully');window.location.href='../productview.php';</script>";

}
