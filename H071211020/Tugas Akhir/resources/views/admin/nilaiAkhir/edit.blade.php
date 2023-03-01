@extends('layouts.admin')

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Halaman Modul</h2>
        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="#">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Edit Data Modul</span></li>
            </ol>
            <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Edit Data Modul
                </div>
                <div class="card-body">
                    <form action="" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group ">
                            <label class="">Absensi (%)</label>
                            <input type="text" class="form-control" name="absensi" value="{{$data->absensi}}"
                                id="absensi" placeholder="Absensi">
                        </div>
                        <div class="form-group ">
                            <label class="">Rata - Rata Nilai Tugas</label>
                            <input type="text" class="form-control" name="tugas" value="{{$data->tugas}}" id="tugas"
                                placeholder="Nilai Tugas">
                        </div>
                        <div class="form-group ">
                            <label class="">Rata - Rata Nilai Tes</label>
                            <input type="text" class="form-control" name="tes" value="{{$data->tes}}" id="tes"
                                placeholder="Nilai Tes">
                        </div>
                </div>
                <div class="card-footer text-right">
                    <a href="{{Route('kelasIndex')}}" type="button" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-primary">ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('scripts')
<script>
    $(document).ready(function() {
            $('#summernote').summernote();
        });
</script>
@endsection