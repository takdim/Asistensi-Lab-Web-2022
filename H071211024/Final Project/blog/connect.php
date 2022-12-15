<?php
ob_start();
session_start();

$dbhost 	= "localhost:3308";
$dbuser 	= "root";
$dbpass 	= "";
$dbname 	= "ublog";

$dbcon = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$dbcon) {
    die("Connection failed" . mysqli_connect_error());
}
mysqli_select_db($dbcon,$dbname);
