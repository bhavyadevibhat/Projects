<?php include '../config.php';
$admin=new Admin();
$cid = $_GET['id'];
// if(!isset($_SESSION['c_id'])){
//   header('Location:login.php');
// }

// $cid = $_SESSION['c_id'];
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title> Customer </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
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
  </head>
  <body class="goto-here">
		
  <?php include 'header.php';?>

	<?php include 'header2.php';?>

    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/img11.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div>


   
    <section class="ftco-section">
    	<div class="container">


<select name="cid" onchange="filterCta(<?php echo $cid; ?>,this.value)">
  <option selected disabled >Filter By Category</option>
  <?php
  $st=$admin->ret("SELECT * FROM `category`");
  while($r=$st->fetch(PDO::FETCH_ASSOC)){
    ?>
     <option value="<?php echo $r['ca_id']; ?>"><?php echo $r['ca_name']; ?></option>

    <?php
  } ?>
 
</select>

<script>
  function  filterCta(fid,cid){
    window.location.href="product.php?id="+fid+"&cid="+cid;

  }
</script>

    		<!-- <div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="#" class="active">All</a></li>
    					<li><a href="#">Vegetables</a></li>
    					<li><a href="#">Fruits</a></li>
    					<li><a href="#">Juice</a></li>
    					<li><a href="#">Dried</a></li>
    				</ul>
    			</div>
    		</div> -->
    		<div class="row">
        <?php  
    
   if(isset($_GET['id']) AND isset($_GET['cid'])  ){
    $cid=$_GET['cid'];
    $fid=$_GET['id'];
    $stmt = $admin->ret("SELECT * FROM `product` WHERE `f_id`=$fid AND `ca_id`='$cid'");
   }else{
        
    $stmt = $admin->ret("SELECT * FROM `product` WHERE `f_id`=$cid ");

   }
    


   while($row= $stmt->fetch(PDO::FETCH_ASSOC)){
    
    ?>

    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="product2.php?pid=<?php echo $row['pr_id'] ; ?>&cid=<?php echo $row['ca_id'] ; ?>" class="img-prod"><img class="img-fluid" src="../Farmer/controller/<?php echo $row['pr_image'] ; ?>" alt="Colorlib Template">
    						<!-- <span class="status">30%</span> -->
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#"><?php echo $row['pr_name'] ; ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="price-sale"><?php echo $row['pr_kg'] ; ?> Rs</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    						
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>



    			
    			<?php } ?>
    			

    			
    		
    			
      </div>
    </section>

    
    
        <?php include 'footer.php';?>
      
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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