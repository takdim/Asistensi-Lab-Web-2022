<!doctype html>
<html class="fixed sidebar-left-xs">

<head>

	<!-- Basic -->
	<meta charset="UTF-8">

	<title>Faculty of Information System</title>
	<meta name="keywords" content="HTML5 Admin Template" />
	<meta name="description" content="Porto Admin - Responsive HTML5 Template">
	<meta name="author" content="okler.net">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Web Fonts  -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
		rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="{{asset('admin/vendor/bootstrap/css/bootstrap.css')}}" />
	<link rel="stylesheet" href="{{asset('admin/vendor/animate/animate.css')}}">

	<link rel="stylesheet" href="{{asset('admin/vendor/font-awesome/css/all.min.css')}}" />
	<link rel="stylesheet" href="{{asset('admin/vendor/magnific-popup/magnific-popup.css')}}" />
	<link rel="stylesheet" href="{{asset('admin/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" />

	<!-- Specific Page Vendor CSS -->
	<link rel="stylesheet" href="{{asset('admin/vendor/jquery-ui/jquery-ui.css')}}" />
	<link rel="stylesheet" href="{{asset('admin/vendor/jquery-ui/jquery-ui.theme.css')}}" />
	<link rel="stylesheet" href="{{asset('admin/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css')}}" />
	<link rel="stylesheet" href="{{asset('admin/vendor/morris/morris.css')}}" />
	<link rel="stylesheet" href="{{asset('admin/vendor/summernote/summernote-bs4.css')}}" />


	<!-- Datatable -->
	<link rel="stylesheet" href="{{asset('admin/vendor/datatables/media/css/dataTables.bootstrap4.css')}}" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="{{asset('admin/css/theme.css')}}" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="{{asset('admin/css/skins/default.css')}}" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">

	<!-- Head Libs -->
	<script src="{{asset('admin/vendor/modernizr/modernizr.js')}}"></script>

</head>

<body>
	<section class="body">

		<!-- start: header -->
		<header class="header">
			<div class="logo-container">
				<a href="../2.2.0" class="logo">
					<img src="{{asset('admin/img/infor.png')}}" width="40" height="35" alt="Porto Admin" />
				</a>
				<p class="logo pt-1	">
					<b>Faculty of Information System</b>
				</p>
				<div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
					data-fire-event="sidebar-left-opened">
					<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
				</div>
			</div>

			<!-- start: search & user box -->
			<div class="header-right">


				<span class="separator"></span>

				<div id="userbox" class="userbox">
					<a href="#" data-toggle="dropdown">
						<figure class="profile-picture">
						<img src="{{asset('images/user/'. Auth::user()->foto)}}" alt="Joseph Doe" class="rounded-circle" width="40px" height="40px"
								data-lock-picture="img/!logged-user.jpg">
						</figure>
						<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
							<span class="name">{{Auth::user()->nama}}</span>
							<span class="role">Instruktur</span>
						</div>
						<i class="fa custom-caret"></i>
					</a>
					<div class="dropdown-menu">
						<ul class="list-unstyled mb-2">
							<li class="divider"></li>
							<li>
								<a role="menuitem" tabindex="-1" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <i class="fa fa-sign-out-alt"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- end: search & user box -->
		</header>
		<!-- end: header -->

		<div class="inner-wrapper">
			<!-- start: sidebar -->
			<aside id="sidebar-left" class="sidebar-left">

				<div class="sidebar-header">
					<div class="sidebar-title">
						Navigation
					</div>
					<div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed"
						data-target="html" data-fire-event="sidebar-left-toggle">
						<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>

				<div class="nano">
					<div class="nano-content">
						<nav id="menu" class="nav-main" role="navigation">

							<ul class="nav nav-main">
								<li>

									<a class="nav-link" href="{{Route('halamanInstrukturIndex')}}">

									<a class="nav-link" href="{{Route('halamanInstrukturIndex')}}"> 

										<i class="fas fa-home" aria-hidden="true"></i>
										<span>Home</span>
									</a>
								</li>
								<li>
									<a class="nav-link" href="{{Route('instrukturProfil')}}"> 
										<i class="fas fa-user" aria-hidden="true"></i>
										<span>User</span>
									</a>
								</li>
								<li class="nav-parent">
									<a class="nav-link" href="#">
										<i class="fas fa-book" aria-hidden="true"></i>
										<span>Data Mata Pelajaran</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a class="nav-link" href="{{Route('instrukturMapelIndex')}}">
												Data Mata Pelajaran
											</a>
										</li>
									</ul>
								</li>
								<li class="nav-parent">
									<a class="nav-link" href="#">
										<i class="fas fa-book" aria-hidden="true"></i>
										<span>Tugas dan Kuis</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a class="nav-link" href="{{Route('instrukturTugasSiswaIndex')}}">
												Data Tugas
											</a>
										</li>
										<li>
											<a class="nav-link" href="{{Route('instrukturHasilTesIndex')}}">
												Data Hasil Kuis
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a class="nav-link" href="{{Route('jadwalIndex')}}">
										<i class="fas fa-calendar" aria-hidden="true"></i>
										<span>Jadwal</span>
									</a>
								</li>
							</ul>
						</nav>
					</div>

					<script>
						// Maintain Scroll Position
				            if (typeof localStorage !== 'undefined') {
				                if (localStorage.getItem('sidebar-left-position') !== null) {
				                    var initialPosition = localStorage.getItem('sidebar-left-position'),
				                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');
				                    
				                    sidebarLeft.scrollTop = initialPosition;
				                }
				            }
					</script>


				</div>

			</aside>
			<!-- end: sidebar -->
			@yield('content')

	</section>
	@include('sweetalert::alert')
	<!-- Vendor -->
	<script src="{{asset('admin/vendor/jquery/jquery.js')}}"></script>
	<script src="{{asset('admin/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
	<script src="{{asset('admin/vendor/popper/umd/popper.min.js')}}"></script>
	<script src="{{asset('admin/vendor/bootstrap/js/bootstrap.js')}}"></script>
	<script src="{{asset('admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
	<script src="{{asset('admin/vendor/common/common.js')}}"></script>
	<script src="{{asset('admin/vendor/nanoscroller/nanoscroller.js')}}"></script>
	<script src="{{asset('admin/vendor/magnific-popup/jquery.magnific-popup.js')}}"></script>
	<script src="{{asset('admin/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>

	<!-- Specific Page Vendor -->
	<script src="{{asset('admin/vendor/jquery-ui/jquery-ui.js')}}"></script>
	<script src="{{asset('admin/vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js')}}"></script>
	<script src="{{asset('admin/vendor/jquery-appear/jquery.appear.js')}}"></script>
	<script src="{{asset('admin/vendor/bootstrap-multiselect/js/bootstrap-multiselect.js')}}"></script>
	<script src="{{asset('admin/vendor/jquery.easy-pie-chart/jquery.easypiechart.js')}}"></script>
	<script src="{{asset('admin/vendor/flot/jquery.flot.js')}}"></script>
	<script src="{{asset('admin/vendor/flot.tooltip/jquery.flot.tooltip.js')}}"></script>
	<script src="{{asset('admin/vendor/flot/jquery.flot.pie.js')}}"></script>
	<script src="{{asset('admin/vendor/flot/jquery.flot.categories.js')}}"></script>
	<script src="{{asset('admin/vendor/flot/jquery.flot.resize.js')}}"></script>
	<script src="{{asset('admin/vendor/jquery-sparkline/jquery.sparkline.j')}}s"></script>
	<script src="{{asset('admin/vendor/raphael/raphael.js')}}"></script>
	<script src="{{asset('admin/vendor/morris/morris.js')}}"></script>
	<script src="{{asset('admin/vendor/gauge/gauge.js')}}"></script>
	<script src="{{asset('admin/vendor/snap.svg/snap.svg.js')}}"></script>
	<script src="{{asset('admin/vendor/liquid-meter/liquid.meter.js')}}"></script>
	<script src="{{asset('admin/vendor/jqvmap/jquery.vmap.js')}}"></script>
	<script src="{{asset('admin/vendor/jqvmap/data/jquery.vmap.sampledata.js')}}"></script>
	<script src="{{asset('admin/vendor/jqvmap/maps/jquery.vmap.world.js')}}"></script>
	<script src="{{asset('admin/vendor/jqvmap/maps/continents/jquery.vmap.africa.js')}}"></script>
	<script src="{{asset('admin/vendor/jqvmap/maps/continents/jquery.vmap.asia.js')}}"></script>
	<script src="{{asset('admin/vendor/jqvmap/maps/continents/jquery.vmap.australia.js')}}"></script>
	<script src="{{asset('admin/vendor/jqvmap/maps/continents/jquery.vmap.europe.js')}}"></script>
	<script src="{{asset('admin/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js')}}"></script>
	<script src="{{asset('admin/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js')}}"></script>
	<script src="{{asset('admin/vendor/summernote/summernote-bs4.js')}}"></script>


	<!-- Datatable Scripts -->
	<script src="{{asset('admin/js/examples/examples.datatables.default.js')}}"></script>
	<script src="{{asset('admin/vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('admin/vendor/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js')}}">
	</script>
	<script src="{{asset('admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js')}}">
	</script>
	<script src="{{asset('admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js')}}"></script>
	<script src="{{asset('admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js')}}"></script>
	<script src="{{asset('admin/vendor/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js')}}"></script>
	<script src="{{asset('admin/vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js')}}"></script>
	<script src="{{asset('admin/vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js')}}"></script>
	<!-- Theme Base, Components and Settings -->
	<script src="{{asset('admin/js/theme.js')}}"></script>

	<!-- Theme Custom -->
	<script src="{{asset('admin/js/custom.js')}}"></script>

	<!-- Theme Initialization Files -->
	<script src="{{asset('admin/js/theme.init.js')}}"></script>

	<!-- Examples -->
	<script src="{{asset('admin/js/examples/examples.dashboard.js')}}"></script>

	<!-- Sweetalert -->
	<script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
	@yield('scripts')

</body>

</html>