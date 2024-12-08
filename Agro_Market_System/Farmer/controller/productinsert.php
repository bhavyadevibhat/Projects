<?php
include '../../config.php';
$admin= new Admin();
if(isset($_POST['add'])){
    $pc_name=$_POST['ca_id'];
    $pr_name=$_POST['pr_name'];
    $pr_kg=$_POST['pr_kg'];
    $fid = $_POST['fid'];
    $pr_details=$_POST['pr_details'];
    $pr_quantity=$_POST['pr_quantity'];
    $image_path="uploader/".basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'],$image_path);


    $stmt=$admin->cud("INSERT INTO `product`(`ca_id`,`f_id`,`pr_name`,`pr_kg`,`pr_details`,`pr_quantity`,`pr_image`)VALUES('$pc_name','$fid','$pr_name','$pr_kg','$pr_details','$pr_quantity','$image_path')","Inserted");
      echo"<script>alert('Data inserted succesfully');window.location.href='../product.php';</script>";

}
?>