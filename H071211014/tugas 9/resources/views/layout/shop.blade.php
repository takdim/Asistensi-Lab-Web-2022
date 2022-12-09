<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<style>
    .sidebar{
        width:10%;
        position: relative;
        right:250px;
        height:530px;
    
    }
    </style>
<body>
    <div class="row  justify-content-center">
        <h4 class="bg-primary col-12 pt-2 ps-3" style="height:50px";>Database Mahasiswa sistem informasi</h4>
        <div class="col-6 sidebar bg-warning ">
             <a href="/shop" class="btn btn-primary mt-4">Registration</a>
             <a href="/showdata"class="btn btn-primary mt-3 ms-2">Database</a>
         </div>
         <div class="col-6">
      <div class="container card mt-5 ">
        <h4 class="text-center">Registration form</h4>
        <form action="/insertdata" method="POST">
            @csrf
            <div class="mb-3">
                <input type="text" placeholder="nama" name='nama' class="form-control" >
              </div>
              <div class="mb-3">
                <input type="text" placeholder="alamat" name='jenis' class="form-control" >
              </div>
              <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </div>
    </div>
   
    
</form>
      </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>    
</body>
</html>