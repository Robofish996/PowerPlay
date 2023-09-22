<?php
$host = 'localhost';
$dbname = 'powerplay';
$dbusername = 'Mathew';
$dbpassword = 'mysql@123';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed:" . $e->getMessage());
}
