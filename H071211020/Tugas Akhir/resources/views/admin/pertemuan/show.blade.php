@extends('layouts.admin')

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Detail {{$data->pertemuan}} Mata Pelajaran {{$data->mapel->mapel}}</h2>
        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Data Mapel</span></li>
                <li><span>Pertemuan</span></li>
                <li><span>Detail</span></li>
            </ol>
            <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Modul</h4>
                    <div class="text-right">
                        <a href="{{Route('mapelShow',['uuid'=>$data->mapel->uuid])}}" class="btn btn-sm btn-default"><i class="fa fa-arrow-left">Kembali</i></a>
                        <button class="btn btn-sm btn-success" id="tambahModul"><i class="fa fa-plus"></i> Tambah
                            Data</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data->modul as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->judul}}</td>
                                    <td>
                                        <a href="{{asset('modul/'.$d->file)}}" class="btn btn-sm btn-success m-1 " target="_blank"> <i
                                                class="fa fa-download"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{Route('modulEdit',['uuid' => $d->uuid])}}"
                                            class="btn btn-sm btn-primary m-1 "> <i class="fa fa-edit"></i></a>
                                            <button class="btn btn-sm btn-danger" onclick="HapusModul('{{$d->uuid}}','{{$d->judul}}')"> <i
                                                class="fa fa-trash"></i></button>
                          
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Data Tugas (Isi jika ada ujian pada pertemuan ini)</h4>
                    <div class="text-right">
                        <button class="btn btn-sm btn-success" id="tambahTes"><i class="fa fa-plus"></i> Tambah
                            Data</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Keterangan</th>
                                    <th>Batas Waktu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data->tugas as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->deskripsi}}</td>
                                    <td>{{carbon\carbon::parse($d->batas_waktu)->translatedFormat('d F Y')}}</td>
                                    <td>
                                        <a href="{{Route('tugasEdit',['uuid' => $d->uuid])}}"
                                            class="btn btn-sm btn-primary m-1 "> <i class="fa fa-edit"></i></a>
                                        <button class="btn btn-sm btn-danger" onclick="HapusTugas('{{$d->uuid}}','{{$d->deskripsi}}')"> <i
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

<div class="modal fade bd-example-modal-lg" id="modalModul" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('modulStore')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="uuid" value="{{$data->uuid}}">
                    <div class="form-group ">
                        <label class="">Judul Modul</label>
                        <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" required>
                    </div>
                    <div class="form-group ">
                        <label class="">file</label>
                        <input type="file" class="form-control" name="file" id="file" required>
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

<div class="modal fade bd-example-modal-lg" id="modalTes" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Ujian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('tugasStore')}}" method="post">
                    @csrf
                    <input type="hidden" name="uuid" value="{{$data->uuid}}">
                    <div class="form-group ">
                        <label class="">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" id="deskripsi" required>
                    </div>
                    <div class="form-group ">
                        <label class="">Batas Waktu</label>
                        <input type="date" class="form-control" name="batas_waktu" id="batas_waktu" required>
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
    $("#tambahModul").click(function(){
            $('#status').text('Tambah Data');
            $('#modalModul').modal('show');
        });

        $("#tambahTes").click(function(){
            $('#status').text('Tambah Data');
            $('#modalTes').modal('show');
        });

        function HapusModul(uuid,nama) {
			Swal.fire({
			title: 'Anda Yakin?',
			text: " Menghapus Data Modul " + nama ,        
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				url = "{{Route('modulDestroy','')}}";
				window.location.href =  url+'/'+uuid ;			
			}
		})
        }

        function HapusTugas(uuid,nama) {
			Swal.fire({
			title: 'Anda Yakin?',
			text: " Menghapus Data Tugas " + nama ,        
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