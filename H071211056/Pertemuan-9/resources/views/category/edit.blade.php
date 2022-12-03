@extends('category.layout')
@section('content')
<div class="card">
  <div class="card-header">Halaman Kategori Produk</div>
  <div class="card-body">
      
      <form action="{{ url('category/' .$category->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$category->id}}" id="id" />
        <label>Nama</label></br>
        <input type="text" name="name" id="name" value="{{$category->name}}" class="form-control"></br>
        <label>status</label></br>
        <input type="text" name="status" id="status" value="{{$category->status}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@endsection