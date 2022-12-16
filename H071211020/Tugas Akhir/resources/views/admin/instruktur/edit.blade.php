@extends('layouts.admin')

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Halaman Instruktur</h2>
        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="#">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Edit Data Instruktur</span></li>
            </ol>
            <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Edit Data instruktur
                </div>
                <div class="card-body">
                    <form action="" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group ">
                            <label class="">Nama</label>
                            <input type="text" class="form-control" value="{{$data->user->nama}}" name="nama" id="nama">
                        </div>
                        <div class="form-group ">
                            <label class="">NRP</label>
                            <input type="text" class="form-control" value="{{$data->user->nrp}}" name="nrp" id="nrp">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="">Tempat Lahir</label>
                                    <input type="text" class="form-control" value="{{$data->tempat_lahir}}"
                                        name="tempat_lahir" id="tempat_lahir">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="">Tanggal Lahir</label>
                                    <input type="date" class="form-control" value="{{$data->tanggal_lahir}}"
                                        name="tanggal_lahir" id="tanggal_lahir">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="">Email</label>
                            <input type="email" class="form-control" value="{{$data->email}}" name="email" id="email">
                        </div>
                        <div class="form-group ">
                            <label class="">Username</label>
                            <input type="text" class="form-control" value="{{$data->user->username}}" name="username"
                                id="username">
                        </div>
                        <div class="form-group ">
                            <label class="">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
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