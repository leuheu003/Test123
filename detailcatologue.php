
<?php
                        while ($rowg = mysqli_fetch_array($resultg)) {
                        $gName = $rowg[1];                                           
                        echo "<div class='w3-button'><a href='./i$gName.php'>$gName</a></div>";                                           
                        }
                    ?>

<?php
     require_once './functions.php';
     $query = "SELECT iId, iName, iDescription, iPrice, iStatus, iSize, iImage,cName FROM Item,Catalogue WHERE Item.catalogueId=Catalogue.cId AND cName LIKE '%COFFEE%' ORDER BY cName";
     $result = queryMysql($query);
     $error = $msg = "";
     if (!$result){
      $error = "Couldn't load data, please try again.";
     }
     while ($row = mysqli_fetch_array($result)) {
        $iId = $row[0];
        $iName = $row[1];
        $iDescription = $row[2];
        $iPrice = $row[3];
        $iStatus = $row[4];
        $iSize = $row[5];
        $iImage = $row[6];
        
        echo "<script>
      function cdetail$iName(){
          document.getElementById('$iName').style.display='none';
      }
      function detail$iName(){
          document.getElementById('$iName').style.display='block';
      }
  </script>"
        . "<div class='sp w3-quarter w3-card w3-center ' ><div class='w3-orange w3-padding-large'>$iStatus</div><div ><img onclick='detail$iName()' id='testimg' src='./images/item/". $iImage . "' width='100%'></div><div class='name'><h3>$iName</h3></div><h3>$iPrice</h3></div>"
                . "<!--SHOW MORE INFORMATION-->
  <div id='$iName' class='w3-modal'>
      <div class='w3-modal-content w3-animate-top w3-card-4'>
        <div class='w3-container w3-orange w3-center w3-padding-20'> 
          <span onclick='cdetail$iName()'
         class='w3-button w3-red w3-xlarge w3-display-topright'>×</span>
          <h2>$iName</h2>
        </div>
        <div class='w3-container w3-row'>
          <div class='w3-half'>
              <img src='./images/item/". $iImage . "' width='100%'>
          </div>
          <div class='w3-half w3-left'>
              <h3>$iPrice</h3>
              <p>$iDescription.</p>
              <h4>$iSize</h4>                           
          </div>                                                    
        </div>
        <button class='w3-button w3-red w3-section' onclick='cdetail$iName()'>Close <i class='fa fa-remove'></i></button>
      </div>
    </div>";                                                                                       
    }
?>  

