<?php
session_start();
require_once('database.php');

try {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];

    $pdo = try_connection($username, $password);

} catch (\Throwable $th) {
    echo '<h1> ERROR CONNECTING TO DATABASE </h1>';
    echo "<p> Error: $th </p>";
}

$sql = 'SELECT id,name,price,stock FROM product';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        table {
            width: 20%;
        }
    </style>
</head>
<body>
    <?php
    if (isset($_SESSION['success'])) {
        echo('<p style="color: green">' . $_SESSION['success'] . '</p>');
        unset($_SESSION['success']); //flash message
    }
    ?>

    <h3>Products</h3>
    <?php
        try {
            echo '<table>';
            echo '<tr>';
            echo '<th>ID</th> <th>Name</th> <th>Price</th> <th>Stock</th>';
            echo '</tr>';
            foreach($pdo->query($sql) as $row) {
                echo "<tr><td>";
                echo($row['id']);
                echo("</td><td>");
                echo($row['name']);
                echo("</td><td>");
                echo($row['price']);
                echo("</td><td>");
                echo($row['stock']);
                echo("</td></tr>\n");
            }
            echo '</table>';
        } catch (\Throwable $th) {
            echo '<h1> ERROR CONNECTING TO DATABASE </h1>';
            echo "<p> Error: $th </p>";
        }
        

    ?>
</body>
</html>