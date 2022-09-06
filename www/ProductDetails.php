<?php
session_start();
require 'header.php';
require 'create_id.php';
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
        created_at => date()
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

    <?php       // Display current product
    echo "Current product";
    echo 'ID: ';$_SESSION["selected_product"]["id"];
    echo 'Name: ';$_SESSION["selected_product"]["name"];
    echo 'Price: ';$_SESSION["selected_product"]["price"];     
    ?>


    <form method="get" action="product_details.php">
        Add to cart <input type="submit" value="add_product" ><br>
        Reset cart <input type="submit" value="reset_cart"> <br>
    </form>
    <form method="post" action="product_details.php">
        Finish cart <input type="submit" value="finish_cart"><br>
    </form>
</body>
</html>