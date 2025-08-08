<?php
require_once __DIR__ . '/admin.php';
$title =  'About';
$display_major_version   = '6.8';
require_once ABSPATH . '/include/admin-header.php';
?>

<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <?php include 'header.php';?>
        <h1>Welcome to my home page!</h1>
        <p>Some text.</p>
        <p>Some more text.</p>
        <?php include 'footer.php';?>
    </body>
</html>