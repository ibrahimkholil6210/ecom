				<div class="col-sm-3">	
					<div class="left-sidebar">
					
						<div class="brands_products"><!--brands_products-->
							<h2>Category</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">

									<?php  
		                                include 'dashboard/db/db.php';

		                                $query = "SELECT * FROM tbl_category ORDER BY cat_id DESC";
		                                $result = mysqli_query($con,$query);

		                                if ($result) {
		                                    while($row = mysqli_fetch_assoc($result)){
		                                        $id = $row['cat_id'];
		                                        $name = $row['cat_name'];
		                                    
		                                


		                            ?>
									<li><a href="cat?cat_id=<?php echo $id ?>"> <?php echo $name; ?> <span class="pull-right"></span></a></li>

									<?php }} ?>
								</ul>
							</div>
						</div>
						
					</div>
				</div>