@extends('books.layout')
@section('content')

<div class="card" style="margin:20px">
    <div class="card-header">Edit Book</div>
    <div class="card-body">

        <form action="{{url('books/'.$books->id)}}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$books->id}}">
            <label>Book Name</label><br/>
            <input type="text" name="book_name" id="book_name" value="{{$books->book_name}}" class="form-control"><br/>
            <label>Author</label><br/>
            <input type="text" name="Author" id="Author" value="{{$books->Author}}" class="form-control"><br/>
            <input type="submit" value="Update" class="btn btn-primary"><br/>
        </form>
    
    </div>
</div>

@stop