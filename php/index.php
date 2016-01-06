<?php
$name = "Corey";

$url = parse_url($_SERVER['REQUEST_URI']);
$path = substr($url['path'], 1); //trim off first character
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- make web page work well on mobile (not zoom out and things) -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <meta charset="utf-8">
    <title>Index PHP</title>
</head>
<body>
    <h1>Hello <?=$name ?>!</h1>
    <p><?=htmlentities($path) ?></p>
</body>
</html>