@extends('BackEnd.master')
@section('title')
    Manage Books
@endsection
@section('content')
    @if (Session::get('sms'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('sms') }}</strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card my-5">
        <div class="card-header">
            <h3 class="card-title">Manage Books</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>

                    <tr>
                        <th>SL</th>
                        <th>Book Name</th>
                        <th>Category Name</th>
                        <th>Book Cover</th>
                        <th>Synopsis</th>
                        <th>Released On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $book->book_name }}</td>
                            <td>{{ $book->category_name }}</td>
                            <td>
                                <img src="{{ asset($book->book_cover) }}" height="25" width="60" class="img-fluid img-thumbnail">
                            </td>
                            <td>{{ $book->book_synopsis }}</td>
                            <td>{{ $book->released_on }}</td>
                            <td>
                                @if ($book->book_status == 1)
                                    <a class="btn btn-outline-success"
                                        href="{{ route('Inactive_book', ['book_id' => $book->book_id]) }}">
                                        <i class="fas fa-check" title="Click to deactivate"></i>
                                    </a>
                                @else
                                    <a class="btn btn-outline-info"
                                        href="{{ route('active_book', ['book_id' => $book->book_id]) }}">
                                        <i class="fas fa-times" title="Click to activate"></i>
                                    </a>
                                @endif
                                <a type="button" class="btn btn-outline-primary" data-toggle="modal"
                                    data-target="#edit{{ $book->book_id }}">
                                    <i class="fas fa-edit" title="Click to change"></i>
                                    Edit
                                </a>
                                <a class="btn btn-outline-danger"
                                    href="{{ route('book_delete', ['book_id' => $book->book_id]) }}"
                                    onclick="return confirm('Are you sure ?')">
                                    <i class="fas fa-trash"></i> Delete</a>
                            </td>
                        </tr>


                        {{-- Modal --}}
                        <div class="modal fade" id="edit{{ $book->book_id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Book</h5>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('book_update') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            
                                            <div class="form-group">
                                                <label>Book Name</label>
                                                <input type="text" class="form-control" name="book_name"
                                                    value="{{ $book->book_name }}">
                                                <input type="hidden" class="form-control" name="book_id"
                                                    value="{{ $book->book_id }}">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Category Name</label>
                                                <select class="form-control" name="category_id">
                                                    @foreach ($categories as $cate)
                                                        <option value="{{ $cate->category_id }}">
                                                            {{ $cate->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Previous Cover</label>
                                                <img src="{{ asset($book->book_cover) }}" style="height:150px; width:150px;">
                                                <input type="file" name="book_cover" class="form-control" accept="image/*"> 
                                            </div>

                                            <div class="form-group">
                                                <label>Synopsis</label>
                                                <textarea type="text" name="book_synopsis" rows="5" >{{ $book->book_synopsis }}</textarea>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Released On</label>
                                                <input type="number" min="1900" max="2099" name="released_on" value="{{$book->released_on}}">
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="submit" name="btn" class="btn btn-primary" value="Update">
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
