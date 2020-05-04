	<header id="header"><!--header-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index" style="color: #fd0188"><h4><i class="fa fa-truck" aria-hidden="true"></i> Juliet’s Zeal</h4></a>
						</div>
					</div>
					<div class="col-sm-4">
						<div style="margin-top: 3px;">
							<form action="search" method="get">
								<input type="text" class="form-control" name="search" placeholder="Search Here" required style="width: 80%;float: left;" value="<?php if(isset($_GET['search'])) 
																echo $_GET['search']; ?>">
								<button type="submit" class="form-control btn btn-default" name="ok" value="1" style="width: 15%;position: relative;left: -5px;border: 0; background-color: #fd0188; color: #fff; border-radius: 0 5px 5px 0"><i class="fa fa-search"></i></button>
							</form>
						</div>
					</div>
					<div class="col-sm-4 mobile-nav">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">

								<?php  
									if (isset($_SESSION['id'])) {
										
								?>

									<li><a href="shop"><i class="fa fa-home"></i> Home</a></li>
									<li><a href="shop">Shop</a></li>
									<li><a href="cart"><i class="fa fa-shopping-cart"></i> Cart 
										<?php 
				                            if (!empty($_SESSION['shopping_cart'])) {

				                                echo '('.count($_SESSION['shopping_cart']).')';

				                            }else{
				                                echo "(0)";
				                            }
				                        ?>
									</a></li>

									<li class="dropdown">
							          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="dashboard/uploads/profile/<?php echo $user_image ?>" style="height: 40px;width:40px;margin-top: -10px;border-radius: 22px; padding: 2px;border:1px solid #e1e1e1;"></a>
							          <ul class="dropdown-menu pull-right">
							            <li style="display: block;"><a href="dashboard">My Account</a></li>
							            <li style="display: block;"><a href="dashboard/profile">Profile</a></li>
							            <li style="display: block;" role="separator" class="divider"></li>
							            <li style="display: block;"><a href="dashboard/logout">Log out</a></li>
							          </ul>
							        </li>


								<?php  
									}else{
								?>

									<li><a href="index"><i class="fa fa-home"></i> Home</a></li>
									<li><a href="shop">Shop</a></li>
									<li><a href="cart"><i class="fa fa-shopping-cart"></i> Cart 
										<?php 
				                            if (!empty($_SESSION['shopping_cart'])) {

				                                echo '('.count($_SESSION['shopping_cart']).')';

				                            }else{
				                                echo "(0)";
				                            }
				                        ?>
									</a></li>
									<li><a href="login"><i class="fa fa-lock"></i> Login</a></li>
								

								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
	</header><!--/header-->