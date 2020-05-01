<?php  
	include 'inc/header.php';
?>
<?php  
	include 'inc/navbar.php';
?>

<div class="container" style="min-height: 80vh;">



			<div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Edit Profile</h3>
                        </div>

                        <div class="panel-body">
                            <div class="row">
								<div class="col-sm-4 col-md-4">
									
								</div>

								<div class="col-sm-8 col-md-8">
									

									<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
										<table class="table table-bordered">
											<tr>
												<td>Name:</td>
												<td><input type="text" class="form-control" name="fullname" value="<?php echo $full_name ?>"></td>
											</tr>
											<tr>
												<td>Email:</td>
												<td><input type="email" class="form-control" name="email" value="<?php echo $user_email ?>"></td>
											</tr>
											<tr>
												<td>Role:</td>
												<td>
													<span class="btn btn-default btn-circle" disabled>
														<?php 
															if ($user_role == 1) {
																echo "Admin";
															}else{
																echo "User";
															}
														?>
													</span>													
												</td>
											</tr>
											<tr>
												<td>Birthday:</td>
												<td><input type="date" class="form-control" name="DOB" value="<?php echo $DOB ?>"></td>
											</tr>
											<tr>
												<td>Address:</td>
												<td><textarea name="address" class="form-control" id="" cols="30" rows="10"><?php echo $address ?></textarea></td>
											</tr>
											<tr>
												<td></td>
												<td><button name="update_profile" type="submit" class="btn btn-primary pull-right">Update Profile</button></td>
											</tr>
										</table>
									</form>

									<?php
                                    
									    if(isset($_POST["update_profile"])) {

									        

									        $fullname = mysql_real_escape_string($_POST['fullname']);
									        $email = mysql_real_escape_string($_POST['email']);
									        $DOB = mysql_real_escape_string($_POST['DOB']);
									        $address = mysql_real_escape_string($_POST['address']);

									        if (!empty($fullname) || !empty($email) || !empty($DOB) || !empty($address)) {

									            $query = "UPDATE tbl_user SET fullname ='$fullname', email ='$email', DOB ='$DOB', address ='$address' WHERE id = '$user_id'";
									            $result = mysqli_query($con,$query);
									            if ($result) {

									                echo "<script>alert('Profile Updated Successfully')</script>";
									                echo "<script>window.location.href='profile.php'</script>";

									            }else{
									                echo "<script>alert('ERROR!!! While Updating Profile')</script>";
									            }

									        }else{
									            echo "<script>alert('Field Must Not be Empty')</script>";
									        }

									                


									    }
									    
?>


								</div>
                            </div>
                        </div>

                        <div class="panel-footer">
                            
                        </div>
                    </div>
                </div>
            </div>




<?php  
	include 'inc/footer.php';
?>