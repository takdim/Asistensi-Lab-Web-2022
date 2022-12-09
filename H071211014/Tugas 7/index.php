<?php
session_start();
if($_GET){
  if($_GET["logout"]){
    session_destroy();
    header('location: http://localhost/tugas7/login.php');
  }
}
//koneksi Database
if (!isset($_SESSION['email'])) {
  header('location: http://localhost/tugas7/login.php');
}
$server = "127.0.0.1:3308";
$user = "root";
$pass = "";
$database = "tugas";

 $koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));

 
    //jika tombol simpan di klik
    if(isset($_POST['bsimpan']))
    {
      //pengujian apakah data akan diedit atau di simpan baru
      if($_GET['hal'] == "edit")
      {
        //data akan di edit
         $edit = mysqli_query($koneksi, " UPDATE mahasiswa set 
                                            nim = '$_POST[tnim]',
                                            nama = '$_POST[tnama]',
                                            alamat = '$_POST[talamat]',
                                            fakultas = '$_POST[tfakultas]'
                                          WHERE NIM = '$_GET[id]'
                                        ");

    if($edit) 
    {
      echo "<script>   
        alert('yuhuu edit data suksess!');
        document.location= 'index.php';
      </script>";
    }
    else
    {
      echo "<script>   
        alert('yahh edit data gagal!');
        document.location= 'index.php';
      </script>";

    }
      }else
      {
        //data akan disimpan baru
        $simpan = mysqli_query($koneksi, "INSERT INTO mahasiswa (nim, nama, alamat, fakultas) 
                                      VALUES ('$_POST[tnim]', 
                                             '$_POST[tnama]', 
                                             '$_POST[talamat]', 
                                             '$_POST[tfakultas]')
                                           ");

      if($simpan) 
      {
        echo "<script>   
            alert('Yeayy simpan data suksess!');
            document.location= 'index.php';
          </script>";
      }
      else
      {
        echo "<script>   
          alert('Yahh simpan data gagal!');
          document.location= 'index.php';
        </script>";
        
      }
      }
  
  }
   
    //pengujian jika tombol edit / hapus di klik
    if(isset($_GET['hal']))
    {
      //pengujian jika edit data
      if($_GET['hal'] == "edit")
      {
        //tampilkan data yang akan di edit 
        $tampil = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE NIM = '$_GET[id]' ");
        $data = mysqli_fetch_array($tampil, MYSQLI_ASSOC);
    
        if($data)
        {
          //jika data ditemukan, maka data ditampung ke dalam variabel
          $vnim = $data['Nim'];
          $vnama = $data['Nama'];
          $valamat = $data['Alamat'];
          $vfakultas = $data['Fakultas'];
        }
      }
      else if ($_GET['hal'] == "hapus") 
      {
          //persiapan hapus data
          $hapus = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE NIM = '$_GET[id]' ");
          if($hapus){
            echo "<script>   
              alert('Yeahh hapus data suksess!');
              document.location= 'index.php';
         </script>"; 
          }
      }

    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Praktikum 6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<br>

<div class="container">
    <!-- awal card form -->
    <div class="card mt-3">
<div class="card">
  <div class="card-header">
    Create/Edit data
  </div>
  <div class="card-body">
    <form method="post" action="">
        <div class="form-group">
            <label>NIM</label>
            <input type="text" name="tnim" value="<?=@$vnim?>" class="form-control" placeholder="input nim anda disini" required>
</div>
<div class="form-group">
            <label>NAMA</label>
            <input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="input nama anda disini" required>
</div>
<div class="form-group">
            <label>ALAMAT</label>
            <textarea class="form-control" name="talamat" placeholder="input alamat anda disini"><?=@$valamat?></textarea>
</div>
<div class="form-group">
            <label>FAKULTAS</label>
            <select class="form-control" name="tfakultas"  placeholder="Pilih Fakultas" required>
               <option value="">- Pilih Fakultas - </option> 
               <option value="<?=@$vfakultas?>"><?=@$vfakultas?></option> 
               <option value="MIPA"> MIPA </option>
               <option value="KEPERAWATAN"> KEPERAWATAN </option> 
               <option value="FARMASI"> FARMASI </option> 
               <option value="KEHUTANAN"> KEHUTANAN </option>
               <option value="PERTANIAN"> PERTANIAN </option>
               <option value="PETERNAKAN"> PETERNAKAN </option>
               <option value="FKM"> FKM </option>
               <option value="FKG"> FKG </option>
               <option value="FEB"> FEB </option>
               <option value="FIB"> FIB </option>
               <option value="FISIP"> FISIP </option>
               <option value="FIKP"> FIKP </option>
               <option value="TEKNIK"> FT </option>
               <option value="KEDOKTERAN"> KEDOKTERAN </option>
               <option value="HUKUM"> HUKUM </option>

</select>
</div>

<br>
<button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
<button type="reset" class="btn btn-dark" name="breset">Kosongkan</button>


</form>
  </div>
</div>
     <!-- akhir card form -->

      <!-- awal card tabel -->
    <div class="card mt-3">
<div class="card">
  <div class="card-header bg-secondary text-white">
    Data Mahasiswa
  </div>
  <div class="card-body">
    
  <table class="table table-bordered table-striped">
        <tr> 
            <th>No.</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Fakultas</th>
            <th>Aksi</th>
        </tr>
        <?php
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * from mahasiswa");
            while($data = mysqli_fetch_array($tampil)){
        
        ?>
        <tr>
            <td><?=$no++;?></td>
            <td><?php echo $data['Nim']?></td>
            <td><?php echo $data['Nama']?></td>
            <td><?php echo $data['Alamat']?></td>
            <td><?php echo $data['Fakultas']?></td>
            <td>
                <a href="index.php?hal=edit&id=<?=$data['Nim']?>" class="btn btn-warning"> Edit </a>
                <a href="index.php?hal=hapus&id=<?=$data['Nim']?>"
                 onclick="return confirm('yakin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
            </td>
        </tr>

        
    <?php } //penutup perulangan while ?>
    </table>
  </div>
</div>
    
<!-- akhir card tabel -->
<DIV>
  <a href="?logout=true" class="btn btn-warning"> logout </a>
</DIV>
     

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>