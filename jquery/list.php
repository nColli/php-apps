<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
</head>
<body>
    <script type="text/javascript" src="jquery-3.7.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
                $("#add").click(function(){
                $("#items").append('<li>item</li>');
            });
        });
    </script>

    <ul id="items">
        <li>item</li>
        <li>item</li>
        <li>item</li>
    </ul>
    <button type="button" id="add">Add item</button>
</body>
</html>