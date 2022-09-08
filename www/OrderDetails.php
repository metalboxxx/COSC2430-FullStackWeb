<?php
session_start();
// if (!isset($_SESSION['selected_order'])){
//     header("location: see_products.php");
// }

require "file_handling/orders_file_handling.php";

if(isset($_POST['deliveried'])){
    $_SESSION["selected_order"]["isDeliveried"] = TRUE;
    save_orders_data();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
</head>
<body>
    <?php       // Display current product
    echo "Current order";
    echo 'ID: ';$_SESSION["selected_order"]["id"];
    echo 'Address: ';$_SESSION["selected_order"]["address"];
    echo 'Created_at: ';$_SESSION["selected_order"]["price"];     
    ?>

    <form method="post" actions="OrderDetails.php" >
        <label for="deliveried_button">Have delivered</label>
        <input type="submit" id="deliveried_button" name="deliveried">
    </form>
</body>
</html>
