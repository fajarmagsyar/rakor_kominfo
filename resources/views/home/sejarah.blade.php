@extends('home.layouts.main')
@section('isi')
    <section id="hero-static" class="hero-static d-flex align-items-center">
        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
            data-aos="zoom-out">
            <h2>Selamat Datang di <span>APEKSI</span></h2>
            <p>RAPAT KERJA KOMISARIAT WILAYAH IV ASOSIASI PEMERINTAH KOTA SELURUH INDONESIA (APEKSI) DI KOTA KUPANG.</p>
            <div class="d-flex">
                <a href="#about" class="btn-get-started scrollto">Login</a>
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
                    class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch
                        Video</span></a>
            </div>
        </div>
    </section>

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Sejarah</h2>
                    <hr>
                </div>

                <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">
                    <img src="/assets/img/sejarah-apeksi.png" class="img-fluid" alt="">
                </div>

            </div>
        </section><!-- End About Section -->
    </main><!-- End #main -->
@endsection
