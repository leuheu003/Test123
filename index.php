<!DOCTYPE html>
<html>
    <head>
        <title>ATN Toy Store</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
        <style>
            .container{
                width: 100%;
                margin: 0 auto;
            }
            .container img{
                width: 100%;

            }
            .footer{
                width: 100%;
                height: 100px;
                background-color: greenyellow;
            }
            .main{
                width: 100%;
                overflow: hidden;
                background-color: white;
                background-image: url(./images/ToyBackground.jpg);
                
            }

            .image img{
                width: 100%;
            }
            .detail{
                width: 100%;
                float: right;
                text-align: center;
            }
            .title{
                background-color: white;
                font-size: 25px;
                line-height: 30px;
                padding-left: 5px;
                font-weight: bold;
                color: red;
            }
            .detail{
                padding-left: 15px;
                box-sizing: border-box;
            }
            .des{
                color: cyan;
                font-size: 18px;
                padding-left: 10px;
                padding-top: 10px;
                font-weight: normal;
            }

            .list{
                width: 100%;
                padding-top: 10px;
            }
            .item{
                width: 25%;
                float: left;
                padding: 5px;
                box-sizing: border-box;
            }
            .iimage img{
                width: 100%;
                height : 50%;
            }
           

            .nav{
                width: 100%;
                height: 50px;
                background-color: greenyellow;
            }
            .nav ul{
                margin: 0;
                padding: 0;
                list-style: none;
            }
            .nav a{
                color:purple;
                font-size: 30px;
                text-decoration: none;
                line-height: 50px;
                padding: 0 15px;
                display: block;
            }
            .nav li{
                float: left;
            }
            .nav a:hover{
                color: black;
            }
            .nav li:hover{
                background-color:red;
            }
        </style>
    </head>
    <body>
        <?php
require_once './functions.php';
//load items
$query = "SELECT iid, iname, idescription, iprice, istatus, isize, iimage FROM Item ";
$result = queryMysql($query);

?>

        <div class="container">
            <center><img src="images/ToyStore.PNG"></center>
            <div class="header">
                
                <div class="nav">
                    <ul>
                        <center>
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="#Lego">Lego</a></li>
                        <li><a href="#Figure">Figure</a></li>
                        <li><a href="#Clay">Clay</a></li>
                        <li style="float: right;"><a href="./header.php">Manage</a></li>
                    </ul>

                </div>
            </div>
            <div class="main">
                <div class="hot">

                    <div class="detail">
                        <div class="title">
                            <i>ATN Toy Store</i>
                        </div>
                        <div class="des">
                             Find your favorite toy!!!
                        </div>
                    </div>
                </div>
                <div class="seperator">

                </div>
                <div class="list w3-row">
                    <div class="" id="Lego"><h2>Lego</h2>  
                    <?php
     require_once './functions.php';
     $query = "SELECT iid, iname, idescription, iprice, istatus, isize, iimage,cname FROM Item,Catalogue WHERE Item.cid=Catalogue.cid AND cName LIKE '%Lego%'  ORDER BY cname";
     $result = queryMysql($query);
     $result->setFetchMode(PDO::FETCH_ASSOC);
     $result->execute();
     $resultSet = $result->fetchAll();
     
     foreach ($resultSet as $row) {
        $iId = $row['iid'];
        $iName = $row['iname'];
        $iDescription = $row['idescription'];
        $iPrice = $row['iprice'];
        $iStatus = $row['istatus'];
        $iSize = $row['isize'];
        $iImage = $row['iimage'];
        
        echo "<div class='sp w3-quarter w3-card w3-center ' ><div class='w3-green w3-padding-large'>$iStatus</div><div ><img onclick=\"document.getElementById('$iName').style.display='block'\" id='testimg' src='./images/". $iImage . "' width='100%'></div><div class='name'><h3>$iName</h3></div><h3>$iPrice$</h3></div>"
                . "<!--SHOW MORE INFORMATION-->
  <div id='$iName' class='w3-modal'>
      <div class='w3-modal-content w3-animate-top w3-card-4'>
        <div class='w3-container w3-green w3-center w3-padding-20'> 
          <span onclick=\"document.getElementById('$iName').style.display='none';\"
         class='w3-button w3-red w3-xlarge w3-display-topright'>×</span>
          <h2>$iName</h2>
        </div>
        <div class='w3-container w3-row'>
          <div class='w3-half'>
              <img src='./images/". $iImage . "' width='100%'>
          </div>
          <div class='w3-half w3-left'>
              <button><h3>Price: $iPrice$</h3></button>
              <p>Description: $iDescription.</p>
              <h4>Size: $iSize</h4>                           
          </div>                                                    
        </div>
        <button class='w3-button w3-green w3-section' onclick=\"document.getElementById('$iName').style.display='none';\">Close <i class='fa fa-remove'></i></button>
      </div>
    </div>";                                                                                       
    }
?>
     
                </div>        
                    <div class="list w3-row">
                    <div class=""id="Figure"><h2>Figure</h2>
                    <?php
     require_once './functions.php';
    $query = "SELECT iid, iname, idescription, iprice, istatus, isize, iimage,cname FROM Item,Catalogue WHERE Item.cid=Catalogue.cid AND cName LIKE '%Figure%'  ORDER BY cname";
     $result = queryMysql($query);
     $result->setFetchMode(PDO::FETCH_ASSOC);
     $result->execute();
     $resultSet = $result->fetchAll();
     
     foreach ($resultSet as $row) {
        $iId = $row['iid'];
        $iName = $row['iname'];
        $iDescription = $row['idescription'];
        $iPrice = $row['iprice'];
        $iStatus = $row['istatus'];
        $iSize = $row['isize'];
        $iImage = $row['iimage'];
        
        echo "<div class='sp w3-quarter w3-card w3-center ' ><div class='w3-orange w3-padding-large'>$iStatus</div><div ><img onclick=\"document.getElementById('$iName').style.display='block'\" id='testimg' src='./images/". $iImage . "' width='100%'></div><div class='name'><h3>$iName</h3></div><h3>$iPrice$</h3></div>"
                . "<!--SHOW MORE INFORMATION-->
  <div id='$iName' class='w3-modal'>
      <div class='w3-modal-content w3-animate-top w3-card-4'>
        <div class='w3-container w3-pink w3-center w3-padding-20'> 
          <span onclick=\"document.getElementById('$iName').style.display='none';\"
         class='w3-button w3-red w3-xlarge w3-display-topright'>×</span>
          <h2>$iName</h2>
        </div>
        <div class='w3-container w3-row'>
          <div class='w3-half'>
              <img src='./images/". $iImage . "' width='100%'>
          </div>
          <div class='w3-half w3-left'>
              <button><h3>Price: $iPrice$</h3></button>
              <p>Description: $iDescription.</p>
              <h4>Size: $iSize</h4>                           
          </div>                                                    
        </div>
        <button class='w3-button w3-pink w3-section' onclick=\"document.getElementById('$iName').style.display='none';\">Close <i class='fa fa-remove'></i></button>
      </div>
    </div>";                                                                                       
    }
?>
     
                </div>       
                    <div class="list w3-row">
                    <div class=""id="Clay"><h2>Clay</h2>
                    <?php
     require_once './functions.php';
    $query = "SELECT iid, iname, idescription, iprice, istatus, isize, iimage,cname FROM Item,Catalogue WHERE Item.cid=Catalogue.cid AND cName LIKE '%Clay%'  ORDER BY cname";
     $result = queryMysql($query);
     $result->setFetchMode(PDO::FETCH_ASSOC);
     $result->execute();
     $resultSet = $result->fetchAll();
     
     foreach ($resultSet as $row) {
        $iId = $row['iid'];
        $iName = $row['iname'];
        $iDescription = $row['idescription'];
        $iPrice = $row['iprice'];
        $iStatus = $row['istatus'];
        $iSize = $row['isize'];
        $iImage = $row['iimage'];
        
        echo "<div class='sp w3-quarter w3-card w3-center ' ><div class='w3-purple w3-padding-large'>$iStatus</div><div ><img onclick=\"document.getElementById('$iName').style.display='block'\" id='testimg' src='./images/". $iImage . "' width='100%'></div><div class='name'><h3>$iName</h3></div><h3>$iPrice$</h3></div>"
                . "<!--SHOW MORE INFORMATION-->
  <div id='$iName' class='w3-modal'>
      <div class='w3-modal-content w3-animate-top w3-card-4'>
        <div class='w3-container w3-purple w3-center w3-padding-20'> 
          <span onclick=\"document.getElementById('$iName').style.display='none';\"
         class='w3-button w3-red w3-xlarge w3-display-topright'>×</span>
          <h2>$iName</h2>
        </div>
        <div class='w3-container w3-row'>
          <div class='w3-half'>
              <img src='./images/". $iImage . "' width='100%'>
          </div>
          <div class='w3-half w3-left'>
              <button><h3>Price: $iPrice$</h3></button>
              <p>Descripton: $iDescription.</p>
              <h4>Size: $iSize</h4>                           
          </div>                                                    
        </div>
        <button class='w3-button w3-purple w3-section' onclick=\"document.getElementById('$iName').style.display='none';\">Close <i class='fa fa-remove'></i></button>
      </div>
    </div>";                                                                                       
    }
?>
     
                </div>

                        
            </div>
           <footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-opacity w3-xlarge" style="padding:5px; margin-top: auto">
            <a href="#" class="w3-button w3-black w3-padding-large w3-margin-bottom" style="font-size: 16px;"><i class="fa fa-arrow-up w3-margin-right" style='font-size:25px'></i>To the top</a>
            <p class="w3-medium">Powered by Long</p>
        </footer>  
        </div>
    </body>
</html>

