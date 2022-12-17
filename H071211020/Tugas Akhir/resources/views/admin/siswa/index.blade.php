@extends('layouts.admin')
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Halaman Siswa</h2>
        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Data Siswa</span></li>
            </ol>
            <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-right">
                        <a href="{{Route('siswaCetak')}}" class="btn btn-sm btn-secondary" target="_blank"><i class="fa fa-print"></i> Cetak Data</a>
                        <button class="btn btn-sm btn-success" id="tambah"><i class="fa fa-plus"></i> Tambah
                            Data</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NRP</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th>email</th>
                                    <th>asal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->user->nrp}}</td>
                                    <td>{{$d->user->nama}}</td>
                                    <td>{{$d->kelas->nama_kelas}}</td>
                                    <td>{{$d->tempat_lahir}},
                                        {{carbon\carbon::parse($d->tanggal_lahir)->translatedFormat('d F Y')}}
                                    </td>
                                    <td>{{$d->email}}</td>
                                    <td>{{$d->asal}}</td>
                                    <td>
                                        <!-- <a href="{{Route('siswaShow',['uuid' => $d->uuid])}}"
                                            class="btn btn-sm btn-warning m-1 "> <i class="fa fa-info-circle"></i></a> -->
                                        <a href="{{Route('siswaEdit',['uuid' => $d->uuid])}}"
                                            class="btn btn-sm btn-primary m-1 "> <i class="fa fa-edit"></i></a>
                                            <button class="btn btn-sm btn-danger" onclick="Hapus('{{$d->uuid}}','{{$d->user->nama}}')"> <i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
                <form action="{{Route('siswaStore')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group ">
                        <label class="">Kelas</label>
                        <select name="kelas_id" id="kelas_id" class="form-control" required>
                            <option value="">-- pilih kelas --</option>
                            @foreach($kelas as $d)
                            <option value="{{$d->id}}">{{$d->nama_kelas}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group ">
                        <label class="">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                    </div>
                    <div class="form-group ">
                        <label class="">Password</label>
                        <input type="password" class="form-control" name="password" id="password"  placeholder="password" required>
                    </div>
                    <div class="form-group ">
                        <label class="">NRP</label>
                        <input type="text" class="form-control" name="nrp" id="nrp" placeholder="NRP" required>
                    </div>
                    <div class="form-group ">
                        <label class="">Nama Siswa</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Siswa" required>
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
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat lahir " required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal lahir" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="form-group ">
                        <label class="">Asal</label>
                        <input type="text" class="form-control" name="asal" id="asal" placeholder="Asal" required>
                    </div>
                    <div class="form-group ">
                        <label class="">Foto</label>
                        <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto">
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
        function Hapus(uuid,nama) {
			Swal.fire({
			title: 'Anda Yakin?',
			text: " Menghapus Data Kelas " + nama ,        
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				url = "{{Route('siswaDestroy','')}}";
				window.location.href =  url+'/'+uuid ;			
			}
		})
        }
</script>
@endsection