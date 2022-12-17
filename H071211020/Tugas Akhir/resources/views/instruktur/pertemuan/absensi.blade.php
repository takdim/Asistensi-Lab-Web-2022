@extends('layouts.instruktur')

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Absensi Pertemuan {{$data->pertemuan}} / {{carbon\carbon::parse($data->tanggal)->translatedFormat('d F Y')}}</h2> 
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
                    <h3>Absensi Pertemuan </h3>
                    <div class="text-right">
                    <a href="{{Route('absensiCetak',['uuid' => $data->uuid])}}" class="btn btn-sm btn-secondary" target="_blank"><i class="fa fa-print"></i> Cetak Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Siswa</th>
                                    <th class="text-center">NRP</th>
                                    <th class="text-center">Jam Absen</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data->absensi as $d)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td class="text-center">{{$d->user->nama}}</td>
                                    <td class="text-center">{{$d->user->nrp}}</td>
                                    <td class="text-center">{{carbon\carbon::parse($d->created_at)->format('H:i:s')}}
                                    </td>
                                    <td class="text-center">
                                        @if($d->status == 0)
                                        <span class="badge badge-warning">Belum diverifikasi</span>
                                        @else
                                        <span class="badge badge-success">Sudah diverifikasi</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($d->status == 0)
                                            <a href="{{Route('absensiVerif',['uuid' => $d->uuid])}}"
                                                class="btn btn-sm btn-success m-1 "> <i class="fa fa-check-circle"></i>
                                                verifikasi</a>
                                        @else
                                        -
                                        @endif
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

</script>
@endsection