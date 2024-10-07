<?php
require_once("db_connection.php");
if ( isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price']) ) {
    $sql = "insert into product(id,name,price) values (:id, :name, :price)";
    echo("<pre>\n". $sql ."\n</pre>\n");
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':id' => $_POST['id'],
        ':name' => $_POST['name'],
        ':price' => $_POST['price']
    ));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
</head>
<body>
    <p>Add a new product</p>
    <form method="post">
        <p>ID: <input type="text" name="id" size="40"></p>
        <p>Name: <input type="text" name="name" size="40"></p>
        <p>Price: <input type="text" name="price" size="40"></p>
        <p><input type="submit" value="Add new"></p>
    </form>
</body>
</html>