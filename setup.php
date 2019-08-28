<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        
        <title></title>
    </head>
    <body>
        <h1>Setting up...</h1>
        <?php
        require_once './functions.php';
        
        
        //setup table User        
        createTable("User", "uId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(50),
                    password VARCHAR(50),
                    status CHAR(1),
                    INDEX(username(10))");
        echo "<br>";
        //setup table Catalogue
        createTable("Catalogue", "cId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                cName VARCHAR(50),
                cDescription VARCHAR(200),
                lastModifiedBy INT UNSIGNED,
                FOREIGN KEY (lastModifiedBy) REFERENCES User(uId),
                INDEX (cName(7))");
        echo "<br>";
        createTable("Item", "iId VARCHAR(10) PRIMARY KEY,"
                . "iName VARCHAR(50),"
                . "iDescription VARCHAR(300),"
                . "iPrice INT UNSIGNED,"
                . "iStatus VARCHAR(20),"             
                . "iAmount VARCHAR(20),"
                . "iImage VARCHAR(300),"
                . "catalogueId INT UNSIGNED,"
                . "FOREIGN KEY (catalogueId) REFERENCES Catalogue(cId),"
                . "INDEX(iName(10)),"
                . "INDEX(catalogueId)");
        echo "<br>";
        //Setting up one default user
        $username = "tamotoji";
        $password = "tamotoji";
        $status = '1';
        if (addUser($username, $password, $status)) {
            echo "Added user $username, please change the password";
        } else {
            echo "User already exists";
        }
        $username = "phamduclong";
        $password = "phamduclong";
        $status = '1';
        if (addUser($username, $password, $status)) {
            echo "Added user $username, please change the password";
        } else {
            echo "User already exists";
        }
        ?>
        <h1>...done!</h1>       
    </body>
</html>