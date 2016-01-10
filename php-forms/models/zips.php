<?php
class Zips {
    protected $conn;
    
    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }
    
    public function isZip($value) {
        $stmt = $this->conn->prepare('select count(*) as numMatches from zips where zip=?');
        $success = $stmt->execute(array($value));
        if (!$success) {
            trigger_error($stmt->errorInfo());
        }
        $row = $stmt->fetch();
        return $row['numMatches'] > 0;
    }
    
    public function searchByCity($city) {
        $city = $city . '%';
        $stmt = $this->conn->prepare('select zip,primary_city,state,country from zips where primary_city like ? limit 1000');
        $success = $stmt->execute(array($city));
        if (!$success) {
            trigger_error($stmt->errorInfo());
        }
        return $stmt->fetchAll();
    }
}
?>