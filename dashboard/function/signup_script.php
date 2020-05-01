<?php 


	if (isset($_POST['signup'])) {
		$myusername = mysqli_real_escape_string($con,$_POST['name']);
		$myemail	= mysqli_real_escape_string($con,$_POST['email']); 
		$mypassword = mysqli_real_escape_string($con,$_POST['password']);

		if (!empty($myusername) || !empty($myemail) || !empty($mypassword)) {
			
			$sql1 = "SELECT id FROM tbl_user WHERE email = '$myemail'";
			$result1 = mysqli_query($con,$sql1);
			$row1 = mysqli_fetch_array($result1);
			$count1 = mysqli_num_rows($result1);

			if ($count1) {
				echo "<script> alert('User Already Exists'); </script>";
			}else{
				$sql = "INSERT INTO tbl_user(fullname,email,password) VALUES('$myusername','$myemail','$mypassword')";
				$result = mysqli_query($con,$sql);

				if($result) {
					echo "<script> alert('User Successfully Registered'); </script>";
					echo "<script> window.location.href='login.php'; </script>";
				}else {
					echo "<script> alert('User Not Inserted'); </script>";
				}
			}
		}else{
			echo "<script> alert('ERROR: Field Empty!!!'); </script>";
		}

		
	}

?>

