<?php  
    ob_start();
    session_start();
    include 'dashboard/db/db.php';
    include 'dashboard/config/config.php';
    include 'dashboard/inc/fetch_user.php';


    switch($_SERVER['PHP_SELF'])  {
        case '/ecom/index.php': 
            $title = 'Home | JULIET\'S ZEAL'; 
            break;
        case '/ecom/details.php': 
            $get_product_id = $_GET['product_id'];
            $query = "SELECT * FROM tbl_products WHERE product_id = '$get_product_id'";
            $result = mysqli_query($con,$query);
            $fetch = mysqli_fetch_assoc($result);
            $title = 'Product | '.$fetch['product_name']; 
            break;
        case '/ecom/shop.php': 
            $title = 'Product | JULIET\'S ZEAL'; 
            break;
        case '/ecom/cart.php': 
            $title = 'Cart | JULIET\'S ZEAL'; 
            break;
        case '/ecom/login.php': 
            $title = 'Authintication | JULIET\'S ZEAL'; 
            break;
        case '/ecom/cat.php': 
            $category_id = $_GET['cat_id'];
            $query = "SELECT tbl_category.cat_name AS cat FROM tbl_category WHERE cat_id = '$category_id'";
            $result = mysqli_query($con,$query);
            $fetch = mysqli_fetch_assoc($result);
            $title = 'Category | '.$fetch['cat']; 
            break;
        case '/ecom/featured.php': 
            $title = 'Featured | JULIET\'S ZEAL'; 
            break;

        case '/ecom/newproduct.php': 
            $title = 'New Arrival | JULIET\'S ZEAL'; 
            break;    
        case '/ecom/404.php': 
            $title = 'OPPS! | JULIET\'S ZEAL'; 
            break;   
        default:
            $title = 'JULIET\'S ZEAL';
            break;
    } 

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title; ?></title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="assets/css/price-range.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
	<link href="assets/css/main.css" rel="stylesheet">
	<link href="assets/css/responsive.css" rel="stylesheet">

</head>

<body>