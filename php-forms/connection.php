<<<<<<< HEAD
<?php
=======
<?php 
>>>>>>> dd127347d12c8bb16a0f6d7fa4d2cd6133701c08
function getConnection() {
    require_once 'secret/db-credentials.php';
    
    try {
<<<<<<< HEAD
        $conn = new PDO("mysql:host=$dbHost;dbname=$dbDatabase", $dbUser, $dbPassword);
=======
        $conn = new PDO("mysql:host={$dbHost};dbname={$dbDatabase}", 
              $dbUser, $dbPassword);
>>>>>>> dd127347d12c8bb16a0f6d7fa4d2cd6133701c08
        
        return $conn;
        
    } catch(PDOException $e) {
        die('Could not connect to database ' . $e);
    }
}

?>