<?php 

    include "1.php";

    switch($_SERVER['PHP_SELF'])  {
        case '/index.php': 
            $title = 'Home | JULIET\'S ZEAL'; 
            break;
        case '/details.php': 
            $get_product_id = $_GET['product_id'];
            $query = "SELECT * FROM tbl_products WHERE product_id = '$get_product_id'";
            $result = mysqli_query($con,$query);
            $fetch = mysqli_fetch_assoc($result);
            $title = 'Shop | '.$fetch['product_name']; 
            break;
        case '/shop.php': 
            $title = 'Shop | JULIET\'S ZEAL'; 
            break;
        case '/cart.php': 
            $title = 'Cart | JULIET\'S ZEAL'; 
            break;
        case '/login.php': 
            $title = 'Authintication | JULIET\'S ZEAL'; 
            break;
        case '/cat.php': 
            $category_id = $_GET['cat_id'];
            $query = "SELECT tbl_category.cat_name AS cat FROM tbl_category WHERE cat_id = '$category_id'";
            $result = mysqli_query($con,$query);
            $fetch = mysqli_fetch_assoc($result);
            $title = 'Category | '.$fetch['cat']; 
            break;
        case '/featured.php': 
            $title = 'Featured | JULIET\'S ZEAL'; 
            break;

        case '/newproduct.php': 
            $title = 'New Arrival | JULIET\'S ZEAL'; 
            break;    
        case '/404.php': 
            $title = 'OPPS! | JULIET\'S ZEAL'; 
            break;   
        default:
            $title = 'JULIET\'S ZEAL';
            break;
    } 
    
?>