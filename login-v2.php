<?php
    session_start();
    require_once('db_connection.php');
    if ($_POST['email'] && $_POST['password']) {
        // check database
        $check = hash('md5', $salt.$_POST['pass']);

        $stmt = $pdo->prepare('SELECT user_id, name FROM users
   
            WHERE email = :em AND password = :pw');
   
        $stmt->execute(array( ':em' => $_POST['email'], ':pw' => $check)); //check = password hashed
   
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ( $row !== false ) {
            // $_SESSION['name'] = $row['name'];
            // $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['logged'] = TRUE;
            
            header("Location: login-v2.php");
            return;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <?php
            if (isset($_SESSION['logged'])) {
                echo '<h1> Logged <h1>';
            } else {
                echo '<h1>Please, log in</h1>';
            }
        ?>
        <form action="login-v2.php" method="post">
            <p>
                <label for="email">Email</label>
                <input type="email" name="email">
            </p>
            <p>
                <label for="password">Password</label>
                <input type="password" name="password">
            </p>
            <input type="submit" value="Log In">
        </form>
    </div>
</body>
</html>