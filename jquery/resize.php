<html>
    <head></head>
    <body>
        <script text="text/javascript" src="jquery-3.7.1.min.js"></script>
        <script type="text/javascript">
            // asynchronous function
            $(window).resize(function(){
                console.log('.resize() called. width=' + 
                    $(window).width() + ' height=' + $(window).height()
                );
            });
        </script>
        <p>Resize webpage</p>
    </body>
</html>