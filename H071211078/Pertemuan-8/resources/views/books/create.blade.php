@extends('books.layout')
@section('content')

<div class="card" style="margin:20px">
    <div class="card-header">Add New Book</div>
    <div class="card-body">
        <form action="{{ url('books') }}" method="post">
            {!!  csrf_field() !!}
            <label>Book Name</label>
            <input type="text" name="book_name" id="book_name" class="form-control"><br/>
            <label>Author</label>
            <input type="text" name="Author" id="Author" class="form-control"><br/>
            <input type="submit" value="Save" class="btn btn-success"><br/>
        </form>
    </div>
</div>

@stop