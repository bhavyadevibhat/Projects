<?php include '../config.php';
$admin=new Admin();?>
<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Farmer</title>

	<!-- Site favicon -->
    <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css"
  rel="stylesheet"
/>
</head>
<body style="background-image:url('reg1.jpeg');background-size:cover;" >
<section class="vh-100 bg-image" style="margin-left:-1000px; ">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form method="post" action="controller/register.php">

                <div class="form-outline mb-4">
                  <input type="text" name="f_name" id="form3Example1cg" class="form-control form-control-lg"required />
                  <label class="form-label" for="form3Example1cg">Full Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="u_name" id="form3Example1cg" class="form-control form-control-lg"required />
                  <label class="form-label" for="form3Example1cg">User Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email"name="f_email" id="form3Example3cg" class="form-control form-control-lg"required />
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="f_password "id="form3Example4cg" class="form-control form-control-lg" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required />
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password"name="f_password" id="form3Example4cdg" class="form-control form-control-lg" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"required />
                  <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                </div>

                <div class="form-outline mb-4">
                <div class="form-group row">
                <label class="col-sm-2 col-form-label">Gender</label>
											<div class="col-sm-4">
                <input type="radio" id="male"  value="male" name="f_gender" class="custom-control-input">
													<label class="custom-control-label" for="male" >Male</label>
                <input type="radio" id="female" value="female"  name="f_gender" class="custom-control-input">
													<label class="custom-control-label" for="female" >Female</label>
                </div></div></div>

                <div class="form-group row">
											<label class="col-sm-2 col-form-label">Location</label>
											<div class="col-sm-10">
												<select name="loc" class="form-control"required>
													<?php
													$stmt = $admin->ret("SELECT * FROM `location`");
													while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
													
													?>
													<option value="<?php echo $row['l_id']?>" > <?php echo  $row['l_name'] ?> </option>
													<?php } ?>
</select>
											</div>
										</div>

                                    
                <div class="form-outline mb-4">
                  <input type="text"name="city" id="form3Example4cdg" class="form-control form-control-lg" required/>
                  <label class="form-label" for="form3Example4cdg">Your City</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text"name="state" id="form3Example4cdg" class="form-control form-control-lg" required/>
                  <label class="form-label" for="form3Example4cdg">Your State</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="tel"name="f_phone" id="form3Example4cdg" class="form-control form-control-lg"required />
                  <label class="form-label" for="form3Example4cdg">Your Phone No</label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" name="submit"class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- MDB -->



<!-- <script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="vendors/scripts/steps-setting.js"> -->
        <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.js"
></script>
    </script>
</body>

</html>