@extends('layouts.instruktur')

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
                        <a href="{{Route('tugasSiswaFilter')}}" class="btn btn-sm btn-secondary"><i
                                class="fa fa-filter"></i> Filter Tugas</a>
                        <a href="{{Route('tugasCetak')}}" class="btn btn-sm btn-secondary" target="_blank"><i
                                class="fa fa-print"></i> Cetak Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>NRP</th>
                                    <th>Tugas</th>
                                    <th>Waktu Mengumpul</th>
                                    <th>File</th>
                                    <th>Nilai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($siswa as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->user->nama}}</td>
                                    <td>{{$d->user->nrp}}</td>
                                    <td>{{$tugas->deskripsi}}</td>
                                    <td>
                                        @if($d->tugas_siswa->where('tugas_id',$tugas->id)->first())
                                        {{carbon\carbon::parse($d->tugas_siswa->where('tugas_id',$tugas->id)->first()->created_at)->translatedFormat('H:i')}}
                                        WITA
                                        @else
                                        <p class="text-danger">Belum Mengumpul Tugas</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if($d->tugas_siswa->where('tugas_id',$tugas->id)->first())
                                        @php
                                        $file = $d->tugas_siswa->where('tugas_id',$tugas->id)->first();
                                        @endphp
                                        <a href="{{asset('tugas/'.$file->file)}}" class="btn btn-warning" download><i
                                                class="fa fa-file-download"></i> {{$d->file}}</a>
                                        @else
                                        -
                                        @endif
                                    </td>
                                    @if($d->tugas_siswa->where('tugas_id',$tugas->id)->first())
                                    <td>{{$d->tugas_siswa->where('tugas_id',$tugas->id)->first()->nilai}}</td>
                                    <td>
                                        <button data-id="{{$d->tugas_siswa->where('tugas_id',$tugas->id)->first()->id}}" class="btn btn-sm btn-primary tambahVerif"><i
                                                class="fa fa-edit"></i> Input Nilai</button>
                                    </td>
                                    @else
                                    <td>  <p class="text-danger">Belum Ada Nilai</p></td>
                                    <td>-</td>
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
                <form action="{{Route('tugasSiswaNilaiStore')}}" method="post">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-group ">
                        <label class="">Nilai</label>
                        <input type="number" class="form-control" name="nilai" id="nilai">
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
    $(".tambahVerif").click(function(){
        var id = $(this).data("id");
        $('#modal').modal('show');
        $('#id').val(id);
    });
</script>
@endsection