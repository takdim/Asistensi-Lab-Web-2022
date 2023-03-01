@extends('layouts.admin')

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Halaman Hasil Tes {{$tes->mapel->mapel}} Periode {{carbon\carbon::parse($tes->periode->tahun)->translatedFormat('Y')}}</h2>
        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Data Hasil Tes Siswa</span></li>
            </ol>
            <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-right">
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tes</th>
                                    <th>Periode</th>
                                    <th>Status Tes</th>
                                    <th>Nilai</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->siswa->user->nama}}</td>
                                    <td>{{$d->tes->mapel->mapel}}</td>
                                    <td>{{carbon\carbon::parse($d->tes->periode->tahun)->translatedFormat('Y')}}</td>
                                    <td>@if($d->tes->status == 0)
                                            <p class="text-primary"> Tes Masih Berlangsung</p>
                                        @else
                                            <p class="text-primary"> Tes Sudah Selesai</p>
                                        @endif
                                    </td>
                                    <td>{{$d->nilai}}</td>
                                    <td>
                                        @if($d->nilai >= 70)
                                            <p class="text-success"> Lulus</p>
                                        @else
                                            <p class="text-danger"> Tidak Lulus</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-warning m-1 "> <i class="fa fa-file"></i></a>
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
                <form action="{{Route('kelasStore')}}" method="post">
                    @csrf
                    <div class="form-group ">
                        <label class="">Nama kelas</label>
                        <input type="text" class="form-control" name="nama_kelas" id="kelas" placeholder="Kelas">
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
				url = "{{Route('kelasDestroy','')}}";
				window.location.href =  url+'/'+uuid ;			
			}
		})
        }
</script>
@endsection