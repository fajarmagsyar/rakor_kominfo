@extends('home.layouts.main')
@section('isi')
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2 style="padding-top: 50px;">Sejarah</h2>
                <hr>
            </div>

            <div class="row px-auto" data-aos="fade-up" data-aos-delay="200">
                <div class="col-8 mx-auto">
                    <div class="card shadow p-5" style="border: none; border-radius: 30px">
                        <div class="card-body">
                            {!! $profilRow->sejarah !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->
    </main><!-- End #main -->
@endsection
