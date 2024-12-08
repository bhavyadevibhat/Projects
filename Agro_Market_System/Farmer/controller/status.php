<?php

    include '../../config.php';
    $admin = new Admin();


    if(isset($_GET['orderstatus']) ){

         $status = $_GET['orderstatus'];
         $odid = $_GET['odid'];
           $stmt = $admin -> cud("UPDATE `p_order` SET `o_status` = '$status' WHERE `o_id` = '$odid'  ","updated");
           echo "<script>alert('Status changed successfully.');window.location='../booking.php';</script>";      

    } 
    
    


    ?>