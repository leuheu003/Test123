 <?php
require_once 'header.php';
//Check to make sure that user is logged in first
require_once 'restrictedsession.php';
$error = $msg = "";
if (isset($_POST['cName'])) { //updating
    $cId = sanitizeString($_POST['cId']);
    $cName = sanitizeString($_POST['cName']);
    $cDescription = sanitizeString($_POST['cDescription']);
    $uId = $_SESSION['uId'];
    //
     
        $query = "UPDATE Catalogue SET cName = '$cName', cDescription = '$cDescription', lastModifiedBy = '$uId' WHERE cId = '$cId'";
        $result = queryMysql($query);
        if (!$result) {
            $error = "Couldn't update Catalogue $cName, please try again";
        } else {
            $msg = "Updated $cName successfully";
        }
    
}
//for loading the data to the form
if (isset($_POST['cId'])) {
    $cId = sanitizeString($_POST['cId']);
    //Load the current data to that batch
    $query = "SELECT cName, cDescription FROM Catalogue WHERE cId = '$cId'";
    $result = queryMysql($query);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $cName = $row[0];
        $cDescription = $row[1];
    }
}
?>
<br><br>
<form action="updatecatalogue.php" method="POST">
    <fieldset>
        <legend>Update Catalogue</legend>
        <div class="error"><?php echo $error; ?></div>
        <input type="hidden" value="<?php echo $cId; ?>" name="cId"/>
         Name: </br>
        <input type="text" id="cName" name="cName" required value="<?php echo $cName; ?>"/><br>
         Description: <br>
        <textarea name="cDescription"><?php echo $cDescription; ?></textarea><br><br>
        <input type="submit" value="Update"/>
        <div><?php echo $msg; ?></div>
    </fieldset>
</form>

</body>
</html>
