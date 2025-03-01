<?php include '../config.php';
$admin=new Admin();
if(!isset($_SESSION['c_id'])){
    header('Location:login.php');
}

$cid = $_SESSION['c_id'];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customert</title>
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
    <style> 
    /* body {
    background: lightblue;
} */

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
</style>
</head>
<body class="goto-here" >
<?php include 'header.php';?>
    </div>
	
	<?php include 'header2.php';?>
    
<div class="container rounded bg-white mt-5 mb-5">
<?php

$cid=$_SESSION['c_id'];
$stmt=$admin->ret("SELECT * FROM `Customer`where `c_id`=$cid ");
$row=$stmt->fetch(PDO::FETCH_ASSOC);



?>

    <div class="row" style="background-color:lightblue">
     <form method="POST" action="controller/profile.php">
            <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?php echo $row['c_name']?></span><span class="text-black-50"><?php echo $row['c_email']?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control"  value="<?php echo $row['c_name']?>"></div>
                </div>
                <div class="row mt-3">
                <div class="col-md-12"><label class="labels">Email ID</label><input type="email" class="form-control"value="<?php echo $row['c_email']?>"  ></div>
                    <div class="col-md-12"><label class="labels">Change Password</label><input type="password" class="form-control" placeholder="Enter New Password" value="<?php echo $row['c_password']?>"></div>
                   

                    <div class="col-md-12"><label class="labels"> Change Address</label><input type="text" class="form-control" value="<?php echo $row['c_address']?>"></div>
                    <div class="col-md-12"><label class="labels">Phone No</label><input type="text" class="form-control" value="<?php echo $row['c_phone']?>"></div>
                    
                </div>
               
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" name="submit"type="button">Save Profile</button></div>
            </div>
        </div>
       
    </div>
</div>
</form>
</div>
</div>
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