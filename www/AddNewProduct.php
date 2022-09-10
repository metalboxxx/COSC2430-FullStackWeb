<?php
ob_start();
require_once 'commons/header.php';
require 'file_handling/products_file_handling.php';
load_products_data();
include 'functions/create_id.php';

if (isset($_POST['act'])){
    if(preg_match('/^[a-zA-Z]{10,20}$/', $_POST["name"]) && $_POST['price'] > 0 && strlen(trim($_POST["description"])) < 500 ){
        $product = [
            'id' => create_id($_SESSION['products']),
            'name' => $_POST['name'],
            'vendor' => $_SESSION['user']['username'],
            'price' => $_POST['price'],
            'description' => $_POST['description']
        ];
        $_SESSION['products'][] = $product;
        save_products_data();
        header("Location: VendorViewProducts.php");
    }
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
<script src="addproduct.js"></script>
<h1 class="text-center">Add new product</h1>
<form action="AddNewProduct.php" onsubmit="return productValidate();" method="post" class="container" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name_product_input" class="form-label">Product Name<span style="color: red;" id="errorName">(*)</span></label>
        <input id="name_product_input" class="form-control bg-light"type="text" name="name"><br>
    </div>
    <div class="form-group">
        <label for="price_product_input" class="form-label">Price<span style="color: red;" id="errorPrice">(*)</span></label>
        <input id="price_product_input" class="form-control bg-light"type="number" name="price"><br>
    </div>
    <div class="form-group">
        <label for="description_input" class="form-label">Description <span style="color: red;" id="errorDescription ">(*)</span></label>
        <input id="description_input" class="form-control bg-light"type="text-area" name="description"><br>
    </div>

    <input id="name_product_input" class="form-control bg-primary text-white btn"type="submit" name="act"><br>

</form>
</body>
</html>




