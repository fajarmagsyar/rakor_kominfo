@extends('home.layouts.main')
@section('isi')
    <br><br>
    <main id="main">

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container" data-aos="fade-up">

                <div class="row gy-5">
                    @if (count($fasilitasRows) > 0)
                        @foreach ($fasilitasRows as $fasilitasRow)
                            <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
                                <div class="team-member">
                                    <div class="member-img">
                                        <img src="{{ $fasilitasRow->foto }}" class="img-fluid"
                                            style="width:100%; height:220px;" alt="">
                                    </div>
                                    <div class="member-info">
                                        <div class="social">
                                            <a href="/hotel-single/{{ $fasilitasRow->fasilitas_id }}"><i
                                                    class="bi bi-arrow-up"></i></a>
                                        </div>
                                        <h4>{{ $fasilitasRow->nama_fasilitas }}</h4>
                                        <p style="font: size 12px;"><i class="bi bi-geo-alt-fill"
                                                style="color:#B22222 ;"></i>
                                            {{ $fasilitasRow->lokasi }}</p>

                                    </div>
                                </div>
                            </div><!-- End Team Member -->
                        @endforeach
                    @else
                        <div class="text-center">
                            <h2>Belum ada data</h2>
                        </div>
                    @endif
                </div>

            </div>
        </section><!-- End Team Section -->



    </main><!-- End #main -->
@endsection
