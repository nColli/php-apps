<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON</title>
</head>
<body>
    <script type="text/javascript" src="jquery-3.7.1.min.js"></script>
    
    <script>
        $(document).ready( function () {
            $.getJSON('json.php', function(data) {
                $("#back").html(data.first);

                window.console && console.log(data);
            })
        })
    </script>

    <div id="back"></div>
</body>
</html>