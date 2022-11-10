<?php
include 'koneksi.php';

if (isset($_POST['btnLogin'])) {
  $username         = $_POST['username'];
  $password         = $_POST['password'];

  $sql5          = "select * from tb_login where username = '$username'";
  $q5            = mysqli_query($koneksi, $sql5);
  $r5            = mysqli_fetch_array($q5);

  if (mysqli_num_rows($q5) >= 1) {
    if (password_verify($password, $r5['password'])) {
      // Login Valid
      session_start();
      $_SESSION['username'] = $r5 ['username'];
      $_SESSION['password'] = $r5 ['password'];
      header('location:index.php');
    } else {
      // Password Salah
      header('location:login.php?pesan=Password Salah');
    }
  } else {
    // Username Salah
    header('location:login.php?pesan=Username Salah');
  }
}

?>