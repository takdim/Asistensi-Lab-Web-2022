<?php

include 'connection.php';

if($_GET['nim']){
    $nim = $_GET['nim'];
    $deleteData = mysqli_query($conn, "delete from `data` where NIM = '$nim'");
    header('location: index.php?deleteSuccess&halaman=1');
}