<?php
function getConnection() {
    //credentials local to this function
    require_once 'secret/db-credentials.php';
    
    try {
        $conn = new PDO("mysql:host=$dbHost;dbname=$dbDatabase", $dbUser, $dbPassword);
        return $conn;
    } catch (PDOException $e) {
        die('Could not connect to database ' . $e);
    }
}
?>