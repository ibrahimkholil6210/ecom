
<?php include 'inc/check_session.php'; ?>
<?php include 'inc/fetch_user.php'; ?>
<?php include 'inc/admin.php'; ?>


<?php  

	if (!isset($_SESSION['id'])) {
		header("location: ../login.php");
	}
?>



<?php
                                    
    if(isset($_GET["id"])) {


        include 'db/db.php';


        $id = $_GET['id'];


        $query = "DELETE FROM tbl_category WHERE cat_id = '$id'";
        $result = mysqli_query($con,$query);
        if ($result) {

            echo "<script>alert('Category DELETED Successfully')</script>";
            echo "<script>window.location.href='category.php'</script>";

        }else{
            echo "<script>alert('ERROR!!! While DELETING Category')</script>";
        }

    }else{
    	echo "<script>window.location.href='cat.php'</script>";
    }
    
?>