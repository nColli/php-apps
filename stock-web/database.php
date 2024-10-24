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

function insert_product($pdo) {
    $sql = "insert into product(id,name,price,stock) values (:id, :name, :price, :stock)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':id' => $_POST['id'],
        ':name' => $_POST['name'],
        ':price' => $_POST['price'],
        ':stock' => $_POST['stock']
    ));
}
/*
function get_product($pdo, $id) {
    $sql = "select id from product where id = :id";
    $row = $pdo->query($sql);

    return $row;
}*/

?>