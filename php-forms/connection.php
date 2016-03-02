<<<<<<< HEAD
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
=======
<?php 
function getConnection() {
    require_once 'secret/db-credentials.php';
    
    try {
        $conn = new PDO("mysql:host={$dbHost};dbname={$dbDatabase}", 
              $dbUser, $dbPassword);
        
        return $conn;
        
    } catch(PDOException $e) {
        die('Could not connect to database ' . $e);
    }
}

>>>>>>> 30714306d6f904ab140d2204ca886eed7ea0a5ed
?>