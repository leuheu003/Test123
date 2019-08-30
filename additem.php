<?php
require_once 'header.php';

//getting the data

if (isset($_POST['iid'],$_POST['iname'],$_POST['idescription'],$_POST['iprice'],$_POST['istatus'],$_POST['isize'],  $_POST['cid'])) { //adding
    $iId = $_POST['iid'];
    $iImage = "";
    $extension = "";
    //Process the uploaded image
    if (isset($_FILES['iimage']) && $_FILES['iimage']['size'] != 0) {
        $temp_name = $_FILES['iimage']['tmp_name'];
        $name = $_FILES['iimage']['name'];
        $parts = explode(".", $name);
        $lastIndex = count($parts) - 1;
        $extension = $parts[$lastIndex];
        $iImage = "$iId.$extension";
        $destination = "./images/$iImage";
        //Move the file from temp loc => to our image folder
        move_uploaded_file($temp_name, $destination);
    }
   
    $sql = "INSERT INTO item(iid,iname,idescription,iprice,istatus,isize,iimage,cid) values (:iid , :iname, :idescription, :iprice, :istatus, :isize, :iimage, :cid)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':cid', $_POST['cid'], PDO::PARAM_STR);
    $stmt->bindValue(':iid', $_POST['iid'], PDO::PARAM_STR);
    $stmt->bindValue(':iname', $_POST['iname'], PDO::PARAM_STR);
    $stmt->bindValue(':idescription', $_POST['idescription'], PDO::PARAM_STR);
    $stmt->bindValue(':iprice', $_POST['iprice'], PDO::PARAM_STR);
    $stmt->bindValue(':istatus', $_POST['istatus'], PDO::PARAM_STR);
    $stmt->bindValue(':isize', $_POST['isize'], PDO::PARAM_STR);
    $stmt->bindValue(':iimage', $iImage, PDO::PARAM_STR);
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
<form action="additem.php" method="post" enctype="multipart/form-data">
    <fieldset>
       
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

