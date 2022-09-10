<?php
ob_start();



require_once "commons/header.php";
require "file_handling/orders_file_handling.php";



if(isset($_POST['deliveried'])){        
    foreach ($_SESSION['orders'] as &$order){
        if($order['id'] == $_SESSION['selected_order']['id']){
            $order['status'] = 'delivered';
        }
    }
    save_orders_data();
    header('location: ViewOrders.php');     //Subject to change name
}
if(isset($_POST['canceled'])){        
    foreach ($_SESSION['orders'] as &$order){
        if($order['id'] == $_SESSION['selected_order']['id']){
            $order['status'] = 'canceled';
        }
    }
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
    <h1 class="text-center">Order <?php 
    $orderIdHeader = $_SESSION["selected_order"]['id'];
    echo "$orderIdHeader";
    ?>
    </h1>

    <?php       // Display current order
    $id = $_SESSION['selected_order']['id'];
    $address = $_SESSION['selected_order']['address'];
    $price = $_SESSION["selected_order"]["price"];
    $products_bought = $_SESSION["selected_order"]["products_bought"];
    $created_at = $_SESSION["selected_order"]["created_at"];
    $distribution_hub = $_SESSION["selected_order"]["distribution_hub"];
    echo "<div class='row container'>";
    echo "<div class= 'col-12'>Current product</div>";
    echo "<div class='col-4'>ID: </div> <div class='col-8'>$id</div>";
    echo "<div class='col-4'>Address: </div> <div class='col-8'>$address</div>";
    echo "<div class='col-4'>Products ID: </div> <div class='col-8'>$products_bought</div>";
    echo "<div class='col-4'>Price: </div> <div class='col-8'>$price</div>";
    echo "<div class='col-4'>Created at: </div><div class='col-8'>$created_at</div>";  
    echo "<div class='col-4'>Distribution hub: </div><div class='col-8'>$distribution_hub</div>";  
    
    

    echo "</div>";  
    ?>

    <form method="post" actions="OrderDetails.php"class="form-control text-center container" >
        <input type="submit" id="deliveried_button" name="deliveried" value="Have delivered" class="form-control btn btn-primary">
        <input type="submit" id="deliveried_button" name="canceled" value="Canceled" class="form-control btn btn-danger">
    </form>
</body>
</html>

<?php
require_once 'commons/footer.php'
?>