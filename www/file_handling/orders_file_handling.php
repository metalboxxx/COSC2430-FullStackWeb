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
            if ($column_name = 'products_bought'){
                $order[$column_name] = explode('|',$order['column_name']);
            }
            $i++;
        }
        $orders[] = $order;
    }
    $_SESSION['orders'] = $order;
    fclose($fp);
}


function save_orders_data() {
    load_orders_data();
    $path_to_orders_data = '../data/orders.csv';
    $fp = fopen($path_to_orders_data,'w');
    $column_names = ['id','name','price'];

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