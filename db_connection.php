<?php
//PDO
$host = 'localhost';
$database = 'app_database';
$user = 'user_1';
$password = 'Password*123';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
} catch (Exception $ex) {
    echo '<p>ERROR connecting to database</p>';
    error_log("db_connection.php, SQL error=".$ex->getMessage());
    return;
}

?>