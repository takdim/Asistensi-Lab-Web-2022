@extends('FrontEnd.master')

@section('title')
    Furui Books
@endsection

@section('content')
    {{-- ========= Message ========= --}}
    @if (Session::get('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    {{-- ========= Message ========= --}}

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
        <div class="container" data-aos="fade-up">

            <div class="row content">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2>About Us</h2>

                </div>
                <section class="parallax"
                    style="background-color: navy; color:white; padding-left:30px; padding-right:30px; text-align:center">
                    <h5>"JADIKAN KAMI SEBAGAI MITRA PARTNER UNTUK DIVISI VIRTUAL IT ANDA YANG AKAN MEMBANTU ANDA UNTUK
                        MENGHILANGKAN
                        SEGALA MACAM PERMASALAHAN IT YANG SELALU MENGGANGGU PIKIRAN ANDA SEHINGGA ANDA DAPAT FOKUS PADA
                        BISNIS DAN
                        MENINGKATKAN PENJUALAN ANDA"</h5>
                </section>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">


            <div class="row" data-aos="fade-up">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        @foreach ($categories as $cate)
                            <li class="filter">{{ $cate->category_name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row portofolio-container" data-aos="fade-up">

                @foreach ($books as $book)
                    <div class="col-lg-4 col-md-6 portfolio-item">
                        <img src="{{ $book->book_cover }}" class="img-fluid" style="width: 300px; height: 300px">

                        <div class="portfolio-info">

                            <h4>{{ $book->book_name }}</h4>
                            <p>{{ $book->book_synopsis }}</p>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section><!-- End Portfolio Section -->

    <section class="parallax"
        style="background-color: navy; color:white; padding-left:20px; padding-right:20px; text-align:center" id="contact">
        <h5>"Contacts"</h5>
    </section>
@endsection