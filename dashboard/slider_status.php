<?php include 'db/db.php'; ?>


<?php  
	$get_id = $_GET['id'];
	$target = $_GET['target'];

	if($target == 'slider'){
		if (isset($_GET['id']) && $_GET['status'] == 0) {
			$query = "UPDATE tbl_products SET product_slider = 1 WHERE product_id = '$get_id'";
			$result = mysqli_query($con,$query);
	
			if ($result) {
				echo "<script>alert('Added to Slider')</script>";
				echo "<script>window.location.href='product.php'</script>";
			}
		}elseif (isset($_GET['id']) && $_GET['status'] == 1) {
			$query = "UPDATE tbl_products SET product_slider = 0 WHERE product_id = '$get_id'";
			$result = mysqli_query($con,$query);
	
			if ($result) {
				echo "<script>alert('Removed from Slider')</script>";
				echo "<script>window.location.href='product.php'</script>";
			}
		}
	}elseif($target == 'feature'){
		if (isset($_GET['id']) && $_GET['status'] == 0) {
			$query = "UPDATE tbl_products SET product_featured = 1 WHERE product_id = '$get_id'";
			$result = mysqli_query($con,$query);
	
			if ($result) {
				echo "<script>alert('Added to Feature')</script>";
				echo "<script>window.location.href='product.php'</script>";
			}
		}elseif (isset($_GET['id']) && $_GET['status'] == 1) {
			$query = "UPDATE tbl_products SET product_featured = 0 WHERE product_id = '$get_id'";
			$result = mysqli_query($con,$query);
	
			if ($result) {
				echo "<script>alert('Removed from Feature')</script>";
				echo "<script>window.location.href='product.php'</script>";
			}
		}
	}elseif($target == 'new'){
		if (isset($_GET['id']) && $_GET['status'] == 0) {
			$query = "UPDATE tbl_products SET product_new = 1 WHERE product_id = '$get_id'";
			$result = mysqli_query($con,$query);
	
			if ($result) {
				echo "<script>alert('Added to New')</script>";
				echo "<script>window.location.href='product.php'</script>";
			}
		}elseif (isset($_GET['id']) && $_GET['status'] == 1) {
			$query = "UPDATE tbl_products SET product_new = 0 WHERE product_id = '$get_id'";
			$result = mysqli_query($con,$query);
	
			if ($result) {
				echo "<script>alert('Removed from New')</script>";
				echo "<script>window.location.href='product.php'</script>";
			}
		}
	}
  
?>