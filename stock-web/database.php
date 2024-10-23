<?php
//PDO
function try_connection($username, $password) {
    $host = 'localhost';
    $database = 'test';
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        return $pdo;
    } catch (Exception $ex) {
        return FALSE;
    }
}

?>