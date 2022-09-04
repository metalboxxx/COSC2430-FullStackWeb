<?php
function load_products_data() {
    $path_to_products_data = '../../data/products.csv';
    $fp = fopen($path_to_products_data,'r');

    $first_line =  fgetcsv($fp);
    $products = null;
    $products = [];
    while ($fields = fgetcsv($fp)) {
        $i = 0;
        $product = [];
        foreach ($first_line as $column_name) {
            $product[$column_name] = $fields[$i];
            $i++;
        }
        $products[] = $product;
    }
    $_SESSION['products'] = $products;
    fclose($fp); 
}


function save_products_data() {

    $path_to_products_data = '../../data/products.csv';
    $fp = fopen($path_to_products_data,'w');
    $column_names = ['id','name','price'];

    fputcsv($fp,$column_names);
    if (is_array($_SESSION['products'])) {
        foreach ($_SESSION['products'] as $product){
            fputcsv($fp, $product);
        }
    } 
    fclose($fp); 
}

?>
