@extends('home.layouts.main')
@section('isi')
    <br>
    <br>

    <main id="main">
       
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-5">
                        <div class="about-img">
                            <img src="{{ $fasilitasRows[0]['foto'] }}" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-7" style="text-align: justify;">
                        <h3 class="pt-0 pt-lg-5">{{ $fasilitasRows[0]['nama_fasilitas'] }}</h3>
                        <h6 class="fst-italic">
                            <i class="bi bi-geo-alt-fill" size="8px" style="color:#B22222 ;"></i> {{ $fasilitasRows[0]['lokasi'] }}
                        </h6>
                        <br>
                        <p style="text-align: justify;">{!! $fasilitasRows[0]['deskripsi'] !!}</p>
                        
                        </div>

                    </div>

                </div>

            </div>
        </section><!-- End About Section -->


    </main><!-- End #main -->
@endsection
