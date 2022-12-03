@extends('seller_permission.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Perizinan Penjual</div>
                    <div class="card-body">
                        <a href="{{ url('/seller_permission/create') }}" class="btn btn-success btn-sm" title="Add New seller_permission">
                            <i class="fa fa-plus" aria-hidden="true"></i> Tambahkan Data
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>penjual</th>
                                        <th>Perizinan</th>
                                        <th>Dibuat_pada</th>
                                        <th>Diperbaharui_pada</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($seller_permission as $index => $item)
                                    <tr>
                                        <th>{{ $index + $seller_permission->firstItem()}}</th>
                                        {{-- <td>{{ $loop->iteration }}</td> --}}
                                        <td>{{ $item->seller->name ?? 'None' }}</td>
                                        <td>{{ $item->permission->name ?? 'None' }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at }}</td>

                                        <td>
                                            <a href="{{ url('/seller_permission/' . $item->id) }}" title="View seller_permission"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/seller_permission/' . $item->id . '/edit') }}" title="Edit seller_permission"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ url('/seller_permission' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete seller_permission" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $seller_permission->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection