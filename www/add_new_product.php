<?php
session_start();

if (isset($_POST['act'])){
    $product = [
        'id' => 2332,
        'vendor' => $_SESSION['user']['name'],
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'created_at' => date('y-m-d H:i:s')
    ];
    if (!isset($_SESSION['products'])){
        $_SESSION['products'] = [];
    } else {
        $_SESSION['products'][] = $product;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new product</title>
</head>
<body>
<form action="add_new_product.php" method="post">
    Product Name<input type="text" name="name"> <br>
    Price<input type="number" name="price"> <br>
    Submit<input type="submit" name="act">
</form>
</body>
</html>




