<?php
include '../config.php';
$admin=new Admin();

$cid=$_SESSION['c_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">


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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        .container {
            max-width: 960px;
        }

        .lh-condensed {
            line-height: 1.25;
        }
    </style>
</head>

<body class="goto-here">
		<?php include 'header.php';?>
    </div>
	
	<?php include 'header2.php';?>


    
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>




    <div class="container" style="margin-top: 100px;">
        <div class="py-5 text-center">
            <!-- <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
            <h2 style="color:black">Checkout form</h2>

        </div>
        <div class="row" style="background-color:lightblue">
            <div class="" style=" margin-top:50px;">
                <h4 class="d-flex justify-content-between align-items-center mb-3" >
                    <span class="text-muted">Your cart</span>
                    <?php
                        $stmt2=$admin->ret("SELECT COUNT(*) FROM `cart` WHERE `c_id`='$cid'");
                        $row1=$stmt2->fetch(PDO::FETCH_ASSOC);
                        $qty=implode($row1);
                    ?>
                    <span class="badge badge-secondary badge-pill"><?php echo $qty?></span>
                </h4>
                <ul class="list-group mb-3 sticky-top">
                    <?php
                    $total=0;
                    $gtotal=0;
                    $stmt=$admin->ret("SELECT * FROM `cart` INNER JOIN `product` ON product.pr_id=cart.pr_id WHERE `c_id`='$cid'");
                    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                        $qty=$row['ct_quantity'];
                        $price=$row['pr_kg'];
                        $total=$qty*$price;
                        $gtotal=$gtotal+$total;
                    ?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0" style="color:black"><?php echo $row['pr_name'] ?></h6>
                            <small class="text-muted">Quantity:<?php echo $row['ct_quantity'] ?></small>
                        </div>
                        <span class="text-muted">₹ <?php echo $row['ct_quantity']*$row['pr_kg'] ?></span>
                    </li>
                    <?php } ?>
                  
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total</span>
                        <strong>₹<?php echo $gtotal ?></strong>
                    </li>
                  
                </ul>
            
            </div><br><br><br><br>
            <div class="col-md-8 " style=" width:1000px ; margin-top:100px; margin-bottom:50px;">
                <h4 class="mb-3">Billing address</h4>
                <form action="controller/checkout.php" method="POST" class="needs-validation" novalidate="">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" name="fname" class="form-control" id="firstName" placeholder="First Name" value="" required="">
                            <div class="invalid-feedback"> Valid first name is required. </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" name="lname" class="form-control" id="lastName" placeholder="Last Name" value="" required="">
                            <div class="invalid-feedback"> Valid last name is required. </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted"></span></label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" required>
                        <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                    </div>
                    <div class="mb-3">
                        <label for="tel">Phone No <span class="text-muted"></span></label>
                        <input type="tel" name="phone" class="form-control" id="ch_phone" placeholder="Your Phone No" required>
                        <div class="invalid-feedback"> Please enter a valid Phone Number for shipping updates. </div>
                    </div>



                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Your Address" required="">
                        <div class="invalid-feedback"> Please enter your shipping address. </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <input type="text" name="country" class="form-control" id="address" placeholder="Country" required="">

                            <div class="invalid-feedback"> Please select a valid country. </div>
                        </div>

                    
                        <div class="col-md-5 mb-3">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control" id="address" placeholder="City" required="">

                            <div class="invalid-feedback"> Please select a valid city. </div>
                        </div></div>
                     
                        <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">State</label>
                            <input type="text" name="state" class="form-control" id="address" placeholder="State" required="">

                            <div class="invalid-feedback"> Please select State. </div>
                        </div>
                    
                        
                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" name="zip" class="form-control" id="zip" placeholder="Zip Code" required="">
                            <div class="invalid-feedback"> Zip code required. </div>
                        </div>
                    </div>
                    </div>
                    </div>

                    <hr class="mb-4">
                    <h4 class="mb-3" style="color:black">Payment</h4>
                    <div class="payment-methods">
                        <div class="Pement">


                        </div>
                        <div class="card-info pt-40 ">

                        <div>
                            <input type="radio" name="payment_method" value="cash" id="cash" onclick="cardform(this.value)" required>&nbsp;
                          <label style="font-family: 'Open Sans', sans-serif;">Cash On Delivery</label>
                          </div>
                            <br>


                            <input type="radio" name="payment_method" value="upi" id="upi" onclick="cardform(this.value)" required>&nbsp;
                            <label style="font-family: 'Open Sans', sans-serif;">UPI / Netbanking</label>
                            <div style="display:none;" id="upi_div">

                                <div class="Pement">
                                    <div class="form-box" style="display: flex;flex-direction:column">
                                        <label>Scan and Pay</label>
                                        <img src="upi.png" height="180px" width="180px">

                                    </div>
                                    <br>
                                    <div class="form-box" style="display: flex;flex-direction:column">
                                        <label>Trans / Id</label>
                                        <input type="text" name="transaction" placeholder="0000 0000 0000 0000 " style="width: 200px;">


                                    </div>
                                </div>


                            </div><br>

                            <input type="radio" name="payment_method" value="card" id="card" onclick="cardform(this.value)" required title="Please Select">&nbsp;
                            <label style="font-family: 'Open Sans', sans-serif;padding-bottom: 15px;">Debit Card / Credit Card</label><br>
                            <div style="display:none;" id="card_div">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="cc-name">Name on card</label>
                                        <input type="text" class="form-control" id="cc-name" name="cardname" placeholder="">
                                        <small class="text-muted">Full name as displayed on card</small>
                                        <div class="invalid-feedback"> Name on card is required </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="cc-number">Credit card number</label>
                                        <input type="text" class="form-control" id="cc-number" name="cardnumber" placeholder="">
                                        <div class="invalid-feedback"> Credit card number is required </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="cc-expiration">Expiry date</label>
                                        <input type="date" class="form-control" id="cc-expiration" name="expiry" placeholder="">
                                        <div class="invalid-feedback"> Expiration date required </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="cc-cvv">CVV</label>
                                        <input type="password" class="form-control" id="cc-cvv" name="cvv" placeholder="">
                                        <div class="invalid-feedback"> Security code required </div>
                                    </div>
                                </div>




                            </div>
                           
                        </div>
                        <hr class="mb-4">
                        <input class="btn btn-primary btn-lg btn-block" type="submit" name="checkout" value="Continue to checkout">
                </form>
            </div>
        </div><br><br><br>
      
    </div>

    <?php include 'footer.php';?>
    <script>
        (function() {
            'use strict'

            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation')

                // Loop over them and prevent submission
                Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
            }, false)
        }())
    </script>


    <script>
        function cardform(myvalue) {

            if (myvalue == 'card') { //radio button id
                document.getElementById('card_div').style.display = 'block'; //div id
                document.getElementById('upi_div').style.display = 'none';
                document.getElementById('cash_div').style.display = 'none';

            } else if (myvalue == 'upi') {
                document.getElementById('card_div').style.display = 'none';
                document.getElementById('upi_div').style.display = 'block';
                document.getElementById('cash_div').style.display = 'none';
            } else {
                document.getElementById('card_div').style.display = 'none';
                document.getElementById('upi_div').style.display = 'none';
                document.getElementById('cash_div').style.display = 'block';
            }

        }
    </script>

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