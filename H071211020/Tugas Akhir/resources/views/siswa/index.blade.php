@extends('layouts.siswa')

@section('content')
<section role="main" class="content-body">

    <header class="page-header">
        <h2>Beranda Siswa</h2>
        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Beranda</span></li>
            </ol>
            <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <!-- start: page -->

    <div class="row">
        <div class="col-lg-4 col-xl-3 mb-4 mb-xl-0">
            <div class="card">
                <div class="card-header">
                    Profil Jurusan
                </div>
                <div class="card-body">
                    <p class="text-justify">Program Studi Ilmu Komputer merupakan program studi penugasan oleh Direktorat Jenderal Pendidikan Tinggi, Kementerian Pendidikan dan Kebudayaan berdasarkan Nomor 148/E.E2/DT/2014 tentang Penugasan Penyelenggaraan Program Studi. Surat penugasan tersebut ditindaklanjuti oleh Pimpinan Universitas Hasanuddin dengan menjawab kesediaan menerima penugasan tersebut. Selanjutnya Pimpinan Universitas melalui Wakil Rektor Bidang Akademik menugaskan kepada Departemen Matematika untuk mempersiapkan seluruh kelengkapan berkas persyaratan pendirian program studi terutama Kurikulum Berbasis KKNI sesuai Peraturan Presiden No. 8 Tahun 2012. Setelah segala persyaratan dinyatakan lengkap dan layak untuk pembukaan program studi baru maka Direktorat Kelembagaan Dirjen Dikti Kemendikbud menerbitkan Surat Keputusan Nomor 163/E/O/2014 tanggal 10 Juni 2014 tentang Izin Penyelenggaraan Program Studi Ilmu Komputer. Program Studi Ilmu Komputer merupakan Program Studi ke-3 yang dikelola oleh Departemen Matematika yang sebelumnya telah ada Program Studi Matematika dan Program Studi Statistika. Selanjutnya untuk mengelola program studi tersebut, maka dilakukan pengangkatan Dr. Armin Lawi, M.Eng. sebagai Ketua Program Studi Ilmu Komputer oleh Rektor Universitas Hasanuddin berdasarkan Surat Keputusan Rektor Universitas Hasanuddin Nomor 27570/UN4/KP.04/2014.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3 mt-0">Mata Pelajaran</h4>
                    <ul class="simple-card-list mb-3">
                        @foreach($mapel as $m)
                        <li class="warning">
                            <a href="">
                                <h3 class="text-white">{{$m->mapel}}</h3>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>


        </div>
        <div class="col-lg-4 col-xl-6">

            <div class="tabs">
                <ul class="nav nav-tabs">
                    <li class="nav-item active">
                        <a class="nav-link" href="#overview" data-toggle="tab">Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#edit" data-toggle="tab">Edit Profil</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="overview" class="tab-pane active">

                        <div class="p-3">

                            <h4 class="mb-3 pt-4">JADWAL PERTEMUAN</h4>

                            <div class="timeline timeline-simple mt-3 mb-3">
                                <div class="tm-body">
                                    <div class="tm-title">
                                        <h5 class="m-0 pt-2 pb-2 text-uppercase">timeline pertemuan</h5>
                                    </div>
                                    <ol class="tm-items">
                                    @foreach($pertemuan as $p)
                                        <li>
                                            <div class="tm-box">
                                                <p class="text-muted mb-0">{{carbon\carbon::parse($p->tanggal)->translatedFormat('d F Y')}}</p>
                                                <p>
                                                    {{$p->pertemuan}} Mapel {{$p->mapel->mapel}}
                                                </p>
                                            </div>
                                        </li>
                                    @endforeach
                                    </ol>
                                </div>
                            </div>
                        </div>
                        {{$pertemuan->links()}}
                    </div>
                    <div id="edit" class="tab-pane">

                        <form class="p-3" action="{{Route('updateProfileSiswa')}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="uuid" value="{{Auth::user()->uuid}}">
                            <h4 class="mb-3">Edit Profil</h4>

                            `<div class="form-group ">
                                <label class="">Username</label>
                                <input type="text" class="form-control" name="username" id="username"
                                    placeholder="Username">
                                <p class="text-danger">isi jika ingin merubah username</p>
                            </div>
                            <div class="form-group ">
                                <label class="">NRP</label>
                                <input type="text" class="form-control" name="nrp" id="nrp"
                                    value="{{Auth::user()->nrp}}" placeholder="NRP">
                            </div>
                            <div class="form-group ">
                                <label class="">Nama Siswa</label>
                                <input type="text" class="form-control" name="nama" id="nama"
                                    value="{{Auth::user()->nama}}" placeholder="Nama siswa">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                            value="{{Auth::user()->siswa->tempat_lahir}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                            value="{{Auth::user()->siswa->tanggal_lahir}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{Auth::user()->siswa->email}}""
                                                        placeholder=" Email">
                            </div>
                            <div class="form-group ">
                                <label class="">Asal</label>
                                <input type="text" class="form-control" name="asal" id="asal"
                                    value="{{Auth::user()->siswa->asal}}">
                            </div>
                            <div class="form-group ">
                                <label class="">Foto</label>
                                <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto">
                                <p class="text-danger">isi jika ingin merubah foto</p>
                            </div>
                            <div class="form-group ">
                                <label class="">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="password">
                                <p class="text-danger">isi jika ingin merubah password</p>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12 text-right mt-3">
                                    <button class="btn btn-warning modal-confirm">Save</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <section class="card">
                <div class="card-body">
                    <div class="thumb-info mb-3">
                        <img src="{{asset('images/user/'. Auth::user()->foto)}}" class="rounded img-fluid"
                            alt="John Doe">
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner">{{Auth::user()->nama}}</span>
                        </div>
                    </div>
                    <h4 class="mb-3 mt-4 pt-2"> Biodata</h4>
                    <ul class="simple-user-list mb-3">
                        <li>
                            <span class="title">NRP</span>
                            <span class="message">{{Auth::user()->nrp}}</span>
                        </li>
                        <li>
                            <span class="title">Jenis Kelamin</span>
                            <span class="message">@if(Auth::user()->siswa->jk == 1 ) Laki-laki @else Perempuan
                                @endif</span>
                        </li>
                        <li>
                            <span class="title">Tempat, Tinggal Lahir</span>
                            <span class="message">{{Auth::user()->siswa->tempat_lahir}},
                                {{Auth::user()->siswa->tanggal_lahir}}</span>
                        </li>
                        <li>
                            <span class="title">Kelas</span>
                            <span class="message">{{Auth::user()->siswa->kelas->nama_kelas}}</span>
                        </li>
                        <li>
                            <span class="title">Asal</span>
                            <span class="message">{{Auth::user()->siswa->asal}}</span>
                        </li>
                        <li>
                            <span class="title">Email</span>
                            <span class="message">{{Auth::user()->siswa->email}}</span>
                        </li>
                        <li>
                            <span class="title">Username</span>
                            <span class="message">{{Auth::user()->username}}</span>
                        </li>
                    </ul>
                </div>
            </section>

        </div>

    </div>
    <!-- end: page -->
</section>

@endsection