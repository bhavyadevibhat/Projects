<?php
include '../../config.php';
$admin=new Admin();

$cid=$_SESSION['c_id'];
$cartid=$_GET['cartid'];
$qty=$_GET['qty'];
$stmt=$admin->cud("UPDATE `cart` SET `ct_quantity`='$qty' WHERE `ct_id`= '$cartid'","saved");
?>
<div class="card" id="tablecart">
            <div class="card-header">
                <h2>Shopping Cart</h2>
            </div>
         <?php
        $stmt4=$admin->ret("SELECT * FROM `cart` WHERE `c_id`='$cid'");
        $num=$stmt4->rowCount();
        if($num==0){
        ?>
        <h5 style="color:red;margin-left:500px">Your cart is empty!!</h5>
        <?php } else { ?>
            <div class="card-body">
                <div class="table-responsive" style="display: flex;flex-direction:column-reverse">
                    <table class="table table-bordered m-0">
                        <thead>
                            <tr>
                                <!-- Set columns width -->
                                <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                                <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                                <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                                <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                                <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $grandtotal=0;
                            $total=0;
                            $stmt = $admin->ret("SELECT * FROM `cart` INNER JOIN `product` ON product.pr_id=cart.pr_id WHERE `c_id`='$cid'");
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $qty = $row['ct_quantity'];
                                $price = $row['pr_kg'];
                                $total = $qty * $price;
                                $grandtotal=$grandtotal+$total;
                            ?>
                                <tr>
                                    <td class="p-4">
                                        <div class="media" style="display: flex;flex-direction:column">
                                            <img src="../Farmer/controller/<?php echo $row['pr_image'] ?>" style="width: 140px;" alt="">
                                            <div class="media-body">
                                                <h6 style="margin-top: 5px;"><?php echo $row['pr_name'] ?></h6>
                                                <small>

                                                    <span class="text-muted">Quantity: </span> <?php echo $row['ct_quantity'] ?> &nbsp;

                                                </small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right font-weight-semibold align-middle p-4">₹<?php echo $row['pr_kg'] ?></td>

                                    <td class="align-middle p-4">

                                        <div class="col" style="display: flex;">
                                            <button onclick="decrement(<?php echo $row['ct_id'] ?>)">-</button>

                                            <input type="text" id="<?php echo $row['ct_id'] ?>" value="<?php echo $row['ct_quantity'] ?>" name="quantity" readonly style="width: 50px;">
                                            <button onclick="increment(<?php echo $row['pr_quantity'] ?>,<?php echo $row['ct_id'] ?>)">+</button>
                                        </div>
                                    </td>
                                    <td class="text-right font-weight-semibold align-middle p-4">₹<?php echo $total ?></td>
                                    <td class="text-center align-middle px-0"><a href="deletecart.php?cartid=<?php echo $row['ct_id'] ?>" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</a></td>
                                </tr>

                            <?php } ?>

                        </tbody>

                        <div style="display: flex;flex-direction:column">

                        <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">

                            <div class="d-flex">

                                <div class="text-right mt-4" style="margin-left:960px">
                                    <label class="text-muted font-weight-normal m-0">Total price</label>
                                   
                                    <div class="text-large"><strong>₹<?php echo $grandtotal ?></strong></div>
                                </div>
                            </div>
                        </div>

                        <div class="float-right" style="margin-left: 700px;">
                            <a href="index.php" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to shopping</a>
                            <a href="checkout.php" class="btn btn-lg btn-primary mt-2">Checkout</a>
                        </div>
                        </div>
                    </table>
                </div>
                <!-- / Shopping cart table -->



            </div>
            <?php } ?>
        </div>       