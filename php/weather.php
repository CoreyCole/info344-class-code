<?php   
    $url = "http://api.openweathermap.org/data/2.5/weather?q=Seattle,us&units=imperial&appid=2de143494c0b295cca9337e1e96b00e0";
    
    $result = json_decode(file_get_contents($url));
    print_r($result);
?>