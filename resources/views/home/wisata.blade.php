@extends('home.layouts.main')
@section('isi')

<section id="hero-static" class="hero-static d-flex align-items-center">
        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
            data-aos="zoom-out">
            <h2>Selamat Datang di <span>Wisata</span></h2>
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
        
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">
                
                <div class="row gy-5">
                  @foreach ($fasilitasRows as $fasilitasRow)
                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="service-item">
                            <div class="img">
                                <img src="{{ $fasilitasRow->foto }}" class="img-fluid" alt="">
                            </div>
                            <div class="details position-relative">    
                                <a href="/wisata-single" class="stretched-link">
                                    <h3>{{ $fasilitasRow->nama_fasilitas }}</h3>
                                </a>
                                <p>{!! substr($fasilitasRow->deskripsi, 0, 120)  !!}...</p>
                                    <a href="/wisata-single/{{ $fasilitasRow->fasilitas_id}}" class="readmore stretched-link"><span><h6>Read More</h6></span>
                                </a>
                            </div>
                        </div>
                    </div><!-- End Service Item -->
                   @endforeach 
                   
                </div>

            </div>
        </section><!-- End Services Section -->

     

    </main><!-- End #main -->
@endsection
