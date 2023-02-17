@extends('home.layouts.main')
@section('isi')
    <br><br><br>
    <div class="top-wrapper">
        <section id="galeri" class="portfolio" data-aos="fade-up">
            <div class="container">
                <div class="section-header">
                    <h2>Galeri Rakor KOMINFO</h2>
                </div>
            </div>
            <div class="container" data-aos="fade-up" data-aos-delay="200">
                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                    data-portfolio-sort="original-order">
                    <ul class="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-padupadantenun">Padu Padan Tenun</li>
                        <li data-filter=".filter-rakor2020">RAKOR KOMINFO 2020</li>
                        <li data-filter=".filter-rakor2022">RAKOR KOMINFO 2022</li>
                        <li data-filter=".filter-rakor2023">RAKOR KOMINFO 2023</li>
                    </ul>
                    <div class="row g-0 portfolio-container">

                        <a href="https://www.youtube.com/embed/xpugJidqs7c" data-gallery="portfolio-gallery"
                            class="glightbox preview-link">
                            <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-rakor2020">
                                <iframe src="https://www.youtube.com/embed/xpugJidqs7c"
                                    title="MOZAIK SUMBA  - KEGIATAN RAKOR KOMINFO 2020" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                            </div>
                        </a>
                        <a href="https://www.youtube.com/embed/Dcw6IZzHt2o" data-gallery="portfolio-gallery"
                            class="glightbox preview-link">
                            <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-rakor2020">
                                <iframe src="https://www.youtube.com/embed/Dcw6IZzHt2o"
                                    title="MOZAIK SUMBA - PARIWISATA SUMBA" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                            </div>
                        </a>
                        <a href="https://www.youtube.com/embed/hJGX_0-SpSc" data-gallery="portfolio-gallery"
                            class="glightbox preview-link">
                            <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-rakor2022">
                                <iframe src="https://www.youtube.com/embed/hJGX_0-SpSc"
                                    title="RAKOR BIDANG KOMINFO TINGKAT PROV. NTT TAHUN 2022" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                            </div>
                        </a>
                        <a href="https://www.youtube.com/embed/nkC_r5J5OdU" data-gallery="portfolio-gallery"
                            class="glightbox preview-link">
                            <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-rakor2022">
                                <iframe src="https://www.youtube.com/embed/nkC_r5J5OdU"
                                    title="Rapat Koordinasi Bidang Komunikasi Dan Informatika Tingkat Provinsi NTT Tahun 2022"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                            </div>
                        </a>
                        @forelse ($GaleriRows as $galeri)
                            <a href="{{ $galeri->foto }}" data-gallery="portfolio-gallery" class="glightbox preview-link">
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
        </section>

        </main><!-- End #main -->
    @endsection
