@extends('BackEnd.master')
@section('title')
    Books
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-3 col-md-5 my-lg-5">
                @if (Session::get('sms'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('sms') }}</strong>
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-center">
                        Book
                    </div>
                    <div class="card-body">
                        <form action="{{ route('book_save') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Book Name</label>
                                <input type="text" class="form-control" name="book_name">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category_id">
                                    <option></option>
                                    @foreach ($categories as $cate)
                                    <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Book Cover</label>
                                <input type="file" name="book_cover" class="form-control" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label>Synopsis</label>
                                <textarea name="book_synopsis" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Released On</label>
                                <input type="number" min="1900" max="2099" class="form-control" name="released_on">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="radio" name="book_status" value="1">Active
                                <input type="radio" name="book_status" value="0">Inactive
                            </div>
                            <button type="submit" name="btn" class="btn btn-outline-primary btn-black">
                                Add
                            </button>    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
