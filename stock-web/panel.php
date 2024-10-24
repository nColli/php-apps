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

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['stock'])) {
    $id = htmlentities($_POST['id']);
    $name = htmlentities($_POST['name']);
    $price = htmlentities($_POST['price']);
    $stock = htmlentities($_POST['stock']);

    insert_product($pdo, $id, $name, $price, $stock);

    header('Location: panel.php');
    return;
}

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

    
    <div id="addProduct">
        <h3>Add product: </h3>
        <form action="panel.php" method="post">
            <p id="id">
                <label for="username">ID: </label>
                <br>
                <input type="text" name="id" id="id" placeholder="1000">
            </p>
            <p>
                <label for="name">Name: </label>
                <br>
                <input type="text" name="name" id="name" placeholder="apple">
            </p>
            <p>
                <label for="price">Price: </label>
                <br>
                <input type="text" name="price" id="price" placeholder="132.335">
            </p>
            <p>
                <label for="stock">Stock: </label>
                <br>
                <input type="text" name="stock" id="stock" placeholder="5">
            </p>
            
            <div class="button-container">
                <button type="submit" id="submit">Add product</button>
            </div>
        </form>
    </div>
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
    <p><a href="logout.php">Logout</a></p>
</body>
</html>