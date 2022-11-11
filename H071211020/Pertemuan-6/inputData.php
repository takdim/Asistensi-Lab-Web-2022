<?php

include "connection.php";

if (isset($_POST['submit'])){
    $halaman = $_GET['halaman'];
    $nim = $_POST['NIM'];
    $nama = $_POST['Nama'];
    $alamat = $_POST['Alamat'];
    $fakultas = $_POST['Fakultas'];

    $checkNIM = mysqli_query($conn, "select NIM from data where NIM = '$nim'");
    $row = mysqli_fetch_array($checkNIM);

    if(!isset($row['NIM'])){
        $sql = "INSERT INTO `data` VALUES ('$nim', '$nama', '$alamat', '$fakultas')";
        if($conn->query($sql)){
            header("location: index.php?halaman=$halaman&success");
        } else {
            header('location: index.php?failed&halaman=1');
        };
    } else {
        header('location: index.php?exist&halaman=1');
    }
    } else {
    header('location: index.php?keluar&halaman=1');
    }