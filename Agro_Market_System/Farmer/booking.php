
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
<div class="pd-20 card-box " style="margin-right:460px; margin-top:40px; margin-left:100px " >
					<div class="clearfix ">
						<div class="">
							<h4 class="text-blue h4">Booking Details</h4>
							<!-- <p>Add <code>.table  .table-bordered</code> for borders on all sides of the table and cells.</p> -->
						</div>
						
					</div>
					<table class="table table-bordered">
						<thead>
							<tr>
                                <th scope="col">SL No</th>
							
								<th scope="col">Product Name</th>
								<th scope="col">Customer Name</th>
						
								<th scope="col">Product Quantity</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Price</th>

								<th>
                        <h6>Status</h6>
                      </th>
                      <th>
                        <h6>Change Status</h6>
                      </th>


							</tr>
						</thead>
						<tbody>
                        <?php

                        $fid = $_SESSION['F_id'];
						$pos = 0; 
                        
                                       $i=1;
                                       $stmt=$admin->ret("SELECT * FROM `p_order` INNER JOIN `product` ON product.pr_id = p_order.pr_id INNER  JOIN `customer` ON customer.c_id=p_order.c_id WHERE product.f_id = '$fid' ");
                                       while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                                       {


                                      


                                          ?>


							<tr>
                            




								<td><?php echo $i++;  ?></td>
								<td><?php echo $row['pr_name']?></td>
                                <td><?php echo $row['c_name']?></td>
								<td><?php echo $row['qty']?></td>
								<td><img src="controller/<?php echo $row['pr_image'];?>" width="100px" height="100px" ></td>
                                <td><?php echo $row['t_price']?></td>
								<td>
                          <p style="margin-left: 30px;"><b><?php echo $row['o_status']; ?></b></p>
                        </td>
                        <td>
                          <p style="margin-left: 30px;"><b>
                              <select name="status" onchange="changestatus(<?php echo $row['o_id']; ?>,<?php echo $pos; ?>)" id="">
                                <option value="">Change Status</option>
                                <option value="Picked by courier">Picked by courier</option>
                                <option value="On the way">On the way</option>
                                <option value="Ready for Delivery">Ready for Delivery</option>
                              </select>
                            </b></p>
                        </td>
                                
							</tr>
                            <?php $pos++; } ?>
							
						</tbody>
					</table>
					<div class="collapse collapse-box" id="border-table">
						<div class="code-box">
							<div class="clearfix">
								<a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left"  data-clipboard-target="#border-table-code"><i class="fa fa-clipboard"></i> Copy Code</a>
								<a href="#border-table" class="btn btn-primary btn-sm pull-right" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
							</div>
							<pre><code class="xml copy-pre" id="border-table-code">

							</code></pre>
						</div>
					</div>
				</div>


				<script>

function changestatus(odid,pos) {

  var status = document.getElementsByName("status")[pos].value;
window.location.href="controller/status.php?odid="+odid+"&orderstatus="+status;

}

</script>

 
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

	