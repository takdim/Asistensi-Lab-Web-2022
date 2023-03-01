@extends('layouts.admin')

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Halaman Hasil Kuis</h2>
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
                </div>
                <div class="card-body">
                  <form action="" method="POST" target="_blank">
                    @csrf
                    <div class="form-group">
                        <label for="">Status</label><br>
                        <select name="tes_id" id="tes_id" class="form-control">
                            @foreach($data as $d)
                                <option value="{{$d->id}}">{{$d->mapel->mapel}} -  Periode ( {{carbon\carbon::parse($d->periode->tahun)->translatedFormat('Y')}} )</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a class="btn btn-sm btn-default" href="{{Route('hasilTesIndex')}}"> Kembali</a>
                    <button type="submit" class="btn btn-sm btn-primary">Cetak Data</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
</script>
@endsection