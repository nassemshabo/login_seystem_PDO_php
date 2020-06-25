<?php

try {
    $servername = "mysql:host=localhost;dbname=login_app";
    $db_uid = "nassem";
    $db_pass = "nassem1999";
    $conn = new PDO($servername,$db_uid,$db_pass);

}catch (PDOException $e ){
    echo "error ".$e->getMessage();
}