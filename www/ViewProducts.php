<?php
ob_start();

require_once 'commons/header.php';
require 'file_handling/products_file_handling.php';

load_products_data();

if (isset($_POST["product_detail"])){
        $product = explode(",",$_POST["product_detail"]);
        $_SESSION["selected_product"]["id"] = $product[0];
        $_SESSION["selected_product"]["name"] = $product[1];
        $_SESSION["selected_product"]["price"] = $product[2];
        $_SESSION["selected_product"]["vendor"] = $product[3];
        header("Location: ProductDetails.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<style>
    .button {
        text-indent:-9999px;
        width: 10%
    }

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }
</style>
<body>
    <h2>All products in sale</h2>
    
    
    <div class="container-fluid row">    
        <?php 
        foreach ($_SESSION['products'] as $product){
            $productId = $product["id"];
            $productName = $product["name"];
            $productPrice = $product["price"];
            $productVendor = $product["vendor"];
            echo "<div class='container-fluid col-lg-4 col-md-6'>";
            echo "<label>Name: $productName</label>";
            echo "<form method='post' action='ViewProducts.php'><a href='ProductDetails.php'>";
            echo "<input type='submit' name='product_detail' class='button' value=";
            echo "'$productId, $productName, $productPrice, $productVendor'></a>";
            echo "</form>";
            echo "</div>";
        }
        ?>
    </div>

</body>
</html>
