<?php
session_start();




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
    echo "Current product";
    echo 'ID: ';$_SESSION["selected_order"]["id"];
    echo 'Address: ';$_SESSION["selected_order"]["address"];
    echo 'Created_at: ';$_SESSION["selected_order"]["price"];     
    ?>
</body>
</html>
