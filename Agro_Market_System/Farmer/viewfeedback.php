<?php include '../config.php';
$admin= new Admin();

if(!isset($_SESSION['F_id'])){
	header('Location:login.php');
} ?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Farmer</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>

<body>
<?php include 'header.php';?>

	
<?php include 'left sidebar.php';?>
<div class="white_shd full margin_bottom_30" style="margin-top:600px;width:100%;">
                            
                           
                           <div class="midde_cont" style="margin-top:-500px; margin-left:200px; " >
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                          
                     
                        
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">
                           <!-- table section -->
                        <div class="col-md-6 "  >
                           <div class="  ">
                              <div class=" ">
                                 <div class="">
                                    <h4>Feedback</h4>
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
                                             <th>User Name</th>
                                             <th>Email</th>
                                             <th>Product image</th>
                                             <th>Message</th>
                                          </tr>
                                 
                                       </thead>
                                      
                                       <tbody>
                                       <?php
                                          $fid = $_SESSION['F_id'];

                                       $i=1;
                                       $stmt=$admin->ret("SELECT * FROM `feedback` INNER JOIN `p_order` ON p_order.o_id = feedback.o_id INNER JOIN `product` ON product.pr_id = p_order.pr_id INNER JOIN `farmer` ON farmer.f_id = product.f_id WHERE farmer.f_id = '$fid' ");
                                       while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                                       {
                                          ?>

                                          <tr>
                                             <td><?php echo $i++;?></td>
                                             
                                             <td><?php echo $row['pr_name'];?></td>
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

<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="vendors/scripts/dashboard.js"></script>
						 
</body>
</html>