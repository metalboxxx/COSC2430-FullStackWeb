<?php
require 'header.php';
require 'file_handling/products_file_handling.php';
load_products_data();

//For testing purposes only. Change contents below when working
if (isset($_SESSION['products'])) {
    echo '<pre>';
    print_r($_SESSION['products']);
    echo '</pre>';
    } 
?>