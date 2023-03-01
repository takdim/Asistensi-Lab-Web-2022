<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
<div class="container d-flex align-items-center">

    <h1 class="logo me-auto"><a href="#hero"><span>Furui</span>Books</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar order-last order-lg-0">
    <ul>
        <li><a href="#hero" class="active">Home</a></li>
        <li><a href="#about-us">About Us</a></li>
        <li><a href="#contact">Contact</a></li>

    </ul>

    <div class="header-social-links d-flex">
        <a href="{{ route('login') }}"><i class="bi bi-person-circle" style="padding-right: 9px"></i></a>
    </div>

    {{-- <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li> --}}

</div>
</header><!-- End Header -->