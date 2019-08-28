<?php
session_start();
require_once './functions.php';

if (isset($_POST['iid'])) {
    $iId = sanitizeString($_POST['iid']);
    $query = "DELETE FROM Item WHERE Iid = '$iId'";
    queryMysql($query);
    header("Location: loaditem.php");
    die("You've deleted the item '$iId' <a href='loaditem.php'>click here</a> to continue.");
}
?>

