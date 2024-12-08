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
<div class=" " style="margin-left: 100px; margin-top: 100px; margin-bottom: 100px; margin-right:300px;"    >


<div class="bg-secondary rounded h-100 p-4" style="color:white;" >
    <h6 class="mb-4"> Monthly Report </h6></br>
    <form action="viewreport.php " method="POST" >
        <div  style="display:flex;">
        <label style="margin-left:30px;">From date : </label> <input type="date" name="date" placeholder="from date" required> <div ><p></p></div>
        <label  style="margin-left:150px;" >To date : </label> <input type="date" name="tdate" placeholder="to date"required>
        </div><br><br><br>
        <button type="submit" class="btn btn-primary" style="text-align: center; margin-left: 300px; " name="submit">submit</button></br><br><br><br><br>
    </form>
</div>
</div>



<?php if(isset($_POST['submit'])){ 




$fdate= $_POST['date'];
$tdate = $_POST['tdate'];
?>
                     
 <div class="midde_cont" style="margin-top:-300px; margin-left:400px; margin-bottom:800px;"  >
<div class="container-fluid">
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
                     <div class="row" style="margin-top:400px; margin-bottom:600px; margin-left:-700px;  ">
                           <!-- table section -->
                        <div class="col-md-6 col-md-12 "   >
                           <div class="  ">
                              <div class=" ">
                                 <div class="">
                                    <h2>Report</h2>
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
                                             <th>Farmer name</th>

                                             <th>product name</th>
                                             <th>Product image</th>
                                             <th>User Name</th>
                                             <th>Product Quantity</th>
                                             <th>Price</th>
                                          </tr>
                                 
                                       </thead>
                                       <?php
                                       $i=1;


$stmt = $admin->ret("SELECT * FROM `p_order` INNER JOIN `customer` ON customer.c_id = p_order.c_id INNER JOIN `product` ON product.pr_id = p_order.pr_id INNER JOIN `farmer` ON farmer.f_id = product.f_id  AND p_order.o_date BETWEEN '$fdate' AND '$tdate'");
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
?>  
                                       <tbody>
                                    

                                          <tr>
                                             <td><?php echo $i++;?></td>
                                             <td><?php echo $row['f_name'];?></td>

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

