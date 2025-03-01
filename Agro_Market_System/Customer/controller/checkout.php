<?php include '../../config.php';
$admin=new Admin();
$cid=$_SESSION['c_id'];

if(isset($_POST['checkout'])){

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
     $phone=$_POST['phone'];
    $address=$_POST['address'];
    $country=$_POST['country'];
     $city=$_POST['city'];
    $state=$_POST['state'];
    $zip=$_POST['zip'];
    $paymethod=$_POST['payment_method'];
    $transaction=$_POST['transaction'];
    $cardname=$_POST['cardname'];
    $cardnumber=$_POST['cardnumber'];
    $expiry=$_POST['expiry'];
    $cvv=$_POST['cvv'];

    $stmt=$admin->ret("SELECT * FROM `cart` INNER JOIN `product` ON product.pr_id=cart.pr_id WHERE `c_id`='$cid'");
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        $pdid=$row['pr_id'];
        $cqty=$row['ct_quantity'];
        $price=$row['pr_kg'];

        $fid= $row['f_id'];

        $total=$cqty*$price;
        



    $stmt2=$admin->Rcud("INSERT INTO `p_order`(`c_id`,`pr_id`,`qty`,`t_price`,`o_status`,`o_date`)VALUES('$cid','$pdid','$cqty','$total','ordered',now())");

    

    $stmt3=$admin->cud("INSERT INTO `payment`(`o_id`,`f_id`,`c_id`,`p_type`,`card_name`,`card_no`,`cvv`,`exp_date`,`transaction_no`,`p_date`,`p_amt`)VALUES('$stmt2','$fid','$cid','$paymethod','$cardname','$cardnumber','$cvv','$expiry','$transaction',now(),'$total')","success");


    
    $stmt4=$admin->cud("INSERT INTO `checkout`(`o_id`,`c_id`,`f_name`,`l_name`,`ch_address`,`ch_email`,`ch_country`,`ch_city`,`ch_state`,`ch_zip`,`ch_phone`,`ch_date`)VALUES('$stmt2','$cid','$fname','$lname','$address','$email','$country','$city','$state','$zip','$phone',now())","saved");

    $stmt5=$admin->cud("DELETE FROM `cart` WHERE `c_id`='$cid'","deleted");
    echo "<script>window.location='../thankyoupage.php';</script>";
    }
}
?>