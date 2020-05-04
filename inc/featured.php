				<div class="col-sm-12 col-md-12">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Featured Items</h2>
						<?php  
							include 'dashboard/db/db.php';
                            $query = "SELECT * FROM tbl_products WHERE product_featured = 1 ORDER BY product_id DESC LIMIT 12";
                            $result = mysqli_query($con,$query);

                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)){
                                    $product_id         = $row['product_id'];
                                    $product_name       = $row['product_name'];
                                    $product_price      = $row['product_price'];
                                    $product_details    = $row['product_details'];
                                    $product_image      = $row['product_image'];

                                    $product_cat_id     = $row['product_cat_id'];
                        ?>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="dashboard/uploads/<?php echo $product_image; ?>" style="height: 250px;width: 250px;" />
										<img src="assets/images/home/hotdeal.png" class="new" style="width: 40px;">
										<h2>৳ <?php echo $product_price ?></h2>
										<p><?php echo $product_name ?></p>
										<a href="details.php?product_id=<?php echo $product_id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Details</a>
									</div>
								</div>
							</div>
						</div>

						<?php }} ?>


					</div><!--features_items-->
					
					<div style="text-align: center;">
						<a href="featured" class="btn btn-default btn-lg get text-center" style=" -webkit-animation: bounce 2s ease infinite; animation: bounce 2s ease infinite;">See More</a>
					</div>
						<div style="height: 100px;"></div>
				</div>