<?php
session_start();
require_once './functions.php';
require_once './restrictedsession.php';
if (isset($_POST['iId'])) {
    $iId = sanitizeString($_POST['iId']);
    $query = "DELETE FROM Item WHERE Iid = '$iId'";
    queryMysql($query);
    header("Location: loaditem.php");
    die("You've deleted the item '$iId' <a href='loaditem.php'>click here</a> to continue.");
}
?>

