<html lang="en">
    <head>
        <title>Default page</title>
         </head>
    <body>
        <?php include 'header.php';
        
        require  __DIR__ . '/wp-load.php';
        
        ?>
        <form id="language-switcher" method="get">
            <label for="language-switcher-locales">
            </label>
            <input type="hidden" name="interim-login" value="1" />
        </form>
        <?php include 'footer.php';?>
    </body>
</html>