@extends('home.layouts.main')
@section('isi')

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2 style="padding-top: 50px;">Sejarah</h2>
                    <hr>
                </div>

                <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">
                    <?php 
                        echo $profilRow->sejarah;
                    ?>
                    <!-- <img src="{{ $profilRow->sejarah }}" class="img-fluid" alt=""> -->
                </div>
 
            </div>
        </section><!-- End About Section -->
    </main><!-- End #main -->
@endsection
