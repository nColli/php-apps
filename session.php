<?php
session_start();

if ( ! isset($_SESSION['counter']) ) {
    echo "<p>Session is empty</p>\n";
    $_SESSION['time'] = date("h:i:sa");
    $_SESSION['counter'] = 1;

} else if ( $_SESSION['counter'] < 3 ) {
    echo '<p>You visit this website '.$_SESSION['counter'].' times </p>'; 
    $_SESSION['counter']++;
    echo '<p>Your last time here was at ' .$_SESSION['time']. '</p>';
    $_SESSION['time'] = date("h:i:sa");

} else {
    session_destroy();
    session_start();
    echo '<p>Session restarted</p>';
}
?>
<p><a href="session.php">Click me!</a></p>
<p>Our session ID is:<?php echo(session_id()) ?></p>
<pre>
    <?php print_r($_SESSION); ?>
</pre>