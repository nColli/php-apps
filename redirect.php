<?php
session_start();
if ( isset($_POST['where']) ) {
  if ( $_POST['where'] == '1' ) {
    header("Location: redirect.php");
    return;
  } else if ( $_POST['where'] == '2' ) {
    header("Location: https://www.google.com/");
    return;
  }
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>redirect</title>
  </head>
  <body>
    <p>Router</p>
    <form method="post"> 
      <p><label for="inp">Where to go? (1-2) </label>
      <input type="text" name="where" id="inp" size="6">
    </p>
      <input type="submit">
  </form>
  </body>
</html>
