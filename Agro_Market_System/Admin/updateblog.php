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
<!-- <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Blog Details</h4>
                
                  <form action="../controller/addblog.php" method="POST" enctype="multipart/form-data" class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputName1">Blog Title</label>
                      <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Blog Title">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Blog Highlight Title</label>
                      <input type="text" name="highlight" class="form-control" id="exampleInputName1" placeholder="Highlight">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Blog Description 1</label>
                      <textarea class="form-control" name="about1" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Blog Description 2</label>
                      <textarea class="form-control" name="about2" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="img" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                   
                    <button type="submit" name="add" class="btn btn-primary me-2">Add</button>
                    <button class="btn btn-light" type="reset">Clear</button>
                  </form>
                </div>
              </div>
            </div>
        </div> -->
       <?php 
       $catid=$_GET['bid'];
       $stmt=$admin->ret("SELECT * FROM `blog` WHERE `b_id`='$catid' ");
       $row=$stmt->fetch(PDO::FETCH_ASSOC);
       
    ?>
        <div class="white_shd full margin_bottom_30">
    
    <div class="full graph_head">
       <div class="heading1 margin_0">
          <h2>Update blog</h2>
       </div>
    </div>
    <form method="post" action="controller/blogupdate.php"enctype="multipart/form-data" class="forms-sample">
    <div class="full progress_bar_inner">
       <div class="row">
          <div class="col-md-12">
             <div class="full">
                <div class="padding_infor_info">
                <div class="form-group">
                      <label for="exampleInputName1">Blog Title</label>

                      <input type="text" name="title" value="<?php echo $row['b_name']?>" class="form-control" >
                      <input class="form-control" value=<?php echo $row['b_id']?>  name="bid" type="hidden" >
                    </div>
                 <div class="form-group">
                      <label for="exampleInputName1">Blog Highlight Title</label>
                      <input type="text" name="highlight"value="<?php echo $row['b_highlight']?> "class="form-control" id="exampleInputName1" placeholder="Highlight">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Blog Description 1</label>
                      <textarea class="form-control" name="about1" id="exampleTextarea1" rows="8"><?php echo $row['b_details1']?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Blog Description 2</label>
                      <textarea class="form-control"name="about2" id="exampleTextarea1" rows="8"><?php echo $row['b_details2']?> </textarea>
                    </div>
                    <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="img" class="file-upload-default"required>
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                   
                    <button type="submit" name="add" class="btn btn-primary me-2">Update</button>
                    <button class="btn btn-light" type="reset">Clear</button>
                  </form>
                </div>
             </div>
          </div>
       </div>
    </div>

</form>




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