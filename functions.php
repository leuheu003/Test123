<?php
if (empty(getenv("DATABASE_URL"))){
      $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=ATN', 'postgres', 'phamduclong99');
  } 
 else {
    $db = parse_url(getenv("DATABASE_URL"));
    $pdo = new PDO("pgsql:" . sprintf(
        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
    ));

  }
  

//this is used to execute all SQL queries
function queryMysql($query) {
    global $pdo;
    $result = $pdo->query($query);
    if (!$result) {
        die ($pdo->error);
    }
    return $result;
}


