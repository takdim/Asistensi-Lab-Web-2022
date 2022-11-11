<?php

include 'connection.php';

if(isset($_POST['edit']) && isset($_GET['nim'])){
    $nimDulu = $_GET['nim'];
    $nim = $_POST['NIM'];
    $nama = $_POST['Nama'];
    $alamat = $_POST['Alamat'];
    $fakultas = $_POST['Fakultas'];

    if($nimDulu == $nim){
        $sql = "update `data` set NIM = '$nim', Nama = '$nama', Alamat = '$alamat', Fakultas = '$fakultas' where NIM = '$nimDulu'";
        if($conn->query($sql)){
            header('location: index.php?editSuccess&halaman=1');
        } else {
            header('location: index.php?failed&halaman=1');
        };
    } else {
        $checkNIM = mysqli_query($conn, "select NIM from `data` where NIM = '$nim'");
        $rowCheckNIM = mysqli_fetch_array($checkNIM);

        if(!isset($rowCheckNIM)){
            $sql = "update `data` set NIM = '$nim', Nama = '$nama', Alamat = '$alamat', Fakultas = '$fakultas' where NIM = '$nimDulu'";
            if($conn->query($sql)){
                header('location: index.php?editSuccess&halaman=1');
            } else {
                header('location: index.php?failed&halaman=1');
            };
        } else {
            header('location: index.php?exist&halaman=1');
        }
    }

} else {
    header('location: index.php?keluar&halaman=1');
}