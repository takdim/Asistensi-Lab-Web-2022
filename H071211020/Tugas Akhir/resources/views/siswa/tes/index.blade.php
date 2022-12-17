@extends('layouts.siswa')

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Daftar Kuis</h2>
        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Daftar Kuis </span></li>
            </ol>
            <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Daftar Kuis </h3>
                    <div class="text-right">
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Mepel</th>
                                    <th>Tanggal Ujian</th>
                                    <th>Periode</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->mapel->mapel}}</td>
                                    <td>{{carbon\carbon::parse($d->tanggal_ujian)->translatedFormat('d F Y')}}</td>
                                    <td>{{$d->periode->tahun}}</td>
                                    <td>
                                    @if(carbon\carbon::parse($d->tanggal_ujian) >= carbon\carbon::now())
                                        <a href="{{Route('inputTes',['uuid' => $d->uuid])}}"
                                            class="btn btn-sm btn-warning m-1 "> <i class="fa fa-play"></i></a>
                                    @else
                                        <p class="text-danger"> Waktu Ujian Sudah lewat</p>
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