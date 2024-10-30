<?php
session_start();
require_once('config.php');

if ( ! isset( $_SESSION['data'] ) ) {
    $url = "https://apitransporte.buenosaires.gob.ar/subtes/serviceAlerts?client_id=$client_id&client_secret=$client_secret&json=1";
    $response = file_get_contents($url);
    $data = json_decode($response, TRUE);

    $_SESSION['data'] = $data;
    $_SESSION['message'] = 'new data';
}




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


<pre id="data" >
    <?php
        print_r($_SESSION['data']);
    ?>
</pre>

<p>
    Array: 
    <?php
        print_r($data["entity"]["0"]["alert"]["informed_entity"]["0"]["route_id"]);
    ?>
</p>

</body>
</html>