 <?php
require_once 'header.php';
//Check to make sure that user is logged in first

$error = $msg = "";
if (isset($_POST['cname'])) { //updating
    $cId = sanitizeString($_POST['cid']);
    $cName = sanitizeString($_POST['cname']);
    $cDescription = sanitizeString($_POST['cdescription']);
    $uId = $_SESSION['uid'];
    //
     
        $query = "UPDATE Catalogue SET cname = '$cName', cdescription = '$cDescription', lastModifiedBy = '$uId' WHERE cId = '$cId'";
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
    $query = "SELECT cname, cdescription FROM Catalogue WHERE cId = '$cId'";
    $result = queryMysql($query);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $cName = $row['cname'];
        $cDescription = $row['cdescription'];
    }
}
?>
<br><br>
<form action="updatecatalogue.php" method="POST">
    <fieldset>
        <legend>Update Catalogue</legend>
        <div class="error"><?php echo $error; ?></div>
        <input type="hidden" value="<?php echo $cId; ?>" name="cid"/>
         Name: </br>
        <input type="text" id="cName" name="cname" required value="<?php echo $cName; ?>"/><br>
         Description: <br>
        <textarea name="cdescription"><?php echo $cDescription; ?></textarea><br><br>
        <input type="submit" value="Update"/>
        <div><?php echo $msg; ?></div>
    </fieldset>
</form>

</body>
</html>
