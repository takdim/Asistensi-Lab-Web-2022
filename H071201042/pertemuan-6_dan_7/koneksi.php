<?php

$host       = "localhost:3306";
$user       = "root";
$pass       = "";
$db         = "akademik";




$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Tidak bisa terkoneksi ke database");
}


?>