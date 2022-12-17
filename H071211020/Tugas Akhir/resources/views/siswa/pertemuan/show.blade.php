@extends('layouts.siswa')

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Detail Pertemuan {{$data->pertemuan}} {{$data->mapel->mapel}}</h2>
        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Data Pertemuan </span></li>
                <li><span>Detail </span></li>
            </ol>
            <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <div class="row">
        <div class="col-lg-12 ">
            <div class="text-right mb-3">
                @if( carbon\carbon::parse($data->tanggal)->format('Y-m-d') == carbon\carbon::now()->format('Y-m-d'))
                    @if($data->absensi->where('user_id',Auth::user()->id)->isEmpty())
                        <form action="{{Route('absensiStore')}}" method="POST">
                            @csrf
                            <input type="hidden" name="pertemuan_id" value="{{$data->id}}" id="">
                            <input type="hidden" name="user_id" value="{{Auth::id()}}" id="">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-hand-paper"></i> Klik Untuk
                                Absensi</button>
                        </form>
                    @else
                        <a href="#" class="btn btn-success"><i class="fas fa-check-circle"></i> Anda sudah melakukan absen</a>
                    @endif
                @endif
            </div>
            <div class="card">
                <div class="card-header">
                    Modul Pertemuan
                    <div class="text-right">
                    </div>
                </div>
                <div class="card-body">
                    <h5>Modul</h5>
                    @foreach($modul as $m)
                    <a href="{{asset('modul/'.$m->file)}}" class="btn btn-warning" download><i
                            class="fa fa-file-download"></i> {{$m->judul}}</a>
                    @endforeach
                </div>
            </div>
            @foreach($data->tugas as $t)
            <div class="card">
                <div class="card-header">
                    <div class="text-right">
                        @php
                        $tugas_siswa = $t->tugas_siswa->where('siswa_id', Auth::user()->siswa->id);
                        @endphp
                        @if($tugas_siswa->count() == 0)
                        @if($t->batas_waktu >= carbon\carbon::now())
                        <button class="btn btn-sm btn-success" onclick="tambah('{{$t->id}}')"><i class="fa fa-plus"></i>
                            Upload
                            Tugas</button>
                        @else
                        Batas Waktu Telah Lewat
                        @endif
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    {{--  <input type="hidden" id="tugas" value="{{$t->id}}"> --}}
                    <h3>{{$t->deskripsi}} <br>
                        <small>Batas Waktu
                            ({{carbon\carbon::parse($t->batas_waktu)->translatedFormat('d F Y')}})</small></h3>
                    <hr>
                    <label for=""><b>Berkas Upload </b></label><br>
                    @if($tugas_siswa->count() != 0)
                    <a href="{{asset('tugas/'.$tugas_siswa->first()->file)}}" class="btn btn-warning" download><i
                            class="fa fa-file-download"></i> {{$tugas_siswa->first()->file}}</a>
                    @else
                    Anda belum Mengumpul Tugas
                    @endif
                </div>
            </div>
            @endforeach

            <div class="card">
                <div class="card-header">
                    Kolom Diskusi
                </div>
                <div class="card-body">
                    <ul class="simple-user-list mb-3">
                        @foreach($data->komentar as $d)
                        <li>
                            @if($d->user_id == Auth::user()->id)
                            <div class="alert alert-default">
                                @else
                                <div class="alert alert-light">
                                    @endif
                                    <figure class="image rounded">
                                        <img src="{{asset('images/user/'.$d->user->foto)}}" class="rounded-circle"
                                            width="30px" height="30px">
                                    </figure>
                                    <div class="row">
                                        <div class="col-md-6"><span class="title">{{$d->user->nama}}
                                                @if($d->user->role == 1)
                                                <small class="text-primary"> ( Siswa ) </small>
                                                @elseif($d->user->role == 3)
                                                <small class="text-success"> ( Instruktur ) </small>
                                                @else
                                                <small class="text-warning"> ( Admin ) </small>
                                                @endif
                                            </span>
                                            <small>{{carbon\carbon::parse($d->created_at)->translatedFormat('d F Y')}}</small>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            @if($d->user_id == Auth::user()->id)
                                            <a href="{{Route('komentarDestroy', ['uuid' => $d->uuid])}}"
                                                class=" text-danger"> <i class="fas fa-trash"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                    <p class="pt-2" style="padding-left:55px">{{$d->komentar}}</p>
                                </div>
                        </li>
                        <hr>
                        @endforeach

                    </ul>
                    <div class="compose pt-3">
                        <form action="{{Route('komentarStore')}}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::id()}}">
                            <input type="hidden" name="pertemuan_id" value="{{$data->id}}">
                            <textarea name="komentar" id="" rows="8" class="form-control"
                                placeholder="ketik komentar anda ..."></textarea>
                            <div class="text-right mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane mr-1"></i>
                                    Send
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>

<div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Tugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('tugasSiswaStore')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="tugas_id" id="tugas_id">
                    <div class="form-group ">
                        <label class="">File Tugas</label>
                        <input type="file" class="form-control" name="file" id="file" placeholder="Kelas" required>
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
    tambah = (id) =>{
        $('#tugas_id').val(id);
        $('#modal').modal('show');
    }
    $(document).ready(function() {
        $('#summernote').summernote();
    });
 
</script>
@endsection