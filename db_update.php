<?php
require_once("db_connection.php");
if ( isset($_POST['id']) && isset($_POST['price']) ) {
    $sql = "update product set price = :price where id = :id";
    echo("<pre>\n". $sql ."\n</pre>\n");
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':id' => $_POST['id'],
        ':price' => $_POST['price']
    ));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <p>Update price</p>
    <form method="post">
        <p>ID: <input type="text" name="id" size="40"></p>
        <p>Price: <input type="text" name="price" size="40"></p>
        <p><input type="submit" value="Update price"></p>
    </form>
</body>
</html>