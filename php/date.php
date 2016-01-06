<?php
    date_default_timezone_set('America/Los_Angeles');
    $months = array();
    
    for($i = 0; $i < 12; $i++) {
        $months[$i] = date('F', mktime(0, 0, 0, $i, 1));
    }
    
    for ($i = 0; $i < 12; $i++) {
        echo $months[$i] . " ";   
    }
    
    echo "<br>";
    sort($months);
    
    for ($i = 0; $i < 12; $i++) {
        echo $months[$i] . " ";   
    }
?>