<?php
ob_start();


require_once 'commons/header.php';
require 'file_handling/products_file_handling.php';

if(!isset($_SESSION['use'])){
    header("locatioin: index.php");
}

if ($_SESSION["user_type"] == "Customer") {
    header("Location: ViewProducts.php");
}
if ($_SESSION["user_type"] == "Shipper") {
    header("Location: ViewOrders.php");
}


load_products_data();

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
    <form method='post' action='AddNewProduct.php' class="text-center">
        <input type='submit' name='get_product_detail' value='Add new product'>
    </form>
    <h2 class="text-center">All products from your vendor</h2>
    <table style="width:50%" class="container text-center">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
    <?php
        if (isset($_SESSION['products'])) {
            foreach ($_SESSION['products'] as $product) {
                if ($_SESSION["user"]["username"] != $product["vendor"]) {
                    continue;
                }
                echo "<tr>";
                echo "<td>{$product["id"]}</td>";
                echo "<td>{$product["name"]}</td>";
                echo "<td>{$product["price"]}</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>

<?php
require_once 'commons/footer.php'
?>