@extends('layouts.siswa')

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Tes (Mapel)</h2>
        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                <a href="index.html">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Tes (Nama Mapel) periode (Periode)</span></li>
            </ol>
            <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <div class="row">
        <div class="col-lg-12">
            <form action="" method="post">
                @csrf
                @foreach($soal as $s)
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-1">
                                <h3><b>{{$loop->iteration}}</b></h3>
                            </div>
                            <div class="col-md-11">
                                <img src="{{asset('soal/'.$s->gambar)}}" alt="" width="200px">
                                <p class="text-justify">{{$s->soal}}</p>
                                <input type="hidden" name="soal_id[]" value="{{$s->id}}">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="pilihan[{{$loop->iteration -1}}]" id="pilihan1"
                                            value="a" required>
                                        {{$s->a}}
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="pilihan[{{$loop->iteration -1}}]" id="pilihan2"
                                            value="b">
                                        {{$s->b}}
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="pilihan[{{$loop->iteration -1}}]" id="pilihan1"
                                            value="c">
                                        {{$s->c}}
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="pilihan[{{$loop->iteration -1}}]" id="pilihan2"
                                            value="d">
                                        {{$s->d}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary"> Simpan Jawaban</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
@section('scripts')
<script>

</script>
@endsection