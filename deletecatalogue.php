<?php
session_start();
require_once './functions.php';

if (isset($_POST['cid'])) {
    $cId = $_POST['cid'];
    $query = "DELETE FROM catalogue WHERE cid = '$cId'";
    queryMysql($query);
    header("Location: loadcatalogue.php");
    die("You've deleted the catalogue '$cId' <a href='loadcatalogue.php'>click here</a> to continue.");
}
?>

