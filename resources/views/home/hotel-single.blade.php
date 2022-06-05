@extends('home.layouts.main')
@section('isi')

<br><br>
    <main id="main">

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container" data-aos="fade-up">

               
                        <div class="row gy-4" style="text-align: justify;">
                            <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                                <h3>{{ $fasilitasRows[0]['nama_fasilitas'] }}</h3>
                                <h6 class="fst-italic">
                                    <i class="bi bi-geo-alt-fill" size="8px" style="color:#B22222 ;"></i> {{ $fasilitasRows[0]['lokasi'] }}
                                </h6>
                               <br>
                                <p style="text-align: justify;">
                                {!! $fasilitasRows[0]['deskripsi'] !!}
                                </p>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                                <img src="{{ $fasilitasRows[0]['foto'] }}" alt="" class="img-fluid">
                            </div>
                        </div>

            </div>
        </section><!-- End Features Section -->

    </main><!-- End #main -->
@endsection
