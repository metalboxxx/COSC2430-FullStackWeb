<?php
ob_start();

require_once 'commons/header.php';
require 'file_handling/products_file_handling.php';

if(!isset($_SESSION['use'])){
    header("location: login.php");
}

if ($_SESSION["user_type"] == "Vendor") {
    header("Location: VendorViewProducts.php");
}
if ($_SESSION["user_type"] == "Shipper") {
    header("Location: ViewOrders.php");
}


load_products_data();


if (isset($_POST["get_product_detail"])){
        $_SESSION["selected_product"]["id"] = $_POST["id"];
        $_SESSION["selected_product"]["name"] = $_POST["name"];
        $_SESSION["selected_product"]["price"] = $_POST["price"];
        $_SESSION["selected_product"]["vendor"] = $_POST["vendor"];
        $_SESSION["selected_product"]["description"] = $_POST["description"];
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
        if (isset($_SESSION['products'])) {
            echo "<div class='row'>";
            foreach ($_SESSION['products'] as $product) {
                echo "<form method='post' action='ViewProducts.php' class='col-md-4 col-sm-6'>";
                echo "<input class='form-control shadow p-3 mb-5 bg-body rounded ' type='submit' name='get_product_detail' value='{$product["name"]} - Price: {$product["price"]}'>";
                echo "<input type='hidden' name='id' value='{$product["id"]}'>";
                echo "<input type='hidden' name='name' value='{$product["name"]}'>";
                echo "<input type='hidden' name='price' value='{$product["price"]}'>";
                echo "<input type='hidden' name='vendor' value={$product["vendor"]}>";
                echo "<input type='hidden' name='description' value='{$product["description"]}'>";
                echo "</form>";
            }
            echo "</div>";
        }
    ?>
    </div>
</body>
</html>

<?php
require_once 'commons/footer.php'
?>