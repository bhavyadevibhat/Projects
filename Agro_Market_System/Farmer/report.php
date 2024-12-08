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
<style>
   .overflow-container{max-height:100px;overflow:auto}
   </style>
</head>

<body>
<?php include 'header.php';?>

	
<?php include 'left sidebar.php';?>
<div class=" " style="margin-left: 100px; margin-top: 100px; margin-bottom: 100px; margin-right:300px;"    >


<div class="bg-secondary rounded h-100 p-4" style="color:white;">
    <h6 class="mb-4"> Monthly Report </h6></br>
    <form action="report.php " method="POST" >
        <div  style="display:flex;">
        <label style="margin-left:30px;">From date : </label> <input type="date" name="date" placeholder="from date" required> <div ><p></p></div>
        <label  style="margin-left:150px;" >To date : </label> <input type="date" name="tdate" placeholder="to date"required>
        </div><br><br><br>
        <button type="submit" class="btn btn-primary" style="text-align: center; margin-left: 300px; " name="submit">submit</button></br><br><br><br><br>
    </form>
</div>
</div>



<?php if(isset($_POST['submit'])){ 


$fid = $_SESSION['F_id'];

$fdate= $_POST['date'];
$tdate = $_POST['tdate'];
?>
                
 <div class="midde_cont" style="margin-top:-800px; margin-left:1100px; "  >
<div class="full_container">
<div class="row column_title">
<div class="col-md-12">
 </div>
                     </div>
                     <div class="midde_cont" style="margin-top:-100px; margin-left:400px; " >
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                       
                     
                        
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row" style="margin-top:400px; margin-bottom:600px; margin-left:-700px ;">
                           <!-- table section -->
                        <div class="col-md-6 col-md-12 "   >
                           
                              <div class=" ">
                                 <div class=" "> 
                                    <h2>Report</h2>
                                 </div>
                              </div>
                              <!-- <div class=" padding_infor_info"> -->
                                  
                                    <!-- <table class="table "> -->
                                    <div class="table_section padding_infor_info">
                                

                                    <table class="table table-hover">
                                       <thead>
                                          <tr>
                                             <th>SL No</th>
                                             <th>product name</th>
                                             <th>Product image</th>
                                             <th>User Name</th>
                                             <th>Product Quantity</th>
                                             <th>Price</th>
                                          </tr>
                                 
                                       </thead>
                                       <?php
                                       $i=1;


$stmt = $admin->ret("SELECT * FROM `p_order` INNER JOIN `customer` ON customer.c_id = p_order.c_id INNER JOIN `product` ON product.pr_id = p_order.pr_id INNER JOIN `farmer` ON farmer.f_id = product.f_id WHERE farmer.f_id='$fid' AND p_order.o_date BETWEEN '$fdate' AND '$tdate'");
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
?>  
                                       <tbody>
                                    

                                          <tr>
                                             <td><?php echo $i++;?></td>
                                             
                                             <td><?php echo $row['pr_name'];?></td>
                                             <td><img src="../Farmer/controller/<?php echo $row['pr_image'];?>"width="100px"height="100px"></td>
                                             <td><?php echo $row['c_name'];?></td>
                                             <td><?php echo $row['qty'];?></td>
                                             <td><?php echo $row['t_price'];?></td>
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


<?php } ?>
                                       


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