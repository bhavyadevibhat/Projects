<?php include '../config.php';
$admin=new Admin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

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
<div class="white_shd full margin_bottom_30" style="margin-top:600px;">
                            
                           
                           <div class="midde_cont" style="margin-top:-400px; margin-left:100px;width:100%;" >
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                          
                     
                        
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">
                           <!-- table section -->
                        <div class="col-md-10 "  >
                           <div class="  ">
                              <div class=" ">
                                 <div class="">
                                    <h2>Feedback</h2>
                                 </div>
                              </div>
                              <!-- <div class=" padding_infor_info"> -->
                                 <!-- <div class=""> -->
                                    <!-- <table class="table "> -->
                                    <div class="table_section padding_infor_info">
                                 <div class="">
                                    <table class="table table-hover">
                                       <thead>
                                          <tr>
                                             <th>SL No</th>
                                             <th>product name</th>
                                             <th>Farmer name</th>
                                             <th>User Name</th>
                                             <th>Email</th>
                                             <th>Product image</th>
                                             <th>Message</th>
                                          </tr>
                                 
                                       </thead>
                                      
                                       <tbody>
                                       <?php
                              

                                       $i=1;
                                       $stmt=$admin->ret("SELECT * FROM `feedback` INNER JOIN `p_order` ON p_order.o_id = feedback.o_id INNER JOIN `product` ON product.pr_id = p_order.pr_id INNER JOIN `farmer` ON farmer.f_id = product.f_id ");
                                       while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                                       {
                                          ?>

                                          <tr>
                                             <td><?php echo $i++;?></td>
                                             
                                             <td><?php echo $row['pr_name'];?></td>
                                             <td><?php echo $row['f_name'];?></td>

                                             <td><?php echo $row['fb_name'];?></td>
                                             <td><?php echo $row['fb_email'];?></td>
                                             <td><img src="../Customer/controller/<?php echo $row['fb_image'];?>" width="100px" height="100px"></td>
                                             <td><?php echo $row['fb_details'];?></td>
                                             
                                             
                                          </tr>
                                    <?php   } ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        </div>
                        </div>

                             
                           </div> 
                        <br>
                        <br><br>



                                       </div>


<?php include 'footer.php'; ?>


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