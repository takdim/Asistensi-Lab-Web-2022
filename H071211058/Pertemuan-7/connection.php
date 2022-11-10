<?php

$dbhost = "localhost:3309";
$dbuser = "root";
$dbpass = "";
$dbname = "akademik";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
?>