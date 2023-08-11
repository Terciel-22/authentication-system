<?php 

$localhost = 'localhost';
$dbname = 'authentication-system';
$dbusername = 'root';
$dbpassword = '';
$options = [
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
];

try {
    $dsn = "mysql:host=$localhost;dbname=$dbname";
    $db = new PDO($dsn, $dbusername, $dbpassword, $options);
} catch(PDOException $e) {
    die('Connection failed: ' .$e->getMessage());
}