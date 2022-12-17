@extends('layouts.admin')

@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Halaman Soal</h2>
        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="#">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Detail Data Soal</span></li>
            </ol>
            <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Detail Data Soal
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <img src="{{asset('soal/'.$data->gambar)}}" alt="" width="200px">
                <br>
                           <p class="text-justify"> <b>{{$data->soal}}</b></p>
                           <p>Pilihan jawaban:</p>
                           <div class="radio">
								<label>
									<input type="radio" name="pilihan" id="pilihan1" value="A"  disabled>
										{{$data->a}}
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="pilihan" id="pilihan2" value="B" disabled>
                                    {{$data->b}}
								</label>
                            </div>
                            <div class="radio">
								<label>
									<input type="radio" name="pilihan" id="pilihan1" value="C"  disabled>
                                    {{$data->c}}
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="pilihan" id="pilihan2" value="D" disabled>
                                    {{$data->d}}
								</label>
							</div>
                        </div>
                        <div class="col-md-6">
                            Kunci Jawaban : <br>
                            <b>{{$data->jawaban}}</b> <br>
                            Status Soal   :  @if ($data->status == 1)
                                        <p class="text-success">Aktif</p>
                                        @else
                                        <p class="text-danger">Tidak Aktif</p>
                                        @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                   
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('scripts')
<script>
    $(document).ready(function() {
            $('#summernote').summernote();
        });
</script>
@endsection