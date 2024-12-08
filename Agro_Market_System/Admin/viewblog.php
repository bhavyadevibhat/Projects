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

  
<div class="midde_cont" style="margin-top:100px;" >
                           <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                          
                     
                        
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">
                           <!-- table section -->
                        <div class="col-md-12 "  >
                           <div class="  ">
                              <div class=" ">
                                 <div class="">
                                    <h2>Blog</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="">
                                    <table class="table table-hover" style="width:100%" id="example">
                                       <thead>
                                          <tr>
                                             <th>SL No</th>
                                             <th>Title</th>
                                             <th>Image</th>

                                             <th>Highlight</th>
                                             <th>Discription 1</th>
                                             <th>Discription 2</th>
                                             <th>Update</th>
                                             <th>Delete</th>
                                          </tr>
                                 
                                       </thead>
                                      
                                       <tbody>
                                       <?php
                                       $i=1;
                                       $stmt=$admin->ret("SELECT * FROM `blog`");
                                       while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                                       {
                                          ?>

                                          <tr>
                                             <td><?php echo $i++;?></td>
                                             <td><?php echo $row['b_name'];?></td>
                                            <td> <img src="controller/<?php echo $row['b_image'];?>" width="100px" height="100px" ></td>
                                             <td><?php echo $row['b_highlight'];?></td>
                                             <td><?php echo $row['b_details1'];?></td>
                                             <td><?php echo $row['b_details2'];?></td>
                                             <td><a href="updateblog.php?bid=<?php echo $row['b_id'];?>"><button type="submit"class="btn btn-success" >Update</button></a></td>
                                             <td><a href="controller/blogdelete.php?bid=<?php echo $row['b_id'] ; ?>" ><button type="button" class="btn btn-danger">Delete</button></a></td>
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