@extends('home.layouts.main')
@section('isi')

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2 style="padding-top: 50px;">Dewan Pengurus</h2>
                    <hr>
                </div>

                <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">
                @foreach ($profilRow as $key => $r)
                    <img src="{{ $r->struktur }}" class="img-fluid" alt="">
                    @endforeach
                </div>

            </div>
        </section><!-- End About Section -->
    </main><!-- End #main -->
@endsection
