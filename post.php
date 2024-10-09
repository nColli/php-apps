<?php
    session_start();

    if ( isset($_POST['guess']) ) {
        $guess = $_POST['guess'];
        $_SESSION['guess'] = $guess;

        if ($guess == 42) {
            $_SESSION['message'] = "Correct!";
        } else {
            $_SESSION['message'] = "Incorrect";
        }

        header("Location: post.php");
        return;
    }

    /*
    $oldguess = isset($_POST['guess']) ? $_POST['guess'] : '';

    $message = FALSE;

    if ($oldguess == 42) {
        $message = 'Your guess was correct';
    } else {
        $message = 'Your guess was incorrect';
    }*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>
<body>
    <p>Guessing game</p>
    <form method="post">
        <p><label for="guess">Input Guess</label>
        <input type="text" name="guess" id="guess" value="<?= $_SESSION['guess'] ?>">
        <input type="submit"/>
        </p>
    </form>
    <?php
        if ( isset($_SESSION['message']) ) {
            echo "<p>" . $_SESSION['message'] . "</p>";
        }
    ?>
</body>
</html>