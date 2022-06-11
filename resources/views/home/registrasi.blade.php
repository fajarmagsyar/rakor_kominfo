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
                                    <i class="bi bi-qr-code"></i>
                                </div>
                                <a href="" >
                                    <h3>Registrasi</h3>
                                </a>
                                <p class="text-muted font-14 fst-italic">
                                    Pastikan data yang telah anda input benar dan sesuai dengan format yang tertera.
                                </p>  
                                <br>
                                <div style="text-align: left;">
                                        <form action="/admin/peserta" class="parsley-examples" id="form-valid-parsley" method="post"
                                    enctype="multipart/form-data">
                                    @method('post')
                                    @csrf
                                    <input type="hidden" name="user" value="user">
                                    <div class="row">

                                    <div class="mb-3">
                                            <label for="userName" class="form-label">Kota Asal
                                                <span class="text-danger">*</span></label>
                                                <input type="text" name="asal" parsley-trigger="change" required
                                                class="form-control @error('asal') is-invalid @enderror" id="asal"
                                                value="{{ old('asal') }}" />
                                                @error('asal')
                                                <div id="asal" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                        <div class="mb-3">
                                            <label for="userName" class="form-label">Nama Peserta
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="nama" parsley-trigger="change" required
                                                class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                value="{{ old('nama') }}" />
                                            @error('nama')
                                                <div id="nama" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="userName" class="form-label">Jabatan
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="jabatan" parsley-trigger="change" required
                                                class="form-control @error('jabatan') is-invalid @enderror" id="jabatan"
                                                value="{{ old('jabatan') }}" />
                                            @error('jabatan')
                                                <div id="jabatan" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                        <div class="mb-3">
                                            <label for="userName" class="form-label">Email
                                                <span class="text-danger">*</span></label>
                                            <input type="email" name="email" parsley-trigger="change" required
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                value="{{ old('email') }}" />
                                            @error('email')
                                                <div id="email" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                            <div class="mb-3">
                                            <label for="userName" class="form-label">No.handphone
                                                <span class="text-danger">*</span></label>
                                                <input type="number" name="hp" parsley-trigger="change" minlength="12" maxlength="12" required
                                                class="form-control @error('hp') is-invalid @enderror" id="hp"
                                                value="{{ old('hp') }}" />
                                                @error('hp')
                                                <div id="hp" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                        <div class="text-end">
                                            <button class="btn btn-primary waves-effect waves-light" onClick="return confirm('Yakin data yang anda masukkan sudah benar?')" type="submit"><i
                                                    class="mdi mdi-pencil-box" ></i> Simpan</button>
                                            <button type="reset" class="btn btn-secondary waves-effect"><i
                                                    class="mdi mdi-repeat"></i> Reset</button>
                                        </div>
                                    </div>
                                </form>
                                </div>  
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>
        </section><!-- End Services Section -->
@endsection
