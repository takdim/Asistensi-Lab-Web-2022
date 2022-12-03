<?php
include "db_conn.php";
if (isset($_POST['btnDaftar'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];

    if ($username && $password && $email) {
        $sql6 = "SELECT * FROM users WHERE email = '$email'";
        $q6 = mysqli_query($conn,$sql6);
        $check1 = mysqli_num_rows($q6);
        if ($check1 == 0) {
            $sql4 = "INSERT INTO users (username,password,email)
            VALUES('$username','$password','$email')";

            $q4 = mysqli_query($conn, $sql4);

            if ($q4) {
                echo "<script>
            alert('Akun Berhasil didaftar');
            window.location.href='login.php';
          </script>";
            } else {
                echo "Failed Registering Account";
            }
        }else {
            echo "Email '$email' is already registered, use another one";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sign Up</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center bg-dark text-light">
                        Register/Sign Up Page
                    </div>
                    <form action="" method="post">
                        <div class="card-body">
                            <label for="username" class="form-label">Username</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg>
                                </span>
                                <input type="text" class="form-control" id="username" name="username" required placeholder="Insert Username" aria-describedby="basic-addon3">
                            </div>
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                                    </svg>
                                </span>
                                <input type="password" class="form-control" id="password" name="password" required placeholder="Insert Password" aria-describedby="basic-addon3">
                            </div>
                            <label for="username" class="form-label">E-Mail</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg>
                                </span>
                                <input type="text" class="form-control" id="email" name="email" required placeholder="Insert Email" aria-describedby="basic-addon3">
                            </div>
                            <div class="row mb-3">
                                <div class="col-2">
                                    <button type="submit" class="btn btn-success" name="btnDaftar">Register</button>
                                </div>
                                <div class="text-center">
                                    Already have an Account? Then let's <a href="login.php">Log In</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>