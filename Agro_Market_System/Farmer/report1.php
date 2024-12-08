<?php include '../config.php';
$admin= new Admin();

if(!isset($_SESSION['F_id'])){
	header('Location:login.php');
} ?>
<?php if(isset($_POST['submit'])){ 


$fid = $_SESSION['F_id'];

$fdate= $_POST['date'];
$tdate = $_POST['tdate'];
?>
                     
 <div class="midde_cont" style="margin-top:-300px; margin-left:400px; margin-bottom:400px;"  >
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
                     <div class="row">
                           <!-- table section -->
                        <div class="col-md-6 "  >
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
                                             <th>product name</th>
                                             <th>Product image</th>
                                             <th>User Name</th>
                                             <th>Product Quantity</th>
                                             <th>Price</th>
                                          </tr>
                                 
                                       </thead>
                                       <?php
                                       $i=1;


$stmt = $admin->ret("SELECT * FROM `p_order` INNER JOIN `customer` ON customer.c_id = p_order.c_id INNER JOIN `product` ON product.pr_id = p_order.pr_id INNER JOIN `farmer` ON farmer.f_id = product.f_id WHERE farmer.f_id='$fid' AND p_order.o_date BETWEEN '$fdate' AND '$tdate'");
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
?>  
                                       <tbody>
                                    

                                          <tr>
                                             <td><?php echo $i++;?></td>
                                             
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