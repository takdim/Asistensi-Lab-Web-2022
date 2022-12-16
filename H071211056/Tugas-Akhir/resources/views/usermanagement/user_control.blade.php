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
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-user-plus"></i>
                        <span class="nav-text">Manajemen</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('userManagement') }}">Semua Pengguna</a></li>
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
                        <li><a href="about-student.html">Tentang Mahasiswa</a></li>
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
                        <li><a href="about-courses.html">Tambahkan Kelas </a></li>
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
                        <h4>All Users</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="userManagement">Manajemen Pengguna</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('userManagement')}}">Pengguna</a></li>
                    </ol>
                </div>
            </div>
            {{-- message --}}
            {!! Toastr::message() !!}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Pengguna</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Lengkap</th>
                                            <th>Profil</th>
                                            <th>Alamat Email</th>
                                            <th>Nomor Telepon</th>
                                            <th>Status</th>
                                            <th>Role Name</th>
                                            <th class="text-center">Modifikasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <td class="id">{{ ++$key }}</td>
                                                <td class="name">{{ $item->name }}</td>
                                                <td class="name">
                                                    <div class="avatar avatar-xl">
                                                        <img class="rounded-circle" width="35" src="{{ URL::to('/assets/images/'. $item->avatar) }}" alt="{{ $item->avatar }}">
                                                    </div>
                                                </td>
                                                <td class="email">{{ $item->email }}</td>
                                                <td class="phone_number">{{ $item->phone_number }}</td>
                                                @if($item->status =='Active')
                                                <td class="status"><span class="badge bg-success">{{ $item->status }}</span></td>
                                                @endif
                                                @if($item->status =='Disable')
                                                <td class="status"><span class="badge bg-danger">{{ $item->status }}</span></td>
                                                @endif
                                                @if($item->status ==null)
                                                <td class="status"><span class="badge bg-danger">{{ $item->status }}</span></td>
                                                @endif
                                                @if($item->role_name =='Admin')
                                                <td class="role_name"><span  class="badge bg-success">{{ $item->role_name }}</span></td>
                                                @endif
                                                @if($item->role_name =='Super Admin')
                                                <td class="role_name"><span  class="badge bg-info">{{ $item->role_name }}</span></td>
                                                @endif
                                                @if($item->role_name =='Normal User')
                                                <td class="role_name"><span  class=" badge bg-warning">{{ $item->role_name }}</span></td>
                                                @endif
                                                <td class="text-center">
                                                    <a href="{{ route('user/add/new') }}">
                                                        <span class="btn btn-sm btn-info"><i class="la la-plus"></i></span>
                                                    </a>
                                                    <a href="{{ url('view/detail/'.$item->id) }}">
                                                        <span class="btn btn-sm btn-primary"><i class="la la-pencil"></i></span>
                                                    </a>  
                                                    <a href="{{ url('delete_user/'.$item->id) }}" onclick="return confirm('Are you sure to want to delete it?')"><span class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></span></a>
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
        </div>
    </div>
@endsection