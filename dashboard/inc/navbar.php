

<nav class="navbar navbar-default navbar-top">
		<div class="navbar-inner">
			<div class="container">
		    	<!-- Brand and toggle get grouped for better mobile display -->
		    	<div class="navbar-header">
		    		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        	<span class="sr-only">Toggle navigation</span>
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
		      		</button>
		      		<a class="navbar-brand" href="index.php" data-toggle="tooltip" data-placement="right" title="MY_SHOP"><i class="fa fa-truck fa-lg"></i> Dashboard</a>
		    	</div>

		    	<!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


					<?php  

						if ($user_role == 1) {
							

					?>


			    	<ul class="nav navbar-nav navbar-left">
			        	

			        	<li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-product-hunt"></i> Product <span class="caret"></span></a>
				          <ul class="dropdown-menu">
				            <li><a href="product.php">Product List</a></li>
				            <li><a href="product_add.php">Add New Product</a></li>
				          </ul>
				        </li>

				        <li><a href="category.php"><i class="fa fa-list-alt"></i> Category</a></li>
				        <li><a href="order.php"><i class="fa fa-balance-scale"></i> Order</a></li>


				    </ul>



					<?php  
						}elseif($user_role == 2) {
							

					?>
			        
			        <ul class="nav navbar-nav navbar-left">
			        	

				        <li><a href="order.php">Your Order</a></li>


				    </ul>

				    <?php } ?>
			        	

			      	
			      	<ul class="nav navbar-nav navbar-right">
			        	<li>
			        		<a href="profile.php">
			        			<?php  
			        				echo $full_name;
			        			?>
			        		</a>

			        	</li>
			        


			        	<li><a href="../" target="_blank"><i class="fa fa-sign-in fa-lg"></i> Live Site</a></li>


			        	

				        <li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
				          <ul class="dropdown-menu">
				            <li><a href="logout.php">Log Out <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
				          </ul>
				        </li>
			        	
			        	

			      	</ul>
			    </div><!-- /.navbar-collapse -->
		  	</div><!-- /.container-fluid -->
		</div>
</nav>

