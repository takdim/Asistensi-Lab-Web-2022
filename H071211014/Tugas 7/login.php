<?php
session_start();
if (isset($_SESSION['username'])) {
  header('location:index.php');
  exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login Page</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <?php
                if (isset($_GET['msg'])) {
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-x-circle-fill me-2" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                        </svg>
                        <strong>Login Failed </strong><?php echo $_GET['msg']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>

                <div class="card">
                    <div class="card-header text-center bg-secondary text-light">
                        Login Page
                    </div>
                    <form action="login_check.php" method="post">
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
                            <div class="row mb-3">
                                <div class="col-2">
                                    <button type="submit" class="btn btn-success" name="btnLogin">Login</button>
                                </div>
                            </div>
                            <div class="text-center">
                                No account yet? Please <a href="register.php">Register</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>