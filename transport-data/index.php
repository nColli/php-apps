<?php
session_start();
require_once('config.php');

$url_base = "https://apitransporte.buenosaires.gob.ar";

if ( ! isset( $_SESSION['data'] ) ) {
    $url = $url_base . "/subtes/serviceAlerts?client_id=$client_id&client_secret=$client_secret&json=1";
    $response = file_get_contents($url);
    $data = json_decode($response, TRUE);

    $_SESSION['data'] = $data;
    $_SESSION['message'] = 'new data';

    //$url_bus = " https://apitransporte.buenosaires.gob.ar/colectivos/feed-gtfs?client_id=$client_id&client_secret=$client_secret";
    //$response_bus = file_get_contents($url_bus);
    //$data_bus = json_decode($response_bus, TRUE);

}

$url_routes = $url_base . "/colectivos/vehiclePositionsSimple?client_id=$client_id&client_secret=$client_secret&agency_id=54";
$response_routes = file_get_contents($url_routes);
$routes = json_decode($response_routes, TRUE);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transport</title>
    <script type="text/javascript" src="jquery-3.7.1.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $("#reload").click(function(){
                $.ajax({
                    url: 'reload.php', 
                    type: 'GET',
                    success: function(data) {
                        window.location.replace("index.php");
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching data: " + error);
                    }
                });
                
            });
        });
    </script>

</head>
<body>
    
<?php
    if (isset($_SESSION['message'])) {
        echo('<p>'.$_SESSION['message'].'</p>');
        unset($_SESSION['message']);
    }
?>


<button type="button" id="reload">Reload</button>


<h3>Alerts</h3>
<ul>
    <?php
    $entities = $_SESSION['data']['entity'];
    foreach($entities as $alert) {
        echo '<li>';
        echo $alert['alert']['informed_entity'][0]['route_id'] . ': ' . $alert['alert']['header_text']['translation'][0]['text'];
        echo '</li><br>';
    }

    ?>
</ul>
<!--
<iframe width="425" height="350" src="https://www.openstreetmap.org/export/embed.html?bbox=-58.67005795240403%2C-34.66006644301572%2C-58.66651743650437%2C-34.65805213433632&amp;layer=mapnik&amp;marker=-34.659059294796066%2C-58.66828769445419" style="border: 1px solid black">
</iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=-34.659059&amp;mlon=-58.668288#map=19/-34.659059/-58.668288">View Larger Map</a></small>
-->

<h2>Rutas colectivos Linea 216 </h2>
<ul>
    <?php

    foreach($routes as $route) {
        echo '<li><pre>';
        //print_r($route);
        echo "Ruta: " . $route['route_short_name'] . '<br>';
        echo "Recorrido: " . $route['trip_headsign'] , '<br>';
        echo '</pre></li><br>';
        ?> 
        <iframe width="425" height="350" src="https://www.openstreetmap.org/export/embed.html?bbox=<?= $route['longitude'] ?>%2C<?= $route['latitude'] ?>%2C<?= $route['longitude'] ?>%2C<?= $route['latitude'] ?>&amp;layer=mapnik&amp;marker=<?= $route['latitude'] ?>%2C<?= $route['longitude'] ?>" style="border: 1px solid black">
        </iframe><br/>
        <?php
    }

    ?>
</ul>

</body>
</html>