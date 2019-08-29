<?php
require_once './header.php';

$query = "SELECT cid, cname, cdescription from catalogue";
$result = queryMysql($query);
$result = queryMysql($query);
$result->setFetchMode(PDO::FETCH_ASSOC);
$result->execute();
$resultSet = $result->fetchAll();
?>
<br><br>
<br>
<table class="tbl">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Options</th>
    </tr>
    <?php
    foreach ($resultSet as $row){
        $cName = $row['cname'];
        $cDescription = $row['cdescription'];
        echo "<tr>";
        echo "<td>$cName</td>";
        echo "<td>$cDescription</td>";
        ?>
        <td>
            <form class="frminline" action="deletecatalogue.php" method="post" onsubmit="return confirmDelete();">
                <input type="hidden" name="cid" value="<?php echo $row['cid'] ?>" />
                <input type="submit" value="Delete" />
            </form>
            <form class="frminline" action="updatecatalogue.php" method="post">
                <input type="hidden" name="cid" value="<?php echo $row['cid'] ?>" />
                <input type="submit" value="Update" />
            </form>
        </td>
        <?php
        echo "</tr>";
    }
    ?>
    <script>
        function confirmDelete() {
            var r = confirm("Are you sure you would like to delete ?");
            if (r) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</table>
</body>
</html>

