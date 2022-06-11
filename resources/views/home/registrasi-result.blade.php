@extends('home.layouts.main')
@section('isi')
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <!-- <h2>Our Services</h2> -->

            </div>

            <div class="row gy-5">
                <div class="col-xl-2 col-md-2" style="padding-top: 130px;" data-aos="zoom-in">
                </div>

                <div class="col-xl-8 col-md-8" style="padding-top: 130px;" data-aos="zoom-in" data-aos-delay="200">
                    <div class="service-item">
                        <!-- <div class="img">
                                                                                                    <img src="/assets/img/kegiatan.jpg" class="img-fluid" alt="">
                                                                                                </div> -->
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="bi bi-check"></i>
                            </div>
                            <a href="">
                                <h3>Registrasi Berhasil</h3>
                            </a>
                            <h5>Data anda berhasil dikirim, admin akan mengecek data anda</h5>
                            <br>
                            <div class="text-center">
                                <a class="btn btn-primary" style="background-color: #0ea2bd"
                                    href="/admin/cetak-peserta/pdf/{{ $pesertaRow->user_id }}"><i
                                        class="bi bi-person-badge-fill"></i> Download ID Card Anda</a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>
    </section><!-- End Services Section -->
@endsection
