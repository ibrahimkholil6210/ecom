<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<?php  
								
	                            $query = "SELECT * FROM tbl_products WHERE product_slider = 1 ORDER BY product_id DESC LIMIT 5";
	                            $result = mysqli_query($con,$query);

	                            if ($result) {
	                            	$active = 'active';
	                                while($row = mysqli_fetch_assoc($result)){
	                                    $product_id         = $row['product_id'];
	                                    $product_name       = $row['product_name'];
	                                    $product_price      = $row['product_price'];
	                                    $product_details    = $row['product_details'];
	                                    $product_image      = $row['product_image'];

	                                    $product_cat_id     = $row['product_cat_id'];

	                                    
	                        ?>

							<div class="item <?php echo $active ?>">
								<div class="col-sm-6">
									<h1><?php echo $product_name; ?></h1>
									<p><?php echo substr($product_details, 0,100) ?></p>
									<a href="details.php?product_id=<?php echo $product_id; ?>" class="btn btn-default get">Details</a>
								</div>
								<div class="col-sm-6">
									<img src="dashboard/uploads/<?php echo $product_image; ?>" class="girl img-responsive" style="height: 60vh; float: right; margin-right: 100px;" />
									<img src="assets/images/home/pricing.png"  class="pricing" alt="" />
									<span style="position: absolute;top: 78%; right:74%; background-color: #fd0188; color: #fff; padding: 7px;">৳ <?php echo $product_price ?></span>
								</div>
							</div>

							<?php $active = $active.'1'; }} ?>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->