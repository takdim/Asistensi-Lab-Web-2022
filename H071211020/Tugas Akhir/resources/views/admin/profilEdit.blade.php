@extends('layouts.admin')

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Halaman Profil Edit</h2>
        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="#">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Edit Data Profil</span></li>
            </ol>
            <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Edit Data Profil
                </div>
                <div class="card-body">
                    <form action="{{Route('adminProfilUpdate')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="role" value="2">
                        <div class="form-group ">
                            <label class="">Nama </label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama"
                                value="{{$data->nama}}">
                        </div>
                        <div class="form-group ">
                            <label class="">NRP</label>
                            <input type="text" class="form-control" name="nrp" id="nrp" placeholder="NRP"
                                value="{{$data->nrp}}">
                        </div>
                        <div class="form-group ">
                            <label class="">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username"
                                value="{{$data->username}}">
                        </div>
                        <div class="form-group ">
                            <label class="">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="password">
                        </div>
                        <div class="form-group ">
                            <label class="">Foto</label>
                            <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto">
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