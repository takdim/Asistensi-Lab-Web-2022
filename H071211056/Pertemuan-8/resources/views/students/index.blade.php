@extends('students.layout')

@section('content')
    <div class="pull-left text-center">
        <h2>Database Fakultas FMIPA Universitas Hasanuddin</h2> <br>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('students.create') }}">Tambah Data</a> <br><br>
            </div>
        </div>
    </div>

    @if ($message=Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Prodi</th>
            <th width="160px">Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $student->Nim }}</td>
            <td>{{ $student->Nama }}</td>
            <td>{{ $student->Alamat }}</td>
            <td>{{ $student->Prodi }}</td>
            <td>
                <form action="{{ route('students.destroy',$student->id) }}"method="POST">
                    {{--<a class="btn btn-info" href="{{ route('students.show',$student->id) }}">Show</a> --}}
                    <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $students->links() }}
@endsection