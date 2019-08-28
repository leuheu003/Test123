<?php
require_once 'header.php';

//getting the data
$error = $msg = "";
if (isset($_POST['add'])) { //adding
    $iId = sanitizeString($_POST['iid']);
    $iName = sanitizeString($_POST['iname']);
    $iDescription = sanitizeString($_POST['idescription']);
    $iPrice = sanitizeString($_POST['iprice']);
    $iStatus = sanitizeString($_POST['istatus']);
    $iSize = sanitizeString($_POST['isize']);    
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
    $cId = sanitizeString($_POST['cid']);
    //TODO: Do the PHP validation here to protect your server
    //Add the student
    $query = "INSERT INTO Item values ('$iId','$iName','$iDescription','$iPrice','$iStatus','$iSize','$iImage','$cId')";
    $result = queryMySql($query);
    if (!$result) {
        $error = $error . "<br>Can't add Item, please try again";
    } else {
        $msg = "Added $iName successfully!";
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
            $batches = queryMysql($query);
            while ($batch = mysqli_fetch_array($batches)) {
                $cId = $batch['cid'];
                $cName = $batch['cname'];
                echo "<option value='$cId'>$cName</option>";
            }
            ?>
        </select><br><br>
        <input type="submit" value="Add" name="add"/>
    </fieldset>
</form>
</body>
</html>

