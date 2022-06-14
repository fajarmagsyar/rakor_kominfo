@extends('home.layouts.main')
@section('isi')
    <br>
    <br>

    <main id="main">

    
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
          

            <div class="container">

                <div class="row gy-5 gx-lg-5">

                    <div class="col-lg-4">

                        <div class="info" style="text-align: justify;">
                            <h3>{{ $fasilitasRows[0]['nama_fasilitas'] }}</h3>
                            <p style="text-align: justify;">{!! $fasilitasRows[0]['deskripsi'] !!}</p>

                            <div class="info-item d-flex">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h4>Lokasi:</h4>
                                    <p>{{ $fasilitasRows[0]['lokasi'] }}</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <div>
                                    <?php
                                    $map = explode('|', $fasilitasRows[0]['long_lat']);
                                    
                                    ?>
                                <iframe src="http://maps.google.com/?q={{$map[0]}},{{$map[1]}}" width="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div><!-- End Info Item -->

                           

                        </div>

                    </div>

                    <div class="col-lg-8">
                        <img src="{{ $fasilitasRows[0]['foto'] }}" alt="" class="img-fluid" style="width:100%;" >
                    </div><!-- End Contact Form -->

              

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
