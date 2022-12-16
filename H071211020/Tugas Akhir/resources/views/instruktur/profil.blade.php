@extends('layouts.instruktur')

@section('content')
<!-- end: sidebar -->
<section role="main" class="content-body">

    <header class="page-header">
        <h2>Profil Instruktur</h2>
        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Beranda</span></li>
            </ol>
            <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>

    <div class="card">
        <div class="card-header">
            <div class="text-right">
                <button class="btn btn-sm btn-success" id="tambah"><i class="fa fa-edit"></i> Edit Profil</button>
            </div>
        </div>
        <div class="card-body">
            <p>Profil Instruktur</p>
            <div class="row">
                <div class="col-md">
                    <table>
                        <tr>
                            <td width="50%">Nama</td>
                            <td>: {{Auth::user()->instruktur->user->nama}}</td>
                        </tr>
                        <tr>
                            <td>NRP</td>
                            <td>: {{Auth::user()->instruktur->user->nrp}}</td>
                        </tr>
                        <tr>
                            <td>Tempat, tanggal lahir</td>
                            <td>: {{Auth::user()->instruktur->tempat_lahir}},
                                {{carbon\carbon::parse(Auth::user()->instruktur->tanggal_lahir)->translatedFormat('d F Y')}}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md">
                    <table>
                        <tr>
                            <td width="50%">Email</td>
                            <td>: {{Auth::user()->instruktur->email}}</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>: {{Auth::user()->instruktur->user->username}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('instrukturProfileUpdate',['uuid' => $data->id])}}" method="post"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group ">
                        <label class="">Nama</label>
                        <input type="text" class="form-control" value="{{$data->nama}}" name="nama" id="nama" required>
                    </div>
                    <div class="form-group ">
                        <label class="">NRP</label>
                        <input type="text" class="form-control" value="{{$data->nrp}}" name="nrp" id="nrp" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="">Tempat Lahir</label>
                                <input type="text" class="form-control" value="{{$data->instruktur->tempat_lahir}}"
                                    name="tempat_lahir" id="tempat_lahir" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="">Tanggal Lahir</label>
                                <input type="date" class="form-control" value="{{$data->instruktur->tanggal_lahir}}"
                                    name="tanggal_lahir" id="tanggal_lahir" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="">Email</label>
                        <input type="email" class="form-control" value="{{$data->instruktur->email}}" name="email"
                            id="email" required>
                    </div>
                    <div class="form-group ">
                        <label class="">Username</label>
                        <input type="text" class="form-control" value="{{$data->username}}" name="username"
                            id="username" required>
                    </div>
                    <div class="form-group ">
                        <label class="">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group ">
                        <label class="">Foto</label>
                        <input type="file" class="form-control" name="foto" id="foto">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
<script>
    $("#tambah").click(function(){
            $('#status').text('Tambah Data');
            $('#modal').modal('show');
        });
</script>
@endsection