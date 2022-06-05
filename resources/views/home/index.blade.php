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

<main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container">

            <div class="row gy-4">

                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out">
                    <div class="service-item  text-center mx-auto">
                        <div class="icon"><i class="bi bi-people"></i></div>
                        <h4><a href="/dewan-pengurus" class="stretched-link">Dewan <br> Pengurus</a></h4>
                        <p class="fst-italic">Dewan pengurus ASOSIASI PEMERINTAH KOTA SELURUH INDONESIA</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="200">
                    <div class="service-item position-relative text-center mx-auto">
                        <div class="icon"><i class="bi bi-book"></i></div>
                        <h4><a href="/sejarah" class="stretched-link">Sejarah</a></h4>
                        <p class="fst-italic">Sejarah ASOSIASI PEMERINTAH KOTA SELURUH INDONESIA</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="400">
                    <div class="service-item position-relative text-center mx-auto">
                        <div class="icon"><i class="bi bi-file-text"></i></div>
                        <h4><a href="/visi-misi" class="stretched-link">Visi & Misi</a></h4>
                        <p class="fst-italic">Visi & misi ASOSIASI PEMERINTAH KOTA SELURUH INDONESIA</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
                    <div class="service-item position-relative text-center mx-auto">
                        <div class="icon"><i class="bi bi-grid"></i></div>
                        <h4><a href="/lambang" class="stretched-link">Lambang</a></h4>
                        <p class="fst-italic">Lambang/icon ASOSIASI PEMERINTAH KOTA SELURUH INDONESIA</p>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
        <div class="container" data-aos="zoom-out">

            <div class="clients-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="/assets/img/logo-apeksi.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="/assets/img/logo-g20.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="/assets/img/logo-kota-kupang.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="/assets/img/logo-lanjudkan.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="/assets/img/logo-diskominfo.png" class="img-fluid" alt=""></div>
                </div>
            </div>

        </div>
    </section><!-- End Clients Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Our Services</h2>

            </div>

            <div class="row gy-5">

                <div class="col-xl-6 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="service-item">
                        <div class="img">
                            <img src="/assets/img/kegiatan.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="bi bi-activity"></i>
                            </div>
                            <a href="/kegiatan" class="stretched-link">
                                <h3>Kegiatan</h3>
                            </a>
                            <p>List kegiatan RAKER KOMWIL IV Asosiasi Pemerintah Kota Seluruh Indonesia (APEKSI) Tahun
                                2022.</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-6 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="service-item">
                        <div class="img">
                            <img src="/assets/img/wisata.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="bi bi-truck"></i>
                            </div>
                            <a href="/wisata" class="stretched-link">
                                <h3>Wisata</h3>
                            </a>
                            <p>Wisatawan yang berkunjung ke kota Kupang terkesan dengan pesona wisata alam dan wisata
                                kuliner.</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-6 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="service-item">
                        <div class="img">
                            <img src="/assets/img/hotel.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="bi bi-house-door"></i>
                            </div>
                            <a href="/hotel" class="stretched-link">
                                <h3>Hotel</h3>
                            </a>
                            <p>Kota Kupang memiliki 65 hotel yang terdiri atas hotel kelas melati sampai hotel
                                berbintang 4.</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->



                <div class="col-xl-6 col-md-6" data-aos="zoom-in" data-aos-delay="500">
                    <div class="service-item">
                        <div class="img">
                            <img src="/assets/img/restoran.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="bi bi-cup-straw"></i>
                            </div>
                            <a href="/restoran" class="stretched-link">
                                <h3>Restoran</h3>
                            </a>
                            <p>Penyajian makanan bersih dan segar dengan harga yang relatif murah.</p>

                        </div>
                    </div>
                    {!! QrCode::color(255, 0, 0)->generate('nama'); !!}
                </div><!-- End Service Item -->

            </div>

        </div>
    </section><!-- End Services Section -->


</main><!-- End #main -->
@endsection