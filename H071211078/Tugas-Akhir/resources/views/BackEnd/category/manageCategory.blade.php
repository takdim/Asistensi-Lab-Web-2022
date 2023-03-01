@extends('BackEnd.master')
@section('title')
    Manage Categories
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
            <h3 class="card-title">Manage Categories</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>

                    <tr>
                        <th>SL</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach ($categories as $cate)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $cate->category_name }}</td>
                            <td>

                                @if ($cate->category_status == 1)
                                    <a class="btn btn-outline-success"
                                        href="{{ route('Inactive_cate', ['category_id' => $cate->category_id]) }}">
                                        <i class="fas fa-check" title="Click to deactivate"></i>
                                    </a>
                                @else
                                    <a class="btn btn-outline-info"
                                        href="{{ route('active_cate', ['category_id' => $cate->category_id]) }}">
                                        <i class="fas fa-times" title="Click to activate"></i>
                                    </a>
                                @endif
                                <a type="button" class="btn btn-outline-primary" data-toggle="modal"
                                    data-target="#edit{{ $cate->category_id }}">
                                    <i class="fas fa-edit" title="Click to change"></i>
                                    Edit
                                </a>
                                <a class="btn btn-outline-danger"
                                    href="{{ route('cate_delete', ['category_id' => $cate->category_id]) }}" onclick="return confirm('Are you sure ?')">
                                    <i class="fas fa-trash"></i> Delete</a>
                            </td>
                        </tr>


                        {{-- Modal --}}
                        <div class="modal fade" id="edit{{ $cate->category_id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Category</h5>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('cate_update') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label>Category Name</label>
                                                <input type="text" class="form-control" name="category_name"
                                                    value="{{ $cate->category_name }}">
                                                <input type="hidden" class="form-control" name="category_id"
                                                    value="{{ $cate->category_id }}">
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
    @endsection
