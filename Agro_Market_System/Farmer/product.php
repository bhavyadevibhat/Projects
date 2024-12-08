
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
<div class=""  style=" margin-top:150px;  margin-left: 200px ; margin-right:200px; "  >
	
<form method="post" action="controller/productinsert.php" enctype="multipart/form-data">
<div class="form-group row" >
		<label class="col-sm-12 col-md-2 col-form-label"><b>Product category</b></label>
		<div class="col-sm-12 col-md-10">
			<select class="form-control" name="ca_id" required >
                <option value="" >  </option>

<?php 

 $fid = $_SESSION['F_id'];

 

$stmt = $admin->ret("SELECT * FROM `category`");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

?>

                <option value="<?php echo $row['ca_id']?>" > <?php echo  $row['ca_name'] ?> </option required>
                <?php } ?>
</select>
		</div>
	</div>

	<div class="form-group row" >
		<label class="col-sm-12 col-md-2 col-form-label"><b>Product Name</b></label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" name="pr_name"type="text"required >
			<input class="form-control" value="<?php echo $fid ; ?>"  name="fid" type="hidden" >
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label"><b>Price per Kg</b></label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control"name="pr_kg"type="number"  type="search"required>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label"><b>Product Details</b></label>
		<div class="col-sm-12 col-md-10">
		<textarea class="form-control" name="pr_details" id="exampleTextarea1" rows="8"required></textarea>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label"><b>Product Quantity(In Kg)</b></label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control" type="number"name="pr_quantity"required>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label"><b>Product Image</b></label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control"  name="image" type="file"required>
		</div>
	</div>
    <button type="submit" name="add" class="btn btn-success btn-rounded" style="margin-left:500px"> Submit </button>

    


</form>

</div>
 
<!-- </div></div></div></div> -->
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

	