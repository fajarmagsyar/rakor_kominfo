@extends('home.layouts.main')
@section('isi')
    <section id="hero-static" class="hero-static d-flex align-items-center">
        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
            data-aos="zoom-out">
            <h2>Selamat Datang di <span>APEKSI</span></h2>
            <p>RAPAT KERJA KOMISARIAT WILAYAH IV ASOSIASI PEMERINTAH KOTA SELURUH INDONESIA (APEKSI) DI KOTA KUPANG.</p>

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
                                class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
                                aria-label="Warning:">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>No HP anda tidak ditemukan
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                </div>
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
                        <div class="swiper-slide"><img src="/assets/img/logo-apeksi.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="/assets/img/logo-g20.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="/assets/img/logo-kota-kupang.png" class="img-fluid"
                                alt="">
                        </div>
                        <div class="swiper-slide"><img src="/assets/img/logo-lanjudkan.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="/assets/img/logo-diskominfo.png" class="img-fluid"
                                alt=""></div>
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

                    </div><!-- End Service Item -->

                    <section id="" class="portfolio" data-aos="fade-up">
                        <div class="container">
                          <div class="section-header">
                            <h2>Galeri Apeksi 2017</h2>
                          </div>
                        </div>
                        <div class="container-fluid" data-aos="fade-up" data-aos-delay="200">
                          <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">
                            <ul class="portfolio-flters">
                              <li data-filter="*" class="filter-active">All</li>
                              <li data-filter=".filter-praker">Praker</li>
                              <li data-filter=".filter-raker">Raker</li>
                            </ul>
                            <div class="row g-0 portfolio-container">

                                @forelse ( $GaleriRows as $galeri )
                                <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-{{ strtolower($galeri->kategori) }}">
                                    <img src="{{ $galeri->foto }}" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                      <h4>App 1</h4>
                                      <a href="assets/img/portfolio/app-1.jpg" title="App 1" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                      <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                    </div>
                                  </div>
                                @empty

                                @endforelse

                            </div>
                          </div>
                        </div>
                      </section>
                </div>
            </div>
        </section><!-- End Services Section -->


    </main><!-- End #main -->
@endsection
