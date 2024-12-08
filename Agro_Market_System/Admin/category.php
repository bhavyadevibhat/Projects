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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"/>
      <!--[if lt IE 9]>-->
      <script src=" https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
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
      

   <!--   <![endif]-->
   
<script>
   $(document).ready(function () {
    $('#example').DataTable();
});
   </script>
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


<div class="white_shd full margin_bottom_30">
    
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Add catogory</h2>
                                 </div>
                              </div>
                              <form method="post" action="controller/categoryinsert.php">
                              <div class="full progress_bar_inner">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="full">
                                          <div class="padding_infor_info">
                                             
                                              <label><b> Category Name : </b> </label>

                                          <input type="text" name="ca_name" class="form-control"  required >
                                            <br><br><br>


                                               <button type="submit" name="add" class="btn btn-success btn-rounded" style="margin-left:500px"> Add </button>





                                             </div>
                                             


                                             
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>

</form>
                           </div>
                           
                           <div class="midde_cont" style="margin-top:-500px; margin-left:300px; width:100%;" >
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
                                    <h2>Category</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="">
                                    <table class="table table-hover" style="width:100%" id="example">
                                       <thead>
                                          <tr>
                                             <th>SL No</th>
                                             <th>Category Name</th>
                                             <th>Update</th>
                                             <th>Delete</th>
                                          </tr>
                                 
                                       </thead>
                                      
                                       <tbody>
                                       <?php
                                       $i=1;
                                       $stmt=$admin->ret("SELECT * FROM `category`");
                                       while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                                       {
                                          ?>

                                          <tr>
                                             <td><?php echo $i++;?></td>
                                             <td><?php echo $row['ca_name'];?></td>
                                             <td><a href="updatecat.php?caid=<?php echo $row['ca_id'];?>"><button type="submit" class="btn btn-success">Update</button></a></td>
                                             <td><a href="controller/categorydelete.php?caid=<?php echo $row['ca_id'] ; ?>" ><button type="button" class="btn btn-danger">Delete</button></a></td>
                                          </tr>
                                    <?php   } ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        
               
                             
                           </div> 
                        <br>
                        <br><br>








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