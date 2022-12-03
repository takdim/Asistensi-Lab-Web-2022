@extends('seller_permission.layout')
@section('content')
<div class="card">
  <div class="card-header">seller_permission Page</div>
  <div class="card-body">
      
      <form action="{{ url('seller_permission') }}" method="post">
        {!! csrf_field() !!}
        {{-- <label>Penjual</label></br>
        <input type="text" name="seller_id" id="seller_id" class="form-control"></br> --}}
        <div class="form-group">
          <label>penjual</label>
          <select class="form-control select2" style="width: 100%;" name="seller_id" id="seller_id">
            <option disabled value>Pilih Seller</option>
            @foreach ($seller as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
          </select>
        </div>
        {{-- <label>Prizinan</label></br>
        <input type="text" name="permission_id" id="permission_id" class="form-control"></br> --}}
        <div class="form-group">
          <label>Perizinan</label>
          <select class="form-control select2" style="width: 100%;" name="permission_id" id="permission_id">
            <option disabled value>Perizinan</option>
            @foreach ($permission as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
          </select>
        </div>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop