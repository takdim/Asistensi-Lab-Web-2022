<!DOCTYPE html>
<html>
<head>
    <title>Product Laravel 8 CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color:aqua;">
 
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container">
    <a class="navbar-brand" href="#">E-Commerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/product">Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/category">Kategori</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/seller">Penjual</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/permission">Perizinan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/seller_permission">Izin Penjual</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="card">
  <div class="card-header">Seller Page</div>
  <div class="card-body">
  

        <div class="card-body">
        <h5 class="card-title">Nama : {{ $seller->name }}</h5>
        <p class="card-text">Alamat : {{ $seller->address }}</p>
        <p class="card-text">Gender : {{ $seller->gender }}</p>
        <p class="card-text">No_hp : {{ $seller->no_hp }}</p>
        <p class="card-text">Status : {{ $seller->status }}</p>
  </div>
      
</hr>
  
  </div>
</div>
</body>
</html>