<?php
ob_start();

require_once 'commons/header.php';
require 'functions/create_id.php';
require 'file_handling/products_file_handling.php';
require 'file_handling/orders_file_handling.php';
require 'file_handling/hubs_file_handling.php';


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
    $_SESSION['cart'] = [];
}

if(isset($_GET['removeProduct'])){
    $tempCart =[];
    foreach($cart as $product){
        if($product['name'] == $_GET['removeProduct']){
            continue;
        }
        $tempCart[] = $product;
    }
    $_SESSION['cart'] = $tempCart;
}

if(isset($_POST['finish_cart'])){
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
        'isDelivered' => 'false'
    ];
    
    $_SESSION['orders'][] = $order; 
    save_orders_data();
    $_SESSION['cart'] = [];
}
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
    echo "<div class='row container'>";
    echo "<div class= 'col-12'>Current product</div>";
    echo "<div class='col-4'>ID: </div> <div class='col-8'>$id</div>";
    echo "<div class='col-4'>Name: </div> <div class='col-8'>$name</div>";
    echo "<div class='col-4'>Price: </div> <div class='col-8'>$price</div>";
    echo "<div class='col-4'>Vendor: </div><div class='col-8'>$vendor</div>";  
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
    <ul>
    <div class='container row'>
        <div class='col-4 fw-bold'>Name</div>
        <div class='col-8 fw-bold'>Price</div>
    </div>
        <?php
        
        if(isset($_SESSION['cart'])){

            $_SESSION['totalPrice'] = 0;
            foreach ($_SESSION['cart'] as $productInCart){
                $name = $productInCart['name'];
                $price = $productInCart['price'];
                $_SESSION['totalPrice'] += $price;
                echo "<li class='container row'>";
                echo "<div class='col-4'>$name</div>";
                echo "<div class='col-8'>$price</div>";
                //echo "<div class='col-3'><form method='get' action='ProductDetails.php'><input type='submit' name='removeProduct' value=$name></form></div>";
                echo "</li>";
            }
        }
        if(isset($_SESSION['totalPrice'])){
            $totalPrice = $_SESSION['totalPrice'];
            echo "<div class='container row'>";
            echo "<div class='col-4 fw-bold'>Total Price</div>";
            echo "<div class='col-8 fw-bold'>$totalPrice</div>";
            echo "</div>";
        }
        ?>
    </ul>
</body>
</html>