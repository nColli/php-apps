<?php
require_once("db_connection.php");
if ( isset($_POST['id']) ) {
    $sql = "delete from product where id = :id";
    echo("<pre>\n". $sql ."\n</pre>\n");
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':id' => $_POST['id']
    ));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <p>Delete a product</p>
    <form method="post">
        <p>ID: <input type="text" name="id" size="40"></p>
        <p><input type="submit" value="Delete"></p>
    </form>
</body>
</html>