<?php
//appID (this is their demo app ID from their web site)
$appId = '2de143494c0b295cca9337e1e96b00e0';

//weather API URL
//http://api.openweathermap.org/data/2.5/weather?zip={zipcode},us&units=imperial&appid={$appId}

//weather icon URLs
// http://openweathermap.org/img/w/{iconName}.png

require_once 'connection.php';
require_once 'models/zip-model.php';

<<<<<<< HEAD
$q = $_GET['q'];

if (strlen($q) > 0) {
    $conn = getConnection();
    $zipModel = new Zips($conn);
    $matches = $zipModel->search($q);
}

if (count($matches) == 1) {
    $zip = $matches[0]['zip'];
    $url = "http://api.openweathermap.org/data/2.5/weather?zip={$zip},us&units=imperial&appid={$appId}";
    $weatherData = json_decode(file_get_contents($url));
=======
if (isset($_GET['q'])) {
    $q = $_GET['q'];   
}
else {
    $q = '';
}

$conn = getConnection();
$zipModel = new Zips($conn);
$matches = $zipModel->search($q);

if (count($matches) == 1) {
    $zip = $matches[0]['zip'];
    $url = "http://api.openweathermap.org/data/2.5/weather?zip={$zip},us&units=imperial&appid={$appId}";
    $json = file_get_contents($url);
    $weatherData = json_decode($json);
>>>>>>> 30714306d6f904ab140d2204ca886eed7ea0a5ed
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="UTF-8">
    <link rel="icon" href="img/page-icon.png">
    <title>Weather</title>
    
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body class="container">
    <?php 
<<<<<<< HEAD
    include 'views/search-form.php';
    if (isset($q)) {
        include 'views/matches.php';
    }
    
    if (isset($weatherData)) {
        include 'views/weather-data.php';
    }
    ?>
    
=======
    include 'views/search-form.php';   
    include 'views/matches.php';
    
    if (isset($weatherData)) {
        include 'views/weather.php';
    }
    ?>
       
>>>>>>> 30714306d6f904ab140d2204ca886eed7ea0a5ed
   
</body>
</html>

<!-- A09C9636-6F6A-45A4-A6F0-3B2CFA260D75 -->