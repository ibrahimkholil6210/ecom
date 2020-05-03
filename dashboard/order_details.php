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
            $pid = $row['product_ids'];
            $oq = $row['order_quantity'];
            $op = $row['order_unit_price'];
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
                    <div class="panel-heading">
                        <h3>Order Id: <?php echo $token_no; ?></h3>
                        <?php 
                            if ($order_status == 1) {
                                echo "Order status "."<a href='' readonly class='btn btn-danger' title='Click to Change Status'>Pending</a>";
                            }elseif ($order_status == 2) {
                                echo "Order status "."<a href='' readonly class='btn btn-success' title='Click to Change Status'>Delevered</a>";
                            }

                        ?>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body-content">
                            <table class="table table-responsive">
                                <tr>
                                    <th>#</th>
                                    <th>Item</th> 
                                    <th>Quantity</th> 
                                    <th>Price</th>  
                                </tr>
                            <?php 
                                
                                $product_ids = explode(',',$pid);
                                $order_quantitys= explode(',',$oq);
                                $order_unit_price= explode(',',$op);
                                $x = 1;

                                for($i = 0; $i < count($product_ids); $i++){
                                    $query = "SELECT * FROM tbl_products WHERE product_id = '$product_ids[$i]'";
                                    $result = mysqli_query($con,$query);
                                    $fetch = mysqli_fetch_assoc($result);

                            ?>
                                <tr>
                                    <td><?php echo $x++; ?></td>
                                    <td><?php echo $fetch['product_name']; ?></td>
                                    <td><?php echo $order_quantitys[$i]; ?></td>
                                    <td><?php echo $order_unit_price[$i]; ?></td>
                                </tr>
                            <?php }?>
                                <tr>
                                    <td colspan="3" style="text-align: right;"><strong>Grand Total:</strong></td>
                                    <td><?php echo $amount; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>





<?php  
	include 'inc/footer.php';
?>