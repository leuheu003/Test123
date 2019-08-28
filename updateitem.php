<?php
require_once './header.php';
//Check to make sure that user is logged in first
require_once './restrictedsession.php';
$error = $msg = "";
if (isset($_POST['iName'])) { //updating
    $iId = sanitizeString($_POST['iId']);
    $iName = sanitizeString($_POST['iName']);
    $iDescription = sanitizeString($_POST['iDescription']);
    $iPrice = sanitizeString($_POST['iPrice']);
    $iStatus = sanitizeString($_POST['iStatus']);
    $iSize = sanitizeString($_POST['iSize']);
    $catalogueId = sanitizeString($_POST['catalogueId']);
    $uId = $_SESSION['uId'];
    $query = "UPDATE Item SET iName = '$iName', iDescription = '$iDescription', iPrice = '$iPrice', iStatus = '$iStatus', iSize = '$iSize' WHERE iId = '$iId'";
    $result = queryMysql($query);
    if (!$result) {
        $error = "Couldn't update item $iName, please try again";
    } else {
        $msg = "Updated $iName successfully";
    }
}
//for loading the data to the form
if (isset($_POST['iId'])) {
    $iId = sanitizeString($_POST['iId']);
    //Load the current data to that batch
    $query = "SELECT iName, iDescription, iPrice, iStatus, iSize FROM Item WHERE iId = '$iId'";
    $result = queryMysql($query);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $iName = $row[0];
        $iDescription = $row[1];
        $iPrice = $row[2];
        $iStatus = $row[3];
        $iAmount = $row[4];
    }
}
?>
<br><br>
<form action="updateitem.php" method="POST">
    <fieldset>
        <legend>Update Item</legend>
        <div class="error"><?php echo $error; ?></div>
        <input type="hidden" value="<?php echo $iId; ?>" name="iId"/>
        Name: </br>
        <input type="text" id="iName" name="iName" required value="<?php echo $iName; ?>"/><br>
        Description: </br>
        <input type="text" id="iDescription" name="iDescription" required value="<?php echo $iDescription; ?>"/><br>
        Price: </br>
        <input type="text"  name="iPrice" required value="<?php echo $iPrice; ?>"/><br>
        Status: </br>
        <input type="text"  name="iStatus" required value="<?php echo $iStatus; ?>"/><br>
        Amount: </br>
        <input type="text"  name="iSize" required value="<?php echo $iSize; ?>"/><br><br>
        <input type="submit" value="Update"/>
        <div><?php echo $msg; ?></div>
    </fieldset>
</form>
</body>
</html>
