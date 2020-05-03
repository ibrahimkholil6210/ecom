<?php include 'inc/start.php'; ?>
	
	<?php include 'inc/topnav.php'; ?>
	
	<div style="height: 50px;"></div>
	
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="breadcrumbs">
						<ol class="breadcrumb">
							<li><a href="index">Home</a></li>
							<li class="active"><?php echo "Search Result For: <strong>".$_GET['search']."</strong>" ?></li>
						</ol>
					</div>
				</div>
				<?php include 'inc/sidenav.php'; ?>
				<?php include 'inc/search_result.php'; ?>
				
			</div>
		</div>
	</section>
	
	
	<?php include 'inc/footer.php'; ?>
	
<?php include 'inc/end.php'; ?>
	

  
    