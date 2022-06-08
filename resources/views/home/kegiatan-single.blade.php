@extends('home.layouts.main')
@section('isi')
    <br><br>
    <main id="main">

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container" data-aos="fade-up">


                <div class="row gy-4" style="text-align: justify;">
                    <div class="col-lg-5 order-5 order-lg-7" data-aos="fade-up" data-aos-delay="100">
                        <h3>{{ $kegiatanRows[0]['nama_kegiatan'] }}</h3>
                        <h6 class="fst-italic">
                            <i class="bi bi-geo-alt-fill" size="8px" style="color:#B22222 ;"></i>
                            {{ $kegiatanRows[0]['lokasi'] }}
                        </h6>
                        <br>
                        <p>
                        <h6 class="text-muted">Deskripsi: </h6>
                        {!! $kegiatanRows[0]['deskripsi'] !!}
                        </p>
                        <br>
                        <p style="text-align: justify;">
                            <i class="bi bi-calendar-date"></i> {!! $kegiatanRows[0]['tanggal'] !!}
                        </p>
                        <p style="text-align: justify;">
                            <i class="bi bi-clock"></i> {!! $kegiatanRows[0]['jam_masuk'] !!} - {!! $kegiatanRows[0]['jam_keluar'] !!} WITA
                        </p>
                        <p style="text-align: justify;">
                            <i class="bi bi-people"></i> Kuota : {!! $kegiatanRows[0]['kuota'] !!}
                        </p>
                    </div>
                    <div class="col-lg-7 order-5 order-lg-8 text-center" data-aos="fade-up" data-aos-delay="100">
                        {{-- <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15862.848045687188!2d106.76387900243834!3d-6.301520266336718!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69efda2b18eeb1%3A0xe3bea9346241f122!2sUniversitas%20Islam%20Negeri%20Syarif%20Hidayatullah%20Jakarta!5e0!3m2!1sid!2sid!4v1654610326465!5m2!1sid!2sid"
                            width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                        @php
                            $longlat = explode('|', $kegiatanRows[0]['long_lat']);
                        @endphp
                        <iframe
                            src="http://maps.google.com/maps?q={{ $longlat[0] }},{{ $longlat[1] }}&z=15&output=embed"
                            class="w-100 h-100"></iframe>

                    </div>
                </div>

            </div>
        </section><!-- End Features Section -->

    </main><!-- End #main -->
@endsection
