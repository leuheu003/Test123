<?php
require_once 'header.php';

//getting the data
$error = $msg = "";
if (isset($_POST['iid'],$_POST['iname'],$_POST['idescription'],$_POST['iprice'],$_POST['istatus'],$_POST['isize'])) { //adding
    $iId = $_POST['iid'];
    $sImage = "";
    $extension = "";
    //Process the uploaded image
    if (isset($_FILES['iimage']) && $_FILES['iimage']['size'] != 0) {
        $temp_name = $_FILES['iimage']['tmp_name'];
        $name = $_FILES['iimage']['name'];
        $parts = explode(".", $name);
        $lastIndex = count($parts) - 1;
        $extension = $parts[$lastIndex];
        $iImage = "$iId.$extension";
        $destination = "./images/item/$iImage";
        //Move the file from temp loc => to our image folder
        move_uploaded_file($temp_name, $destination);
    }
   
    $sql = "INSERT INTO catalogue(iid,iname,idescription,iprice,istatus,isize,iimage) values(:cid , :cname, :cdescription, :iprice, :istatus, :isize, :iimage)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':cid', $_POST['cid'], PDO::PARAM_STR);
    $stmt->bindValue(':cname', $_POST['cname'], PDO::PARAM_STR);
    $stmt->bindValue(':cdescription', $_POST['cdescription'], PDO::PARAM_STR);
    $stmt->bindValue(':price', $_POST['cprice'], PDO::PARAM_STR);
    $stmt->bindValue(':status', $_POST['cstatus'], PDO::PARAM_STR);
    $stmt->bindValue(':size', $_POST['csize'], PDO::PARAM_STR);
    $stmt->bindValue(':image',$sImage, PDO::PARAM_STR);
    $pdoExec = $stmt->execute();
    
        // check if mysql insert query successful
    if($pdoExec)
    {
        echo 'Data Inserted';
    }else{
        echo 'Data Not Inserted';
    }
}
?>
<br><br>
<form action="additem.php" method="POST" enctype="multipart/form-data">
    <fieldset>
        <div class="error"><?php echo $error; ?></div>
        <div class="msg"><?php echo $msg; ?></div>
        <legend>Add Item</legend>
        
        ID: <br>
        <input type="text" name="iid" size="15" maxlength="15" placeholder="(any thing)"
               required /><br>
        Name: <br>
        <input type="text" name="iname" maxlength="100" required/><br>
        Description:<br>
        <textarea maxlength="500" name="idescription"></textarea><br>
        Price:<br>
        <input type="number" name="iprice" maxlength="20"/><br>
        Status:<br>
        <input type="text" name="istatus" maxlength="30"/><br>
        Size:<br>
        <input type="text" name="isize" maxlength="15"/><br>     
        Image:<br>
        <input type="file" name="iimage"/><br>
        Catalogue:<br>
        <select name="cid">
            <?php
            $query = "SELECT cid, cname FROM catalogue";
            $result = queryMysql($query);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            $resultSet = $result->fetchAll();
           foreach ($resultSet as $row) {
                $cId = $row['cid'];
                $cName = $row['cname'];
                echo "<option value='$cId'>$cName</option>";
            }
            ?>
        </select><br><br>
        <input type="submit" value="Add" name="add"/>
    </fieldset>
</form>
</body>
</html>

