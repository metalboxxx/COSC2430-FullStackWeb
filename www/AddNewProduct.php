<?php

require_once 'commons/header.php';
require 'file_handling/products_file_handling.php';
load_products_data();
include 'functions/create_id.php';

if (isset($_POST['act'])){
    $product = [
        'id' => create_id($_SESSION['products']),
        'name' => $_POST['name'],
        'vendor' => $_SESSION['user']['username'],
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
<h1 class="text-center">Add new product</h1>
<form action="AddNewProduct.php" method="post" class="container">
    <label for="name_product_input" class="form-label">Product Name</label>
    <input id="name_product_input" class="form-control bg-light"type="text" name="name"><br>

    <label for="price_product_input" class="form-label">Price</label>
    <input id="price_product_input" class="form-control bg-light"type="number" name="price"><br>

    <input id="name_product_input" class="form-control bg-primary"type="submit" name="act"><br>
</form>
</body>
</html>




