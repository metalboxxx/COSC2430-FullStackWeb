<?php
session_start();

if (!isset($_SESSION['selected_product'])){
    header("location: see_products.php");
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


$orders = [];
if(isset($_POST['finish_cart'])){
    global $orders;
    $order = [
        id => 777,
        customer => $_SESSION['user'],
        products => $_SESSION['cart'],
        created_at => date()
    ];
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

    <?php       // Display current product
    echo "Current product";
    echo 'ID: ';$_SESSION["selected_product"]["id"];
    echo 'Name: ';$_SESSION["selected_product"]["name"];
    echo 'Price: ';$_SESSION["selected_product"]["price"];     
    ?>


    <form method="get" action="product_details.php">
        Add to cart <input type="submit" value="add_product" ><br>
        Reset cart <input type="submit" value="reset_cart"> <br>
    </form>
    <form method="post" action="product_details.php">
        Finish cart <input type="submit" value="finish_cart"><br>
    </form>
</body>
</html>