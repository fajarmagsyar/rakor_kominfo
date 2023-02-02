@extends('home.layouts.main')
@section('isi')
    <br>
    <br>

    <main id="main">


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">


            <div class="container">

                <div class="row gy-5 gx-lg-5">

                    <div class="col-lg-12">
                        <div class="info" style="text-align: justify;">

                            <div class="row">
                                <div class="col-lg-6">
                                    <h3>{{ $fasilitasRows[0]['nama_fasilitas'] }}</h3>

                                    <span class="text-muted" style="font-size: 13px">
                                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                                        {{ $fasilitasRows[0]['lokasi'] }}
                                    </span>
                                    <p style="text-align: justify;">{!! $fasilitasRows[0]['deskripsi'] !!}
                                    </p>

                                </div>
                                <div class="col-lg-6">
                                    <img src="{{ $fasilitasRows[0]['foto'] }}" alt=""
                                        class="img-fluid rounded shadow" style="width:100%;">
                                </div>
                            </div>

                            <div class="mt-3">
                                <center>
                                    <b class="mb-4"><i class="bi bi-google"></i> Lokasi Google Maps</b>
                                </center>
                                <br>
                                <br>
                                <?php
                                $map = explode('|', $fasilitasRows[0]['long_lat']);
                                
                                ?>
                                {{-- <iframe src="http://maps.google.com/?q={{$map[0]}},{{$map[1]}}" width="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                                <div class="gmap_canvas"><iframe class="w-100" style="height: 450px" id="gmap_canvas"
                                        src="https://maps.google.com/maps?q={{ $map[0] }}%20,%20{{ $map[1] }}%20&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                                        href="https://2piratebay.org"></a><br>
                                </div>
                            </div>



                        </div>

                    </div>



                </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
