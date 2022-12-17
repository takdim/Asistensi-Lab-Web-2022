@extends('layouts.admin')

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Halaman Mapel</h2>
        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="#">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Edit Data Mapel</span></li>
            </ol>
            <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Edit Data Mapel
                </div>
                <div class="card-body">
                    <form action="" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group ">
                            <label class="">Periode</label>
                            <select name="instruktur_id" class="form-control" id="">
                                <option value="">-- Pilih instruktur --</option>
                                @foreach ($instruktur as $d)
                                <option value="{{$d->id}}" {{$d->id == $data->instruktur_id ? 'selected' : ''}}>
                                    {{$d->user->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group ">
                            <label class="">Nama Mata Pelajaran</label>
                            <input type="text" class="form-control" name="mapel" id="mapel" value="{{$data->mapel}}"
                                placeholder="Kelas">
                        </div>
                        <div class="form-group ">
                            <label class="">Keterangan</label>
                            <textarea class="form-control" name="deskripsi"
                                id="keterangan">{{$data->deskripsi}}</textarea>
                        </div>
                </div>
                <div class="card-footer text-right">
                    <a href="{{Route('mapelIndex')}}" type="button" class="btn btn-default">Batal</a>
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