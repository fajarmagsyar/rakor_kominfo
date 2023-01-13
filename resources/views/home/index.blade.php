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
    </style>
    @if (session()->has('kegiatan_success'))
        <script>
            Swal.fire('Berhasil', 'Registrasi dan pemilihan kegiatan anda telah selesai!', 'success');
        </script>
    @endif
    <!-- ======= Testimonials Section ======= -->
    {{-- <section id="testimonials" class="testimonials" style="margin-top: 100px;">
        <div class="container" data-aos="fade-up">

            <div class="testimonials-slider swiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="assets/img/tirosa.jpg" class="testimonial-img" alt="">
                            <h3>Bundaran Tirosa</h3>
                            <h4>Jl. Bund. PU No.1, Tuak Daun Merah, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim. 85228</h4>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                Melambangkan tiga suku bangsa asli di Nusa Tenggara Timur yaitu Timor, Rote dan Sabu. Patung
                                ini berdiri megah di tengah bundaran PU di kota Kupang.
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="assets/img/ina-boi.jpg" class="testimonial-img" alt="">
                            <h3>Taman Ina Bo'i</h3>
                            <h4>Jl. RA Kartini, Klp. Lima, Kec. Klp. Lima, Kota Kupang, Nusa Tenggara Tim.</h4>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                Dalam patung tersebut terdapat 3 komponen yaitu Patung Sasando berukuran besar (6 meter),
                                patung sasando kecil (2 meter) dan patung perempuan tinggi 3 meter yang sedang duduk bermain
                                sasando kecil.
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="assets/img/uisneno.jpg" class="testimonial-img" alt="">
                            <h3>Taman Patung Kasih / Tugu Merpati</h3>
                            <h4>Jalan Adi Sucipto, Kelapa Lima, Penfui, Kec. Maulafa, Kota Kupang, Nusa Tenggara Tim.</h4>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                Taman Patung Kasih dengan penambahan Tulisan Uisneno Nokan Kit yang berarti Tuhan Memberkati
                                Kita dan ada pula patung berbentuk orang di sekelilingnya berjumlah 6 biji, yang maknanya
                                terdapat enam suku besar di NTT yakni Sabu, Rote, Alor, Sumba, Flores dan Timor.
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="assets/img/taman-tagepe.jpg" class="testimonial-img" alt="">
                            <h3>Taman Tagepe</h3>
                            <h4>Klp. Lima, Kec. Klp. Lima, Kota Kupang, Nusa Tenggara Tim.</h4>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                Desain fotogenik salah satu ikon ditaman tagepe yakni bentuk persegi yang pasang berjejer
                                dan kelihatan seperti berputar 360 derajat.
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="assets/img/alun.jpg" class="testimonial-img" alt="">
                            <h3>Alun-Alun Kota</h3>
                            <h4>Klp. Lima, Kec. Klp. Lima, Kota Kupang, Nusa Tenggara Tim.</h4>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                Lokasi alun alun Kota Kupang, kini menjadi salah satu tempat hiburan warga Kota Kupang.
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section --> --}}

    <section id="hero-static" class="hero-static d-flex align-items-center">
        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
            data-aos="zoom-out">
            <img src="/assets/img/logo-diskominfo.png" style="max-width: 250px">
            <br>
            <h2>Selamat Datang di <span>RAKOR KOMINFO NTT</span></h2>
            <p>RAPAT KERJA KOMISARIAT DINAS KOMUNIKASI DAN INFORMATIKA SELURUH NUSA TENGGARA TIMUR DI KOTA KUPANG.</p>

            <div class="d-flex">
                <a href="/registrasi" class="btn-get-started scrollto"><i class="bi bi-book"></i> Registrasi</a>
            </div>
            <div class="row mt-4">
                <center style="opacity: 0.6" class="mb-3">atau unduh ID Card anda?</center>
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
            <div class="container" data-aos="zoom-out">

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="/assets/img/logo-g20.png" class="img-fluid" alt="Logo G20">
                        </div>
                        <div class="swiper-slide"><img src="/assets/img/logo-kota-kupang.png" class="img-fluid"
                                alt="Logo Kota Kupang">
                        </div>
                        <div class="swiper-slide"><img src="/assets/img/logo-diskominfo.png" class="img-fluid"
                                alt="Logo DISKOMINFO Kota Kupang"></div>
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
                            src="https://www.youtube.com/embed/i-c3VR-t0lI" title="Pengembangan SODAMOLEK V2.0"
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
            <div class="container-fluid" style="background-color: black">

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
                                <img src="/assets/img/command-center.png" alt="">
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
                    <h2>Our Services</h2>

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
                                <p>List kegiatan RAKER KOMWIL IV Asosiasi Pemerintah Kota Seluruh Indonesia (APEKSI) Tahun
                                    2022.</p>
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

        <section id="galeri" class="portfolio" data-aos="fade-up">
            <div class="container">
                <div class="section-header">
                    <h2>Galeri Apeksi 2022</h2>
                </div>
            </div>
            <div class="container" data-aos="fade-up" data-aos-delay="200">
                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                    data-portfolio-sort="original-order">
                    <ul class="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-praker">Pra Raker</li>
                        <li data-filter=".filter-raker">Raker</li>
                    </ul>
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
                        @endforelse

                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
