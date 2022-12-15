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
                        <li><a href="add-professor.html">Tambahkan Dosen </a></li>
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
                        <li><a href="{{ route('student/about') }}">Tentang Mahasiswa</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-graduation-cap"></i>
                        <span class="nav-text">Kelas</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="all-courses.html">Semua Kelas</a></li>
                        <li><a href="add-courses.html">Tambahkan Kelas</a></li>
                        <li><a href="edit-courses.html">Edit kelas</a></li>
                        <li><a href="about-courses.html">Tentang Kelas</a></li>
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
                        <h4>View Update pengguna</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Pengguna</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">View Pengguna</a></li>
                    </ol>
                </div>
            </div>
            {{-- message --}}
            {!! Toastr::message() !!}
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detail view Pengguna</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data[0]->id }}">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Nama Lengkap</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control"
                                                        placeholder="Name" id="first-name-icon" name="fullName" value="{{ $data[0]->name }}">
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-md-4">
                                            <label>foto</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-lefts">
                                                <div class="position-relative">
                                                    <input type="file" class="form-control"
                                                    placeholder="Name" id="first-name-icon" name="image"/>
                                                    <div class="avatar avatar-xl">
                                                        <img class="rounded-circle" width="35" src="{{ URL::to('/assets/images/'. $data[0]->avatar) }}">
                                                    </div>
                                                    <input type="hidden" name="hidden_image" value="{{ $data[0]->avatar }}">
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-md-4">
                                            <label>Alamat Email</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="email" class="form-control" placeholder="Email" id="first-name-icon" name="email" value="{{ $data[0]->email }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nomor Telepon</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="number" class="form-control" placeholder="Mobile" name="phone_number" value="{{ $data[0]->phone_number }}">
                                                </div>
                                            </div>
                                        </div>
            
                                    
                                        <div class="col-md-8">
                                            <div class="form-group position-relative has-icon-left">
                                                <fieldset class="form-group">
                                                    <select class="form-select" name="status" id="status">
                                                        <option value="{{ $data[0]->status }}" {{ ( $data[0]->status == $data[0]->status) ? 'selected' : ''}}> 
                                                            {{ $data[0]->status }}
                                                        </option>
                                                        @foreach ($userStatus as $key => $value)
                                                        <option value="{{ $value->type_name }}"> {{ $value->type_name }}</option>
                                                        @endforeach  
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
    
                                    
    
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit"
                                                class="btn btn-primary me-1 mb-1">Update</button>
                                                <a  href="{{ route('userManagement') }}"
                                                class="btn btn-light-secondary me-1 mb-1">Back</a>
                                        </div>
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