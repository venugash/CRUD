<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'id13588939_venu');
define('DB_PASSWORD', '6o#nF$7vI6m}ii~F');
define('DB_NAME', 'id13588939_book');
 

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>