<?php
session_start();
require_once('config.php');

// save json using cookies
if (isset($_SESSION['json'])) {
    $data = $_SESSION['json'];
} else {
    // The URL of the API endpoint
    $url = "https://apitransporte.buenosaires.gob.ar/subtes/serviceAlerts?client_id=$client_id&client_secret=$client_secret&json=1";

    // Make the GET request
    $response = file_get_contents($url);

    // Check if the request was successful
    if ($response === FALSE) {
        die('Error occurred while making the GET request');
    }
    // Decode the JSON response
    $data = json_decode($response, true);

    //setcookie('json', $data, time() + 120); // '/' use to save it in entire website
    $_SESSION['json'] = $data;
}
?>

<pre>
    <?= // Print the response
        print_r($data);
    ?>
</pre>

<p>
    Array: 
    <?php
        print_r($data["entity"]["0"]["alert"]["informed_entity"]["0"]["route_id"]);
    ?>
</p>
