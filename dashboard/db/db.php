<?php

	$host = "localhost";
	$user = "root";
	$password = "";
	$db_name = "db_commerce";
	$con = mysqli_connect($host,$user,$password,$db_name);

	// Check connection's
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

?>