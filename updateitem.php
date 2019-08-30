<?php
require_once './header.php';
//Check to make sure that user is logged in first

$error = $msg = "";
if (isset($_POST['iname'],$_POST['idescription'],$_POST['iprice'],$_POST['istatus'],$_POST['isize'])) { //updating
    $iId = $_POST['iid'];
    $sql = "UPDATE Item SET iname = :iname, idescription = :idescription, iprice = :iprice, istatus = :istatus, isize = :isize WHERE iid = '$iId'";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':iname', $_POST['iname'], PDO::PARAM_STR);
    $stmt->bindValue(':idescription', $_POST['idescription'], PDO::PARAM_STR);
    $stmt->bindValue(':iprice', $_POST['iprice'], PDO::PARAM_STR);
    $stmt->bindValue(':istatus', $_POST['istatus'], PDO::PARAM_STR);
    $stmt->bindValue(':isize', $_POST['isize'], PDO::PARAM_STR);
    $pdoExec = $stmt->execute();
    
        // check if mysql insert query successful
    if($pdoExec)
    {
        echo 'Data Inserted';
    }else{
        echo 'Data Not Inserted';
    }
    
}
//for loading the data to the form
if (isset($_POST['iid'])) {
    $iId = $_POST['iid'];
    //Load the current data to that batch
    $query = "SELECT iname, idescription, iprice, istatus, isize FROM item WHERE iid = '$iId'";
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
        <input type="hidden" value="<?php echo $iId; ?>" name="iid"/>
        Name: </br>
        <input type="text" id="iName" name="iname" required value="<?php echo $iName; ?>"/><br>
        Description: </br>
        <input type="text" id="iDescription" name="idescription" required value="<?php echo $iDescription; ?>"/><br>
        Price: </br>
        <input type="text"  name="iprice" required value="<?php echo $iPrice; ?>"/><br>
        Status: </br>
        <input type="text"  name="istatus" required value="<?php echo $iStatus; ?>"/><br>
        Size: </br>
        <input type="text"  name="isize" required value="<?php echo $iSize; ?>"/><br><br>
        <input type="submit" value="Update"/>
    </fieldset>
</form>
</body>
</html>
