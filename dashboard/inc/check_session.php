<?php  
	ob_start();
	session_start();
	include 'db/db.php';
	include 'config/config.php';

	if( !isset($_SESSION['id']) ) {
		header("Location: ../login.php");
		exit;
	}
?>