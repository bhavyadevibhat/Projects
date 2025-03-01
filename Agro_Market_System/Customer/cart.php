<?php
// ini_set('display_errors', 0);
include '../config.php';
$admin = new Admin();

if(!isset($_SESSION['c_id'])){
    header('Location:login.php');
}

$cid = $_SESSION['c_id'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
 
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
    <link rel="stylesheet" href="cart.php">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body class="goto-here">
		<?php include 'header.php';?>
    </div>
	
	<?php include 'header2.php';?>

	<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="container px-3 my-5 clearfix">

        <!-- Shopping cart table -->
        <div class="card" id="tablecart">
            <div class="card-header">
                <h2>Shopping Cart</h2>
            </div>
            <?php
            $stmt4 = $admin->ret("SELECT * FROM `cart` WHERE `c_id`='$cid'");
            $num = $stmt4->rowCount();
            if ($num == 0) {
            ?>
                <h5 style="color:red;margin-left:500px">Your cart is empty!!</h5>
            <?php } else { ?>
                <div class="card-body">
                    <div class="table-responsive" style="display: flex;flex-direction:column-reverse">
                        <table class="table table-bordered m-0">
                            <thead>
                                <tr>
                                    <!-- Set columns width -->
                                    <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                                    <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                                    <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                                    <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                                    <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $grandtotal = 0;
                                $total = 0;
                                $stmt = $admin->ret("SELECT * FROM `cart` INNER JOIN `product` ON product.pr_id=cart.pr_id WHERE `c_id`='$cid'");
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                    $qty = $row['ct_quantity'];
                                    $price = $row['pr_kg'];

                                    $total = $qty * $price;

                                    $grandtotal = $grandtotal + $total;
                                ?>
                                    <tr>
                                        <td class="p-4">
                                            <div class="media" style="display: flex;flex-direction:column">
                                                <img src="../Farmer/controller/<?php echo $row['pr_image'] ?>" style="width: 150px;height:150;"  alt="">
                                                <div class="media-body">
                                                    <h6 style="margin-top: 5px;"><?php echo $row['pr_name'] ?></h6>
                                                    <small>

                                                        <span class="text-muted">Quantity: </span> <?php echo $row['ct_quantity'] ?> &nbsp;

                                                    </small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right font-weight-semibold align-middle p-4">₹<?php echo $row['pr_kg'] ?></td>

                                        <td class="align-middle p-4">

                                                <div class="col" style="display: flex;">
                                                    <button onclick="decrement(<?php echo $row['ct_id']; ?>)">-</button>

                                                    <input type="text" id="<?php echo $row['ct_id'] ?>" value="<?php echo $row['ct_quantity'] ?>" name="quantity" readonly style="width: 50px;">
                                                    <button onclick="increment(<?php echo $row['pr_quantity'] ?>,<?php echo $row['ct_id'] ?>)">+</button>
                                                </div>
                                        </td>
                                        <td class="text-right font-weight-semibold align-middle p-4">₹<?php echo $total ?></td>
                                        <td class="text-center align-middle px-0"><a href="controller/deletecart.php?cartid=<?php echo $row['ct_id'] ?>" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</a></td>
                                    </tr>

                                <?php } ?>

                            </tbody>

                            <div style="display: flex;flex-direction:column">

                                <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">

                                    <div class="d-flex">

                                        <div class="text-right mt-4" style="margin-left:960px">
                                            <label class="text-muted font-weight-normal m-0">Total price</label>

                                            <div class="text-large"><strong><?php echo $grandtotal ?></strong></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="float-right" style="margin-left: 700px;">
                                    <a href="index.php" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to shopping</a>
                                    <a href="checkout.php" class="btn btn-lg btn-primary mt-2">Checkout</a>
                                </div>
                            </div>
                        </table>
                    </div>
                    <!-- / Shopping cart table -->



                </div>
            <?php } ?>
        </div>

    </div>
    <div style="margin-top: 160px;">
        <?php
        include 'footer.php';
        ?>
    </div>


    <script>
        function increment(stock, cartid) {


            var qty = document.getElementById(cartid).value;
            qty = parseInt(qty) + 1;

            if (qty > stock) {

                alert('out of stock');
            } else {
                document.getElementById(cartid).value = qty;
                var xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        document.getElementById("tablecart").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "controller/updatecart.php?cartid=" + cartid + '&qty=' + qty, true);
                xmlhttp.send();

            }

        }

        function decrement(cartid) {

            var qty = document.getElementById(cartid).value;
            qty = parseInt(qty) - 1;
            if (qty > 0) {

                document.getElementById(cartid).value = qty;
                var xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        document.getElementById("tablecart").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "controller/updatecart.php?cartid=" + cartid + '&qty=' + qty, true);
                xmlhttp.send();

            }

        }
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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