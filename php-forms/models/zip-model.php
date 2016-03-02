<<<<<<< HEAD
<?php
=======
<?php 
>>>>>>> 30714306d6f904ab140d2204ca886eed7ea0a5ed
class Zips {
    protected $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function search($q) {
        $sql = 'select * from zips where zip=? or primary_city=?';
        $stmt = $this->conn->prepare($sql);
        $success = $stmt->execute(array($q,$q));
<<<<<<< HEAD
        if (!$success) {
            var_dump($stmt->errorInfo());
            //trigger_error($stmt->errorInfo());
=======
        if (!$success) {            
            var_dump($stmt->errorInfo());
>>>>>>> 30714306d6f904ab140d2204ca886eed7ea0a5ed
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }
}
?>