<?php
include '../config.php';
$admin = new Admin();
if(!isset($_SESSION['c_id'])){
    header('Location:login.php');
}
  $uid=$_SESSION['c_id'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status</title>
    <link rel="stylesheet" href="status.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<div style="margin-bottom: 160px;">
    <?php
    include 'header.php';
    include 'header2.php';
    ?>
    </div>

    <div>
    <h3 style="margin-bottom:20px;text-align:center">Your Order Status</h3>
    </div>
     <?php
        $stmt=$admin->ret("SELECT * FROM `p_order` INNER JOIN `product` ON product.pr_id=p_order.pr_id  WHERE p_order.c_id='$uid' ORDER BY p_order.o_id DESC");
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        ?>

    <div style="padding:40px 40px 20px 40px">
       
       
        <div style="background-color:#F5EBEB;padding:10px">
            <div style="display: flex;">
            <h6 style="color:black">Ordered date:&nbsp;<?php echo $row['o_date'] ?></h6>
           
            <?php if($row['o_status']=='cancelled'){ ?>
                <button class="btn btn-danger" style="margin-left: 700px;">Order Cancelled</button>
            <?php } else { ?>
            <a href="controller/cancelorder.php?odid=<?php echo $row['o_id'] ?>" class="btn btn-success" style="margin-left: 700px;">Cancel Order</a>
           <?php } ?>
            </div>
            <?php
                if($row['o_status']=='ordered'){
            ?>
            <ol class="progtrckr" data-progtrckr-steps="4">
                <li class="progtrckr-done">Order Processing</li>
                <li class="progtrckr-todo">Picked by courier</li>
                <li class="progtrckr-todo">On the way</li>
                <li class="progtrckr-todo">Ready for Delivery</li>
         
            </ol>
            <?php } else if($row['o_status']=='Picked by courier'){ ?>

                <ol class="progtrckr" data-progtrckr-steps="4">
                <li class="progtrckr-done">Order Processing</li>
                <li class="progtrckr-done">Picked by courier</li>
                <li class="progtrckr-todo">On the way</li>
                <li class="progtrckr-todo">Ready for Delivery</li>
         
            </ol>
         
            <?php } else if($row['o_status']=='On the way'){ ?>

                <ol class="progtrckr" data-progtrckr-steps="4">
                <li class="progtrckr-done">Order Processing</li>
                <li class="progtrckr-done">Picked by courier</li>
                <li class="progtrckr-done">On the way</li>
                <li class="progtrckr-todo">Ready for Delivery</li>
         
            </ol>
          
            <?php } else if($row['o_status']=='Ready for Delivery'){ ?>

                <ol class="progtrckr" data-progtrckr-steps="4">
                <li class="progtrckr-done">Order Processing</li>
                <li class="progtrckr-done">Picked by courier</li>
                <li class="progtrckr-done">On the way</li>
                <li class="progtrckr-done">Ready for Delivery</li>
         
            </ol>
<div style="margin-top:100px;margin-left:360px;" >
            <a href="feedback.php?odid=<?php echo $row['o_id'] ?>" class="btn btn-success" style="margin-left: 700px;">FEEDBACK</a>
            </div>
          <?php  } ?>



            <div style="margin-top: 30px;">
                <div style="display: flex;gap:30px">
                    <img src="../Farmer/controller/<?php echo $row['pr_image'] ?>" alt="" style="width: 100px;height:100px">
                    <div>
                        <label style="font-size: 17px;">Product name : <?php echo $row['pr_name'] ?></label><br>
                        <label style="font-size: 17px;">Total Quanity: <?php echo $row['qty'] ?> Kg</label><br>
                        <label style="font-size: 17px;">Total Price : <?php echo $row['t_price'] ?> Rs</label><br>
                    </div>
                </div>
            </div>
        </div>
      
    </div>

    <?php } ?>


    <?php
    include 'footer.php';
    ?>
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/vendor/owl-carousel.min.js"></script>
    <script src="assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
    <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
</body>

</html>