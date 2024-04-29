<?php
   error_reporting(0);
$db_host = "localhost"; 
$db_username = "root"; 
$db_password = ""; 
$db_name = "psits"; 
header('Content-Type: text/html');
header('Content-Type: application/json');


$conn = mysqli_connect($db_host, $db_username , $db_password, $db_name);

date_default_timezone_set('Asia/Manila');

?>
