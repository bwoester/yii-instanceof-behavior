<?php
header('HTTP/1.1 307 Temporary Redirect');
header('Location: sampleApp/');
?>
<html>
    <head>
        <title>Moved</title>
    </head>
    <body>
        <h1>Moved</h1>
        <p>This page has moved to <a href="sampleApp/">sampleApp</a>.</p>
    </body>
</html>
