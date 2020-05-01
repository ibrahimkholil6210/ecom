

<?php include 'inc/header.php'; ?>
<?php include 'inc/admin.php'; ?>

<?php include 'inc/navbar.php'; ?>


            
            <div class="container" style="min-height: 80vh">
                <div class="row">
                    <div class="col-lg-12 col-md-11">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">EDIT PRODUCT</h4>
                            </div>
                            <div class="content">

                                <?php  
                                    include 'db/db.php';

                                    if (isset($_GET['id'])) {
                                        $get_id = $_GET['id'];
                                    }else{
                                        echo "Nothing";
                                    }

                                    $query = "SELECT * FROM tbl_products WHERE product_id = '$get_id'";
                                    $result = mysqli_query($con,$query);

                                    if ($result) {
                                        while($row = mysqli_fetch_assoc($result)){
                                            $product_id = $row['product_id'];
                                            $product_name = $row['product_name'];
                                            $product_price = $row['product_price'];
                                            $product_cat_id = $row['product_cat_id'];
                                            $product_details = $row['product_details'];
                                            $product_image = $row['product_image'];
                                        }
                                    }else{
                                        echo "Fetch Error";
                                    }


                                ?>

                                <form action="product_edit.php?id=<?php echo $get_id; ?>" method="POST" enctype="multipart/form-data">
                                    <input type="text" hidden name="product_id" value="<?php echo $product_id; ?>">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="product_name">NAME</label>
                                                <input type="text" class="form-control border-input" name="product_name" placeholder="Name" id="product_name" value="<?php echo $product_name; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="product_price">PRICE</label>
                                                <input type="number" class="form-control border-input" name="product_price" placeholder="0.00" id="product_price" value="<?php echo $product_price; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="product_cat_id">CATEGORY</label>
                                                <select name="product_cat_id" class="form-control border-input" name="product_cat_id" id="product_cat_id">

                                                    <option value="0">SELECT CATEGORY</option>
                                                    <?php  
                                                        include 'db/db.php';

                                                        $query = "SELECT * FROM tbl_category ORDER BY cat_id ASC";
                                                        $result = mysqli_query($con,$query);

                                                        if ($result) {
                                                            while($row = mysqli_fetch_assoc($result)){
                                                                $cat_id = $row['cat_id'];
                                                                $cat_name = $row['cat_name'];
                                                            
                                                        
                                                    ?>

                                                    <option value="<?php echo $cat_id; ?>" 
                                                        <?php  
                                                            if ($cat_id == $product_cat_id) {
                                                                echo "selected";
                                                            }
                                                        ?>
                                                    >
                                                        <?php 
                                                            echo $cat_name; 
                                                        ?>
                                                    </option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="product_details">Product Details</label>
                                                <textarea rows="12" class="form-control border-input" name="product_details" placeholder="Here can be your description" id="product_details"><?php echo $product_details; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="fileToUpload">Product Image</label>
                                                

                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <span class="btn btn-default btn-file">
                                                            Browse… <input type="file" name="image" id="imgInp">
                                                        </span>
                                                    </span>
                                                </div>
                                                <img id='img-upload' src="uploads/<?php echo $product_image; ?>" style="height: 200px; width: 200px;" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd" name="update_product">UPDATE PRODUCT</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <?php include 'inc/footer.php'; ?>



<?php
                                    
    if(isset($_POST["update_product"])) {
        include 'db/db.php';

        $product_id_new         = mysqli_real_escape_string($con,$_POST['product_id']);
        $product_name_new       = mysqli_real_escape_string($con,$_POST['product_name']);
        $product_price_new      = mysqli_real_escape_string($con,$_POST['product_price']);
        $product_cat_id_new     = mysqli_real_escape_string($con,$_POST['product_cat_id']);
        $product_details_new    = mysqli_real_escape_string($con,$_POST['product_details']);


        if (!empty($product_name_new) || !empty($product_price_new) || !empty($product_cat_id_new) || !empty($product_details_new)) {
             
            $query = "UPDATE tbl_products SET product_name = '$product_name_new',product_price = '$product_price_new',product_cat_id = '$product_cat_id_new',product_details = '$product_details_new' WHERE product_id = '$product_id_new'";
            $result = mysqli_query($con,$query);
            if ($result) {
                echo "<script>alert('Product UPDATED Successfully')</script>";
                echo "<script>window.location.href='product.php'</script>";
            }else{
                echo "<script>alert('ERROR!!! While UPDATING Product')</script>";
            }
            
        }else{
            echo "<script>alert('Field Must Not be Empty')</script>";
        }

                


    }
    
?>