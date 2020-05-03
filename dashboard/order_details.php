<?php  
	include 'inc/header.php';
?>
<?php  
	include 'inc/navbar.php';
?>

<?php  
    include 'db/db.php';
    $get_user_id = $_GET['uid'];
    $order_id = $_GET['id'];

    $query = "SELECT * FROM tbl_order WHERE user_id = '$get_user_id' AND order_id = '$order_id'";
    $result = mysqli_query($con,$query);

    if ($result) {
        $i = 1;
        while($row = mysqli_fetch_assoc($result)){
            $order_id = $row['order_id'];
            $product_ids = $row['product_ids'];
            $amount = $row['amount'];
            $order_status = $row['order_status'];
            $date = $row['date'];
            $token_no = $row['token_no'];
            $bkash_number = $row['bkash_number'];
            $bkash_transection_id = $row['bkash_transection_id'];
        }
    }
        
?>

<div class="container" style="min-height: 80vh;">
	<div class="content">
            <div class="container-fluid table-responsive">
                <div class="panel panel-primary">
                    <div class="panel-heading">Order Id: <?php echo date('Hms',time()) ?></div>
                    <div class="panel-body">Panel Content</div>
                </div>
            </div>
        </div>
</div>





<?php  
	include 'inc/footer.php';
?>