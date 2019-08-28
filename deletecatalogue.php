<?php
session_start();
require_once './functions.php';

if (isset($_POST['cid'])) {
    $cId = sanitizeString($_POST['cid']);
    $query = "DELETE FROM Catalogue WHERE cId = '$cId'";
    queryMysql($query);
    header("Location: loadcatalogue.php");
    die("You've deleted the catalogue '$cId' <a href='loadcatalogue.php'>click here</a> to continue.");
}
?>

