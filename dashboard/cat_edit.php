
<?php include 'inc/header.php'; ?>
<?php include 'inc/admin.php'; ?>
<?php include 'inc/navbar.php'; ?>

            <div class="container" style="min-height: 80vh">
                <div class="row">
                    <div class="col-md-6">
                        <div class="jumbotron">
                            <div class="header">
                                <h4 class="title">EDIT CATEGORY</h4>
                            </div>
                            <div class="content">

                            	<?php  
			                        include 'db/db.php';

			                        if (isset($_GET['id'])) {
			                        	$get_id = $_GET['id'];
			                        }else{
			                        	echo "Nothing";
			                        }

			                        $query = "SELECT * FROM tbl_category WHERE cat_id = '$get_id'";
			                        $result = mysqli_query($con,$query);

			                        if ($result) {
			                            while($row = mysqli_fetch_assoc($result)){
			                                $cat_id = $row['cat_id'];
			                                $cat_name = $row['cat_name'];
			                            }
			                        }else{
			                        	echo "Fetch Error";
			                        }


			                    ?>

                                <form action="cat_edit.php?id=<?php echo $get_id; ?>" method="POST">
                                	<input type="text" hidden name="id" value="<?php echo $get_id ?>"> 
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h3></h3>
                                                <input type="text" class="form-control border-input" placeholder="Category Name" id="cat_name" name="cat_name" value="<?php echo $cat_name; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd pull-right" name="update_category">UPDATE CATEGORY</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">CATEGORY LIST</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>   
                                        <th>Edit</th>   
                                        <th>Delete</th> 
                                    </tr>

                                    <?php  
                                        include 'db/db.php';

                                        $query = "SELECT * FROM tbl_category ORDER BY cat_id ASC";
                                        $result = mysqli_query($con,$query);

                                        if ($result) {
                                            while($row = mysqli_fetch_assoc($result)){
                                                $id = $row['cat_id'];
                                                $name = $row['cat_name'];
                                            
                                        


                                    ?>
                                    <tr>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><a href="cat_edit.php?id=<?php echo $id; ?>">Edit</a></td>
                                        <td><a href="cat_delete.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
                                    </tr>    

                                    <?php }} ?>     
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <?php include 'inc/footer.php'; ?>



<?php
                                    
    if(isset($_POST["update_category"])) {

        include 'db/db.php';

        $id = mysql_real_escape_string($_POST['id']);

        $cat_name = mysql_real_escape_string($_POST['cat_name']);

        if (!empty($cat_name)) {

            $query = "UPDATE tbl_category SET cat_name ='$cat_name' WHERE cat_id = '$id'";
            $result = mysqli_query($con,$query);
            if ($result) {

                echo "<script>alert('Category Updated Successfully')</script>";
                echo "<script>window.location.href='category.php'</script>";

            }else{
                echo "<script>alert('ERROR!!! While Updating Category')</script>";
            }

        }else{
            echo "<script>alert('Field Must Not be Empty')</script>";
        }

                


    }
    
?>