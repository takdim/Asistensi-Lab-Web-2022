<?php
include "db_conn.php";

if (isset($_POST['submit'])) {
    $nama_buku = $_POST['nama_buku'];
    $nama_pengarang = $_POST['nama_pengarang'];
    $tahun_terbit = $_POST['tahun_terbit'];

    $errors = array();

    $sql = "INSERT INTO `crud`(`id`, `nama_buku`, `nama_pengarang`, `tahun_terbit`) 
    VALUES (NULL,'$nama_buku','$nama_pengarang','$tahun_terbit')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?msg=New data saved");
        echo "Data not saved " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Book App</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark justify-content-center">
        <p>CRUD Book Database</p>
    </nav>
    <div class="text-center mb-4">
        <h3>Add Book</h3>
        <p class="text-muted">Complete filling the info to add a new book</p>
    </div>

    <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row">
                <div class="col">
                    <label class="form-label">Nama Buku</label>
                    <input type="text" class="form-control" name="nama_buku" placeholder="Book etc">

                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Pengarang</label>
                    <input type="text" class="form-control" name="nama_pengarang" placeholder="Author etc">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tahun Terbit</label>
                    <input type="number" min="1900" max="2099" class="form-control" name="tahun_terbit" placeholder="">
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</body>

</html>