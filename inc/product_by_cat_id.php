<?php  
	
	$get_cat_id = $_GET['cat_id'];
    $query = "SELECT * FROM tbl_category WHERE cat_id = '$get_cat_id' ORDER BY cat_id DESC";
    $result = mysqli_query($con,$query);

    if ($result) {
        while($row = mysqli_fetch_assoc($result)){
            $cat_id         = $row['cat_id'];
            $cat_name       = $row['cat_name'];
        }
    }

?>				



				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center"><?php echo $cat_name ?></h2>
						<?php  

                            $query = "SELECT * FROM tbl_products WHERE product_cat_id = $cat_id ORDER BY product_id ASC";
                            $result = mysqli_query($con,$query);

                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)){
                                    $product_id         = $row['product_id'];
                                    $product_name       = $row['product_name'];
                                    $product_price      = $row['product_price'];
                                    $product_details    = $row['product_details'];
                                    $product_image      = $row['product_image'];
                                    
                        ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="single-products" style="padding: 10px;">
									<div class="productinfo text-center">
										<img src="dashboard/uploads/<?php echo $product_image; ?>" style="height: 200px;width: 100%;" />
										<h2>৳ <?php echo $product_price ?></h2>
										<div style="min-height: 50px;">
											<a href="details.php?product_id=<?php echo $product_id; ?>"><p><?php echo $product_name ?></p></a>
										</div>
										<a href="details.php?product_id=<?php echo $product_id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-info-circle"></i>Details</a>
									</div>
								</div>
								</div>
							</div>
						</div>

						<?php }} ?>

					</div><!--features_items-->
					
					
				</div>