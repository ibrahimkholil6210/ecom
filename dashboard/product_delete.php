
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

        $query2 = "SELECT * FROM tbl_products WHERE product_id = '$id'";
        $result2 = mysqli_query($con,$query2);
        while ($row = mysqli_fetch_assoc($result2)) {
            $image = $row['product_image'];
            $file_exists = file_exists("uploads/".$image);
            if (!$file_exists) {
                echo "<script>alert('Image Not Found')</script>";
            }else{
                $delete = unlink("uploads/$image");
                if ($delete) {
                    $query = "DELETE FROM tbl_products WHERE product_id = '$id'";
                    $result = mysqli_query($con,$query);
                    if ($result) {
                        echo "<script>alert('Product DELETED Successfully')</script>";
                        echo "<script>window.location.href='product.php'</script>";
                    }else{
                        echo "<script>alert('Database Delete Error')</script>";
                    }
                }else{
                    echo "<script>alert('Error')</script>";
                }
            }
            
        }
        
    }else{
    	echo "<script>window.location.href='product.php'</script>";
    }
    
?>