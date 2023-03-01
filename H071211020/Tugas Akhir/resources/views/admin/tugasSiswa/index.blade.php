@extends('layouts.admin')

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Halaman Nilai Tugas Siswa</h2>
        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Data Tugas Siswa</span></li>
            </ol>
            <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-right">
                    <a href="{{Route('tugasSiswaFilter')}}" class="btn btn-sm btn-secondary" ><i class="fa fa-filter"></i> Filter Tugas</a>
                     <a href="{{Route('tugasCetak')}}" class="btn btn-sm btn-secondary" target="_blank"><i class="fa fa-print"></i> Cetak Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Mapel</th>
                                    <th>Pertemuan</th>
                                    <th>Tugas</th>
                                    <th>Nama Siswa</th>
                                    <th>Waktu Mengumpul</th>
                                    <th>File</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                              <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$d->tugas->pertemuan->mapel->mapel}}</td>
                                  <td>{{$d->tugas->pertemuan->pertemuan}}</td>
                                  <td>{{$d->tugas->deskripsi}}</td>
                                  <td>{{$d->siswa->user->nama}}</td>
                                  <td>{{carbon\carbon::parse($d->created_at)->translatedFormat('H:i')}} WITA</td>
                                  <td> <a href="{{asset('tugas/'.$d->file)}}" class="btn btn-warning" download><i class="fa fa-file-download"></i> {{$d->file}}</a></td>
                                  <td>{{$d->nilai}}</td>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @csrf
                    <div class="form-group ">
                        <label class="">Periode Tahun</label>
                        <input type="date" class="form-control" name="tahun" id="tahun">
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
        function Hapus(uuid) {
			Swal.fire({
			title: 'Anda Yakin?',
			text: " Menghapus Data Tugas "  ,        
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				url = "{{Route('tugasDestroy','')}}";
				window.location.href =  url+'/'+uuid ;			
			}
		})
        }
</script>
@endsection