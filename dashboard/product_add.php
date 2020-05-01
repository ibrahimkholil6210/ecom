
<?php include 'inc/header.php'; ?>
<?php include 'inc/admin.php'; ?>
<?php include 'inc/navbar.php'; ?>


            
            <div class="container" style="min-height: 80vh">
                <div class="row">
                    <div class="col-lg-12 col-md-11">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">ADD NEW PRODUCT</h4>
                            </div>
                            <div class="content">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="product_name">NAME</label>
                                                <input type="text" class="form-control border-input" name="product_name" placeholder="Name" id="product_name">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="product_price">PRICE</label>
                                                <input type="number" class="form-control border-input" name="product_price" placeholder="0.00" id="product_price">
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
                                                    <option value="<?php echo $cat_id; ?>"><?php echo $cat_name ?></option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="product_details">Product Details</label>
                                                <textarea rows="12" class="form-control border-input" name="product_details" placeholder="Here can be your description" id="product_details"></textarea>
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
                                                <img id='img-upload'/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd" name="add_product">ADD PRODUCT</button>
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
                                    
    if(isset($_POST["add_product"])) {


        include 'db/db.php';


        $product_name       = mysqli_real_escape_string($con,$_POST['product_name']);
        $product_price      = mysqli_real_escape_string($con,$_POST['product_price']);
        $product_cat_id     = mysqli_real_escape_string($con,$_POST['product_cat_id']);
        $product_details    = mysqli_real_escape_string($con,$_POST['product_details']);
        $tmp_product_image  = $_FILES["image"]["tmp_name"];
        $product_image      = $_FILES["image"]["name"];

        


        if (!empty($product_name) || !empty($product_price) || !empty($product_category) || !empty($product_details) || !empty($product_image)) {
            
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($product_image);
                $target_file = md5($target_file);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                $check = getimagesize($tmp_product_image);
                if($check !== false) {
                    $uploadOk = 1;
                    if (file_exists($target_file)) {
                        echo "Sorry, file already exists.";
                        $uploadOk = 0;
                    }

                    // if ($_FILES["image"]["size"] > 500000) {
                    //     echo "Sorry, your file is too large.";
                    //     $uploadOk = 0;
                    // }

                    // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    // && $imageFileType != "gif" ) {
                    //     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    //     $uploadOk = 0;
                    // }

                    if ($uploadOk == 0) {
                        echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                    } else {
                        $uploadOk = 1;


                        $extension=explode(".", $product_image);
                        $extension=end($extension);
                        $prod = $target_file;
                        $newfilename=$prod .".".$extension;
                        move_uploaded_file($tmp_product_image, $target_dir.$newfilename);

                        $query = "INSERT INTO tbl_products(product_name,product_price,product_cat_id,product_details,product_image) 
                                                    VALUES('$product_name','$product_price', '$product_cat_id','$product_details','$newfilename')";
                        $result = mysqli_query($con,$query);
                        if ($result) {

                            echo "<script>alert('Product Inserted Successfully')</script>";

                        }else{
                            echo "<script>alert('ERROR!!! While inserting Product')</script>";
                        }
                        
                    }
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            
        }else{
            echo "<script>alert('Field Must Not be Empty')</script>";
        }

                


    }
    
?>