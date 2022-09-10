<?php

if (!isset($_SESSION['selected_order'])){
    header("location: ViewOrders.php");      //subject to change
}

require_once "commons/header.php";
require "file_handling/orders_file_handling.php";



if(isset($_POST['deliveried'])){        
    $_SESSION["selected_order"]["isDeliveried"] = 'true';
    save_orders_data();
    header('location: ViewOrders.php');     //Subject to change name
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
    <h1 class="text-center">Order <?php echo '$_SESSION["selected_order"]["id`"]'?></h1>

    <?php       // Display current order
    $id = $_SESSION['selected_order']['id'];
    $address = $_SESSION['selected_order']['address'];
    $price = $_SESSION["selected_order"]["price"];
    $created_at = $_SESSION["selected_order"]["created_at"];
    echo "<div class='row container'>";
    echo "<div class= 'col-12'>Current product</div>";
    echo "<div class='col-4'>ID: </div> <div class='col-8'>$id</div>";
    echo "<div class='col-4'>Address: </div> <div class='col-8'>$address</div>";
    echo "<div class='col-4'>Price: </div> <div class='col-8'>$price</div>";
    echo "<div class='col-4'>Created_at: </div><div class='col-8'>$created_at</div>";  
    echo "</div>";  
    ?>

    <form method="post" actions="OrderDetails.php" >
        <label for="deliveried_button">Have delivered</label>
        <input type="submit" id="deliveried_button" name="deliveried">
    </form>
</body>
</html>
