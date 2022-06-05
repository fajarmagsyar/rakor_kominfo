@extends('home.layouts.main')
@section('isi')
    <section id="hero-static" class="hero-static d-flex align-items-center">
        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
            data-aos="zoom-out">
            <h2>Selamat Datang di <span>Restoran</span></h2>
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

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container" data-aos="fade-up">

                <div class="row gy-5">
                  @foreach ($fasilitasRows as $fasilitasRow)
                    <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{ $fasilitasRow->foto }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <div class="social">
                                    <a href="/restoran-single/{{ $fasilitasRow->fasilitas_id}}"><i class="bi bi-arrow-up"></i></a>
                                </div>
                                <h4>{{ $fasilitasRow->nama_fasilitas }}i</h4>
                                <p style="font: size 12px;"><i class="bi bi-geo-alt-fill" style="color:#B22222 ;"></i> {{ $fasilitasRow->lokasi }}</p>
                               
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    @endforeach

                </div>

            </div>
        </section><!-- End Team Section -->

    </main><!-- End #main -->
@endsection
