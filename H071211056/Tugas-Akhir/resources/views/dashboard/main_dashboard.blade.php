@extends('layouts.master')
@section('content')
    <!-- Sidebar start -->
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
                        <i class="la la-user-plus"></i>
                        <span class="nav-text">Manajemen</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('userManagement') }}">Semua Pengguna</a></li>
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
                        <li><a href="about-student.html">Mengenai Mahasiswa</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-graduation-cap"></i>
                        <span class="nav-text">kelas</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="all-courses.html">Semua Kelas</a></li>
                        <li><a href="add-courses.html">Tambahkan kelas</a></li>
                        <li><a href="edit-courses.html">Edit Kelas</a></li>
                        <li><a href="about-courses.html">Tentang Kelas</a></li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </div>
    <!-- Sidebar end -->
    
    <!-- Content body start -->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-primary">
                        <div class="card-body">
                            <div class="media">
                                <span class="mr-3">
                                    <i class="la la-users"></i>
                                </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">Total Mahasiswa</p>
                                    <h3 class="text-white">80</h3>
                                    <div class="progress mb-2 bg-white">
                                        <div class="progress-bar progress-animated bg-light" style="width: 80%"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-warning">
                        <div class="card-body">
                            <div class="media">
                                <span class="mr-3">
                                    <i class="la la-user"></i>
                                </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">Mahasiswa Baru</p>
                                    <h3 class="text-white">65</h3>
                                    <div class="progress mb-2 bg-white">
                                        <div class="progress-bar progress-animated bg-light" style="width: 50%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-secondary">
                        <div class="card-body">
                            <div class="media">
                                <span class="mr-3">
                                    <i class="la la-graduation-cap"></i>
                                </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">Total Kelas</p>
                                    <h3 class="text-white">28</h3>
                                    <div class="progress mb-2 bg-white">
                                        <div class="progress-bar progress-animated bg-light" style="width: 76%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">To</span>
                                        </div>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Mata Kuliah</span>
                                        </div>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="summernote"></div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="fallback w-100">
                                            <input type="file" class="dropify" data-default-file="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-primary float-right">
                                            Kirim <i class="fa fa-paper-plane-o"></i>
                                        </button>									
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Ujian Terbaik</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table verticle-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">NIM</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>542</td>
                                            <td>Muhammad Fikri</td>
                                            <td><span id="widget_sparklinedash"><canvas></canvas></span></td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>243 </td>
                                            <td>Ajim</td>
                                            <td><div class="ico-sparkline"><div id="widget_spark-bar"></div></div></td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>452 </td>
                                            <td>Mursyid</td>
                                            <td><div class="ico-sparkline"><div id="widget_StackedBarChart"></div></div></td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>124</td>
                                            <td>Aulia</td>
                                            <td> <div class="ico-sparkline"> <div id="widget_tristate"></div></div></td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>234</td>
                                            <td>Fauzi</td>
                                            <td> <div class="ico-sparkline"> <div id="widget_composite-bar"></div> </div> </td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Mahasiswa Baru</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive recentOrderTable">
                                <table class="table verticle-middle table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Dosen Pengampu</th>
                                            <th scope="col">Tanggal</th>
                        
                                            <th scope="col">Mata Kuliah</th>
                                            
                                            <th scope="col">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td>Asanehem</td>
                                            <td>Gojo Satoru</td>
                                            <td>01 Augustus 2022</td>
                                         
                                            <td>Basis Data</td>
                                        
                                            <td>
                                                <a href="edit-student.html" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>02 </td>
                                            <td>Jimmy</td>
                                            <td>Ramos</td>
                                            <td>31 Juli 2022</td>
                                    
                                            <td>UI/UX</td>
                                        
                                            <td>
                                                <a href="edit-student.html" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>03 </td>
                                            <td>Nashid Martines</td>
                                            <td>Ashton Cox</td>
                                            <td>30 Juli 2022</td>
                            
                                            <td>Technooreneurship</td>
                                            <td>
                                                <a href="edit-student.html" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>04</td>
                                            <td>Muhammad ahmad</td>
                                            <td>Fikri</td>
                                            <td>29 Juli 2022</td>
                                       
                                            <td>Pemrograman Web</td>
                                           
                                            <td>
                                                <a href="edit-student.html" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>05</td>
                                            <td>Ahmad kasim</td>
                                            <td>Beno </td>
                                            <td>28 Juli 2022</td>
                            
                                            <td>Matematika Dasar</td>
                                            <td>
                                                <a href="edit-student.html" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                            </td>
                                        </tr>
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