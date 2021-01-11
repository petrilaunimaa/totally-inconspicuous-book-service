<!DOCTYPE html>
<html>
    <head>
        <title>yoink</title>
    </head>
</html>
<?php 
session_start();
session_destroy();
header('location: index.php');
exit;
?>