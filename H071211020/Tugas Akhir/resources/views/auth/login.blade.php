<!doctype html>
<html class="fixed">

<head>

	<!-- Basic -->
	<meta charset="UTF-8">

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

	<!-- Theme CSS -->
	<link rel="stylesheet" href="{{asset('admin/css/theme.css')}}" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="{{asset('admin/css/skins/default.css')}}" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">

	<!-- Head Libs -->
	<script src="{{asset('admin/vendor/modernizr/modernizr.js')}}"></script>

</head>

<body style="padding-top:0px !important;margin-top:0px !important;">
	<!-- start: header -->
	<header class="header bg-dark mt-0 pt-0">
		<div class="logo-container">
			<a href="../2.2.0" class="logo">
				<img src="{{asset('admin/img/infor.png')}}" width="35" height="35" alt="Porto Admin" />
			</a>
			<p class="logo pt-1	text-white">
				<b>Faculty of Information System</b>
			</p>
			<div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
				data-fire-event="sidebar-left-opened">
				<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
			</div>
		</div>
	</header>
	<!-- end: header -->
	<!-- start: page -->
	<section class="body-sign">
		<div class="center-sign">

			<div class="card">
				<div class="card-body">
					<div class="text-center mb-4">
						<b>LOGIN USER</b>
					</div>
					<hr>
					<form method="POST" action="{{ route('login') }}">
						@csrf
						<div class="form-group mb-3">
							<label>Username</label>
							<div class="input-group">
								
                                <input id="username" type="username"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
								<span class="input-group-append">
									<span class="input-group-text">
										<i class="fas fa-user"></i>
									</span>
								</span>
							</div>
						</div>

						<div class="form-group mb-3">
							<div class="clearfix">
								<label class="float-left">Password</label>
								<!-- <a href="pages-recover-password.html" class="float-right">Lost Password?</a> -->
							</div>
							<div class="input-group">
                            <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
								<span class="input-group-append">
									<span class="input-group-text">
										<i class="fas fa-lock"></i>
									</span>
								</span>
							</div>
						</div>

						<div class="row">
							<!-- <div class="col-sm-8">
								<div class="checkbox-custom checkbox-default">
									<input id="RememberMe" name="rememberme" type="checkbox" />
									<label for="RememberMe">Remember Me</label>
								</div>
							</div> -->
							<div class="col-sm-7 text-right">
								<button type="submit" class="btn btn-warning mt-2">login</button>
							</div>
						</div>
						<!-- <p class="text-center">Don't have an account yet? <a href="pages-signup.html">Sign Up!</a></p> -->

					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- end: page -->

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

	<!-- Theme Base, Components and Settings -->
	<script src="{{asset('admin/js/theme.js')}}"></script>

	<!-- Theme Custom -->
	<script src="{{asset('admin/js/custom.js')}}"></script>

	<!-- Theme Initialization Files -->
	<script src="{{asset('admin/js/theme.init.js')}}"></script>

</body>

</html>