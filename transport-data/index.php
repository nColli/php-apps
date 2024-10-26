<?php
require_once('config.php');
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

// Print the response
print_r($data);
?>
