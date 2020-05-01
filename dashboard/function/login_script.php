<?php 
	

	if (isset($_POST['login'])) {
		$myemail 	= mysqli_real_escape_string($con,$_POST['email']);
		$mypassword = mysqli_real_escape_string($con,$_POST['password']); 

		$sql 		= "SELECT id FROM tbl_user WHERE email = '$myemail' and password = '$mypassword'";
		$result 	= mysqli_query($con,$sql);
		$row 		= mysqli_fetch_array($result);
		$count 		= mysqli_num_rows($result);

		if($count) {
			$_SESSION['id'] = $row['id'];
			header("Location: dashboard/index.php");
		}else {
			echo "<script> alert('Your Login Name or Password is invalid'); </script>";
		}
	}

?>

