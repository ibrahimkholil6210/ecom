<?php

    if(isset($_SESSION['id']) ) {

        include 'dashboard/db/db.php';
       
        $get_user_id = $_SESSION['id'];
        $query = "SELECT * FROM tbl_user WHERE id='$get_user_id'";
        $result = mysqli_query($con,$query);

        while ($row = mysqli_fetch_array($result)) {
            $user_id            =$row['id'];
            $user_email         =$row['email'];
            $user_name          =$row['fullname'];
            $user_role          =$row['role'];
            $user_image         =$row['image'];
            $user_DOB           =$row['DOB'];
            $user_image         =$row['image'];
            $user_address       =$row['address'];
            $user_joining_date  =$row['joining_date'];
        }

    }
?>