@extends('layouts.st_master')
{{-- @section('menu')
@extends('sidebar.dashboard')
@endsection --}}
@section('content')
    <div class="dlabnav">
        <div class="dlabnav-scroll">
            <ul class="metismenu" id="menu">
                <li class="nav-label first">Menu Utama</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-home"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('home') }}">Admin</a></li>
                        <li><a href="{{ route('student_dashboard') }}">Mahasiswa</a></li>
                        <li><a href="{{ route('teacher_dashboard') }}">Dosen</a></li>
                        
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-user"></i>
                        <span class="nav-text">Dosen</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="all-professors.html">Semua Dosen</a></li>
                        <li><a href="add-professor.html">Tambahkan Dosen</a></li>
                        <li><a href="edit-professor.html">Edit Dosen</a></li>
                        <li><a href="professor-profile.html">Profil Dosen</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-users"></i>
                        <span class="nav-text">Mahasiswa</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('all/student/list') }}">Semua Mahasiswa</a></li>
                        <li><a href="{{ route('add/student/new') }}">Tambahkan Mahasiswa</a></li>
                        <li><a href="edit-student.html">Edit Mahasiswa</a></li>
                        <li><a href="{{ route('student/about') }}">tentang Mahasiswa</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-graduation-cap"></i>
                        <span class="nav-text">Kelas</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="all-courses.html">Semua Kelas</a></li>
                        <li><a href="add-courses.html">Tambahkan Kelas</a></li>
                        <li><a href="edit-courses.html">Edit Kelas</a></li>
                        <li><a href="about-courses.html">Tantang Kelas</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Edit Mahasiswa</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Mahasiswa</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Edit Mahasiswa</a></li>
                    </ol>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Halaman edit</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('student/update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $student[0]->id }}">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Nama Depan</label>
                                            <input type="text" class="form-control @error('firstName') is-invalid @enderror" value="{{ $student[0]->firstName }}" name="firstName" id="firstName">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Nama Belakang</label>
                                            <input type="text" class="form-control @error('lastName') is-invalid @enderror" value="{{ $student[0]->lastName }}" name="lastName" id="lastName">
                                            @error('lastName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ $student[0]->email }}" name="email" id="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Tanggal Registrasi</label>
                                            <input type="text" class="datepicker-default form-control @error('registrationDate') is-invalid @enderror" value="{{ $student[0]->registrationDate }}" name="registrationDate" id="datepicker">
                                            @error('registrationDate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Roll No.</label>
                                            <input type="text" class="form-control @error('rollNo') is-invalid @enderror" value="{{ $student[0]->rollNo }}" name="rollNo" id="rollNo">
                                            @error('rollNo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Kelas</label>
                                            <input type="text" class="form-control @error('class') is-invalid @enderror" value="{{ $student[0]->class }}" name="class" id="class">
                                            @error('class')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <input type="text" class="form-control @error('gender') is-invalid @enderror" value="{{ $student[0]->gender }}" name="gender" id="gender">
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Nomor Telepon</label>
                                            <input type="tel" class="form-control @error('mobileNumber') is-invalid @enderror" value="{{ $student[0]->mobileNumber }}" name="mobileNumber" id="mobileNumber">
                                            @error('mobileNumber')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Nama Orang Tua</label>
                                            <input type="text" class="form-control @error('parentsName') is-invalid @enderror" value="{{ $student[0]->parentsName }}" name="parentsName" id="parentsName">
                                            @error('parentsName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Nomor telepon Orang Tua</label>
                                            <input type="text" class="form-control @error('parentsMobileNumber') is-invalid @enderror" value="{{ $student[0]->parentsMobileNumber }}" name="parentsMobileNumber" id="parentsMobileNumber">
                                            @error('parentsMobileNumber')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Tanggal Lahir</label>
                                            <input type="text" class="datepicker-default form-control @error('dateOfBirth') is-invalid @enderror" value="{{ $student[0]->dateOfBirth }}" name="dateOfBirth" id="datepicker1">
                                            @error('dateOfBirth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Golongan Darah</label>
                                            <input type="text" class="form-control @error('bloodGroup') is-invalid @enderror" value="{{ $student[0]->bloodGroup }}" name="bloodGroup" id="">
                                            @error('bloodGroup')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Alamat</label>
                                            <textarea class="form-control @error('address') is-invalid @enderror" value="{{ $student[0]->address }}" name="address" id="address" rows="5">{{ $student[0]->address }}</textarea>
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <img class="rounded-circle" width="35" src="{{ URL::to('/images/'. $student[0]->upload) }}" alt="{{ $student[0]->upload }}">
                                        <div class="form-group fallback w-100">
                                            <input type="hidden" name="hidden_image" value="{{ $student[0]->upload }}">
                                            <input type="file" class="dropify" name="upload" id="upload">
            
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <button type="button" class="btn btn-light"><a href="{{ route('all/student/list') }}">Back</a></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection