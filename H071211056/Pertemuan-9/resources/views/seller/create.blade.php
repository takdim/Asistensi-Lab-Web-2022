@extends('seller.layout')
@section('content')
<div class="card">
  <div class="card-header">Seller Page</div>
  <div class="card-body">
      
      <form action="{{ url('seller') }}" method="post">
        {!! csrf_field() !!}
        <label>Nama</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Alamat</label></br>
        <input type="text" name="address" id="address" class="form-control"></br>
        <div class="form-group">
          <label>Gender</label>
          <select class="form-control select2" style="width: 100%;" name="gender" id="gender">
            <option disabled value>Pilih Gender</option>
            <option value="L">L</option>
            <option value="P">P</option>
          </select>
        </div>
        <label>No_hp</label></br>
        <input type="text" name="no_hp" id="no_hp" class="form-control"></br>
        <label>Status</label></br>
        <input type="text" name="status" id="status" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop