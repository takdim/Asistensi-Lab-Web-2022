@extends('seller_permission.layout')
@section('content')
<div class="card">
  <div class="card-header">Halaman Izin Penjual</div>
  <div class="card-body">
      
      <form action="{{ url('seller_permission/' .$seller_permission->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$seller_permission->id}}" id="id" />
        <label>Penjual</label></br>
        <input type="text" name="seller_id" id="seller_id" value="{{$seller_permission->seller_id}}" class="form-control"></br>
        <label>Perizinan</label></br>
        <input type="text" name="permission_id" id="permission_id" value="{{$seller_permission->permission_id}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop