@extends('home.layouts.main')
@section('isi')
    <!-- Modal -->
    <div class="modal fade" id="tata_cara" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://i.imgur.com/ypD0a4r.jpg" class="w-100">
                </div>
            </div>
        </div>
    </div>
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
                            <h3>Registrasi</h3>
                            <p class="text-muted font-14 fst-italic">
                                Pastikan data yang telah anda input benar dan sesuai dengan format yang tertera. <a
                                    href="#" data-bs-toggle="modal" data-bs-target="#tata_cara"><i>(Tata cara
                                        registrasi)</i></a>
                            </p>
                            <br>
                            <div style="text-align: left;">
                                <form action="/admin/peserta" class="parsley-examples" id="form-valid-parsley"
                                    method="post" enctype="multipart/form-data">
                                    @method('post')
                                    @csrf
                                    <input type="hidden" name="user" value="user">
                                    <div class="row">

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="userName" class="form-label">Kota Asal
                                                    <span class="text-danger">*</span></label>
                                                <select name="asal" class="form-select">
                                                    <option value="" selected disabled>- Pilih kota asal -</option>
                                                    @foreach ($kota as $r)
                                                        <option value="{{ $r }}">{{ $r }}</option>
                                                    @endforeach
                                                </select>
                                                @error('asal')
                                                    <div id="asal" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="userName" class="form-label">Nama Peserta
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" name="nama" parsley-trigger="change"
                                                    placeholder="Nama Lengkap" required
                                                    class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                    value="{{ old('nama') }}" />
                                                @error('nama')
                                                    <div id="nama" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="userName" class="form-label">Jabatan
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" name="jabatan" parsley-trigger="change"
                                                    placeholder="Jabatan anda saat ini" required
                                                    class="form-control @error('jabatan') is-invalid @enderror"
                                                    id="jabatan" value="{{ old('jabatan') }}" />
                                                @error('jabatan')
                                                    <div id="jabatan" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <input type="checkbox" name="pic" value="1"> Centang jika anda PIC
                                                dari Kota
                                                Tujuan anda.
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-12 mx-auto">
                                            <div class="mb-3">
                                                <label for="userName" class="form-label">Waktu Kedatangan
                                                    <span class="text-danger">*</span></label>
                                                <input type="datetime-local" name="datang" parsley-trigger="change"
                                                    required
                                                    class="form-control selector @error('datang') is-invalid @enderror"
                                                    id="datang" value="{{ old('datang') }}" />
                                                @error('datang')
                                                    <div id="datang" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-12 mx-auto">
                                            <div class="mb-3">
                                                <label for="userName" class="form-label">Waktu Kepulangan
                                                    <span class="text-danger">*</span></label>
                                                <input type="datetime-local" name="pergi" parsley-trigger="change"
                                                    minlength="12" maxlength="12" required
                                                    class="form-control selector @error('pergi') is-invalid @enderror"
                                                    id="pergi" value="{{ old('pergi') }}" />
                                                @error('pergi')
                                                    <div id="pergi" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 mx-auto">
                                            <div class="mb-3">
                                                <label for="userName" class="form-label">Maskapai Penerbangan
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" name="maskapai" parsley-trigger="change" required
                                                    placeholder="Nama Maskapai/No. Penerbangan"
                                                    class="form-control @error('maskapai') is-invalid @enderror"
                                                    id="maskapai" value="{{ old('maskapai') }}" />
                                                @error('maskapai')
                                                    <div id="maskapai" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <label for="" class="text-muted text-sm">Contoh:
                                                    LION/JT-609</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-12 mx-auto">
                                            <div class="mb-3">
                                                <label for="userName" class="form-label">Email
                                                    <span class="text-danger">*</span></label>
                                                <input type="email" name="email" parsley-trigger="change" required
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="email" value="{{ old('email') }}" />
                                                @error('email')
                                                    <div id="email" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12 mx-auto">
                                            <div class="mb-3">
                                                <label for="userName" class="form-label">No.handphone
                                                    <span class="text-danger">*</span></label>
                                                <input type="number" name="hp" parsley-trigger="change" required
                                                    class="form-control @error('hp') is-invalid @enderror" id="hp"
                                                    value="{{ old('hp') }}" />
                                                @error('hp')
                                                    <div id="hp" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <label for="test" class="text-muted text-sm">Contoh: 08xxxxxxxxxx12
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-12 ">
                                            <div class="mb-3">
                                                <label for="userName" class="form-label">Token
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" name="token" parsley-trigger="change" required
                                                    class="form-control @error('token') is-invalid @enderror"
                                                    id="token" value="{{ old('token') }}" />
                                                @error('token')
                                                    <div id="token" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="text-end">
                                            <button class="btn waves-effect waves-light text-white"
                                                style="background-color: #0ea2bd"
                                                onClick="return confirm('Yakin data yang anda masukkan sudah benar?')"
                                                type="submit"><i class="bi bi-plus"></i> Registrasi</button>
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

    <script>
        $(".selector").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d h:i",
            time_24hr: true
        });
    </script>
@endsection
