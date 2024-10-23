<?php
//PDO
function try_connection($username, $password) {
    $host = 'localhost';
    $database = 'stock';
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        return $pdo;
    } catch (Exception $ex) {
        return FALSE;
    }
}

function get_data($pdo) {
    $sql = 'SELECT id,name,price,stock FROM product';

    $data = $pdo->query($sql);

    return $data;
}

?>