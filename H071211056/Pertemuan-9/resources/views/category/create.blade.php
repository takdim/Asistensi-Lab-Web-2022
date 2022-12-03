@extends('category.layout')
@section('content')
<div class="card">
  <div class="card-header">Halaman Kategori Produk</div>
  <div class="card-body">
      
      <form action="{{ url('category') }}" method="post">
        {!! csrf_field() !!}
        <label>Nama</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>status</label></br>
        <input type="text" name="status" id="status" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@endsection