@extends('BackEnd.master')
@section('title')
    Category Page
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-3 col-md-5 my-lg-5">
                @if(Session::get('sms'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('sms') }}</strong>
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">

                    <div class="card-header text-center">
                        Category
                    </div>
                    <div class="card-body">

                        <form action="{{ route('cate_save') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" class="form-control" name="category_name">
                            </div>
                            <div class="form-group">
                                <label>Added On</label>
                                <input type="date" class="form-control" name="added_on">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <input type="radio" name="category_status" value="1">Active
                                <input type="radio" name="category_status" value="0">Inactive
                            </div>
                            <button type="submit" name="btn" class="btn btn-outline-primary btn-black">Add
                                Category</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
