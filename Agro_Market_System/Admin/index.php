
<?php include '../config.php';
$admin=new Admin();
if(!isset($_SESSION['a_id'])){
	header('Location:login.php');
}


$stmt1=$admin->ret("SELECT COUNT(*) FROM `customer`");
$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
$a=implode($row1);


$stmt2=$admin->ret("SELECT COUNT(*) FROM `p_order`");
$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
$b=implode($row2);

$stmt3=$admin->ret("SELECT  COUNT(*) FROM `product`");
$row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
$c=implode($row3);

$stmt4=$admin->ret("SELECT  COUNT(*) FROM `farmer`");
$row4 = $stmt4->fetch(PDO::FETCH_ASSOC);
$d=implode($row4);


?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title> Admin </title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <?php
            include 'sidebar.php';
            ?>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
             
<?php
include 'header.php';
?>




               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Dashboard</h2>
                           </div>
                        </div>
                     </div>
                     <div class="row column1">
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-user yellow_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no"><?php echo $a ; ?></p>
                                    <p class="head_couter">Total Number of User</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-user yellow_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no"><?php echo $d ; ?></p>
                                    <p class="head_couter">Total Number of Farmer</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                 <i class="fa fa-clock-o blue1_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no"><?php echo $b ; ?></p>
                                    <p class="head_couter">Total Number of Orders </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                 <i class="fa fa-clock-o blue1_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no"><?php echo $c ; ?></p>
                                    <p class="head_couter">Total Number of Product</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row column1 social_media_section">
                        <div class="col-md-6 col-lg-3">
                           <div class="full socile_icons fb margin_bottom_30">
                              <div class="social_icon">
                                 <!-- <i class="fa fa-facebook"></i> -->
                              </div>
                              <div class="social_cont">
                                 <ul>
                                    <li>
                                       <span><strong></strong></span>
                                       <span></span>
                                    </li>
                                    <li>
                                       <span><strong></strong></span>
                                       <span></span>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full socile_icons tw margin_bottom_30">
                              <div class="social_icon">
                                 <!-- <i class="fa fa-twitter"></i> -->
                              </div>
                              <div class="social_cont">
                                 <ul>
                                    <li>
                                       <span><strong></strong></span>
                                       <span></span>
                                    </li>
                                    <li>
                                       <span><strong></strong></span>
                                       <span></span>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full socile_icons linked margin_bottom_30">
                              <div class="social_icon">
                                 <!-- <i class="fa fa-linkedin"></i> -->
                              </div>
                              <div class="social_cont">
                                 <ul>
                                    <li>
                                       <span><strong></strong></span>
                                       <span></span>
                                    </li>
                                    <li>
                                       <span><strong></strong></span>
                                       <span></span>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full socile_icons google_p margin_bottom_30">
                              <div class="social_icon">
                                 <!-- <i class="fa fa-google-plus"></i> -->
                              </div>
                              <div class="social_cont">
                                 <ul>
                                    <li>
                                       <span><strong></strong></span>
                                       <span></span>
                                    </li>
                                    <li>
                                       <span><strong></strong></span>
                                       <span></span>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- graph -->
                    
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- footer -->




                  <?php
                  include 'footer.php';
                  ?>
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <script src="js/chart_custom_style1.js"></script>
   </body>
</html>