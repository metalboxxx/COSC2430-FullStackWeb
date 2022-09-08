<?php
require 'commons/header.php';
require 'file_handling/products_file_handling.php';

session_start();
load_products_data();

if (isset($_POST["product_detail"])){
        $product = explode(",",$_POST["product_detail"]);
        $_SESSION["selected_product"]["id"] = $product[0];
        $_SESSION["selected_product"]["name"] = $product[1];
        $_SESSION["selected_product"]["price"] = $product[2];
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
    <table style="width:50%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>See detail</th>
        </tr>
        <?php
        if (isset($_SESSION['products'])) {
            foreach ($_SESSION['products'] as $product) {
                echo "<tr>";
                echo "<td>{$product["id"]}</td>";
                echo "<td>{$product["name"]}</td>";
                echo "<td>{$product["price"]}</td>";
                echo "<td><a href='ProductDetails.php'><form method='post' action='ViewProducts.php'><input type='submit' name='product_detail' class='button' value=";
                echo "{$product["id"]},{$product["name"]},{$product["price"]}";
                echo "></form></a></td></tr>";
            }
        }
        ?>
    </table>
</body>
</html>
