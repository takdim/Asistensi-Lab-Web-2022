@extends('permission.layout')
@section('content')
<div class="card">
  <div class="card-header">Halaman Perizinan</div>
  <div class="card-body">
      
      <form action="{{ url('permission/' .$permission->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$permission->id}}" id="id" />
        <label>Nama</label></br>
        <input type="text" name="name" id="name" value="{{$permission->name}}" class="form-control"></br>
        <label>Deskripsi</label></br>
        <input type="text" name="description" id="description" value="{{$permission->description}}" class="form-control"></br>
        <label>Status</label></br>
        <input type="text" name="status" id="status" value="{{$permission->status}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop