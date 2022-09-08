<?php
session_start();
require 'commons/header.php';
require 'file_handling/products_file_handling.php';
load_products_data();
include 'functions/create_id.php';

if (isset($_POST['act'])){
    $product = [
        'id' => create_id($_SESSION['products']),
        'vendor' => $_SESSION['vendor']['username'],
        'name' => $_POST['name'],
        'price' => $_POST['price']
    ];
    $_SESSION['products'][] = $product;
    save_products_data();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new product</title>
</head>
<body>
<form action="AddNewProduct.php" method="post">
    Product Name<input type="text" name="name"> <br>
    Price<input type="number" name="price"> <br>
    Submit<input type="submit" name="act">
</form>
</body>
</html>




