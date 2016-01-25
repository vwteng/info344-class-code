<?php

$dbConn = new PDO("mysql:host=159.203.233.236;dbname=info344chat", "info344student", "GoHawks123");

$sql = 'select * from message';

$stmt = $dbConn->prepare($sql);
$success = $stmt->execute(array());
$stmt->fetchAll();

var_dump($stmt);

?>