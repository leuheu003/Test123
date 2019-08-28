<?php
//if (empty(getenv("DATABASE_URL"))){
     // $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=ATNtest', 'postgres', 'thanhmon1999');
 // } 
  //else {
    $db = parse_url(getenv("DATABASE_URL"));
    $pdo = new PDO("pgsql:" . sprintf(
        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
    ));

 // }
  

//this is used to execute all SQL queries
function queryMysql($query) {
    global $pdo;
    $result = $pdo->query($query);
    if (!$result) {
        die ($pdo->error);
    }
    return $result;
}


function sanitizeString($str) {
    global $pdo;
    $str = strip_tags($str); //remove html tags
    $str = htmlentities($str); //encode html (for special characters)
    if (get_magic_quotes_gpc()){
        $str = stripslashes($str); //Don't use the magic quotes
    }
    //Avoid MYSQL Injection
    $str = $pdo->real_escape_string($str);
    return $str;
}

