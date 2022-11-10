<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prtk_6";
$port = 3307;

$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

if(!$conn){
    die("Connection Failed". mysqli_connect_error());
}
echo "Connection Successful";