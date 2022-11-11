<?php
include 'koneksi.php';

session_start();
if (!isset($_SESSION['username'])) {
  header('location:login.php');
  exit;
}
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
if ($op == 'delete') {
  $id         = $_GET['id'];
  $sql1       = "delete from mahasiswa where id = '$id'";
  $q1         = mysqli_query($koneksi, $sql1);
  if ($q1) {
    $sukses = "Berhasil hapus data";
  } else {
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
      $sql1       = "update mahasiswa set nim = '$nim',nama='$nama',alamat = '$alamat',fakultas='$fakultas' where id = '$id'";
      $q1         = mysqli_query($koneksi, $sql1);
      if ($q1) {
        $sukses = "Berhasil Update Data";
      } else {
        $error  = "Gagal Update Data";
      }
    } else { //untuk insert
      $q3 = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim ='$nim'");
      $cek = mysqli_num_rows($q3);

      if ($cek == 0) {
        $sql1   = "insert into mahasiswa(nim,nama,alamat,fakultas) values ('$nim','$nama','$alamat','$fakultas')";
        $q1     = mysqli_query($koneksi, $sql1);

        if ($q1) {
          $sukses     = "Berhasil memasukkan data baru";
        } else {
          $error      = "Gagal Memasukkan Data";
        }
      } else {
        $error      = "NIM '$nim' Sudah ada, Harap masukkan kembali NIM Anda";
      }
    }
  } else {
    $error = "Silakan masukkan semua data";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <style>
    .mx-auto {
      width: 800px
    }

    .card {
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <div class="mx-auto">
    <div class="position-relative">
      <div class="position-absolute top-0 start-100 end-0 badge">
        <a href="logout.php" onclick="return confirm('Apakah Anda Yakin Mau Keluar?')"><button type="button" class="btn btn-danger rounded-pill">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
              <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
            </svg>
            Logout
          </button>
        </a>
      </div>
    </div>
    <!-- untuk memasukkan data -->
    <div class="card">
      <div class="card-header">
        Create / Edit Data
      </div>
      <div class="card-body">
        <?php
        if ($error) {
        ?>
          <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-x-circle-fill me-2" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
            </svg>
            <div>
              <?php echo $error ?>
            </div>
          </div>
        <?php
          header("refresh:5;url=index.php"); //5 : detik
        }
        ?>
        <?php
        if ($sukses) {
        ?>
          <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
              <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
              </symbol>
            </svg>
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
              <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
              <?php echo $sukses ?>
            </div>
          </div>
        <?php
          header("refresh:5;url=index.php");
        }
        ?>
        <form action="" method="POST">
          <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
            <div class="col-sm-10">
              <select class="form-control" name="fakultas" id="fakultas">
                <option value="">- Pilih Fakultas -</option>
                <option value="MIPA" <?php if ($fakultas == "MIPA") echo "selected" ?>>MIPA</option>
                <option value="Ekonomi Bisnis" <?php if ($fakultas == "Ekonomi Bisnis") echo "selected" ?>>Ekonomi Bisnis</option>
                <option value="Hukum" <?php if ($fakultas == "Hukum") echo "selected" ?>>Hukum</option>
                <option value="Ilmu Sosial Politik" <?php if ($fakultas == "Ilmu Sosial Politik") echo "selected" ?>>Ilmu Sosial Politik</option>
                <option value="Ilmu Budaya" <?php if ($fakultas == "Ilmu Budaya") echo "selected" ?>>Ilmu Budaya</option>
                <option value="Kedokteran" <?php if ($fakultas == "Kedokteran") echo "selected" ?>>Kedokteran</option>
                <option value="Kedokteran Gigi" <?php if ($fakultas == "Kedokteran Gigi") echo "selected" ?>>Kedokteran Gigi</option>
                <option value="Kesehatan Masyarakat" <?php if ($fakultas == "Kesehatan Masyarakat") echo "selected" ?>>Kesehatan Masyarakat</option>
                <option value="Farmasi" <?php if ($fakultas == "Farmasi") echo "selected" ?>>Farmasi</option>
                <option value="Keperawatan" <?php if ($fakultas == "Keperawatan") echo "selected" ?>>Keperawatan</option>
                <option value="Pertanian" <?php if ($fakultas == "Pertanian") echo "selected" ?>>Pertanian</option>
                <option value="Peternakan" <?php if ($fakultas == "Peternakan") echo "selected" ?>>Peternakan</option>
                <option value="Ilmu Kelautan dan Perikanan" <?php if ($fakultas == "Ilmu Kelautan dan Perikanan") echo "selected" ?>>Ilmu Kelautan dan Perikanan</option>
                <option value="Kehutanan" <?php if ($fakultas == "Kehutanan") echo "selected" ?>>Kehutanan</option>
              </select>
            </div>
          </div>
          <div class="col-12">
            <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
          </div>
        </form>
      </div>
    </div>

    <!-- untuk mengeluarkan data -->
    <div class="card">
      <div class="card-header text-white bg-secondary">
        Data Mahasiswa
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">NIM</th>
              <th scope="col">Nama</th>
              <th scope="col">Alamat</th>
              <th scope="col">Fakultas</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql2   = "select * from mahasiswa order by id asc";
            $q2     = mysqli_query($koneksi, $sql2);
            $urut   = 1;
            while ($r2 = mysqli_fetch_array($q2)) {
              $id         = $r2['id'];
              $nim        = $r2['nim'];
              $nama       = $r2['nama'];
              $alamat     = $r2['alamat'];
              $fakultas   = $r2['fakultas'];

            ?>
              <tr>
                <th scope="row"><?php echo $urut++ ?></th>
                <td scope="row"><?php echo $nim ?></td>
                <td scope="row"><?php echo $nama ?></td>
                <td scope="row"><?php echo $alamat ?></td>
                <td scope="row"><?php echo $fakultas ?></td>
                <td scope="row">
                  <a href="index.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                  <a href="index.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Apakah Anda Yakin Mau Menghapus Data Ini?')"><button type="button" class="btn btn-danger">Hapus</button></a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>

        </table>
      </div>
    </div>
  </div>
</body>
</html>