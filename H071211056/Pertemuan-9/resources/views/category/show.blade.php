@extends('category.layout')
@section('content')


<div class="card">
  <div class="card-header">Halaman Kategori</div>
  <div class="card-body">
  

        <div class="card-body">
        <h5 class="card-title">Nama : {{ $category->name }}</h5>
        <p class="card-text">status : {{ $category->status }}</p>
  </div>
</hr>
  </div>
</div>
@endsection