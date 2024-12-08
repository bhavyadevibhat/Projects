<?php include '../config.php';
$admin=new Admin();
if(!isset($_SESSION['F_id'])){
	header('Location:login.php');
} 

$fid = $_SESSION['F_id'];

$stmt1=$admin->ret("SELECT COUNT(*) FROM `product` WHERE `f_id`='$fid' ");
$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
$a=implode($row1);


$stmt2=$admin->ret("SELECT COUNT(*) FROM `customer`");
$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
$b=implode($row2);

$stmt3=$admin->ret("SELECT  COUNT(*) FROM `p_order` INNER JOIN `product` ON product.pr_id = p_order.pr_id INNER JOIN `farmer` ON farmer.f_id = product.f_id WHERE farmer.f_id= '$fid' ");
$row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
$c=implode($row3);

$stmt4=$admin->ret("SELECT  COUNT(*) FROM `feedback` INNER JOIN `p_order` ON p_order.o_id = feedback.o_id  INNER JOIN `product` ON product.pr_id = p_order.pr_id INNER JOIN `farmer` ON farmer.f_id = product.f_id WHERE farmer.f_id= '$fid'");
$row4 = $stmt4->fetch(PDO::FETCH_ASSOC);
$d=implode($row4);







$stmt = $admin->ret("SELECT * FROM `farmer` WHERE `f_id`= '$fid' ");
$row= $stmt->fetch(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>FARMIGOS</title>

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
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><h1>Welcome </h1> </div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	
		<?php include 'header.php';?>
		
		<div class="header-right">
			
			
			
			
		</div>
	</div>
	<?php include 'right sidebar.php';?>
	
<?php include 'left sidebar.php';?>
	
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="vendors/images/banner-img.png" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue"><?php echo $row['f_name'] ; ?>!</div>
						</h4>
						<p class="font-18 max-width-600"> We're happy to have you on board. Our app is designed to help you sell your products online and reach a wider audience. We hope you find our platform useful and easy to use. Thank you for choosing us to help you grow your business!</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo $b ; ?></div>
								<div class="weight-600 font-14"> Total Number Of Customer</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart2"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo $a ; ?></div>
								<div class="weight-600 font-14">Total Number Of Product</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart3"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo $c ; ?></div>
								<div class="weight-600 font-14">Total Number Of Order</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart4"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo $d ; ?></div>
								<div class="weight-600 font-14">Total Number Of Feedback</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div style="margin-top:200px;"></div>
			
			<?php include'footer.php';?>
		</div>
	</div>
	<!-- js -->
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