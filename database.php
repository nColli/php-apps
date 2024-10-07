<?php
//PDO
$host = 'localhost';
$database = 'app_database';
$user = 'user_1';
$password = 'Password*123';
$pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);

$sql = 'select id, name, price from product';

echo '<h3>Products</h3>';
echo '<ul>';
foreach ($pdo->query($sql) as $row) {
    echo '<li>';
    print $row['id'] . "\n";
    print $row['name'] . "\n";
    print $row['price'] . "\n";
    echo '</li>';
}
echo '</ul>';