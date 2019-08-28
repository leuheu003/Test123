<?php
session_start();
require_once './functions.php';
require_once './restrictedsession.php';
if (isset($_POST['cId'])) {
    $cId = sanitizeString($_POST['cId']);
    $query = "DELETE FROM Catalogue WHERE cId = '$cId'";
    queryMysql($query);
    header("Location: loadcatalogue.php");
    die("You've deleted the catalogue '$cId' <a href='loadcatalogue.php'>click here</a> to continue.");
}
?>

