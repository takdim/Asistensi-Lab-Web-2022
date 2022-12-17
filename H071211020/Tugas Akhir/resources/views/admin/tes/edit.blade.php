@extends('layouts.admin')

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Halaman Tes</h2>
        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="#">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Edit Data tes</span></li>
            </ol>
            <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Edit Data Tes
                </div>
                <div class="card-body">
                    <form action="" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group ">
                            <label class="">Periode</label>
                            <select name="periode_id" id="periode_id" class="form-control">
                                <option value="">-- Pilih Periode --</option>
                                @foreach($periode as $d)
                                <option value="{{$d->id}}" {{$d->id == $data->periode_id ? 'selected' : ''}}>
                                    {{carbon\carbon::parse($d->tahun)->translatedFormat('Y')}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group ">
                            <label class="">Tanggal Ujian</label>
                            <input type="date" class="form-control" name="tanggal_ujian"
                                value="{{$data->tanggal_ujian}}" id="batas_waktu">
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