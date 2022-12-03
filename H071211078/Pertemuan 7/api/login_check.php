<?php
include 'db_conn.php';
if (isset($_POST['btnLogin'])) {
    $username         = $_POST['username'];
    $password         = $_POST['password'];

    $sql5          = "SELECT * FROM users WHERE username = '$username'";
    $q5            = mysqli_query($conn, $sql5);
    $r5            = mysqli_fetch_array($q5);

    if (mysqli_num_rows($q5) == 1) {
        if (password_verify($password, $r5['password'])) {
            session_start();
            $_SESSION['email'] = $r5['email'];
            header('location:index.php');
        } else {
            header('location:login.php?msg=Wrong Password');
        }
    } else {
        header('location:login.php?msg=Wrong Username');
    }
}