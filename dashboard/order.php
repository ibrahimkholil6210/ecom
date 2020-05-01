<?php  
	include 'inc/header.php';
?>
<?php  
	include 'inc/navbar.php';
?>

<div class="container" style="min-height: 80vh;">
	<div class="content">
            <div class="container-fluid">
                <?php  
                    if ($user_role == 1) {
                        
                    
                ?>
                
                <table class="table text-center">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Product</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Token No.</th>
                        <th class="text-center">Bkash</th>
                        <th class="text-center">Transection ID</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php  
                            include 'db/db.php';

                            $query = "SELECT * FROM tbl_order ORDER BY order_id DESC";
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
                               
                        ?>

                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td>
                            <?php 
                                $product_ids=explode(",",$product_ids);

                                foreach ($product_ids as $key) {
                                    
                                    $query1 = "SELECT * FROM tbl_products WHERE product_id = '$key'";
                                    $result1 = mysqli_query($con,$query1);
                                    if ($result1) {
                                        while ($row1 = mysqli_fetch_assoc($result1)) {
                                            echo $product_name = $row1['product_name'].', ';
                                        }
                                    }
                                }
                                
                            ?>
                                
                        </td>
                        <td><?php echo $amount." TK" ?></td>
                        <td><?php echo $token_no ?></td>
                        <td><?php echo $bkash_number ?></td>
                        <td><?php echo $bkash_transection_id ?></td>
                        <td><?php echo $date ?></td>

                        <td>

                            <?php 
                                if ($order_status == 1) {
                            ?>
								<div class="btn-group">
									  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    Pending <span class="caret"></span>
									  </button>
									  <ul class="dropdown-menu">
									    <li><a href="order_status_change.php?id=<?php echo $order_id ?>&action=2">Delevered</a></li>
									  </ul>
								</div>
                                    

                            <?php 
                        		}elseif ($order_status == 2) {
                            	
                            ?>

                            <div class="btn-group">
									  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    Delevered <span class="caret"></span>
									  </button>
									  <ul class="dropdown-menu">
									    <li><a href="order_status_change.php?id=<?php echo $order_id ?>&action=1">Pending</a></li>
									  </ul>
								</div>

							<?php } ?>
                        </td>
                    </tr>

                      <?php }} ?>
                    </tbody>
                </table>

                <?php  
                    }else{
                ?>
                <table class="table text-center">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Product</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Token No.</th>
                        <th class="text-center">Bkash</th>
                        <th class="text-center">Transection ID</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php  
                            include 'db/db.php';

                            $query = "SELECT * FROM tbl_order WHERE user_id = '$get_user_id'";
                            $result = mysqli_query($con,$query);

                            if ($result) {
                                $i = 1;
                                while($row = mysqli_fetch_assoc($result)){
                                    $product_ids = $row['product_ids'];
                                    $amount = $row['amount'];
                                    $order_status = $row['order_status'];
                                    $date = $row['date'];
                                    $token_no = $row['token_no'];
                                    $bkash_number = $row['bkash_number'];
                                    $bkash_transection_id = $row['bkash_transection_id'];
                                
                            


                        ?>
                      <tr>
                        <td><?php echo $i++ ?></td>
                        <td>
                            <?php 
                                $product_ids=explode(",",$product_ids);

                                foreach ($product_ids as $key) {
                                    
                                    $query1 = "SELECT * FROM tbl_products WHERE product_id = '$key'";
                                    $result1 = mysqli_query($con,$query1);
                                    if ($result1) {
                                        while ($row1 = mysqli_fetch_assoc($result1)) {
                                            echo $product_name = $row1['product_name'].', ';
                                        }
                                    }
                                }
                                
                            ?>
                                
                        </td>
                        <td><?php echo $amount." TK" ?></td>
                        <td><?php echo $token_no ?></td>
                        <td><?php echo $bkash_number ?></td>
                        <td><?php echo $bkash_transection_id ?></td>
                        <td><?php echo $date ?></td>

                        <td>
                            <?php 
                                if ($order_status == 1) {
                                    echo "<a href='' readonly class='btn btn-danger' title='Click to Change Status'>Pending</a>";
                                }elseif ($order_status == 2) {
                                    echo "<a href='' readonly class='btn btn-success' title='Click to Change Status'>Delevered</a>";
                                }

                            ?>
                                    
                        </td>
                      </tr>

                      <?php }} ?>
                    </tbody>
                </table>
                <?php } ?>

            </div>
        </div>
</div>





<?php  
	include 'inc/footer.php';
?>