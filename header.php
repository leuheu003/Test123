<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/menu_style.css?v=<?php echo time();?>" type="text/css"/>
        <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <title>ATN Manager</title>
    </head>
    <body>
    <center><img src="images/ToyStore.jpg"</center>
    <?php
    require_once './functions.php';
        include_once './menu_admin.php';
    ?>
</body>
</html>

