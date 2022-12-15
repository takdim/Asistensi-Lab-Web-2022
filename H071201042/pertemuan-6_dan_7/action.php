<?php
session_start();
include 'koneksi.php'; 
include 'fungsi.php';
$user_data = check_login($koneksi);
$username = $user_data['user_name'];
$nim        = "";
$nama       = "";
$alamat     = "";
$fakultas   = "";
$sukses     = "";
$error      = "";



if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id         = $_GET['id'];
    $sql1       = "delete from mahasiswa where id = '$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}

if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from mahasiswa where id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $nim        = $r1['nim'];
    $nama       = $r1['nama'];
    $alamat     = $r1['alamat'];
    $fakultas   = $r1['fakultas'];

    if ($nim == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $nim        = $_POST['nim'];
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $fakultas   = $_POST['fakultas'];

    if ($nim && $nama && $alamat && $fakultas) {
        if ($op == 'edit') { //untuk update


            $result = mysqli_query($koneksi ,"SELECT * FROM mahasiswa WHERE nim='$nim' AND nama='$nama' AND alamat='$alamat' AND fakultas='$fakultas'");
            $num_rows = mysqli_num_rows($result);
            if ($num_rows) {
                # code...
                $error = "Data duplikat, silahkan mengisi data dengan benar".$num_rows;

            }else if($q1) {
                $sql1 = "update mahasiswa set nim = '$nim',nama='$nama',alamat = '$alamat',fakultas='$fakultas' where id = '$id'";
                $q1 = mysqli_query($koneksi, $sql1);
                $sukses = "Data berhasil diupdate".$num_rows;
            } else {
                $error  = "Data gagal diupdate";
            }

        } else { //untuk insert
            $result = mysqli_query($koneksi ,"SELECT * FROM mahasiswa WHERE nim='$nim'");
            $num_rows = mysqli_num_rows($result);
            if ($num_rows) {
                # code...
                $error = "data duplicate";
            } else {
                # code...
                $sql1   = "insert into mahasiswa(nim,nama,alamat,fakultas) values ('$nim','$nama','$alamat','$fakultas')";
                $q1     = mysqli_query($koneksi, $sql1);
                if ($q1) {
                    $sukses     = "Berhasil memasukkan data baru";
                } else {
                    $error      = "Gagal memasukkan data";
                }
            }
            

        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>