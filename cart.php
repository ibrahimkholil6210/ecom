<?php include 'inc/start.php'; ?>
	
	<?php include 'inc/topnav.php'; ?>
	
	<div style="height: 50px;"></div>



	<?php  
	    if (isset($_GET["action"])){
	        if ($_GET["action"] == "delete") {
	           
	            foreach ($_SESSION['shopping_cart'] as $key => $value) {
	                if ($value['item_id'] == $_GET['id']) {
	                    unset($_SESSION['shopping_cart'][$key]);
	                    echo "<script>alert('Item has been removed')</script>";
	                    header("location: cart.php");
	                }
	            }
	        }
	    }
	?>



<form action="cart.php" method="post">

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed text-center"  id="cart--table">
					<thead>
						<tr class="cart_menu">
							<td>#</td>
							<td class="image">Item</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						
						<?php 
		                    if (!empty($_SESSION['shopping_cart'])) {
		                        $total = 0;
		                        $i = 1;

		                        foreach ($_SESSION['shopping_cart'] as $key => $value) {
		                            
		                        
		                    
		                ?>


		            	
		            	<tr id="row-<?php echo $i ?>" class="table-row"> 
		            		<td><?php echo $i++ ?></td>
		                    <td class="cart_description">
		                    	
		                    	<h4><?php echo $value['item_name'] ?></h4>
		                    		
		                    </td>
		                    <td class="cart_price"><?php echo number_format($value['item_price']) ?></td>
							<td class="cart_quantity">
								<!-- <input type="number" id="quantity" data-price="<?php echo $value['item_price'] ?>" style="width: 50px; text-align: center;" value="<?php echo $value['quantity'] ?>"> -->
								<?php echo $value['quantity'] ?>
							</td>
							
		                    <td class="cart_total" data-price="<?php echo $value['quantity'] * $value['item_price'] ?>"><?php echo number_format($value['quantity'] * $value['item_price']) ?></td>

		                    <td class="cart_delete"><a href="cart.php?action=delete&id=<?php echo $value['item_id']; ?>" onclick="return confirm('Are You Sure?')"><i class="fa fa-times"></i></a></td>

		                    <?php  
		                        $total = $total + ($value['quantity'] * $value['item_price']);
		                    ?>

		                    <?php }} ?>
		                </tr>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area" style="min-height: 193px;">

						<ul>
							<li>
							<?php  
								if (!isset($_SESSION['id'])) {
									echo "<h1>Please <a href=\"login.php\">Log In</a> To Check Out</h1>";
								}
							?>
							</li>

							<li><?php 
								if (isset($_SESSION['id'])) {
									echo "Hello <span>" .$full_name. "</span>";
								}
							 ?></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span id="sub-total">
								<?php 
		                            if (!empty($_SESSION['shopping_cart'])) {
		                                echo number_format($total);
		                            }
		                        ?>
							</span></li>
							<li>Eco Tax <span>0.00</span></li>
							<li>Total <span id="grand-total">
								<?php 
		                            if (!empty($_SESSION['shopping_cart'])) {
		                                echo number_format($total);
		                            }
		                        ?>
							</span></li>
						</ul>
							<?php  
								if (isset($_SESSION['id'])) {
									
								
							?>

							

							<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	

		<div class="container total-area">
			<div class="shopper-informations">
				<div class="row">
					
						<div class="col-sm-7 clearfix">
							<div class="bill-to">
								<div class="form-two">
								<p>Payment</p>
								<div style="height:20px;"></div>
								<input type="number" name="bkash_number" class="form-control" placeholder="Mobile Number" required="">
								<div style="height:20px;"></div>
								<input type="text" name="bkash_transection_id" class="form-control" placeholder="Transection ID">
										
								</div>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="order-message">
									<p>Shipping Address</p>
								
									<textarea name="shipping_address" id="" cols="30" rows="11" placeholder="Full Address" required></textarea>
							</div>	
						</div>			
				</div>
			</div>
		</div>	

	<?php 
		if (isset($_SESSION['id'])) {
			
	 ?>

	<div style="text-align: center;">
		<button type="submit" name="checkout" class="btn btn-default btn-lg check_out">Check Out</a>
	</div>
	
	<?php }else{ ?>

	<h1 class="text-center">Please Log In To Checkout</h1>

	<?php } ?>

</form>	

	<div style="height: 100px;"></div>
	
	<?php include 'inc/footer.php'; ?>
	
<?php include 'inc/end.php'; ?>
	









<?php
                                    
    if(isset($_POST["checkout"])) {

    	


		foreach($_SESSION['shopping_cart'] as $u) {
			$uids[] = $u['item_id'];
			$qnt[] = $u['quantity'];
			$unit_price[] = $u['item_price'];
		}
		$product_ids = implode(",",$uids);
		$product_qnts = implode(",",$qnt);
		$product_prices = implode(",",$unit_price);

        $bkash_number = mysqli_real_escape_string($con,$_POST['bkash_number']);
        $bkash_transection_id = mysqli_real_escape_string($con,$_POST['bkash_transection_id']);
        $shipping_address = mysqli_real_escape_string($con,$_POST['shipping_address']);

        $user_id = $_SESSION['id'];

        $token =  rand(1001,9999);
        $token_no = substr($token, 1,6);


        if (!empty($bkash_number) || !empty($bkash_transection_id)) {
            $query = "INSERT INTO tbl_order(user_id,product_ids,order_quantity,order_unit_price,amount,bkash_number,bkash_transection_id,token_no,shipping_address) 
				  VALUES('$user_id','$product_ids','$product_qnts','$product_prices','$total','$bkash_number','$bkash_transection_id','$token_no','$shipping_address')";
            $result = mysqli_query($con,$query);
            if ($result) {
                echo "<script>alert('Transection Successfull!')</script>";
                unset($_SESSION['shopping_cart']);
                echo "<script>window.location.href='index.php'</script>";
            }else{
                echo "<script>alert('ERROR!!! While inserting Transection')</script>";
            }

        }else{
            echo "<script>alert('Field Must Not be Empty')</script>";
        }

                


    }
    
?>