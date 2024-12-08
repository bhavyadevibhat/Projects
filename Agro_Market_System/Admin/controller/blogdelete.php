<?php include '../../config.php';
    $admin=new Admin();
    $caid=$_GET['bid'];
    $stmt=$admin->cud("DELETE FROM `blog` WHERE `b_id`='$caid'","delete");
    echo "<script>alert('Data deleted successfully');window.location.href='../viewblog.php';</script>";
    ?>