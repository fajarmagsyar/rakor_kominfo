@extends('home.layouts.main')
@section('isi')
    <style>
        .timeline-steps {
            display: flex;
            justify-content: center;
            flex-wrap: wrap
        }

        .timeline-steps .timeline-step {
            align-items: center;
            display: flex;
            flex-direction: column;
            position: relative;
            margin: 1rem
        }

        @media (min-width:768px) {
            .timeline-steps .timeline-step:not(:last-child):after {
                content: "";
                display: block;
                border-top: .25rem dotted #3b82f6;
                width: 3.46rem;
                position: absolute;
                left: 7.5rem;
                top: .3125rem
            }

            .timeline-steps .timeline-step:not(:first-child):before {
                content: "";
                display: block;
                border-top: .25rem dotted #3b82f6;
                width: 3.8125rem;
                position: absolute;
                right: 7.5rem;
                top: .3125rem
            }
        }

        .timeline-steps .timeline-content {
            width: 10rem;
            text-align: center
        }

        .timeline-steps .timeline-content .inner-circle {
            border-radius: 1.5rem;
            height: 1rem;
            width: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #3b82f6
        }

        .timeline-steps .timeline-content .inner-circle:before {
            content: "";
            background-color: #3b82f6;
            display: inline-block;
            height: 3rem;
            width: 3rem;
            min-width: 3rem;
            border-radius: 6.25rem;
            opacity: .5
        }

        /* SLIDER */

        .test {
            position: relative;
            z-index: 10;
            padding-top: 100px;
            padding-bottom: 100px;
        }

        .content {
            pointer-events: none;
            color: #fff;
        }

        .content>* {
            pointer-events: auto;
        }

        .title {
            display: inline-block;
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 3em;
        }

        .text {
            max-width: 80%;
            margin-top: 0;
            margin-bottom: 20px;
        }

        .slider-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden
        }

        .slider.swiper-container {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            animation-name: resize;
            animation-duration: 10s;
            animation-iteration-count: infinite;
            animation-direction: alternate;
        }

        .test-block {
            position: fixed;
            left: 0;
            top: 0;
            display: none;
            width: 100%;
            height: 100vh;
            background-color: rgba(0, 0, 0, .5);
        }

        .slide {
            overflow: hidden;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-color: lightgray;
        }

        .slide-1 {
            background-image: url("/assets/img/swiper/slider-1.jpg");
        }

        .slide-2 {
            background-image: url("/assets/img/swiper/slider-2.jpg");
        }

        .slide-3 {
            background-image: url("/assets/img/swiper/slider-3.jpg");
        }

        .swiper-pagination-bullets .swiper-pagination-bullet {
            width: 10px;
            height: 10px;
            background-color: #fff;
        }

        @keyframes resize {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.1);
            }
        }
    </style>


    @if (session()->has('kegiatan_success'))
        <script>
            Swal.fire('Berhasil', 'Registrasi dan pemilihan kegiatan anda telah selesai!', 'success');
        </script>
    @endif


    <div class="top-wrapper">


        <div class="slider-wrapper">
            <div class="js-hero-swiper swiper-container slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide slide slide-1"></div>
                    <div class="swiper-slide slide slide-2"></div>
                    <div class="swiper-slide slide slide-3"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>


    <section id="hero-static" class="hero-static d-flex align-items-center">

        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
            data-aos="zoom-out">
            <img src="/assets/img/logo-diskominfo.png" style="max-width: 250px;">
            <br>
            <h2 class="text-white"><span class="text-white">Selamat Datang di</span> <b>RAKOR KOMINFO PROV. NTT</b></h2>
            <p class="text-white">RAPAT KOORDINASI BIDANG KOMUNIKASI DAN INFORMATIKA TINGKAT PROVINSI NUSA TENGGARA TIMUR
            </p>

            <div class="d-flex">
                <a href="/registrasi" class="btn-get-started scrollto"><i class="bi bi-book"></i> Registrasi</a>
            </div>
            <div class="row mt-4">
                <center style="opacity: 0.6; color: white" class="mb-3">atau unduh ID Card anda?</center>
                <div class="col-12">
                    <form action="/download-qr" method="post">
                        @csrf
                        <div class="input-group rounded">
                            <input type="search" name="no_hp" class="form-control rounded"
                                placeholder="No. HP yang terdaftar" aria-label="Search" aria-describedby="search-addon" />
                            <button type="submit" class="input-group-text border-0" id="search-addon">
                                <i class="bi bi-search"></i>
                            </button>

                        </div>
                    </form>
                    @if (session()->has('failed'))
                        <br>
                        <div class="mt-1 alert alert-danger alert-dismissible text-sm">

                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16"
                                role="img" aria-label="Warning:">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>No HP anda tidak ditemukan
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <main id="main">

        <!-- ======= Featured Services Section ======= -->
        {{-- <section id="featured-services" class="featured-services">
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
        </section><!-- End Featured Services Section --> --}}

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients">
            <div class="container" data-aos="zoom-out"
                style="background-color: white !important; padding: 40px; border-radius: 30px; margin-top: 30px !important">
                <center class="text-muted">Supported By</center>
                <br>
                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="/assets/img/logo-kominfo.png" class="img-fluid"
                                alt="Logo KOMINFO">
                        </div>
                        <div class="swiper-slide"><img src="/assets/img/logo-provntt.png" class="img-fluid"
                                alt="Logo Provinsi NTT">
                        </div>
                        <div class="swiper-slide"><img src="/assets/img/logo-kota-kupang.png" class="img-fluid"
                                alt="Logo Kota Kupang">
                        </div>
                        <div class="swiper-slide"><img src="/assets/img/logo-diskominfo.png" class="img-fluid"
                                alt="Logo DISKOMINFO Kota Kupang"></div>

                        <div class="swiper-slide"><img src="/assets/img/logo-biznet.png" class="img-fluid"
                                alt="Logo Biznet"></div>

                        <div class="swiper-slide"><img src="/assets/img/logo-grab.png" class="img-fluid" alt="Logo Grab">
                        </div>

                        <div class="swiper-slide"><img src="/assets/img/logo-tenun.png" class="img-fluid"
                                alt="Logo Padu Padan Tenun"></div>

                        <div class="swiper-slide"><img src="/assets/img/logo-molecule.png" class="img-fluid"
                                alt="Logo Molecule"></div>

                        <div class="swiper-slide"><img src="/assets/img/kupang-intermedia.png" class="img-fluid"
                                alt="Logo Kupang Intermedia"></div>
                    </div>
                </div>

            </div>
        </section><!-- End Clients Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services" style="background-color: white">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8" data-aos="fade-up" data-aos-delay="600">

                        <iframe width="100%" height="476" style="border-radius: 20px" class="shadow-lg"
                            src="https://www.youtube.com/embed/MesuZhgz4JA" title="Pengembangan SODAMOLEK V2.0"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                    <div class="col-sm-4 my-auto" data-aos="fade-right">

                        <h3 style="border-left: 60px solid #0d92ff; padding-left: 10px;"><b>SODAMOLEK <span
                                    class="text-danger text-xs">V.20</span></b>
                        </h3>
                        <p>Video pengenalan singkat mengenai pengembangan SODAMOLEK V.20 untuk perluasan fitur dan
                            fungsionalitas.</p>
                        <a href="https://sodamolekv2.kupangkota.go.id" target="_blank">> Kunjungi SODAMOLEK</a>
                    </div>


                </div>

                <div class="row mt-4">
                    <div class="col-sm-12 my-auto mt-3">

                        <div class="section-header" data-aos="fade-up">
                            <h2>Timeline Nilai Total Indeks SPBE</h2>
                            <p>
                                Submit hasil penilaian mandiri penyelenggaraan sistem pemerintahan berbasis elektronik
                                (SPBE) dari tahun 2019 - 2022 dari Kementrian Pendayagunaan Aparatur Negara dan Reformasi
                                Birokrasi
                                Republik Indonesia.
                            </p>
                        </div>
                        <div class="col">
                            <div class="timeline-steps aos-init aos-animate">
                                <div class="timeline-step" data-aos="fade-up" data-aos-delay="100">
                                    <div class="timeline-content" data-toggle="popover" data-trigger="hover"
                                        data-placement="top" title=""
                                        data-content="And here's some amazing content. It's very engaging. Right?"
                                        data-original-title="2003">
                                        <div class="inner-circle"></div>
                                        <p class="h6 mt-3 mb-1">2019</p>
                                        <p class="h3 text-muted mb-0 mb-lg-0">1.47</p>
                                    </div>
                                </div>
                                <div class="timeline-step" data-aos="fade-up" data-aos-delay="200">
                                    <div class="timeline-content" data-toggle="popover" data-trigger="hover"
                                        data-placement="top" title=""
                                        data-content="And here's some amazing content. It's very engaging. Right?"
                                        data-original-title="2004">
                                        <div class="inner-circle"></div>
                                        <p class="h6 mt-3 mb-1">2020</p>
                                        <p class="h3 text-muted mb-0 mb-lg-0">n/a</p>
                                    </div>
                                </div>
                                <div class="timeline-step" data-aos="fade-up" data-aos-delay="300">
                                    <div class="timeline-content" data-toggle="popover" data-trigger="hover"
                                        data-placement="top" title=""
                                        data-content="And here's some amazing content. It's very engaging. Right?"
                                        data-original-title="2004">
                                        <div class="inner-circle"></div>
                                        <p class="h6 mt-3 mb-1">2021</p>
                                        <p class="h3 text-muted mb-0 mb-lg-0">n/a</p>
                                    </div>
                                </div>
                                <div class="timeline-step" data-aos="fade-up" data-aos-delay="500">
                                    <div class="timeline-content" data-toggle="popover" data-trigger="hover"
                                        data-placement="top" title=""
                                        data-content="And here's some amazing content. It's very engaging. Right?"
                                        data-original-title="2005">
                                        <div class="inner-circle"></div>
                                        <p class="h6 mt-3 mb-1">2022</p>
                                        <p class="h1 text-primary mb-0 mb-lg-0"><b>2.784</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Services Section -->

        <section data-aos="fade-up">
            <div class="container-fluid"
                style="background: rgb(2,0,36); background: linear-gradient(152deg, rgba(2,0,36,1) 0%, rgba(6,72,85,1) 100%)">

                <div class="row mt-4">
                    <div class="col-sm-12 my-auto mt-3">

                        <div class="section-header mt-4" data-aos="fade-up" data-aos-delay="500">
                            <br>
                            <h2 class="text-white mt-3"><b>Command Center</b></h2>
                            <p>
                                Pusat informasi yang mengintegrasikan berbagai layanan elektronik di Kota Kupang kedalam
                                sebuah sistem terpadu.
                            </p>
                        </div>
                        <div class="row" data-aos="fade-up" data-aos-delay="1000">
                            <div class="col-sm-12 text-center">
                                <img src="/assets/img/command-center.png" alt="" style="max-width: 400px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section data-aos="fade-up">
            <div class="container-fluid"
                style="background: rgb(71,42,150); background: linear-gradient(152deg, rgba(71,42,150,1) 0%, rgba(22,4,73,1) 100%);">

                <div class="row mt-4">
                    <div class="col-sm-12 my-auto mt-3">

                        <div class="section-header mt-4" data-aos="fade-up" data-aos-delay="500">
                            <div class="row" data-aos="fade-up" data-aos-delay="1000">
                                <div class="col-lg-6 text-center">
                                    <img src="/assets/img/sihebat.png" alt="Showcase Sihebat" style="max-width: 400px">
                                </div>
                                <div class="col-lg-6 text-start text-white my-auto text-white p-3">
                                    <div class="mb-3">
                                        <img src="/assets/img/sihebat-logo.png" alt="Showcase Sihebat"
                                            style="max-width: 300px">
                                    </div>
                                    <span class="text-white">Sistem yang dibuat sebagai pengganti voucher BBM yang dapat
                                        dipasang di perangkat
                                        masing-masing ASN di Kota Kupang.</span>
                                    <br>
                                    <br>
                                    <span class="text-white">Dengan SIHEBAT Anggaran BBM yang dikeluarkan oleh Pemerintah
                                        Kota
                                        Kupang ditahun 2022.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Seputar #KotaKupang</h2>

                </div>

                <div class="row gy-5">

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
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
                                <p>List kegiatan RAKOR Bidang Komunikasi dan Informatika Provinsi Nusa Tenggara Timur
                                    Tahun
                                    2023.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
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

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
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

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="500">
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

                    </div><!-- End Service Item -->

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="500">
                        <div class="service-item">
                            <div class="img">
                                <img src="/assets/img/kesehatan.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="bi bi-hospital"></i>
                                </div>
                                <a href="/faskes" class="stretched-link">
                                    <h3>Kesehatan</h3>
                                </a>
                                <p>Sarana pelayanan kesehatan milik pemerintah maupun yang dikelola oleh swasta.</p>

                            </div>
                        </div>

                    </div><!-- End Service Item -->

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="500">
                        <div class="service-item">
                            <div class="img">
                                <img src="/assets/img/belanja.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="bi bi-cart"></i>
                                </div>
                                <a href="/pusper" class="stretched-link">
                                    <h3>Perbelanjaan</h3>
                                </a>
                                <p>Pusat perbelanjaan bukan hanya sebagai tempat belanja tetapi juga sarana entertainment.
                                </p>

                            </div>
                        </div>

                    </div><!-- End Service Item -->


                </div>
            </div>
        </section><!-- End Services Section -->

        {{-- <section id="galeri" class="portfolio" data-aos="fade-up">
            <div class="container">
                <div class="section-header">
                    <h2>Galeri Rakor KOMINFO</h2>
                </div>
            </div>
            <div class="container" data-aos="fade-up" data-aos-delay="200">
                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                    data-portfolio-sort="original-order">
                    <div class="row g-0 portfolio-container">


                        @forelse ($GaleriRows as $galeri)
                            <a href="{{ $galeri->foto }}" data-gallery="portfolio-gallery"
                                class="glightbox preview-link">
                                <div
                                    class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-{{ strtolower($galeri->kategori) }}">
                                    <img src="{{ $galeri->foto }}" class="img-fluid" alt="">
                                </div>
                            </a>
                        @empty
                            <center>
                                <h3>Belum ada foto</h3>
                            </center>
                        @endforelse

                    </div>
                </div>
            </div>
        </section> --}}


        <section id="galeri" class="portfolio" data-aos="fade-up">
            <div class="container">
                <a href="#" id="grab" data-aos="zoom-in">
                    <img src="/assets/img/grab.jpg" class="shadow" style="border-radius: 10px" width="100%"
                        alt="">
                </a>
                <br>
                <br>
                <a href="{{ $spotlight ? '/pusper-single/' . $spotlight->fasilitas_id : 'https://wa.me/6285158358552' }}"
                    data-aos="zoom-in">
                    <img src="/assets/img/tenun.jpg" class="shadow" style="border-radius: 10px" width="100%"
                        alt="">
                </a>
            </div>
        </section>
    </main><!-- End #main -->

    <script>
        $(document).ready(function() {
            $('#grab').on('click', function() {

                var userAgent = navigator.userAgent || navigator.vendor || window.opera;

                // Windows Phone must come first because its UA also contains "Android"
                if (/windows phone/i.test(userAgent)) {
                    return window.location.href =
                        'market://launch?id=com.grabtaxi.passenger';
                }

                if (/android/i.test(userAgent)) {

                    window.location.href =
                        'market://launch?id=com.grabtaxi.passenger';
                }

                // iOS detection from: http://stackoverflow.com/a/9039885/177710
                if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
                    return window.location.href = 'https://apps.apple.com/id/app/grab-superapp/id647268330';
                }

                return window.location.href =
                    'https://play.google.com/store/apps/details?id=com.grabtaxi.passenger';

            })
        });
    </script>
@endsection
