 <?php
require_once 'header.php';
//Check to make sure that user is logged in first
if (isset($_POST['cname'], $_POST['cdescription'])) { //updating
    $cId = $_POST['cid'];
    
        $sql = "UPDATE catalogue SET cname = :cname, cdescription = :cdescription WHERE cId = '$cId'";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':cname', $_POST['cname'], PDO::PARAM_STR);
        $stmt->bindValue(':cdescription', $_POST['cdescription'], PDO::PARAM_STR);
        $pdoExec = $stmt->execute();
        if($pdoExec)
    {
        echo 'Data Updated';
    }else{
        echo 'Data Not Updated';
    }
    }
//for loading the data to the form
if (isset($_POST['cid'])) {
    $cId = $_POST['cid'];
    //Load the current data to that batch
    $query = "SELECT cname, cdescription FROM Catalogue WHERE cid = '$cId'";
    $result = queryMysql($query);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $cName = $row['cname'];
        $cDescription = $row['cdescription'];
    }
}
?>
<br><br>
<form action="updatecatalogue.php" method="post">
    <fieldset>
        <legend>Update Catalogue</legend>
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
