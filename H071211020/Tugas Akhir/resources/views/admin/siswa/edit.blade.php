@extends('layouts.admin')

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Halaman Siswa</h2>
        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="#">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Edit Data Siswa</span></li>
            </ol>
            <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Edit Data Kelas
                </div>
                <div class="card-body">
                    <form action="" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group ">
                            <label class="">Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="form-control">
                                <option value="">-- pilih kelas --</option>
                                @foreach($kelas as $d)
                                <option value="{{$d->id}}" {{$d->id ==  $data->kelas_id ? 'selected' : ''}}>
                                    {{$d->nama_kelas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group ">
                            <label class="">Username</label>
                            <input type="text" class="form-control" name="username" id="username"
                                value="{{$data->user->username}}" placeholder="Username">
                        </div>
                        <div class="form-group ">
                            <label class="">NRP</label>
                            <input type="text" class="form-control" name="nrp" id="nrp" value="{{$data->user->nrp}}"
                                placeholder="NRP">
                        </div>
                        <div class="form-group ">
                            <label class="">Nama Siswa</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="{{$data->user->nama}}"
                                placeholder="Nama siswa">
                        </div>
                        <div class="form-group ">
                            <label class="">Jenis Kelamin</label>
                            <select name="jk" id="jk" class="form-control">
                                <option value="1">Laki - laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                        value="{{$data->tempat_lahir}}" placeholder="Tempat lahir">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                        value="{{$data->tanggal_lahir}}" placeholder="Tanggal lahir">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{$data->email}}"
                                placeholder="Email">
                        </div>
                        <div class="form-group ">
                            <label class="">Asal</label>
                            <input type="text" class="form-control" name="asal" id="asal" value="{{$data->asal}}"
                                placeholder="Asal">
                        </div>
                        <div class="form-group ">
                            <label class="">Foto</label>
                            <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto">
                        </div>
                        <div class="form-group ">
                            <label class="">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="password">
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