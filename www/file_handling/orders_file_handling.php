<?php

function load_orders_data() {
    $path_to_orders_data = '../data/orders.csv';
    $fp = fopen($path_to_orders_data,'r');

    $first_line =  fgetcsv($fp);
    $orders = [];
    while ($fields = fgetcsv($fp)) {
        $i = 0;
        $order = [];
        foreach ($first_line as $column_name) {
            $order[$column_name] = $fields[$i];
            if ($column_name == 'products_bought'){
                $order['products_bought'] = explode('|',$order['products_bought']);
            }
            $i++;
        }
        $orders[] = $order;
    }
    $_SESSION['orders'] = $orders;
    fclose($fp);
}


function save_orders_data() {
    $path_to_orders_data = '../data/orders.csv';
    $fp = fopen($path_to_orders_data,'w');
    $column_names = ['id','address','products_bought','distribution_hub','created_at','price','isDelivered'];

    fputcsv($fp,$column_names);
    if (is_array($_SESSION['orders'])) {
        foreach ($_SESSION['orders'] as $order){
            $order['products_bought'] = implode("|", $order['products_bought']);
            fputcsv($fp, $order);
        }
    }
    fclose($fp); 
}

?>