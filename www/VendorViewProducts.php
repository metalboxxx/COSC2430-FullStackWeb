<?php
ob_start();

require_once 'commons/header.php';
require 'file_handling/products_file_handling.php';

load_products_data();

if ($_SESSION["user_type"] == "Customer") {
    header("Location: ViewProducts.php");
}

if (isset($_POST["get_product_detail"])){
        $_SESSION["selected_product"]["id"] = $_POST["id"];
        $_SESSION["selected_product"]["name"] = $_POST["name"];
        $_SESSION["selected_product"]["price"] = $_POST["price"];
        $_SESSION["selected_product"]["vendor"] = $_POST["vendor"];
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
    <h2>All products from your vendor</h2>
    <form method='post' action='AddNewProduct.php'>
        <input type='submit' name='get_product_detail' value='Add new product'>
    </form>
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
                if ($_SESSION["use"] != $product["vendor"]) {
                    continue;
                }
                echo "<tr>";
                echo "<td>{$product["id"]}</td>";
                echo "<td>{$product["name"]}</td>";
                echo "<td>{$product["price"]}</td>";
                echo "<td><form method='post' action='ViewProducts.php'>";
                echo "<input type='submit' name='get_product_detail' value='Click to view'>";
                echo "<input type='hidden' name='id' value='{$product["id"]}'>";
                echo "<input type='hidden' name='name' value={$product["name"]}>";
                echo "<input type='hidden' name='price' value={$product["price"]}>";
                echo "<input type='hidden' name='vendor' value={$product["vendor"]}>";
                echo "</form></td></tr>";
            }
        }
        ?>
    </table>
</body>
</html>
