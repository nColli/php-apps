<?php
//PDO
function try_connection($username, $password) {
    $host = 'localhost';
    $database = 'stock';
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    } catch (Exception $ex) {
        return FALSE;
    }
}

?>