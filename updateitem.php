<?php
require_once './header.php';
//Check to make sure that user is logged in first

$error = $msg = "";
if (isset($_POST['iname'])) { //updating
    $iId = sanitizeString($_POST['iid']);
    $iName = sanitizeString($_POST['iname']);
    $iDescription = sanitizeString($_POST['idescription']);
    $iPrice = sanitizeString($_POST['iprice']);
    $iStatus = sanitizeString($_POST['istatus']);
    $iSize = sanitizeString($_POST['isize']);
    $cId = sanitizeString($_POST['cid']);
    $uId = $_SESSION['uid'];
    $query = "UPDATE Item SET iname = '$iName', idescription = '$iDescription', iprice = '$iPrice', istatus = '$iStatus', isize = '$iSize' WHERE iid = '$iId'";
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
    $query = "SELECT iname, idescription, iprice, istatus, isize FROM Item WHERE iid = '$iId'";
    $result = queryMysql($query);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $iName = $row['iname'];
        $iDescription = $row['idescription'];
        $iPrice = $row['iprice'];
        $iStatus = $row['istatus'];
        $iSize = $row['isize'];
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
        <input type="text" id="iName" name="iname" required value="<?php echo $iName; ?>"/><br>
        Description: </br>
        <input type="text" id="iDescription" name="idescription" required value="<?php echo $iDescription; ?>"/><br>
        Price: </br>
        <input type="text"  name="iprice" required value="<?php echo $iPrice; ?>"/><br>
        Status: </br>
        <input type="text"  name="istatus" required value="<?php echo $iStatus; ?>"/><br>
        Amount: </br>
        <input type="text"  name="isize" required value="<?php echo $iSize; ?>"/><br><br>
        <input type="submit" value="Update"/>
        <div><?php echo $msg; ?></div>
    </fieldset>
</form>
</body>
</html>
