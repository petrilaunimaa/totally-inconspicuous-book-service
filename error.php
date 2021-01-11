<?php
$error_message = urldecode(filter_input(INPUT_GET,'error'));
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Epic Fail</title>
    </head>
    <body>
        <h1>Failure</h1>
        <pre><?php print $error_message;?></pre>
    </body>
</html>