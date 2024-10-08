<?php
    $oldguess = isset($_POST['guess']) ? $_POST['guess'] : '';

    if ($oldguess == '') {
        $message = '';
    } else if ($oldguess == 42) {
        $message = 'Your guess was correct';
    } else {
        $message = 'Your guess was incorrect';
    }
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
        <input type="text" name="guess" id="guess" value="<?= $oldguess ?>">
        <input type="submit"/>
        </p>
    </form>
    <p><?= $message ?></p>
</body>
</html>