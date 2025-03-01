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
      <title>Customer login</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="../Admin/images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="../Admin/css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="../Admin/style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="../Admin/css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="../Admin/css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="../Admin/css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="../Admin/css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="../Admin/css/custom.css" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="../Admin/js/semantic.min.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="inner_page login" style="background-image:url('login6.jpg');background-size:cover;">
      <div class="full_container" style="margin-left:-300px;">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                     <div class="center">
                     <h1 style="color:mediumslateblue;font-size:90px;font-family:cursive;font-weight:bold;"> FARMIGOS</h1>
                     </div>
                  </div>
                  <div class="login_form">
                     <form method="post" action="controller/login.php">
                        <fieldset>
                           <div class="field">
                              <label class="label_field">Email Address</label>
                              <input type="email" name="email" placeholder="E-mail"required />
                           </div>
                           <div class="field">
                              <label class="label_field">Password</label>
                              <input type="password" name="password" placeholder="Password" required/>
                           </div>
                            
                           <div class="field margin_0">
                              <!-- <label class="label_field hidden">hidden label</label> -->
                              <button type="submit" name="login"class="main_bt">Sign In</button>
                           </div>
                           <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373" >OR</div><br>
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="register.php">Register To Create Account</a>
									</div>
									</div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="../Admin/js/jquery.min.js"></script>
      <script src="../Admin/js/popper.min.js"></script>
      <script src="../Admin/js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="../Admin/js/animate.js"></script>
      <!-- select country -->
      <script src="../Admin/js/bootstrap-select.js"></script>
      <!-- nice scrollbar -->
      <script src="../Admin/js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="../Admin/js/custom.js"></script>
   </body>
</html>