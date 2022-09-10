<?php
ob_start();


require_once 'commons/header.php';
require 'file_handling/orders_file_handling.php';

if(!isset($_SESSION['use'])){
    header("locatioin: index.php");
}

if ($_SESSION["user_type"] == "Vendor") {
    header("Location: VendorViewProducts.php");
}
if ($_SESSION["user_type"] == "Customer") {
    header("Location: ViewProducts.php");
}

load_orders_data();

if (isset($_POST["get_order_detail"])){
        $_SESSION["selected_order"]["id"] = $_POST["id"];
        $_SESSION["selected_order"]["address"] = $_POST["address"];
        $_SESSION["selected_order"]["products_bought"] = $_POST["products_bought"];
        $_SESSION["selected_order"]["distribution_hub"] = $_POST["distribution_hub"];
        $_SESSION["selected_order"]["created_at"] = $_POST["created_at"];
        $_SESSION["selected_order"]["price"] = $_POST["price"];
        $_SESSION["selected_order"]["status"] = $_POST["status"];

        header("Location: OrderDetails.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
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
    <h2 class="text-center">All Orders Available</h2>
    <div class="container-fluid text-center">
    <table style="width:90%">
        <tr>
            <th>ID</th>
            <th>Address</th>
            <th>Products</th>
            <th>Price</th>
            <th>Created at</th>
            <th>Distribution Hub</th>
            <th>Status</th>
            <th>View</th>
        </tr>
    <?php
        if (isset($_SESSION['orders'])) {
            foreach ($_SESSION['orders'] as $order) {      
                if ($_SESSION['user']['distribution_hub'] == $order["distribution_hub"] && $order['status'] == 'active')  {
                    $order["products_bought"] = implode ("|", $order["products_bought"]);
                    echo "<tr>";
                    echo "<td>{$order["id"]}</td>";
                    echo "<td>{$order["address"]}</td>";
                    echo "<td>{$order["products_bought"]}</td>";
                    echo "<td>{$order["price"]}</td>";
                    echo "<td>{$order["created_at"]}</td>";
                    echo "<td>{$order["distribution_hub"]}</td>";
                    echo "<td>{$order["status"]}</td>";
                    
                    echo "<td><form method='post' action='ViewOrders.php'>";
                    echo "<input type='submit' name='get_order_detail' value='Click to view'>";
                    echo "<input type='hidden' name='id' value='{$order["id"]}'>";
                    echo "<input type='hidden' name='address' value='{$order["address"]}'>";
                    echo "<input type='hidden' name='products_bought' value={$order["products_bought"]}>";
                    echo "<input type='hidden' name='created_at' value={$order["created_at"]}>";
                    echo "<input type='hidden' name='price' value={$order["price"]}>";
                    echo "<input type='hidden' name='distribution_hub' value={$order["distribution_hub"]}>";
                    echo "<input type='hidden' name='status' value={$order["status"]}>";
                    echo "</form></td></tr>";
                }
            }
        }
    ?>
    </table>
    </div>
</body>
</html>

<?php
require_once 'commons/footer.php'
?>