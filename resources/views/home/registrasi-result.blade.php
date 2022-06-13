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
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="bi bi-check"></i>
                            </div>
                            <a href="">
                                <h3>Registrasi Berhasil</h3>
                            </a>
                            <h5>Data anda berhasil dikirim, silahkan pilih kegiatan yang ingin anda ikuti:</h5>
                            <br>
                            <div class="text-center">
                                <a class="btn btn-primary" style="background-color: #0ea2bd"
                                    href="/admin/cetak-peserta/pdf/{{ $pesertaRow->user_id }}"><i
                                        class="bi bi-person-badge-fill"></i> Download ID Card Anda</a>
                            </div>
                            <br>
                            <form action="/updateKegiatanPeserta/{{ $pesertaRow->user_id }}" method="post"
                                id="formUpdate">
                                @csrf
                                <ol class="list-group">
                                    @foreach ($kegiatanRows as $keg)
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto">
                                                <input type="checkbox" class="float-start check" style="margin-top: 6px"
                                                    name="kegiatan_id" value="{{ $keg->kegiatan_id }}">
                                                <b class="float-start">{{ $keg->nama_kegiatan }}</b>
                                                <br>
                                                <span class="float-start text-muted" style="font-size: 12px">
                                                    <i class="bi bi-calendar"></i> {{ $keg->tanggal }}
                                                    <i class="bi bi-clock"></i> {{ $keg->jam_masuk }} -
                                                    {{ $keg->jam_keluar }} WITA
                                                </span>
                                            </div>
                                            <span class="badge bg-primary rounded-pill">Kuota:
                                                {{ $keg->kuota }}</span>
                                        </li>
                                    @endforeach
                                </ol>
                                <div class="mt-4">
                                    <button class="float-end mb-3 btn bg-primary text-white" type="submit">
                                        <i class="bi bi-plus"></i>
                                        Registrasi Kegiatan</button>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>
    </section><!-- End Services Section -->
@endsection
