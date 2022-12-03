@extends('product.layout')
@section('content')
<div class="card">
  <div class="card-header">Product Page</div>
  <div class="card-body">
      
      <form action="{{ url('product/' .$product->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$product->id}}" id="id" />
        <label>Nama</label></br>
        <input type="text" name="name" id="name" value="{{$product->name}}" class="form-control"></br>
        <label>Penjual</label></br>
        <input type="text" name="seller_id" id="seller_id" value="{{$product->seller_id}}" class="form-control"></br>
        <label>Kategori</label></br>
        <input type="text" name="category_id" id="category_id" value="{{$product->category_id}}" class="form-control"></br>
        <label>Harga</label></br>
        <input type="text" name="price" id="price" value="{{$product->price}}" class="form-control"></br>
        <label>Status</label></br>
        <input type="text" name="status" id="status" value="{{$product->status}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop