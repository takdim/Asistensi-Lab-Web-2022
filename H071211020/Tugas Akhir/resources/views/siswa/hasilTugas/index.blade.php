@extends('layouts.siswa')

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Halaman Tugas Siswa</h2>
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
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Tugas</th>
                                    <th>Mapel</th>
                                    <th>Pertemuan</th>
                                    <th>Waktu Mengumpul</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->siswa->user->nama}}</td>
                                    <td>{{$d->tugas->deskripsi}}</td>
                                    <td>{{$d->tugas->pertemuan->mapel->mapel}}</td>
                                    <td>{{$d->tugas->pertemuan->pertemuan}}</td>
                                    <td>
                                        {{carbon\carbon::parse($d->created_at)->translatedFormat('H:i')}}   WITA
                                    </td>
                                    @if($d->nilai)
                                    <td>{{$d->nilai}}</td>
                                    @else
                                    <td>  <p class="text-danger">Belum Ada Nilai</p></td>
                                    @endif
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