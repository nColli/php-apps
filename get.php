<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>get request</title>
</head>
<body>
    <p>Variables: name, var</p>
    <p>
        <?php
        // request: domain.com/get.php?name=Juan&var=4
        echo 'Hi '. htmlspecialchars($_GET['name']) . ' your variable is ' . htmlspecialchars($_GET['var']);
        ?>
    </p>
</body>
</html>