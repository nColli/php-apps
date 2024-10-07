<?php
//PDO
$host = 'localhost';
$database = 'app_database';
$user = 'user_1';
$password = 'Password*123';
$pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
?>