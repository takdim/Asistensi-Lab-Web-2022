@extends('seller.layout')
@section('content')
<div class="card">
  <div class="card-header">Seller Page</div>
  <div class="card-body">
      
      <form action="{{ url('seller/' .$seller->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$seller->id}}" id="id" />
        <label>Nama</label></br>
        <input type="text" name="name" id="name" value="{{$seller->name}}" class="form-control"></br>
        <label>Alamat</label></br>
        <input type="text" name="address" id="address" value="{{$seller->address}}" class="form-control"></br>
        <label>Gender</label></br>
        <input type="text" name="gender" id="gender" value="{{$seller->gender}}" class="form-control"></br>
        <label>no_hp</label></br>
        <input type="text" name="no_hp" id="no_hp" value="{{$seller->no_hp}}" class="form-control"></br>
        <label>Status</label></br>
        <input type="text" name="status" id="status" value="{{$seller->status}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop