<?php  
	
	if (isset($_GET['search'])) {
		$get_string = $_GET['search'];
	}
    

?>				



				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Result For : "<?php echo $get_string ?>"</h2>
						<?php  

                            $query = "SELECT * FROM tbl_products WHERE product_name LIKE '%$get_string%' ORDER BY product_id DESC";
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
									<div class="productinfo text-center">
										<img src="dashboard/uploads/<?php echo $product_image; ?>" style="height: 200px;width: 100%;" />
										<h2>৳ <?php echo $product_price ?></h2>
										<p><?php echo $product_name ?></p>
										<a href="details.php?product_id=<?php echo $product_id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Details</a>
									</div>
								</div>
							</div>
						</div>

						<?php }} ?>

					</div><!--features_items-->
					
					
				</div>