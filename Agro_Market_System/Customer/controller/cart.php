<?php include '../../config.php';
$admin=new Admin();

$quantity=$_POST['quantity'];
$pid=$_POST['pid'];
$cid=$_SESSION['c_id'];
$stmt=$admin->ret("SELECT * FROM `cart` WHERE `pr_id`='$pid'AND `c_id`='$cid'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);
    $num=$stmt->rowCount();
    if($num>0){
        $updatedquant=0;
        $dbqty=$row['ct_quantity'];
        $updatedquant=$quantity+$dbqty;
        $stmt1=$admin->cud("UPDATE `cart` SET `ct_quantity`='$updatedquant'WHERE `pr_id`='$pid'AND`c_id`='$cid'","updated");
         echo"<script>window.location.href='../cart.php';</script>";
    }else{
        $stmt2=$admin->cud("INSERT INTO`cart`(`pr_id`,`c_id`,`ct_quantity`,`ct_date`)VALUES('$pid','$cid','$quantity',now())","saved");
         echo"<script>window.location.href='../cart.php';</script>";
    }

?>