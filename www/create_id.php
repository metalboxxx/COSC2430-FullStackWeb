<?php
function create_id($targetArray){
    $maxId = 0;
    foreach ($targetArray as $element){
        if ($element['id'] > $maxId) {
            $maxId = $element['id'];
        }
    }
    return $maxId + 1;
}

?>