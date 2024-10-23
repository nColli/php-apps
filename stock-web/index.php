<?php
session_start();
require_once('database.php');

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);

    $pdo = try_connection($username, $password); //return FALSE if connection fails

    if ($pdo == FALSE) {
        $_SESSION['error'] = 'Error, username or password incorrect';

        header('Location: index.php');
        return;
    } else {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        $_SESSION['success'] = 'Success, logged!';

        header('Location: panel.php');
        return;
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock login</title>
    <link rel="stylesheet" href="style-login.css">
    <script type="text/javascript" src="jquery-3.7.1.min.js">
    </script>
    <style>
        .container-login {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 4px;
        }

        input {
            margin-top: 5px;
        }

        #id {
            margin-bottom: 5px;
        }

        .button-container {
            position: relative;
            margin-top: 30px;
        }

        button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

    </style>
</head>
<body>
    <div class="container-login">
        <h2>Stock Manager Login</h2>
        
        <?php
            if (isset($_SESSION['error'])) {
                echo('<p style="color: red">' . $_SESSION['error'] . '</p>');
                unset($_SESSION['error']); //flash message
            } 
        ?>

        <form action="index.php" method="post">
            <p id="user">
                <label for="username">Username: </label>
                <br>
                <input type="text" name="username" id="username" placeholder="Juan">
            </p>
            <p>
                <label for="password">Password: </label>
                <br>
                <input type="password" name="password" id="password" placeholder="password">
            </p>
            
            <div class="button-container">
                <button type="submit" id="submit">Login</button>
            </div>
        </form>

        <script type="text/javascript">
            $(document).ready(function() {
                    $("#submit").click(function(event){
                        if (!$('#username').val() || !$('#password').val()) {
                            alert('username or password empty');
                            event.preventDefault();
                        }
                    });
            });
        </script>
    </div>
</body>
</html>