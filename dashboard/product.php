
<?php include 'inc/header.php'; ?>
<?php include 'inc/admin.php'; ?>
<?php include 'inc/navbar.php'; ?>


            
            <div class="container" style="min-height: 80vh">
                <h3>All PRODUCTS</h3>
                <a href="product_add.php" class="btn btn-default pull-right" style="margin-bottom: 20px;">Add New Product</a>
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Name</th> 
                        <th>Price</th> 
                        <th>Category</th> 
                        <th>Details</th> 
                        <th>Slider</th> 
                        <th>Feature</th> 
                        <th>New Product</th> 
                        <th>Image</th>  
                        <th>Edit</th>   
                        <th>Delete</th> 
                    </tr>

                    <?php  
                        include 'db/db.php';

                        $query = "SELECT * FROM tbl_products ORDER BY product_id DESC";
                        $result = mysqli_query($con,$query);

                        if ($result) {
                            $i = 0;
                            while($row = mysqli_fetch_assoc($result)){
                                $i++;
                                $product_id         = $row['product_id'];
                                $product_name       = $row['product_name'];
                                $product_price      = $row['product_price'];
                                $product_details    = $row['product_details'];
                                $product_image      = $row['product_image'];
                                $product_slider     = $row['product_slider'];
                                $product_featured   = $row['product_featured'];
                                $product_new        = $row['product_new'];
                                $product_cat_id     = $row['product_cat_id'];

                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $product_name ?></td>
                        <td><?php echo $product_price ?></td>

                        <?php 

                            $query2 = "SELECT tbl_category.cat_name AS cat FROM tbl_category INNER JOIN tbl_products ON tbl_category.cat_id = '$product_cat_id' ";
                            $result2 = mysqli_query($con,$query2);
                            while($row2 = mysqli_fetch_assoc($result2)){
                                $cat_name = $row2['cat'];
                            }

                            if (isset($cat_name)) {
                                echo "<td>$cat_name</th>";
                            }else{
                                echo "<td>No Category Set</th>";
                            }
                         ?>

                        <td><?php echo substr($product_details, 0, 20) ?></td>
                        <td><a href="slider_status.php?id=<?php echo $product_id ?>&status=<?php echo $product_slider; ?>&target=slider">
                            <?php  
                                if ($product_slider == 0) {
                                    echo "Make This Slider Item";
                                }elseif ($product_slider == 1) {
                                    echo "Remove From Slider";
                                }
                            ?>
                        </a></td>
                        <td><a href="slider_status.php?id=<?php echo $product_id ?>&status=<?php echo $product_featured; ?>&target=feature">
                            <?php  
                                if ($product_featured == 0) {
                                    echo "Make This feature Item";
                                }elseif ($product_featured == 1) {
                                    echo "Remove From feature";
                                }
                            ?>
                        </a></td>
                        <td><a href="slider_status.php?id=<?php echo $product_id ?>&status=<?php echo $product_new; ?>&target=new">
                            <?php  
                                if ($product_new == 0) {
                                    echo "Make This new Item";
                                }elseif ($product_new == 1) {
                                    echo "Remove From new";
                                }
                            ?>
                        </a></td>
                        <td><a href="uploads/<?php echo $product_image ?>" target="_blank">Click To View</a></td>

                        <td><a href="product_edit.php?id=<?php echo $product_id; ?>">Edit</a></td>
                        <td><a href="product_delete.php?id=<?php echo $product_id; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
                    </tr>    

                    <?php }} ?>     
                </table>

            </div>
        </div>

        <?php include 'inc/footer.php'; ?>
