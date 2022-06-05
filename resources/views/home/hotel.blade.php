@extends('home.layouts.main')
@section('isi')
    <section id="hero-static" class="hero-static d-flex align-items-center">
        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
            data-aos="zoom-out">
            <h2>Selamat Datang di <span>Hotel</span></h2>
            <p>RAPAT KERJA KOMISARIAT WILAYAH IV ASOSIASI PEMERINTAH KOTA SELURUH INDONESIA (APEKSI) DI KOTA KUPANG.</p>
            <div class="d-flex">
                <a href="#about" class="btn-get-started scrollto">Login</a>
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
                    class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch
                        Video</span></a>
            </div>
        </div>
    </section>

    <main id="main">       

        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-blog-posts" class="recent-blog-posts">

            <div class="container" data-aos="fade-up">

                <div class="row">
                    @foreach ($fasilitasRows as $fasilitasRow)
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="post-box">
                            <div class="post-img"><img src="{{ $fasilitasRow->foto }}" class="img-fluid"
                                    alt=""></div>
                            
                            <h3 class="post-title">{{ $fasilitasRow->nama_fasilitas }}</h3>
                            <p>{!! substr($fasilitasRow->deskripsi, 0, 80)  !!}...</p>
                            <a href="/hotel-single/{{ $fasilitasRow->fasilitas_id}}" class="readmore stretched-link"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                   @endforeach

                </div>

            </div>

        </section><!-- End Recent Blog Posts Section -->

     

    </main><!-- End #main -->
@endsection
