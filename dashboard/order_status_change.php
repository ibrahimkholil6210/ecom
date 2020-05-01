
<?php  

	include 'db/db.php';

	
	if (isset($_GET['id']) && isset($_GET['action'])) {
		$get_order_id = $_GET['id'];
		$get_order_action = $_GET['action'];
		$query = "UPDATE tbl_order SET order_status = '$get_order_action' WHERE order_id = '$get_order_id'";
		$result = mysqli_query($con,$query);

	    if ($result) {
	        echo "<script>alert('Status Updated Successfully')</script>";
	        echo "<script>window.location.href='order.php'</script>";
	    }
	}

	
      
?>