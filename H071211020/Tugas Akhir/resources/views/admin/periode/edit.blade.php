@extends('layouts.admin')

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Halaman Pertemuan</h2>
        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="#">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Edit Data Pertemuan</span></li>
            </ol>
            <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Edit Data Pertemuan
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group ">
                            <label class="">Periode Tahun</label>
                            <input type="date" class="form-control" name="tahun" value="{{$data->tahun}}" id="tahun">
                        </div>
                        <div class="form-group ">
                            <label class="">Nama Kepala Sekolah</label>
                            <input type="text" class="form-control" name="kepsek" id="kepsek" required>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{Route('kelasIndex')}}" type="button" class="btn btn-default">Batal</a>
                            <button type="submit" class="btn btn-primary">ubah</button>
                        </div>
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