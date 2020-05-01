<?php

    if(isset($_SESSION['id']) ) {
       
        $get_user_id = $_SESSION['id'];
        $query = "SELECT * FROM tbl_user WHERE id='$get_user_id'";
        $result = mysqli_query($con,$query);

        while ($row=mysqli_fetch_array($result)) {
            $user_id =$row['id'];
            $user_email =$row['email'];
            $full_name =$row['fullname'];
            $user_role =$row['role'];
            $user_image =$row['image'];
            $DOB =$row['DOB'];
            $image =$row['image'];
            $address =$row['address'];
        }

    }
?>