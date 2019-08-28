<?php
require_once './header.php';
if (isset($_POST['cname'])) {
    $cName = sanitizeString($_POST['cname']);
    $cDescription = sanitizeString($_POST['cdescription']);
    $error = $message = "";
    
        
        $query = "INSERT INTO Catalogue(cname, cdescription, lastModifiedBy)"
                . "values('$cName' , '$cDescription')";
        $result = queryMysql($query);
        if (!$result) {
            $error = "Adding error, please try again";
        } else {
            $message = "Added successfully";
        }    
}
?>
<br>
<form action = "addcatalogue.php" method = "post">
    <fieldset class = "fitContent">
        <legend>Add Catalogue</legend>
        <span class="error"><?php echo $error; ?></span><br>
        Name<br>
        <input type="text" name="cname"   required /><br>
        Description<br>
        <textarea name="cdescription" ></textarea>
        <br><br>
        <input type="submit" value="Add" /><br>
        <span><?php echo $message; ?></span><br>
    </fieldset>
    
</form>
</body>
</html>

