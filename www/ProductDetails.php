<?php

require 'commons/header.php';
require 'functions/create_id.php';
require 'file_handling/products_file_handling.php';

// Buttons fuctionalities
if (isset($_GET['add_product'])){
    if (isset($_SESSION['cart'])){
        $_SESSION['cart'][] = $_SESSION['selected_product']['id'];
    } else {
        $_SESSION['cart'] = [];
        $_SESSION['cart'][] = $_SESSION['selected_product']['id'];
    }
}

if(isset($_GET['reset_cart'])){
    $_SESSION['cart'] = [];
}


if(isset($_POST['finish_cart'])){
    $order = [
        id => create_id($_SESSION['$orders']),
        address => $_SESSION['user']['address'],
        products_bought => $_SESSION['cart']['id'],
        distribution_hub => array_rand($_SESSION['hubs'])['name'],
        created_at => date(),
        isDelivered => FALSE
    ];
    $_SESSION['orders'][] = $order; 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 class="text-center"><?php $_SESSION["selected_product"]["name"]?></h1>

    <?php       // Display current product
    echo "Current product";
    echo 'ID: ';$_SESSION["selected_product"]["id"];
    echo 'Name: ';$_SESSION["selected_product"]["name"];
    echo 'Price: ';$_SESSION["selected_product"]["price"];     
    ?>

    <div class="container">
        <form method="get" action="ProductDetails.php">
            <input id="add_product_submit" class="form-control shadow p-3 mb-5 bg-body rounded" type="submit" name="add_product" value="Add to cart">
            <input id="reset_cart_submit" class="form-control shadow p-3 mb-5 bg-body rounded" type="submit" name="reset_cart" value="Reset cart"> 
        </form>
        <form method="post" action="ProductDetails.php">
            <input id="submit_cart_submit" class="form-control  shadow p-3 mb-5 bg-body rounded " type="submit" name="finish_cart" value="Finish">
        </form>
    </div>
</body>
</html>