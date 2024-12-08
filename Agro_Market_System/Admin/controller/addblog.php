<?php
include '../../config.php';
$admin=new Admin();

if(isset($_POST['add'])){
    $title=$_POST['title'];
    $about1=$_POST['about1'];
    $about2=$_POST['about2'];
    $highlight=$_POST['highlight'];

    $target="upload/";
    $image=$target.basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'],$image);


    $stmt=$admin->cud("INSERT INTO `blog`(`b_name`,`b_image`,`b_details1`,`b_details2`,`b_highlight`,`b_date`)VALUES('$title','$image','$about1','$about2','$highlight',now())","saved");
     echo "<script>window.location='../viewblog.php';</script>";

    
}
?>
