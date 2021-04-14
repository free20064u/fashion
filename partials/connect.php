<?php
# Data for connecting to database.
$host = 'localhost';
$user = 'root';
$dbname = 'jumelle';
$password = '';

# Connecting to the database.
try {
    $con = new PDO('mysql:host='.$host.';dbname='. $dbname ,$user, $password);
} catch(PDOException $e){
    echo 'Could not connect to database:'. $e -> getMessage();
}