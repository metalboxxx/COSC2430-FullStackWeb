<?php
ob_start();

require_once 'commons/header.php';
require 'functions/create_id.php';
require 'file_handling/products_file_handling.php';
require 'file_handling/orders_file_handling.php';
require 'file_handling/hubs_file_handling.php';

load_products_data();

if(!isset($_SESSION['use'])){
    header("location: index.php");
}

if (!isset($_SESSION['selected_product'])){
    header("location: ViewProducts.php");     
}


// Buttons fuctionalities
if (isset($_GET['add_product'])){
    if (isset($_SESSION['cart'])){
        $_SESSION['cart'][] = $_SESSION['selected_product'];
    } else {
        $_SESSION['cart'] = [];
        $_SESSION['cart'][] = $_SESSION['selected_product'];
    }
}

if(isset($_GET['reset_cart'])){
    $_SESSION['totalPrice'] = 0;
    $_SESSION['cart'] = [];
}

if(isset($_POST['finish_cart'])){
    if($_SESSION['cart'] != []){
    load_orders_data();
    load_hubs_data();
    
    $random_hub;
    $hubs_ammount = count($_SESSION['hubs']);
    $rand_hub_index = random_int(0,$hubs_ammount-1);
    for ($i=0; $i<$hubs_ammount; $i++){
        global $random_hub;
        if ($i == $rand_hub_index){
            $random_hub = $_SESSION['hubs'][$i];
        }
    }

    $array_products = [];
    foreach ($_SESSION['cart'] as $product){
        global $array_products;
        $array_IDproducts[] = $product['id'];
    }
    $order = [
        'id' => create_id($_SESSION['orders']),
        'address' => $_SESSION['user']['address'],
        'products_bought' => $array_IDproducts,
        'distribution_hub' =>  $random_hub['name'],
        'created_at' => date("Y-m-d H:i:s"),         
        'price' => $_SESSION['totalPrice'],
        'status' => 'active'
    ];
    
    $_SESSION['orders'][] = $order; 
    save_orders_data();
    $_SESSION['cart'] = [];
}}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 class="text-center"><?php
    $productHeader = $_SESSION['selected_product']['name'];
     echo "$productHeader";
     ?>
     </h1>

    <?php       // Display current product
    $id = $_SESSION['selected_product']['id'];
    $name = $_SESSION['selected_product']['name'];
    $price = $_SESSION["selected_product"]["price"];
    $vendor = $_SESSION["selected_product"]["vendor"];
    $description = $_SESSION["selected_product"]["description"];
    echo "<div class='row container'>";
    echo "<div class= 'col-12'>Current product</div>";
    echo "<div class='col-4'>ID: </div> <div class='col-8'>$id</div>";
    echo "<div class='col-4'>Name: </div> <div class='col-8'>$name</div>";
    echo "<div class='col-4'>Price: </div> <div class='col-8'>$price</div>";
    echo "<div class='col-4'>Vendor: </div><div class='col-8'>$vendor</div>";  
    echo "<div class='col-4'>Description: </div><div class='col-8'>$description</div>";  
    echo "</div>";   
    ?>
    <div class="container">
        <form method="get" action="ProductDetails.php">
            <input id="add_product_submit" class="form-control bg-primary text-white btn shadow p-3 mb-5 rounded" type="submit" name="add_product" value="Add to cart">
            <input id="reset_cart_submit" class="form-control bg-primary text-white btn shadow p-3 mb-5 rounded" type="submit" name="reset_cart" value="Reset cart"> 
        </form>
        <form method="post" action="ProductDetails.php">
            <input id="submit_cart_submit" class="form-control bg-primary text-white btn shadow p-3 mb-5 rounded " type="submit" name="finish_cart" value="Finish">
        </form>
    </div>
    <table style="width:60%" class="container text-center">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
    <?php
        
        if (isset($_SESSION['cart'])) {
            $i = 1;
            $_SESSION['totalPrice'] = 0;
            foreach ($_SESSION['cart'] as $productInCart) {      
                $price = $productInCart['price'];
                $_SESSION['totalPrice'] += $price;

                echo "<tr>";
                echo "<td>{$i}</td>";
                echo "<td>{$productInCart["name"]}</td>";
                echo "<td>{$productInCart["price"]}</td>";
                $i++;
            }
            echo "<tr>";
            echo "<td class='text-bold'>Total Price</td>";
            echo "<td></td>";
            echo "<td class='text-bold'>{$_SESSION['totalPrice']}</td></tr>";
        }
        
    ?>
    </table>
    </div>
</body>
</html>
