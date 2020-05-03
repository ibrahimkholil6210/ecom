
<?php  

	include 'db/db.php';

	session_start();
	$user_id = $_SESSION['id'];
	$query1 = "SELECT * FROM tbl_user WHERE id = '$user_id'";
	$result1 = mysqli_query($con,$query1);
	$fetch_result = mysqli_fetch_assoc($result1);

	if($fetch_result['role'] == 1){
	
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
	}else{
		header('location: order.php');
	}

	
      
?>