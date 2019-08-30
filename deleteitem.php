<?php
require_once './functions.php';

if (isset($_POST['iid'])) {
    $iId = $_POST['iid'];
    $query = "DELETE FROM item WHERE iid = '$iId'";
    queryMysql($query);
    header("Location: loaditem.php");
    die("You've deleted the item '$iId' <a href='loaditem.php'>click here</a> to continue.");
}
?>

