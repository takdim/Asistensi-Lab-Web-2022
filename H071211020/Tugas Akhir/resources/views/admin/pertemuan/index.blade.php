@extends('layouts.admin')

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Halaman Pertemuan</h2>
        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Data Pertemuan </span></li>
            </ol>
            <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-right">
                    <a href="{{Route('absensiKeseluruhanCetak')}}" class="btn btn-sm btn-secondary" target="_blank"><i class="fa fa-print"></i> Cetak Absensi Keseluruhan</a>  
                    <a href="{{Route('pertemuanCetak')}}" class="btn btn-sm btn-secondary" target="_blank"><i class="fa fa-print"></i> Cetak Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Mepel</th>
                                    <th>Pertemuan</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->mapel->mapel}}</td>
                                    <td>{{$d->pertemuan}}</td>
                                    <td>{{carbon\carbon::parse($d->tanggal)->translatedFormat('d F Y')}}</td>
                                    <td>
                                        <a href="{{Route('adminAbsensiPertemuan',['uuid' => $d->uuid])}}" 
                                            class="btn btn-sm btn-success m-1 "> <i class="fa fa-calendar"></i></a>
                                        <a href="{{Route('jadwalPertemuan',['uuid' => $d->uuid])}}"
                                            class="btn btn-sm btn-info m-1 "> <i class="fa fa-info-circle"></i></a>
                                        <a href="{{Route('pertemuanShow',['uuid' => $d->uuid])}}"
                                            class="btn btn-sm btn-warning m-1 "> <i class="fa fa-cogs"></i></a>
                                        <a href="{{Route('pertemuanEdit',['uuid' => $d->uuid])}}"
                                            class="btn btn-sm btn-primary m-1 "> <i class="fa fa-edit"></i></a>
                                            <button class="btn btn-sm btn-danger" onclick="Hapus('{{$d->uuid}}','{{$d->pertemuan}}')"> <i
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
			text: " Menghapus Data  " + nama ,        
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				url = "{{Route('pertemuanDestroy','')}}";
				window.location.href =  url+'/'+uuid ;			
			}
		})
        }
</script>
@endsection