<?php
function load_hubs_data() {
    $path_to_hubs_data = '../data/distribution_hubs.csv';
    $fp = fopen($path_to_hubs_data,'r');

    $first_line =  fgetcsv($fp);
    $hubs = [];
    while ($fields = fgetcsv($fp)) {
        $i = 0;
        $hub = [];
        foreach ($first_line as $column_name) {
            $hub[$column_name] = $fields[$i];
            $i++;
        }
        $hubs[] = $hub;
    }
    $_SESSION['hubs'] = $hubs;
    fclose($fp); 
}


function save_hubs_data() {

    $path_to_hubs_data = '../data/distribution_hubs.csv';
    $fp = fopen($path_to_hubs_data,'w');
    $column_names = ['id','name','price'];

    fputcsv($fp,$column_names);
    if (is_array($_SESSION['hubs'])) {
        foreach ($_SESSION['hubs'] as $hub){
            fputcsv($fp, $hub);
        }
    } 
    fclose($fp); 
}

?>
