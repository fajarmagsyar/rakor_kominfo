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

    <style>
        a {
            text-decoration: none;
        }

        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        button {
            border: none;
            background: none;
            cursor: pointer;
        }

        ul,
        li {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        *:focus {
            outline: 0;
            border: 0;
        }

        *:focus-visible {
            outline: 0;
            border: 0;
        }

        html,
        body {
            padding: 0;
            font-family: "OpenSans";
            color: #333333;
        }

        .content-accordion {
            max-width: 1440px;
            margin: 0 auto;
        }

        .burger {
            margin-bottom: 10px;
        }

        .nav-list {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 554px;
            font-size: 24px;
            color: white;
            background: black;
            padding: 10px 10px;
            z-index: 2;
            opacity: 98%;
        }

        .nav-list {
            transform: translateY(-100%);
            transition: transform 0.3s linear;
        }

        .nav-list__item:first-child {
            margin-bottom: 40px;
        }

        .nav-list__item {
            margin-bottom: 20px;
        }

        .nav-list__active {
            transform: none;
            transition: transform 0.3s ease-in-out;
        }

        .swiper {
            margin-bottom: 30px;
        }

        .top-content {
            display: flex;
            justify-content: space-between;
            text-align: center;
            position: absolute;
            background: white;
            padding: 10px;
            z-index: 10;
            top: 10px;
            right: 20px;
            box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.77);
            border-radius: 15px;
        }

        .swiper-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 8px;
            background: transparent;
            border: 2px solid orange;
            border-radius: 100%;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }

        .swiper-button__prev {
            margin-right: 15px;
        }

        .logotype {
            display: block;
            margin-right: 15px;
            transition: transform 0.2s ease-in-out;
        }

        .logotype:hover {
            transform: scale(1.1);
            transition: transform 0.2s ease-in-out;
        }

        .swiper__image {
            background-image: url("https://images.wallpaperscraft.com/image/single/refueling_night_dark_151920_1920x1080.jpg");
            background-size: cover;
        }

        .swiper__image:nth-child(2) {
            background-image: url("https://news-cdn.softpedia.com/images/news2/here-are-all-windows-11-wallpapers-533253-2.jpg");
        }

        .swiper__image:last-child {
            background-image: url("https://marmotamaps.com/de/fx/wallpaper/download/faszinationen/Marmotamaps_Wallpaper_Berchtesgaden_Desktop_1920x1080.jpg");
        }

        .swiper__content {
            padding: 100px 70px;
        }

        .swiper__title {
            position: relative;
            max-width: 60%;
            font-size: 80px;
            font-weight: 400;
            color: white;
            padding: 20px;
            margin: 0 0 15px;
        }

        .swiper__title::after {
            position: absolute;
            content: "";
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: black;
            opacity: 80%;
            z-index: -1;
            border-radius: 20px;
            box-shadow: 0px 0px 27px 0px rgba(0, 0, 0, 0.77);
        }

        .swiper-button {
            display: block;
            position: relative;
            max-width: 15%;
            height: 100%;
            text-align: center;
            color: black;
            font-size: 18px;
            font-weight: bold;
            padding: 20px;
            border-radius: 20px;
            transition: all 0.5s ease-in-out;
            overflow: hidden;
            box-shadow: 0px 0px 27px 0px rgba(0, 0, 0, 0.77);
        }

        .swiper-button__link {
            position: relative;
            z-index: 10;
            color: white;
            transition: all 0.5s ease-in-out;
        }

        .swiper-button:hover .swiper-button__link {
            position: relative;
            z-index: 10;
            color: black;
            transition: all 0.5s ease-in-out;
        }

        .swiper-pagination-bull {
            display: flex;
            position: absolute;
            justify-content: center;
            width: 100%;
            z-index: 10;
            margin-bottom: 10px;
        }

        .bull {
            display: block;
            position: relative;
            background: white;
            z-index: 12;
            width: 15px;
            height: 15px;
            border-radius: 100%;
            opacity: 70%;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .bull:not(:last-child) {
            margin-right: 10px;
        }

        .bull:hover {
            opacity: 100%;
            transition: all 0.3s ease-in-out;
        }

        .bull:focus {
            outline: none;
        }

        .bull-active::before {
            position: absolute;
            content: "";
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border: 2px solid #fff;
            border-radius: 100%;
            transition: all 0.3s ease-in-out;
        }

        .bull-active {
            background: orange;
            opacity: 100%;
        }

        /* EFFECTS */
        /* ----Стрелки слайдера---- */
        .swiper-btn:hover {
            background: orange;
            transition: all 0.2s ease-in-out;
        }

        .swiper-btn:hover svg path {
            stroke: #a64b00;
            transition: all 0.2s ease-in-out;
        }

        .swiper-btn:active {
            background: #ff7400;
            border-color: #ff7400;
            transition: all 0.2s ease-in-out;
        }

        .swiper-btn:active svg path {
            stroke: #fff;
            transition: all 0.2s ease-in-out;
        }

        .swiper-btn:focus:not(:active) {
            background: #000;
            border-color: #000;
            transition: all 0.2s ease-in-out;
            outline: none;
        }

        .swiper-btn:focus:not(:active) svg path {
            stroke: #fff;
            transition: all 0.2s ease-in-out;
        }

        .swiper-btn:disabled {
            border-color: grey;
            background: grey;
            opacity: 30%;
            cursor: not-allowed;
        }

        .swiper-btn:disabled svg path {
            stroke: black;
        }

        /* ----Кнопка заказать расчёт---- */
        .swiper-button:hover::after {
            transform: translateY(0);
        }

        .swiper-button::after {
            background: linear-gradient(90deg, #ff8400 0, #ffb464);
            position: absolute;
            content: "";
            z-index: 1;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            transform: translateY(-100%);
            transition: transform 0.5s cubic-bezier(0.19, 1, 0.22, 1);
        }

        .swiper-button::before {
            position: absolute;
            content: "";
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: black;
            opacity: 80%;
        }

        .swiper-button:hover .swiper-button__link {
            position: relative;
            z-index: 10;
            color: black;
            transition: all 0.5s ease-in-out;
        }

        /* Буллиты */
        .bull:hover {
            opacity: 100%;
            transition: all 0.3s ease-in-out;
        }

        .bull:focus {
            outline: none;
        }

        /* Аккордеон */

        .accordion {
            border-bottom: 1px solid orange;
        }

        .accordion__header {
            display: flex;
            justify-content: space-between;
            padding: 15px 10px;
            align-items: center;
            border-top: 1px solid orange;
        }

        .accordion__title {
            font-size: 16px;
            color: orange;
            margin: 0;
        }

        .accordion__icons {
            border-radius: 100%;
            border: 2px solid orange;
            padding: 6px 7px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .accordion__icons:hover svg path {
            stroke: black;
            transition: all 0.3s ease-in-out;
        }

        .accordion__header:hover .accordion__icons {
            background: orange;
            transition: all 0.3s ease-in-out;
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

    <div class="container-fluid" style="border-radius: 100px !important">
        <div class="swiper" style="margin-top: 100px">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide swiper__image">
                    <div class="swiper__content" data-swiper-parallax="-800" data-swiper-parallax-duration="600">
                        <h2 class="swiper__title">Bundaran Patung TIROSA</h2>
                        <a href="#" class="swiper-button">
                            <span class="swiper-button__link">Заказать расчёт</span>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide swiper__image">
                    <div class="swiper__content" data-swiper-parallax="-800" data-swiper-parallax-duration="600">
                        <h2 class="swiper__title">Расчёт постройки вашего дома</h2>
                        <a href="#" class="swiper-button">
                            <span class="swiper-button__link">Заказать расчёт</span>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide swiper__image">
                    <div class="swiper__content" data-swiper-parallax="-800" data-swiper-parallax-duration="600">
                        <h2 class="swiper__title">Расчитать стоимость всех работ</h2>
                        <a href="#" class="swiper-button">
                            <span class="swiper-button__link">Заказать расчёт</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination-bull"></div>
        </div>
    </div>





    <section id="hero-static" class="hero-static d-flex align-items-center">

        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
            data-aos="zoom-out">
            <img src="/assets/img/logo-diskominfo.png" style="max-width: 250px">
            <br>
            <h2>Selamat Datang di <span>RAKOR KOMINFO PROV. NTT</span></h2>
            <p>RAPAT KOORDINASI BIDANG KOMUNIKASI DAN INFORMATIKA TINGKAT PROVINSI NUSA TENGGARA TIMUR</p>

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
                                        Kupang dapat
                                        ditekan sebesar kurang lebih 2.000.000.000 ditahun 2022.</span>
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

        <section id="galeri" class="portfolio" data-aos="fade-up">
            <div class="container">
                <div class="section-header">
                    <h2>Galeri Rakor KOMINFO</h2>
                </div>
            </div>
            <div class="container" data-aos="fade-up" data-aos-delay="200">
                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                    data-portfolio-sort="original-order">
                    <div class="row g-0 portfolio-container">

                        <center>
                            <h3>Belum ada foto</h3>
                        </center>

                        {{-- @forelse ($GaleriRows as $galeri)
                            <a href="{{ $galeri->foto }}" data-gallery="portfolio-gallery"
                                class="glightbox preview-link">
                                <div
                                    class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-{{ strtolower($galeri->kategori) }}">
                                    <img src="{{ $galeri->foto }}" class="img-fluid" alt="">
                                </div>
                            </a>
                        @empty
                        @endforelse --}}

                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
