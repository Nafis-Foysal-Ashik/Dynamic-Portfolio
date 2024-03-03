<?php 
$db_host = "localhost:4308";
$db_name = "portfolio";
$db_pass = "";
$db_user = "root";

$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(!$connection){
    die("Connection failed: " . mysqli_connect_error());
}

?>